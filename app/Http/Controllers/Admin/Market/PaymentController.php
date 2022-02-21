<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('admin.market.payment.index', compact('payments'));
    }

    public function online()
    {
        $payments = Payment::orderBy('created_at', 'DESC')->where('paymentable_type', 'App\Models\Market\OnlinePayment')->simplePaginate(15);
        return view('admin.market.payment.index', compact('payments'));
    }

    public function offline()
    {
        $payments = Payment::orderBy('created_at', 'DESC')->where('paymentable_type', 'App\Models\Market\OfflinePayment')->simplePaginate(15);
        return view('admin.market.payment.index', compact('payments'));
    }

    public function cash()
    {
        $payments = Payment::orderBy('created_at', 'DESC')->where('paymentable_type', 'App\Models\Market\CashPayment')->simplePaginate(15);
        return view('admin.market.payment.index', compact('payments'));
    }

    public function notPaid(Payment $payment)
    {
        $payment->status = 0;
        $payment->save();
        return redirect()->route('admin.market.payment.index')->with('swal-success', 'تغییر با موفقیت انجام شد.');
    }

    public function paid(Payment $payment)
    {
        $payment->status = 1;
        $payment->save();
        return redirect()->route('admin.market.payment.index')->with('swal-success', 'تغییر با موفقیت انجام شد.');
    }

    public function canceled(Payment $payment)
    {
        $payment->status = 2;
        $payment->save();
        return redirect()->route('admin.market.payment.index')->with('swal-success', 'تغییر با موفقیت انجام شد.');
    }

    public function returned(Payment $payment)
    {
        $payment->status = 3;
        $payment->save();
        return redirect()->route('admin.market.payment.index')->with('swal-success', 'تغییر با موفقیت انجام شد.');
    }

    public function show(Payment $payment)
    {
        return view('admin.market.payment.show', compact('payment'));
    }
}
