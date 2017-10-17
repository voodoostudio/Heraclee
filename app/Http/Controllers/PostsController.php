<?php

namespace App\Http\Controllers;
use App\Posts;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $posts = Posts::all();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $front_image_title = [];
        $body_image_title = [];

        $rules = array(
            'title_fr'       => 'required',
        );

        $posts = new Posts;

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/posts/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            $front_image = $request->file('front_image');
            $body_image = $request->file('body_image');

            if($request->hasFile('front_image'))
            {
                foreach ($front_image as $key => $file) {
                    $file_name =  rand() . time() . rand() . '.' . $file->getClientOriginalExtension();
                    $front_image_title['image_' . $key] = $file_name;
                    $file->move(public_path("/front_image"), $file_name);
                }
            }

            if($request->hasFile('body_image'))
            {
                foreach ($body_image as $key => $file) {
                    $file_name =  rand() . time() . rand() . '.' . $file->getClientOriginalExtension();
                    $body_image_title['image_' . $key] = $file_name;
                    $file->move(public_path("/body_image"), $file_name);
                }
            }

            $posts->title_fr        = Input::get('title_fr');
            $posts->title_en        = Input::get('title_en');
            $posts->date            = Input::get('date');
            $posts->front_image     = json_encode($front_image_title);
            $posts->body_image      = json_encode($body_image_title);
            $posts->description_fr  = Input::get('description_fr');
            $posts->description_en  = Input::get('description_en');
            $posts->status          = Input::get('status');

            $posts->save();

            // redirect
            Session::flash('message', 'Successfully created post!');
            return Redirect::to('admin/posts');
        }
    }

//    public function upload(Request $request)
//    {
//        $front_image_title = [];
//        $body_image_title = [];
//        $posts = new Posts;
//        $front_image = $request->file('front_image');
//        $body_image = $request->file('body_image');
//
//        if($request->hasFile('front_image'))
//        {
//            foreach ($front_image as $key => $file) {
//                $file_name =  rand() . time() . rand() . '.' . $file->getClientOriginalExtension();
//                $front_image_title['image_' . $key] = $file_name;
//                $file->move(public_path("/front_image"), $file_name);
//            }
//        }
//
//        if($request->hasFile('body_image'))
//        {
//            foreach ($body_image as $key => $file) {
//                $file_name =  rand() . time() . rand() . '.' . $file->getClientOriginalExtension();
//                $body_image_title['image_' . $key] = $file_name;
//                $file->move(public_path("/body_image"), $file_name);
//            }
//        }
//
//        $posts->front_image     = json_encode($front_image_title);
//        $posts->body_image      = json_encode($body_image_title);
//
//        $posts->save();
//
//        // redirect
//        //Session::flash('message', 'Successfully created post!');
//        return Redirect::to('admin/posts');
//
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $posts = Posts::find($id);

        return view('admin.posts.show', ['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $posts = Posts::find($id);

        return view('admin.posts.edit', ['posts' => $posts]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $front_image_title = [];
        $body_image_title = [];

        $rules = array(
            'title_fr'       => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/posts/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            $posts = Posts::find($id);

            $front_image = $request->file('front_image');
            $body_image = $request->file('body_image');

            if($request->hasFile('front_image'))
            {
                foreach ($front_image as $key => $file) {
                    $file_name =  rand() . time() . rand() . '.' . $file->getClientOriginalExtension();
                    $front_image_title['image_' . $key] = $file_name;
                    $file->move(public_path("/front_image"), $file_name);
                }
            }

            if($request->hasFile('body_image'))
            {
                foreach ($body_image as $key => $file) {
                    $file_name =  rand() . time() . rand() . '.' . $file->getClientOriginalExtension();
                    $body_image_title['image_' . $key] = $file_name;
                    $file->move(public_path("/body_image"), $file_name);
                }
            }

            $posts->title_fr        = Input::get('title_fr');
            $posts->title_en        = Input::get('title_en');
            $posts->date            = Input::get('date');
            $posts->front_image     = json_encode($front_image_title);
            $posts->body_image      = json_encode($body_image_title);
            $posts->description_fr  = Input::get('description_fr');
            $posts->description_en  = Input::get('description_en');
            $posts->status          = Input::get('status');

            $posts->save();

            // redirect
            Session::flash('message', 'Successfully update post!');
            return Redirect::to('admin/posts');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $posts = Posts::find($id);
        $posts->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('admin/posts');
    }
}