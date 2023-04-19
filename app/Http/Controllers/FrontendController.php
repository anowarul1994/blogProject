<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('order_by', 'asc')->get();
        $categories = Category::with('subCategories')->where('status', 1)->orderBy('order_by', 'asc')->get();
        $feature_post = Post::with('user', 'category', 'subCategory')->where('status', 1)->latest()->first();
        $posts = Post::with('user', 'category', 'subCategory')->where('status', 1)->latest()->skip(1)->paginate(4);
        return view('frontend.pages.index', compact('sliders', 'categories', 'feature_post', 'posts'));
    }
}
