<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;
use App\Post;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']); //only authenticated user are allowed to this controler
    }

    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->with('tags', $tags);
    }


    public function store(Request $request)
    {
        $this->validate($request, array('name' => 'required|max:255'));
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        $request->session()->flash('success', 'New Tag was successfully created!');

        return redirect()->route('tags.index');
    }


    public function show($id)
    {
        $post = Post::find($id);
        $tag = Tag::find($id);
        return view('tags.show')->with('tag', $tag, 'post', $post);
    }

    public function edit($id)
    {
        $tag= Tag::find($id);
        return view('tags.edit')->with('tag', $tag);
    }


    public function update(Request $request, $id)
    {
        $tag= Tag::find($id);
        $this->validate($request, ['name' => 'required|max:255']);

        $tag->name = $request->name;
        $tag->save();

        $request->session()->flash('success', 'Successfully saved your new tag');

        return redirect()->route('tags.show', $tag->id);
    }


    public function destroy(Request $request, $id)
    {
        $tag= Tag::find($id);
        $tag->posts()->detach();

        $tag->delete();

        $request->session()->flash('success', 'Tag was deleted successfully');

        return redirect()->route('tags.index');
    }
}
