<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Content\Banner;
use App\Models\Content\Page;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // auth()->loginUsingId(1);
        $slideShowImages = Banner::where('position', 0)->where('status', 1)->get();
        $topBanners = Banner::where('position', 1)->where('status', 1)->take(2)->get();
        $middleBanners = Banner::where('position', 2)->where('status', 1)->take(2)->get();
        $bottomBanner = Banner::where('position', 3)->where('status', 1)->first();
        $brands = Brand::all();
        $mostVisitedProducts = Product::latest()->take(10)->get();
        $offerProducts = Product::latest()->take(10)->get();
        return view('customer.home', compact('slideShowImages', 'topBanners', 'middleBanners', 'bottomBanner', 'brands', 'mostVisitedProducts', 'offerProducts'));
    }

    public function products(Request $request, ProductCategory $category = null)
    {
        // get brands
        $brands = Brand::all();

        // category selection
        if ($category)
            $productModel = $category->products();
        else
            $productModel = new Product();

        // get categories
        $categories = ProductCategory::whereNull('parent_id')->get();

        // switch for sort filtering
        switch ($request->sort) {
            case "1":
                $column = "created_at";
                $direction = "DESC";
                break;
            case "2":
                $column = "price";
                $direction = "DESC";
                break;
            case "3":
                $column = "price";
                $direction = "ASC";
                break;
            case "4":
                $column = "view";
                $direction = "DESC";
                break;
            case "5":
                $column = "sold_number";
                $direction = "DESC";
                break;
            default:
                $column = "created_at";
                $direction = "ASC";
                break;
        }
        if ($request->search) {
            $query = $productModel->where('name', 'LIKE', "%{$request->search}%")->orderBy($column, $direction);
        } else {
            $query = $productModel->orderBy($column, $direction);
        }

        $products = $request->min_price && $request->max_price ?
            $query->whereBetween('price', [$request->min_price, $request->max_price]) :
            $query->when($request->min_price, function ($query) use ($request) {
                $query->where('price', '>=', $request->min_price)->get();
            })->when($request->max_price, function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price)->get();
            })->when(!($request->min_price && $request->max_price), function ($query) {
                $query->get();
            });

        $products = $products->when($request->brands, function () use ($request, $products) {
            $products->whereIn('brand_id', $request->brands);
        });

        $products = $products->paginate(2);
        $products->appends($request->query());

        // get selected brands
        $selectedBrandArray = [];
        if ($request->brands) {
            $selectedBrands = Brand::find($request->brands);
            foreach ($selectedBrands as $selectedBrand) {
                array_push($selectedBrandArray, $selectedBrand->original_name);
            }
        }

        return view('customer.market.product.products', compact('products', 'brands', 'selectedBrandArray', 'categories'));
    }

    public function page(Page $page)
    {
        return view('customer.page', compact('page'));
    }
}
