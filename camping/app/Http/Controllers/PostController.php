<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Category;
use App\Tag;
use App\User;

class PostController extends Controller
{

    public function __construct() {

        //login to get to posts
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $posts = Post::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        $tags = Tag::pluck('name', 'id')->toArray();
        return view('posts.create')->with('categories' , $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));

        //store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->user_id = Auth::user()->id;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;


        $post->save();

        $post->tags()->sync($request->tags, false);

        $request->session()->flash('success', 'The blog post was successfully saved!');

        return redirect()->route('posts.show', $post->id);

        //redirect to another page

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('name','id');
        $tags = Tag::pluck('name', 'id')->toArray();
        return view('posts.show')->with('post', $post)->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as a var
        $user_id = Auth::user()->id;
        $post = Post::where('user_id', $user_id)->find($id);
        $categories = Category::pluck('name','id');
        $tags = Tag::pluck('name', 'id')->toArray();
        //return the view and pass in the var we previously created
        return view('posts.edit')->with('post', $post)->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));

        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));

        }

        // Save the data in the database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->user_id = Auth::user()->id;
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }
        // Set flash data with success message
        $request->session()->flash('success', 'This post was successfully saved.');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        $post ->tags()->detach();
        $post->delete();

        //Set flash data with success message
        $request->session()->flash('success', 'This post was successfully deleted.');

        //redirect with flash data to posts.index
        return redirect()->route('posts.index');
    }
}
