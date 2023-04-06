<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $subCategories = SubCategory::with('category')->orderBy('order_by', 'asc')->get();
        return view('backend.pages.modules.sub_category.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $categories = Category::pluck('name', 'id');
        return view('backend.pages.modules.sub_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSubCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSubCategoryRequest $request): RedirectResponse
    {
        $sub_category = $request->all();

        $subCategory = SubCategory::latest()->first();
        if($subCategory){
            $sub_category['slug_id'] = $subCategory->slug_id + 1;
        }
        else{
            $sub_category['slug_id'] = 100000;
        }

        SubCategory::create($sub_category);

        session()->flash('msg', 'SubCategory Created Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('sub-categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCategoryRequest  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return Response
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
