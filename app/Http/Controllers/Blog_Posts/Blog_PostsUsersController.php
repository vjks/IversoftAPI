<?php

namespace App\Http\Controllers\Blog_Posts;

use App\Blog_Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Blog_PostsUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $id )
    {
        $all_blogs = Blog_Posts::all();

        $blog_array = [];

        foreach( $all_blogs as $blog ) {
            if( $blog->author == $id) {
                array_push( $blog_array, $blog );
            }
        }
        
        return response()->json( ['data' => $blog_array ], 200 );
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
     * @param  \App\Blog_Posts  $blog_Posts
     * @return \Illuminate\Http\Response
     */
    public function show(Blog_Posts $blog_Posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog_Posts  $blog_Posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog_Posts $blog_Posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog_Posts  $blog_Posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog_Posts $blog_Posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog_Posts  $blog_Posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog_Posts $blog_Posts)
    {
        //
    }
}
