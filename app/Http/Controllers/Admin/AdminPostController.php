<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('photo', 'category', 'user')->get();
        return view('admin.posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        return view('admin.posts.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $post = new Post();
        if($file = $request->file('photo')){
            $name = time() . $file->getClientOriginalName() ;
            $file->move('images', $name);
            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();
            $photo->save();
            $post->photo_id = $photo->id;
        }
        $post->title = $request->input('title');
        if($request->input('slug')){
            $post->slug = make_slug($request->input('slug'));
        }else{
            $post->slug = make_slug($request->input('title'));
        }
        $post->description = $request->input('description');
        $post->category_id = $request->input('category');
        $post->user_id = Auth::id();
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->status = $request->input('status');
        $post->save();
        Session::flash('add_post', 'Post Add');
        return redirect('/admin/posts');
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
        $post = Post::with('category')->where('id', $id)->first();
        $categories = Category::pluck('title', 'id');
        return view('admin.posts.edit',compact(['post','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        if($file = $request->file('photo')){
            $name = time() . $file->getClientOriginalName() ;
            $file->move('images', $name);
            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();
            $photo->save();
            $post->photo_id = $photo->id;
        }
        $post->title = $request->input('title');
        if($request->input('slug')){
            $post->slug = make_slug($request->input('slug'));
        }else{
            $post->slug = make_slug($request->input('title'));
        }
        $post->description = $request->input('description');
        $post->category_id = $request->input('category');
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->status = $request->input('status');
        $post->save();
            Session::flash('update_post', 'Post Was Update');
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $photo = Photo::findOrFail($post->photo_id);
        unlink(public_path() . $post->photo->path);

        $photo->delete();
        $post->delete();
        Session::flash('delete_post', 'Deleted Post');

        return redirect('admin/posts');
    }
}
