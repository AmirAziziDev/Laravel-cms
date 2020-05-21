<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;


class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->title = $request->input('title');
        if($request->input('slug')){
            $category->slug = make_slug($request->input('slug'));
        }else{
            $category->slug = make_slug($request->input('title'));
        }
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        Session::flash('add_category', 'Add-Category');
        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->title = $request->input('title');
        if($request->input('slug')){
            $category->slug = make_slug($request->input('slug'));
        }else{
            $category->slug = make_slug($request->input('title'));
        }
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();

        Session::flash('update_category', 'Update-Category');
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('delete_category', 'Delete Category');
        return redirect('/admin/categories');
    }
}
