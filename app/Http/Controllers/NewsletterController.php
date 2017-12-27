<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use LaravelLocalization;

class NewsletterController extends Controller
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
        $newsletters = Newsletter::orderBy('date', 'desc')->get();

        return view('admin.newsletter.index', ['newsletters' => $newsletters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.newsletter.create');
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
        $lang = LaravelLocalization::getCurrentLocale();

        $rules = array(
            'title_fr'      => 'required',
            'title_en'      => 'required',
            'date'          => 'required'
        );

        $newsletters = new Newsletter;
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to($lang . '/admin/newsletter/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $front_image_path = $request->file('front_image_path');
            $newsletter_html_path = $request->file('newsletter_html_path');
            $size = [
                ['width' => '9999', 'next_width' => '3200'],
                ['width' => '3200', 'next_width' => '2880'], ['width' => '2880', 'next_width' => '2560'],
                ['width' => '2560', 'next_width' => '2048'], ['width' => '2048', 'next_width' => '1920'],
                ['width' => '1920', 'next_width' => '1600'], ['width' => '1600', 'next_width' => '1366'],
                ['width' => '1366', 'next_width' => '1280'], ['width' => '1280', 'next_width' => '1024'],
                ['width' => '1024', 'next_width' => '960'], ['width' => '960', 'next_width' => '864'],
                ['width' => '864', 'next_width' => '720'], ['width' => '720', 'next_width' => '640'],
            ];

            if($request->hasFile('front_image_path'))
            {
                foreach ($front_image_path as $key => $file) {
                    $file_name = sha1(rand() . time() . rand()) . '.' . $file->getClientOriginalExtension();
                    $front_image_title[$file->getClientOriginalExtension() . '_' . $key] = $file_name;
                    $file->move(public_path("/newsletter/images/"), $file_name);

                    /* resize image */
                    $path = $_SERVER['DOCUMENT_ROOT'] . "/newsletter/images/" . $file_name;
                    $image = Image::make($path);

                    list($width, $height) = getimagesize($path);
                    $new_width = 1200;
                    $ratio = $width / $height;

                    if($width > $new_width) {
                        $image->resize($new_width, intval($new_width / $ratio));
                    }

                    /* save new image */
                    $image->save($path);
                }
                $newsletters->front_image_path = json_encode($front_image_title);
            } else {
                $newsletters->front_image_path = json_encode($front_image_title);
            }

            if($request->hasFile('newsletter_html_path'))
            {
                foreach ($newsletter_html_path as $key => $file) {
                    $file_name = sha1(rand() . time() . rand()) . '.' . $file->getClientOriginalExtension();
                    $body_image_title[$file->getClientOriginalExtension() . '_' . $key] = $file_name;
                    $file->move(public_path("/newsletter/html/"), $file_name);
                }
                $newsletters->newsletter_html_path = json_encode($body_image_title);
            } else {
                $newsletters->newsletter_html_path = json_encode($body_image_title);
            }

            $newsletters->title_fr        = Input::get('title_fr');
            $newsletters->title_en        = Input::get('title_en');
            $newsletters->date            = Input::get('date');

            $newsletters->save();

            // redirect
            return redirect($lang . '/admin/newsletter');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $newsletters = Newsletter::find($id);

        return view('admin.newsletter.edit', ['newsletters' => $newsletters]);
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
        $lang = LaravelLocalization::getCurrentLocale();

        $rules = array(
            'title_fr'      => 'required',
            'title_en'      => 'required',
            'date'          => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to($lang . '/admin/newsletter/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            $newsletters = Newsletter::find($id);

            $front_image_path = $request->file('front_image_path');
            $newsletter_html_path = $request->file('newsletter_html_path');
            $size = [
                ['width' => '9999', 'next_width' => '3200'],
                ['width' => '3200', 'next_width' => '2880'], ['width' => '2880', 'next_width' => '2560'],
                ['width' => '2560', 'next_width' => '2048'], ['width' => '2048', 'next_width' => '1920'],
                ['width' => '1920', 'next_width' => '1600'], ['width' => '1600', 'next_width' => '1366'],
                ['width' => '1366', 'next_width' => '1280'], ['width' => '1280', 'next_width' => '1024'],
                ['width' => '1024', 'next_width' => '960'], ['width' => '960', 'next_width' => '864'],
                ['width' => '864', 'next_width' => '720'], ['width' => '720', 'next_width' => '640'],
            ];

            if($request->hasFile('front_image_path'))
            {
                foreach ($front_image_path as $key => $file) {
                    $file_name = sha1(rand() . time() . rand()) . '.' . $file->getClientOriginalExtension();
                    $front_image_title[$file->getClientOriginalExtension() . '_' . $key] = $file_name;
                    $file->move(public_path("/newsletter/images/"), $file_name);

                    /* resize image */
                    $path = $_SERVER['DOCUMENT_ROOT'] . "/newsletter/images/" . $file_name;
                    $image = Image::make($path);

                    list($width, $height) = getimagesize($path);
                    $new_width = 1200;
                    $ratio = $width / $height;

                    if($width > $new_width) {
                        $image->resize($new_width, intval($new_width / $ratio));
                    }

                    /* save new image */
                    $image->save($path);
                }
                $newsletters->front_image_path = json_encode($front_image_title);
            } else {
                $newsletters->front_image_path = Newsletter::where('id', '=', $id)->value('front_image_path');
            }

            if($request->hasFile('newsletter_html_path'))
            {
                foreach ($newsletter_html_path as $key => $file) {
                    $file_name = sha1(rand() . time() . rand()) . '.' . $file->getClientOriginalExtension();
                    $body_image_title[$file->getClientOriginalExtension() . '_' . $key] = $file_name;
                    $file->move(public_path("/newsletter/html/"), $file_name);
                }
                $newsletters->newsletter_html_path = json_encode($body_image_title);
            } else {
                $newsletters->newsletter_html_path = Newsletter::where('id', '=', $id)->value('newsletter_html_path');
            }

            $newsletters->title_fr        = Input::get('title_fr');
            $newsletters->title_en        = Input::get('title_en');
            $newsletters->date            = Input::get('date');

            $newsletters->save();

            // redirect
            return redirect($lang . '/admin/newsletter');
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
        $newsletters = Newsletter::find($id);
        $files = Newsletter::where('id', '=', $id)->get()->toArray();

        foreach($files as $item) {
            foreach (json_decode($item['front_image_path'], true) as $image_path) {
                if(!empty($item['front_image_path'])) {
                    $front_image_path = $_SERVER['DOCUMENT_ROOT'] . "/newsletter/images/" . $image_path;
                    if(file_exists($front_image_path)) {
                        unlink($front_image_path);
                    }

                }
            }

            foreach (json_decode($item['newsletter_html_path'], true) as $image_path) {
                if(!empty($item['newsletter_html_path'])) {
                    $newsletter_html_path = $_SERVER['DOCUMENT_ROOT'] . "/newsletter/html/" . $image_path;
                    if(file_exists($newsletter_html_path)) {
                        unlink($newsletter_html_path);
                    }
                }
            }
            $newsletters->delete();
        }

        // redirect
        return back();
    }
}
