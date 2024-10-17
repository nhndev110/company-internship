<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductBrands;
use App\Models\ProductCategories;
use App\Models\ProductSuppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    // TODO: show search result
    $products = new Product();

    $search = $request->query('s');
    if (!empty($search)) {
      $products = $products->where('name', 'LIKE', "%{$search}%");
    }

    $category_id = $request->query('category_id');
    if (!empty($category_id)) {
      $products = $products->where('product_category_id', $category_id);
    }

    $brand_id = $request->query('brand_id');
    if (!empty($brand_id)) {
      $products = $products->where('product_brand_id', $brand_id);
    }

    $start_price = $request->query('start_price');
    if (!empty($start_price)) {
      $products = $products->where('price', '>=', $start_price);
    }

    $end_price = $request->query('end_price');
    if (!empty($end_price)) {
      $products = $products->where('price', '<=', $end_price);
    }

    $products = $products->paginate(10)->withQueryString();

    $product_categories = ProductCategories::all(['id', 'name']);
    $product_brands = ProductBrands::all(['id', 'name']);

    return response()->view('admin.pages.products.index', [
      'products' => $products,
      'product_categories' => $product_categories,
      'product_brands' => $product_brands,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = ProductCategories::all();
    $suppliers = ProductSuppliers::all();
    $brands = ProductBrands::all();

    return response()->view('admin.pages.products.create', [
      'categories' => $categories,
      'suppliers' => $suppliers,
      'brands' => $brands
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'productName' => 'required|max:255',
      'productSlug' => 'required',
      'productDescription' => 'required',
      'productPrice' => 'required|decimal:2',
      'productDiscount' => 'required|digits_between:0,100',
      'productImage' => 'required|image|max:2048',
      'productVisibility' => 'required|digits_between:-1,1',
      'category' => 'required|exists:product_categories,id',
      'brand' => 'required|exists:product_brands,id',
      'supplier' => 'required|exists:product_suppliers,id',
    ]);

    dd($request->all());

    if ($validator->fails()) {
      return redirect()->route('admin.products.create')->withErrors($validator)->withInput();
    }

    $validated = $validator->validated();


    $product = new Product();

    $product->name = $validated['productName'];
    $product->slug = $validated['productSlug'];
    $product->description = $validated['productDescription'];
    $product->price = $validated['productPrice'];
    $product->discount = $validated['productDiscount'];
    $product->image = $validated['productImage'];
    $product->visibility = $validated['productVisibility'];
    $product->product_category_id = $validated['category'];
    $product->product_brand_id = $validated['brand'];
    $product->product_supplier_id = $validated['supplier'];

    $product->save();

    return response()->redirectToRoute('admin.products.index');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    //
  }
}
