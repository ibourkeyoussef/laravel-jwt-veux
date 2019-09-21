<?php

namespace App\Http\Controllers;

use App\Post;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Post::with('user')->get();
       return PostResource::collection(Post::latest()->get());
    }


    public function store(Request $request)
    {
       dd($request->all());
       $data = $request->all();
        $image_path=Storage::disk('storge-post')->put('image-post', $request->image);
        $data['image']=$image_path;
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

     \Image::make($request->image)->save(public_path('storge-post/').$name);
     $request->merge(['image' => $name]);

      $userPhoto = public_path('image-post/').$currentPhoto;
      if(file_exists($userPhoto)){
    @unlink($userPhoto);
      }
      $post->update($request->all());
        // $post->update([
        //     'title'=> $request->title,
        //     'body'=> $request->body,
        // ]);
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
