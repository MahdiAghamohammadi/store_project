<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\Coupon;
use App\Models\Market\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        return view('customer.sales-process.payment');
    }

    public function couponDiscount(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $coupon = Coupon::where([
            ['code', $request->code],
            ['status', 1], ['end_date', '>', now()],
            ['start_date', '<', now()],
        ])->first();

        if ($coupon->user_id != null) {
            $coupon = Coupon::where([
                ['code', $request->code],
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
            if ($coupon->amount_type = 0) {
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
        }
    }
}
