<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function index()
    {
        // return Post::with('user')->get();
       return PostResource::collection(Post::latest()->paginate(6));
    }


    public function store(PostRequest $request)
    {
    //    dd($request->all());
       $data = $request->all();
       if ($request->image) {
           # code...
           $image_path=Storage::disk('storge-post')->put('image-post', $request->image);
           $data['image']=$image_path;
       }
        $post= Post::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }


    public function update(Request $request, Post $post)
    {
        // dd($request->all());
        $currentPhoto = $post->image;
        $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

     Image::make($request->image)->save(public_path('storage/image-post/').$name)->resize(30, 20);

     $request->merge(['image' => $name]);

      $userPhoto = public_path('image-post/').$currentPhoto;
      if(file_exists($userPhoto)){
    @unlink($userPhoto);
      }

      $post->update($data);

        return response()->json(['msg'=> 'update', 'status' => 202]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
