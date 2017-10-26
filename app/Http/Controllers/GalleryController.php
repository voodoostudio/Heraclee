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
            'image'      => 'required|dimensions:min_width=640'
        );

        $gallery = new Gallery;
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin/gallery')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            $size = [
                ['width' => '9999', 'next_width' => '3200'],
                ['width' => '3200', 'next_width' => '2880'], ['width' => '2880', 'next_width' => '2560'],
                ['width' => '2560', 'next_width' => '2048'], ['width' => '2048', 'next_width' => '1920'],
                ['width' => '1920', 'next_width' => '1600'], ['width' => '1600', 'next_width' => '1366'],
                ['width' => '1366', 'next_width' => '1280'], ['width' => '1280', 'next_width' => '1024'],
                ['width' => '1024', 'next_width' => '960'], ['width' => '960', 'next_width' => '864'],
                ['width' => '864', 'next_width' => '720'], ['width' => '720', 'next_width' => '640'],
            ];

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

                foreach($size as $image_size) {
                    if($width < $image_size['width'] && $width > $image_size['next_width']) {
                        $image->fit($image_size['next_width'], intval($image_size['next_width'] / $ratio));
                    } elseif($width == $image_size['width']){
                        $image->fit($image_size['width'], intval($image_size['width'] / $ratio));
                    }
                }

                /* save new image */
                $image->save($path);

                $gallery->image = $file_name;
            }

            $gallery->title = Input::get('title');
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
        $image = Gallery::whereIn('id', $id)->get()->toArray();

        foreach($image as $item) {
            if(!empty($item['page'])) {
                $path = $_SERVER['DOCUMENT_ROOT'] . "/gallery/"  . $item['page'] . '/' . date('F_Y') . '/' . $item['image'];
                unlink($path);
                Gallery::whereIn('id', $id)->delete();
            }
        }
        return Redirect::to('admin/gallery');
    }

    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Gallery::where('id', '=', $id)->get()->toArray();

        foreach($image as $item) {
            if(!empty($item['page'])) {
                $path = $_SERVER['DOCUMENT_ROOT'] . "/gallery/"  . $item['page'] . '/' . date('F_Y') . '/' . $item['image'];
                unlink($path);
                Gallery::find($id)->delete();
            }
        }

        Session::flash('message', 'Successfully remove post!');
        return Redirect::to('admin/gallery');
    }
}
