<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slider;
use App\Models\Category;
use App\Models\SubCategory;
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

    public function category($slug_id)
    {
        $sliders = Slider::where('status', 1)->orderBy('order_by', 'asc')->get();
        $categories = Category::with('subCategories')->where('status', 1)->orderBy('order_by', 'asc')->get();
        $category = Category::where('slug_id', $slug_id)->first();
        $posts = Post::with('user', 'category', 'subCategory')->where('status', 1)->where('category_id', $category->id)->latest()->paginate(4);
        $feature_post = Post::with('user', 'category', 'subCategory')->where('status', 1)->where('category_id', $category->id)->latest()->first();
        return view('frontend.pages.index', compact('sliders', 'categories', 'feature_post', 'posts', ));
    }


    public function sub_category($slug_id)
    {
        $sliders = Slider::where('status', 1)->orderBy('order_by', 'asc')->get();
        $categories = Category::with('subCategories')->where('status', 1)->orderBy('order_by', 'asc')->get();
        $sub_category = SubCategory::where('slug_id', $slug_id)->first();
        $posts = Post::with('user', 'category', 'subCategory')->where('status', 1)->where('sub_category_id', $sub_category->id)->latest()->paginate(4);
        $feature_post = Post::with('user', 'category', 'subCategory')->where('status', 1)->where('sub_category_id', $sub_category->id)->latest()->first();
        return view('frontend.pages.index', compact('sliders', 'categories', 'feature_post', 'posts', ));
    }

    public function single_blog($slug_id)
    {
        $sliders = Slider::where('status', 1)->orderBy('order_by', 'asc')->get();
        $categories = Category::with('subCategories')->where('status', 1)->orderBy('order_by', 'asc')->get();
        $single_post = Post::with('user', 'category', 'subCategory', 'comment', 'comment.user', 'comment.replay', 'comment.replay.user')->where('status', 1)->where('slug_id', $slug_id)->first();
        
        return view('frontend.pages.single', compact('sliders', 'categories', 'single_post', ));
    }


    public function search(Request $search)
    {
        $sliders = Slider::where('status', 1)->orderBy('order_by', 'asc')->get();
        $categories = Category::with('subCategories')->where('status', 1)->orderBy('order_by', 'asc')->get();
        $posts = Post::with('user', 'category', 'subCategory')->where('status', 1)->where('name','like', '%'.$search->search.'%')->orWhere('description','like', '%'.$search->search.'%')->paginate(4);
        return view('frontend.pages.search_result', compact('sliders', 'categories', 'posts', ));
    }


}
