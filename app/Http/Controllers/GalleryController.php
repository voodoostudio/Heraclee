<?php

namespace App\Http\Controllers;

use App\Properties;
use Illuminate\Http\Request;
use App\Gallery;
use App\GallerySettings;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use LaravelLocalization;
use Illuminate\Support\Facades\DB;

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

        $lang = LaravelLocalization::getCurrentLocaleRegional();

        $gallery = Gallery::get();
        $gallery_settings = GallerySettings::get();
        $sell_type = [
            'sell_type' => ($lang == 'fr_FR') ? 'Vente' : 'Sell',
            'rent_type' =>($lang == 'fr_FR') ? 'Location' : 'Rent'
        ];
        $subtype = DB::table('apimo_property_subtype')->where('locale', $lang)->get();
        $cities = DB::table('apimo_city')->get();

        return view('admin.gallery.index', [
            'gallery' => $gallery,
            'gallery_settings' => $gallery_settings,
            'sell_type' => $sell_type,
            'subtype' => $subtype,
            'cities' => $cities,
        ]);
    }

    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $rules = array(
//            'title'      => 'required',
            'image'      => 'required|dimensions:min_width=640'
        );

        $gallery = new Gallery;
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
//            return Redirect::to($lang . '/admin/gallery')
//                ->withErrors($validator)
//                ->withInput(Input::except('password'));

            return response()->json([
                'errors' =>$validator->errors()->all()
            ]);
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
                $gallery->title = Input::get('title');
                $gallery->sell_type = Input::get('sell_type');
                $gallery->subtype = Input::get('subtype');
                $gallery->city = Input::get('city');
                $gallery->page = Input::get('page');
                $gallery->link = Input::get('link');

                $gallery->save();

                //redirect
                return response()->json([
                    'id'    => $gallery->id,
                    'title' => Input::get('title'),
                    'image' => "/gallery/" . $request->page . "/" . date('F_Y') . '/' . $file_name,
                    'page'  => Input::get('page')
                ]);
            } else {
                return response()->json([
                    'error' => 'fail',
                ]);
            }
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

        //redirect
        return back();
    }

    /**
     * Multiple remove image
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy_all(Request $request)
    {
        $id = $request->gallery;
        $image = Gallery::whereIn('id', $id)->get();

        foreach($image as $item) {
            if(!empty($item['page'])) {
                $path = $_SERVER['DOCUMENT_ROOT'] . "/gallery/"  . $item['page'] . '/' . $item->created_at->format('F_Y') . '/' . $item['image'];
                unlink($path);
                Gallery::whereIn('id', $id)->delete();
            }
        }
        //redirect
        return back();
    }

    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Gallery::where('id', '=', $id)->get();

        foreach($image as $item) {
            if(!empty($item['page'])) {
                $path = $_SERVER['DOCUMENT_ROOT'] . "/gallery/"  . $item['page'] . '/' . $item->created_at->format('F_Y') . '/' . $item['image'];
                unlink($path);
                Gallery::find($id)->delete();
            }
        }

        //redirect
//        return response()->json([
//            'id'    => $id,
//        ]);

        return back();
    }
}
