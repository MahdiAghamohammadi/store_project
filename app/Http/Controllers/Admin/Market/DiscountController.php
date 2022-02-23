<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSaleRequest;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;
use App\Models\Market\AmazingSale;
use App\Models\Market\CommonDiscount;
use App\Models\Market\Product;

class DiscountController extends Controller
{
    public function coupon()
    {
        return view('admin.market.discount.coupon');
    }

    public function couponCreate()
    {
        return view('admin.market.discount.coupon-create');
    }

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
        return redirect(route('admin.market.discount.commonDiscount'))->with('swal-success', 'کد تخفیف مورد نظر با موفقیت اضافه شد.');
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
        return redirect(route('admin.market.discount.commonDiscount'))->with('swal-success', 'کد تخفیف مورد نظر با موفقیت ویرایش شد.');
    }

    public function commonDiscountDestroy(CommonDiscount $commonDiscount)
    {
        $result = $commonDiscount->delete();
        return redirect(route('admin.market.discount.commonDiscount'))->with('swal-success', 'کد تخفیف مورد نظر با موفقیت حذف شد.');
    }

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
