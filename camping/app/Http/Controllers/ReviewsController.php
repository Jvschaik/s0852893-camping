<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Post;
use Session;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'review' => 'required|min:5|max:2000'
        ));

        $post = Post::find($post_id);

        $review = new Review();
        $review->name = $request->name;
        $review->email = $request->email;
        $review->review = $request->review;
        $review->approved = true;
        $review->post()->associate($post);

        $review->save();

        $request->session()->flash('success', 'Review was added');

        return redirect()->route('blog.single', [$post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        return view('reviews.edit')->with('review', $review);
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
        $review = Review::find($id);

        $this->validate($request, array('review' => 'required'));

        $review->review = $request->review;

        $request->session()->flash('success', 'Review updated');
        $review->save();

        return redirect()->route('posts.show', $review->post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $review = Review::find($id);
        return view('reviews.delete')->with('review', $review);
    }


    public function destroy(Request $request, $id)
    {
        $review = Review::find($id);
        $post_id = $review->post->id;
        $review->delete();

        $request->session()->flash('success', ' Deleted Review');

        return redirect()->route('posts.show', $post_id);
    }
}
