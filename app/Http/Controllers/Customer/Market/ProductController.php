<?php

namespace App\Http\Controllers\Customer\Market;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Content\Comment;
use App\Http\Controllers\Controller;
use App\Models\Market\Compare;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        $relatedProducts = Product::all()->except($product->id);
        return view('customer.market.product.product', compact('product', 'relatedProducts'));
    }

    public function addComment(Request $request, Product $product)
    {
        $request->validate([
            'body' => 'required|max:2000',
        ]);

        $inputs['body'] = str_replace(PHP_EOL, "<br />", $request->body);
        $inputs['author_id'] = Auth::user()->id;
        $inputs['commentable_id'] = $product->id;
        $inputs['commentable_type'] = Product::class;
        Comment::create($inputs);
        return back();
    }

    public function addToFavorite(Product $product)
    {
        if (Auth::check()) {
            $product->user()->toggle([Auth::user()->id]);
            if ($product->user->contains(Auth::user()->id)) {
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }

    public function addRate(Request $request, Product $product)
    {
        $productIds = auth()->user()->isUserPurchasedProduct($product->id);
        if (Auth::check() && $productIds->count() > 0) {
            $user = Auth::user();
            $user->rate($product, $request->rating);
            return back()->with('alert-section-success', 'امتیاز شما ثبت شد.');
        } else {
            return back()->with('alert-section-error', 'شما اجازه ثبت امتیاز ندارید - برای ثبت امتیاز باید محصول را خریداری کنید.');
        }
    }

    public function addToCompare(Product $product)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->compare()->count() > 0) {
                $userCompareList = $user->compare;
            } else {
                $userCompareList = Compare::create([
                    'user_id' =>  $user->id
                ]);
            }
            $product->compares()->toggle([$userCompareList->id]);
            if ($product->compares->contains($userCompareList)) {
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }
}
