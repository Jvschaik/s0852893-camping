<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        //$posts = Post::with('reviews')->get();
        return view('pages.welcome')->with('posts', $posts);
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('jsonschaik@gmail.com');
            $message->subject($data['subject']);
        });

        $request->session()->flash('success', 'Your Email was sent!');

        return redirect('/contact');
    }

}