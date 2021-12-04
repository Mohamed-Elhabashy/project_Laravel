<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\ViewModels\ProductViewModel;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $products = $category->products()->paginate(25);
        return View('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return View('admin.product.form', new ProductViewModel, ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $inputs = $request->except(['image']);
        $inputs['image'] = $this->AddImage($request->image);
        Product::create($inputs);
        session()->flash('message', 'product Created Successfully');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return View('admin.product.form', new ProductViewModel($product), ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $inputs = $request->except(['image']);
        $inputs['image'] = $this->AddImage($request->image, $product->image);
        $product->update($inputs);
        session()->flash('message', 'product updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::disk('uploads')->delete('products/'.$product->image);
        $product->delete();
        session()->flash('message', 'product delete Successfully');
        return back();
    }

    public function AddImage($image, $OldImage = null)
    {
        if ($OldImage != null) {
            Storage::disk('uploads')->delete('products/'.$OldImage);
        }
        $new_name_image = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME).time().'.'.$image->extension();
        Image::make($image)->resize(450, 450)->save(public_path('uploads/products/'.$new_name_image));
        return $new_name_image;
    }
}
