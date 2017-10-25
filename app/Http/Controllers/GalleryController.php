<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\GallerySettings;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;


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
        $gallery_settings = GallerySettings::get();
       // dump();
        return view('admin.gallery.index', ['gallery' => $gallery, 'gallery_settings' => $gallery_settings]);
    }

    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $rules = array(
            'title'      => 'required',
            'image'      => 'required'
        );

        $gallery = new Gallery;
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin/gallery')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            if($request->hasFile('image')) {

                /* download file */
                $file_name = sha1(rand() . time() . rand()) . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path("/gallery/" . $request->page . "/" . date('F_Y')), $file_name);

                /* crop image */
                $path = $_SERVER['DOCUMENT_ROOT'] . "/gallery/" . $request->page . "/" . date('F_Y') . '/' . $file_name;
                $image = Image::make($path);

                /* resize & crop image */
                list($width, $height) = getimagesize($path);
                $ratio = 16 / 9;
                $new_width = 3000;

                if($width > $new_width) {
                    $prop = $height / $width;
                    $height_new = $new_width * $prop;

                    $image->resize($new_width , $height_new);
                    $image->fit($new_width, intval($new_width / $ratio));
                } else {
                    $image->fit($width, intval($width / $ratio));
                }

                /* save new image */
                $image->save($path);

                $gallery->image = $file_name;
            }

            $gallery->title = Input::get('name');
            $gallery->page = Input::get('page');

            $gallery->save();

            Session::flash('message', 'Successfully created post!');
            return Redirect::to('admin/gallery');
        }
    }

    /**
     * Show pages
     *
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {
        $page = GallerySettings::where('page', $request->page)->first();

        if($request->page == 'homepage') {
            $page->show = Input::get('show');
            $page->save();
        }

        if($request->page == 'france') {
            $page->show = Input::get('show');
            $page->save();
        }

        if($request->page == 'swiss') {
            $page->show = Input::get('show');
            $page->save();
        }

        if($request->page == 'usa') {
            $page->show = Input::get('show');
            $page->save();
        }

        if($request->page == 'mauritius') {
            $page->show = Input::get('show');
            $page->save();
        }

        Session::flash('message', 'Successfully created post!');
        return Redirect::to('admin/gallery/');
    }

    /**
     * Multiple remove image
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy_all(Request $request)
    {
        $id = $request->gallery;

        Gallery::whereIn('id', $id)->delete();
        return Redirect::to('admin/gallery');
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
