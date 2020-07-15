<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Review;


class MainController extends Controller
{
	//main page
    public function index()
    {
		// $category = Category::find(1);
		// $products = $category->products;
		// dd($products->count()); 

		// $product = Product::Find(1);
		// dd($product->category->name); 

		$categories = Category::with('products')->get();
		$products = Product::with('category')->where('recommended', '=', 1)->get();
		//dd($products);
    	return view('main.index', compact('categories', 'products'));
	}
	
	public function category(string $slug)
	{
		$category = Category::firstWhere('slug', $slug);
		// $products = Product::where('category_id', $category->id)->get();
		$products = Product::where('category_id', $category->id)->paginate(8);//simplePaginate(8)-без цифр
		return view('shop.category', compact('category', 'products'));
	}

	public function product(string $slug)
	{
		$product = Product::firstWhere('slug', $slug);
		$reviews = Review::where('product_id', $product->id)->get();
		return view('shop.product', compact('product', 'reviews'));
	}

	public function getReview(Request $request)
	{
		$review = new Review();
		$review->review = $request->comment;
		$review->user_id = $request->user;
		$review->product_id = $request->product;
		$review->save();// сохр данные модели в БД

		return back();
	}

	function test()
	{

	}

}


//php artisan migrate:refresh --seed 
// php artisan db:seed
// php artisan migrate
