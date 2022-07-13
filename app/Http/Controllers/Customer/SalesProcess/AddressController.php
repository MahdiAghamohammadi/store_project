<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressAndDelivery()
    {
        $user = Auth::user();

        $cartItem = CartItem::where('user_id', $user->id)->count();

        if (empty($cartItem)) {
            return redirect()->route('customer.sales-process.cart');
        }

        return view('customer.sales-process.address-and-delivery');
    }

    public function addAddress()
    {

    }
}
