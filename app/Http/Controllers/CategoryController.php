<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
    $categories = Category::orderBy('order_by', 'asc')->get();
    return view('backend.pages.modules.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('backend.pages.modules.category.create');
    }

    /**
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
           $data = $request->all();
           $category = Category::latest()->first();
           if($category){
               $data['slug_id'] = $category->slug_id + 1;
           }
           else{
                $data['slug_id'] = 100000;
               }
           $data['slug']= Str::slug($request->input('slug'));
           Category::create($data);

           session()->flash('msg', 'Category Created Successfully');
           session()->flash('cls', 'success');
           return redirect()->route("categories.index");


    }

    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function show(Category $category): View|Factory|Application
    {
        return view('backend.pages.modules.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category): View|Factory|Application
    {
        return view('backend.pages.modules.category.edit', compact('category'));
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->all());
        session()->flash('msg', 'Category Updated Successfully');
        session()->flash('cls', 'success');
        return redirect()->route("categories.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        session()->flash('msg', 'Category Deleted Successfully');
        session()->flash('cls', 'warning');
        return redirect()->route("categories.index");
    }
}
