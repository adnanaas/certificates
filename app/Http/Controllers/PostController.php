<?php

namespace App\Http\Controllers;

use App\Post;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['show','index']]);
    }

      public function index()
    {
        $posts = DB::table('posts')->simplePaginate(8);
        return view('posts.posts',compact('posts'));
    }

       public function create()
    {
        return view('posts.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'body'  => 'required|min:3',
            'photo' => 'image|mimes:jpeg,png,jpg,bmp|max:2048'
        ]);

        $user = Auth::user();

        $post=new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $now = date('YmdHis');
        $post->slug = str_replace(' ','-', strtolower($post->title)).'_'.$now;
        $post->user_id = $user->id;
        if($request->hasFile('photo')){
            $photo = $request->photo;
            $filename = time() .'_'. $photo->getClientOriginalName();
            $location = public_path('images/posts/'.$filename);
            // $photo->move($location);
            Image::make($photo)->resize(800,400)->save($location);
            $post->photo = $filename;
        }

        $post->save();

    return redirect('/posts')->with('success','Post Created Successfully');
    }

    public function show($slug)
    {
        //
        $post = Post::where('slug',$slug)->first();
        return view('posts.show',compact('post'));
    }

    public function edit($id)
    {
        //
        $post = Post::find($id);
        $userId = Auth::id();
        if($post->user_id != $userId){
            return redirect('/posts')->with('error','That is Not Your Post Yawaaad' );
        }
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'title' => 'required|min:3',
        'body'  => 'required|min:3'
        ]);
        
        $post= Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $now = date('YmdHis');
        $post->slug = str_replace(' ','-', strtolower($post->title)).'_'.$now;
             $post = Post::find($id);

        $userId = Auth::id();
        if($post->user_id != $userId){
            return redirect('/posts')->with('error','That is Not Your Post Yawaaad' );
        }

        $post->save();

        return redirect('/posts/'.$post->slug)->with('success','Post Updated Successfully');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $userId = Auth::id();
        if($post->user_id != $userId){
            return redirect('/posts')->with('error','That is Not Your Post Yawaaad' );
        }
        $post -> delete();
        return redirect('/posts')->with('success','Post Deleted Successfully');

    }
}