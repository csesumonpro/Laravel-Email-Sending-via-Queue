<?php

namespace App\Http\Controllers;

use App\PostCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostCacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Cache::get('posts',function(){
            return PostCache::latest()->take(10)->get();
        }); 
        return view('admin.posts',compact('posts'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostCache  $postCache
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostCache  $postCache
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostCache  $postCache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCache $postCache)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostCache  $postCache
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        
    }
    public function custom_method($id=nullwe){
        $post = PostCache::where('id',$id)->first();
        $post->delete();
        return back();
    }
}
