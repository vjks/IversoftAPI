<?php

namespace App\Http\Controllers\Blog_Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\blog_posts;

class Blog_PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_posts = Blog_Posts::all();
        return response()->json( ['data' => $blog_posts ], 200 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'author' => 'required',
            'title' => 'required'
            // Leaving content out because CMSs like WordPress allow a creation of post without content.
        ];

        $this->validate( $request, $rules ); 

        // Get all the data received from the request.
        $data = $request->all();

        $blog_post = Blog_Posts::create( $data );

        // Return a 201 response meaning that the blog post has been created.
        return response()->json( ['data' => $blog_post ], 201 ); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog_post = Blog_Posts::findorfail( $id );
        return response()->json( ['data' => $blog_post ], 200 );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
