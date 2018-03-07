<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Zizaco\Entrust\Entrust;


class CategoryController extends Controller
{

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->orderBy('parent_id')->get();

        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategory = $this->category->getListCategory();
        return view('backend.category.create', compact('listCategory'));
    }

    /**
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $attributes = $request->only(['name', 'alias', 'position', 'parent_id']);
        try {

            $this->category->create($attributes);

        } catch (\PDOException $exception) {

            return redirect()->back()->with('msgError', $exception->getMessage());
        }

        return redirect('backend/category')->with('msgSuccess', __('backend.finished'));
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        $listCategoryPaginate = $this->category->getListCategoryPaginate();
        $listCategory = $this->category->getListCategory();

        return view('backend.category.edit',compact('category','listCategoryPaginate','listCategory'));
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('backend.category.edit',$category)->with('msgSuccess', __('backend.updated'));
    }

    /**
     * Delete a category
     * @param Category $category
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }

    public function changeStatus(Category $category)
    {
        $category->status == STATUS_ACTIVE ? STATUS_DEACTIVE : STATUS_ACTIVE;

        $category->update();

    }


}
