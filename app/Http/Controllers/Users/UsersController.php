<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User_Addresses;
use App\User_Roles;
use App\Users;
use App\Blog_Posts;
use Illuminate\Http\Request;
use \stdClass;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_users_data = Users::all();
        $user_roles = User_Roles::all();
        $blog_posts = Blog_Posts::all();
        $user_addresses = User_Addresses::all();

        foreach( $all_users_data as $user_data ) {
            $blog_count = 0;
            // Find the role name based on the user_roles_id
            if( $user_data->user_roles_id == 1) {
                $user_data->role_name = "Admin";
            } else if ( $user_data->user_roles_id == 2 ) {
                $user_data->role_name = "Publisher";
            } else {
                $user_data->role_name = "Public User";
            }

            foreach( $user_addresses as $user_address ) {
               if( $user_address->user_id == $user_data->id ) {
                    $address = new stdClass();
                    $address->address = $user_address->address;
                    $address->province = $user_address->province;
                    $address->city = $user_address->city;
                    $address->postal_code = $user_address->postal_code;

                    $user_data->user_address = $address; 
                } 
            } 

            foreach( $blog_posts as $blog_post ) {
                if( $blog_post->author == $user_data->id ) {
                    $blog_count++;
                }
            }

            $user_data->total_blog_posts = $blog_count;
        }




        return response()->json( ['data' => $all_users_data ], 200 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        //
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $all_user_data = Users::findorfail( $id );
        $user_roles = User_Roles::all();
        $blog_posts = Blog_Posts::all();
        $user_addresses = User_Addresses::all();

        $blog_count = 0;
            // Find the role name based on the user_roles_id
        if( $all_user_data->user_roles_id == 1) {
                $all_user_data->role_name = "Admin";
        } else if ( $all_user_data->user_roles_id == 2 ) {
                $all_user_data->role_name = "Publisher";
        } else {
                $all_user_data->role_name = "Public User";
        }

        foreach( $user_addresses as $user_address ) {
            if( $user_address->user_id == $all_user_data->id ) {
                $address = new stdClass();
                $address->address = $user_address->address;
                $address->province = $user_address->province;
                $address->city = $user_address->city;
                $address->postal_code = $user_address->postal_code;

                 $all_user_data->user_address = $address; 
            } 
        } 

        foreach( $blog_posts as $blog_post ) {
            if( $blog_post->author == $all_user_data->id ) {
                    $blog_count++;
            }
        }

        $all_user_data->total_blog_posts = $blog_count;

        return response()->json( ['data' => $all_user_data ], 200 );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $user = Users::findorfail( $id );
        $user_addresses = User_Addresses::all();

        $rules = [
            'email' => 'email|unique:users',
        ];


        foreach( $user_addresses as $user_address ) {    
            if( $user_address->user_id == $user->id ) {
                if( $request->has( 'address') ) {
                    $user_address->address = $request->address;
                }

                if( $request->has( 'province') ) {    
                    $user_address->province = $request->province;
                } 

                if( $request->has( 'city') ) {    
                    $user_address->city = $request->city;
                }

                if( $request->has( 'country') ) {    
                    $user_address->country = $request->country;
                }

                if( $request->has( 'postal_code') ) {    
                    $user_address->postal_code = $request->postal_code;
                }

                break;
            }
        }

        if( $request->has( 'username' ) ) {
            $user->username = $request->username; 
        }

        if( $request->has( 'email' ) && $user->email != $request->email ) {
            $user->email = $request->email;
        }

        if( $request->has( 'user_roles_id' ) ) {
            $user->user_roles_id = $request->user_roles_id;
        }

        //$user->address = 
        // Save any changes to the user and the user's address.
        $user->save();
        $user_address->save();

        $all_user_data = $user;
        $all_user_data->user_address = $user_address; 

        return response()->json( ['data' => $all_user_data ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function destroy($id)
    {
        //
    }*/
}