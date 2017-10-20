<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::get();
        return view('admin.gallery.index',compact('gallery'));
    }

    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $rules = array(
            'title'      => 'required'
        );

        $gallery = new Gallery;
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin/gallery')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            if($request->hasFile('image')) {
                $file_name = sha1(rand() . time() . rand()) . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path("/gallery/home_page/" . date('F_Y')), $file_name);
                $gallery->image = $file_name;
            }

            $gallery->title = Input::get('name');
            $gallery->show = Input::get('show');
            $gallery->page = Input::get('page');

            $gallery->save();

            Session::flash('message', 'Successfully created post!');
            return Redirect::to('admin/gallery');
        }
    }

    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::find($id)->delete();

        Session::flash('message', 'Successfully remove post!');
        return Redirect::to('admin/gallery');
    }
}
