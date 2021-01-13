<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    private $product, $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }


    public function categories($idProduct)
    {
        $product = $this->product->with('categories')->find($idProduct);

        return view('admin.products.categories.categories', compact('product'));
    }

    public function available($idProduct)
    {
        $product = $this->product->find($idProduct);

       

        $categories = $product->categoryAvailable();

        // dd($categories);

        return view('admin.products.categories.available', compact('product', 'categories'));
    }

    public function categoryAttach(Request $request, $idProduct)
    {
        if(!$product = $this->product->find($idProduct)){

            return redirect()->back();
        }

        if($request->categories <= 0){
            return redirect()->back()->with('error', 'Você precisa selecionar ao menos uma categoria!');
        }


        $product->categories()->attach($request->categories);

        return redirect()->route('products.categories', $product->id)->with('success', 'Categorias vinculadas com sucess');


    }

    public function categoryDetach($idProduct, $idCategory)
    {
        $product = $this->product->find($idProduct);
        $category = $this->category->find($idCategory);

        if(!$product || !$category){

            return redirect()->back();

        }

        $product->categories()->detach($category);

        return redirect()->route('products.categories', $product->id)->with('success', 'Categorias desvinculadas com sucesso');
    }


}

