<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubCategoryListResource;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
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
     * @param SubCategory $subCategory
     * @return Application|Factory|View
     */
    public function show(SubCategory $subCategory): View|Factory|Application
    {
        $subCategory->load('category');
        return view('backend.pages.modules.sub_category.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SubCategory $subCategory
     * @return Application|Factory|View
     */
    public function edit(SubCategory $subCategory): View|Factory|Application
    {
        $categories = Category::pluck('name', 'id');
        return view('backend.pages.modules.sub_category.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSubCategoryRequest $request
     * @param SubCategory $subCategory
     * @return RedirectResponse
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory): RedirectResponse
    {
        $subCategory->update($request->all());
        session()->flash('msg', 'SubCategory Updated Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('sub-categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SubCategory $subCategory
     * @return RedirectResponse
     */
    public function destroy(SubCategory $subCategory): RedirectResponse
    {
        $subCategory->delete();
        session()->flash('msg', 'SubCategory Delete Successfully');
        session()->flash('cls', 'warning');
        return redirect()->route('sub-categories.index');
    }

    /**
     * @param $id
     * @return AnonymousResourceCollection
     */
    public function get_sub_categories($id): AnonymousResourceCollection
    {
        $sub_categories = SubCategory::where('category_id', $id)->get();

        return SubCategoryListResource::collection($sub_categories);
    }
}
