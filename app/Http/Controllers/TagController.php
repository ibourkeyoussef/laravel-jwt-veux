<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TagResource::collection(Tag::latest()->get());
    }


    public function store(Request $request)
    {
        // dd($request->all());
       Tag::create($request->all());
       return response()->json(['status'=> 201]);
    }


    public function show(Tag $tag)
    {
       return new TagResource($tag);
    }



    public function update(Request $request, Tag $tag)
    {
        // dd($request->all());
        $tag->update([
                'name'=>$request->name,

            ]);
            return response(['msg'=>'updated','status'=> 202]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        // dd($tag);
        Tag::delete($tag);
       return response()->json(['status' => 204]);
    }
}
