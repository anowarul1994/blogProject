<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application

    {
        $title ="List";
        $posts = Post::with('category', 'subCategory', 'user')->latest()->get();
        return view('backend.pages.modules.post.index', compact('posts', 'title'));
    }

     /**
     * @return Application|Factory|View
     */
    public function trashed(): View|Factory|Application
    {
        $title ="Trashed";
        $posts = Post::with('category', 'subCategory', 'user')->onlyTrashed()->latest()->get();
        return view('backend.pages.modules.post.index', compact('posts', 'title'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $categories = Category::pluck('name', 'id');
        return view('backend.pages.modules.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $post_data = $request->except('photo');
        $post_data['slug']= Str::slug($request->input('slug'));
        $old_post = Post::latest()->first();
        if($old_post){
            $post_data['slug_id'] = $old_post->slug_id+1;
        }else{
            $post_data['slug_id'] = 10000;
        }
        $post_data['user_id'] = Auth::user()->id;
        if ($request->file('photo')){
            $photo = $request->file('photo');
            $width = 750;
            $height = 450;
            $thumb_width = 350;
            $thumb_height = 200;
            $path = 'image/uploads/original/';
            $thumb_path = 'image/uploads/thumbnail/';
            $name = Str::slug($request->input('slug').'-'.Carbon::now()->toDayDateTimeString()).'.webp';
            $post_data['photo'] = $name;

            imageUploadController::imageUpload($photo, $width, $height, $path, $name);
            imageUploadController::imageUpload($photo, $thumb_width, $thumb_height, $thumb_path, $name);


        }
      Post::create($post_data);



//        $post_data = new Post();
//        $post_data->name= $request->name;
//        $post_data->slug= $request->sulg;
//        $post_data->slug= $request->sulg;
//        $old_post = Post::latest()->first();
//        if ($old_post){
//            $post_data->slug_id = $old_post->slug_id +1;
//        }else{
//            $post_data->slug_id = 10000;
//        }
//        $post_data->status = $request->status;
//        $post_data->description = $request->description;
//        $post_data->category_id = $request->category_id;
//        $post_data->sub_category_id = $request->sub_category_id;
//        $post_data->user_id = Auth::user()->id;
//        $post_data->save();

        session()->flash('msg', 'Post Created Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('posts.index');



    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id): View|Factory|Application
    {
       $post = Post::with('category', 'subCategory','user')->find($id);
        return view('backend.pages.modules.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $postEdit = Post::find($id);
        $categories = Category::pluck('name', 'id');

        return view('backend.pages.modules.post.edit', compact('postEdit','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $postData = Post::find($id);
        $post_data = $request->except('photo');
        $post_data['slug']= Str::slug($request->input('slug'));


        if ($request->file('photo')){
            $photo = $request->file('photo');
            $width = 750;
            $height = 450;
            $thumb_width = 350;
            $thumb_height = 200;
            $path = 'image/uploads/original/';
            $thumb_path = 'image/uploads/thumbnail/';
            $name = Str::slug($request->input('slug').'-'.Carbon::now()->toDayDateTimeString()).'.webp';
            $post_data['photo'] = $name;

            imageUploadController::imageUpload($photo, $width, $height, $path, $name);
            imageUploadController::imageUpload($photo, $thumb_width, $thumb_height, $thumb_path, $name);

            if( $postData->photo!= null){
                ImageUploadController::unlinkImage($path, $postData->photo);
                ImageUploadController::unlinkImage($thumb_path, $postData->photo);

            }
        }else{
            $post_data['photo'] = $postData->photo;
        }

        $postData->update($post_data);

        session()->flash('msg', 'Post Updated Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $postDelete = Post::find($id);
        $postDelete->delete();

        session()->flash('msg', 'Post Deleted Successfully');
        session()->flash('cls', 'warning');
        return redirect()->route('posts.index');
    }


     /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        session()->flash('msg', 'Post Restore Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('posts.index');
    }

    
   
 /**
  * Undocumented function
  *
  * @param integer $id
  * @return void
  */
    public function deleteForce(int $id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();
        session()->flash('msg', 'Post Delete Permanent Successfully');
        session()->flash('cls', 'warning');
        return redirect()->route('posts.index');
    }
   
}
