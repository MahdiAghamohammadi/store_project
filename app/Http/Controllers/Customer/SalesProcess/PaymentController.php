<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Services\Payment\PaymentService;
use App\Models\Market\CartItem;
use App\Models\Market\CashPayment;
use App\Models\Market\Coupon;
use App\Models\Market\OfflinePayment;
use App\Models\Market\OnlinePayment;
use App\Models\Market\Order;
use App\Models\Market\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function payment()
    {
        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $order = Order::where([
            ['user_id', $user->id],
            ['order_status', 0],
        ])->first();
        return view('customer.sales-process.payment', compact('cartItems', 'order'));
    }

    public function couponDiscount(Request $request)
    {
        $request->validate([
            'coupon' => 'required',
        ]);

        $coupon = Coupon::where([
            ['code', $request->coupon],
            ['status', 1], ['end_date', '>', now()],
            ['start_date', '<', now()],
        ])->first();

        if ($coupon != null) {
            if ($coupon->user_id != null) {
                $coupon = Coupon::where([
                    ['code', $request->coupon],
                    ['status', 1], ['end_date', '>', now()],
                    ['start_date', '<', now()],
                    ['user_id', auth()->user()->id],
                ])->first();
                if ($coupon == null) {
                    return redirect()->back();
                }
            }

            $order = Order::where([
                ['user_id', auth()->user()->id],
                ['order_status', 0],
                ['coupon_id', null],
            ])->first();

            if ($order) {
                if ($coupon->amount_type == 0) {
                    $couponDiscountAmount = $order->order_final_amount * ($coupon->amount / 100);
                    if ($couponDiscountAmount > $coupon->discount_sealing) {
                        $couponDiscountAmount = $coupon->discount_sealing;
                    }
                } else {
                    $couponDiscountAmount = $coupon->amount;
                }

                $orderFinalAmount = $order->order_final_amount - $couponDiscountAmount;

                $finalDiscount = $order->order_total_products_discount_amount + $couponDiscountAmount;

                $order->update(
                    [
                        'coupon_id' => $coupon->id,
                        'order_coupon_discount_amount' => $couponDiscountAmount,
                        'order_coupon_discount_amount' => $couponDiscountAmount,
                        'order_total_products_discount_amount' => $finalDiscount,
                        'order_final_amount' => $orderFinalAmount,
                    ]
                );
                return redirect()->back()->with(['coupon' => 'کد تخفیف با موفقیت اعمال شد.']);
            } else {
                return redirect()->back()->withErrors(['coupon-applied' => 'یک کد تخفیف از قبل اعمال شده است.']);
            }
        } else {
            return redirect()->back()->withErrors(['code' => 'کد تخفیف اشتباه است.']);
        }
    }

    public function paymentSubmit(Request $request, PaymentService $paymentService)
    {
        $request->validate([
            'payment_type' => 'required',
        ]);

        $user = auth()->user();
        $order = Order::where([
            ['user_id', $user->id],
            ['order_status', 0],
        ])->first();
        $cartItems = CartItem::where('user_id', $user->id)->get();

        $cash_receiver = null;

        switch ($request->payment_type) {
            case '1':
                $targetModel = OnlinePayment::class;
                $type = 0;
                break;
            case '2':
                $targetModel = OfflinePayment::class;
                $type = 1;
                break;
            case '3':
                $targetModel = CashPayment::class;
                $type = 2;
                $cash_receiver = $request->cash_receiver ?? null;
                break;
            default:
                return redirect()->back()->withErrors(['error' => 'خطایی رخ داده است.']);
        }

        $paymented = $targetModel::create([
            'amount' => $order->order_final_amount,
            'user_id' => $user->id,
            'gateway' => 'زرین پال',
            'pay_date' => now(),
            'cash_receiver' => $cash_receiver,
            'status' => 1,
        ]);

        $payment = Payment::create([
            'amount' => $order->order_final_amount,
            'user_id' => $user->id,
            'status' => 1,
            'type' => $type,
            'paymentable_id' => $paymented->id,
            'paymentable_type' => $targetModel,
        ]);

        if ($request->payment_type == 1) {
            $paymentService->zarinPal($order->order_final_amount, $order, $paymented);
        }

        $order->update([
            'order_status' => 3,
        ]);

        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('customer.home')->with('order_success', 'سفارش شما با موفیقت ثبت شد.');
    }

    public function paymentCallback(Order $order, OnlinePayment $onlinePayment, PaymentService $paymentService)
    {
        $amount = $onlinePayment->amount * 10;
        $result = $paymentService->zarinPalVerify($amount, $onlinePayment);

        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)->get();

        DB::transaction(function () use ($cartItems, $result, $order) {
            foreach ($cartItems as $cartItem) {
                $cartItem->delete();
            }

            if ($result['success']) {
                $order->update([
                    'order_status' => 3,
                ]);
                return redirect()->route('customer.home')->with('order_success', 'پرداخت با موفقیت انجام شد');
            } else {
                $order->update([
                    'order_status' => 2,
                ]);
                return redirect()->route('customer.home')->with('order_danger', 'پرداخت با خطا مواجه شد');
            }
        });
    }
}
