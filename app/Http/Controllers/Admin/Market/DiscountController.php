<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSaleRequest;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;
use App\Http\Requests\Admin\Market\CouponRequest;
use App\Models\Market\AmazingSale;
use App\Models\Market\CommonDiscount;
use App\Models\Market\Coupon;
use App\Models\Market\Product;
use App\Models\User;

class DiscountController extends Controller
{
    // Coupon section
    public function coupon()
    {
        $coupons = Coupon::all();
        return view('admin.market.discount.coupon', compact('coupons'));
    }

    public function couponCreate()
    {
        $users = User::all();
        return view('admin.market.discount.coupon-create', compact('users'));
    }

    public function couponStore(CouponRequest $request)
    {
        $inputs = $request->all();
        // date fixed => remove 000 of last timestamp
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        if ($inputs['type'] == 0) {
            $inputs['user_id'] = null;
        }
        $coupon = Coupon::create($inputs);
        return redirect(route('admin.market.discount.coupon'))->with('swal-success', 'کد تخفیف مورد نظر با موفقیت اضافه شد.');
    }

    public function couponEdit(Coupon $coupon)
    {
        $users = User::all();
        return view('admin.market.discount.coupon-edit', compact('users', 'coupon'));
    }

    public function couponUpdate(CouponRequest $request, Coupon $coupon)
    {
        $inputs = $request->all();
        // date fixed => remove 000 of last timestamp
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        if ($inputs['type'] == 0) {
            $inputs['user_id'] = null;
        }
        $coupon->update($inputs);
        return redirect(route('admin.market.discount.coupon'))->with('swal-success', 'کد تخفیف مورد نظر با موفقیت ویرایش شد.');
    }

    public function couponDestroy(Coupon $coupon)
    {
        $result = $coupon->delete();
        return redirect(route('admin.market.discount.coupon'))->with('swal-success', 'کد تخفیف مورد نظر با موفقیت حذف شد.');
    }

    // Common discount section
    public function commonDiscount()
    {
        $commonDiscounts = CommonDiscount::all();
        return view('admin.market.discount.common', compact('commonDiscounts'));
    }

    public function commonDiscountCreate()
    {
        return view('admin.market.discount.common-create');
    }

    public function commonDiscountStore(CommonDiscountRequest $request)
    {
        $inputs = $request->all();
        // date fixed => remove 000 of last timestamp
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        $commonDiscount = CommonDiscount::create($inputs);
        return redirect(route('admin.market.discount.commonDiscount'))->with('swal-success', 'تخفیف مورد نظر با موفقیت اضافه شد.');
    }

    public function commonDiscountEdit(CommonDiscount $commonDiscount)
    {
        return view('admin.market.discount.common-edit', compact('commonDiscount'));
    }

    public function commonDiscountUpdate(CommonDiscountRequest $request, CommonDiscount $commonDiscount)
    {
        $inputs = $request->all();
        // date fixed => remove 000 of last timestamp
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        $commonDiscount->update($inputs);
        return redirect(route('admin.market.discount.commonDiscount'))->with('swal-success', 'تخفیف مورد نظر با موفقیت ویرایش شد.');
    }

    public function commonDiscountDestroy(CommonDiscount $commonDiscount)
    {
        $result = $commonDiscount->delete();
        return redirect(route('admin.market.discount.commonDiscount'))->with('swal-success', 'تخفیف مورد نظر با موفقیت حذف شد.');
    }

    // Amazing sale section
    public function amazingSale()
    {
        $amazingSales = AmazingSale::all();
        return view('admin.market.discount.amazing', compact('amazingSales'));
    }

    public function amazingSaleCreate()
    {
        $products = Product::all();
        return view('admin.market.discount.amazing-create', compact('products'));
    }

    public function amazingSaleStore(AmazingSaleRequest $request)
    {
        $inputs = $request->all();
        // date fixed => remove 000 of last timestamp
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        $amazingSale = AmazingSale::create($inputs);
        return redirect(route('admin.market.discount.amazingSale'))->with('swal-success', 'فروش شگفت انگیز مورد نظر با موفقیت اضافه شد.');
    }

    public function amazingSaleEdit(AmazingSale $amazingSale)
    {
        $products = Product::all();
        return view('admin.market.discount.amazing-edit', compact('amazingSale', 'products'));
    }

    public function amazingSaleUpdate(AmazingSaleRequest $request, AmazingSale $amazingSale)
    {
        $inputs = $request->all();
        // date fixed => remove 000 of last timestamp
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        $amazingSale->update($inputs);
        return redirect(route('admin.market.discount.amazingSale'))->with('swal-success', 'فروش شگفت انگیز مورد نظر با موفقیت ویرایش شد.');
    }

    public function amazingSaleDestroy(AmazingSale $amazingSale)
    {
        $result = $amazingSale->delete();
        return redirect(route('admin.market.discount.amazingSale'))->with('swal-success', 'فروش شگفت انگیز مورد نظر با موفقیت حذف شد.');
    }
}
