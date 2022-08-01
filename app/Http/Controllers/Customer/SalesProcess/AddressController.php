<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SalesProcess\StoreAddressRequest;
use App\Models\Market\Address;
use App\Models\Market\CartItem;
use App\Models\Market\Province;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addressAndDelivery()
    {
        $user = Auth::user();

        $provinces = Province::all();

        $cartItems = CartItem::where('user_id', $user->id)->get();

        if (empty(CartItem::where('user_id', $user->id)->count())) {
            return redirect()->route('customer.sales-process.cart');
        }

        return view('customer.sales-process.address-and-delivery', compact('cartItems', 'provinces'));
    }

    public function getCities(Province $province)
    {
        $cities = $province->cities;

        if ($cities != null) {
            return response()->json([
                'status' => true,
                'cities' => $cities,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'cities' => null,
            ]);
        }
    }

    public function addAddress(StoreAddressRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        $inputs['postal_code'] = convertPersianToEnglish($request->postal_code);

        $address = Address::create($inputs);

        return redirect()->back();
    }
}
