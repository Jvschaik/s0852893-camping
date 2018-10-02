<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //display a view of all of the categories and form to create a new category
        $categories = Category::all();
        return view('categories.index')->withCategories($categories);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //Save a new category and then redirect back to index
        $this->validate($request, array('name' => 'required|max:255'));

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        $request->session()->flash('success', 'New Category has been created');

        return redirect()->route('categories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}