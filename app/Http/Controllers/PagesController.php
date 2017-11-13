<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 05/04/2017
 * Time: 15:22
 */

namespace App\Http\Controllers;

use App\GallerySettings;
use App\Libraries\SyncWithApimo;
use App\Properties;
use App\Team;
use App\Services;
use App\Subscribers;
use App\Posts;
use App\Gallery;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use LaravelLocalization;

class PagesController extends Controller
{
    public function index()
    {
        Session::forget('search');

        $city_list = Properties::getCityList();
        $type = Properties::getAvailablePropertyType();
        $cur_page = (empty($_GET['page']) ? 1 : $_GET['page']);

        $view_type = 'grid_view';

        if (isset($_COOKIE['typeView'])) {
            $view_type = $_COOKIE['typeView'];
        }

        if (isset($_GET['items'])) {
            Session::put('search.items', $_GET['items']);
        } elseif (!Session::has('search.items')) {
            Session::put('search.items', 10);
        }

        if (isset($_POST['sell_type']) && !empty($_POST['sell_type'])) {
            Session::put('search.sell_type', $_POST['sell_type']);
        } elseif (!Session::has('search.sell_type')) {
            Session::put('search.sell_type', 3);
        }

        if (isset($_POST['object_type']) && !empty($_POST['object_type'])) {
            Session::put('search.object_type', $_POST['object_type']);
        } elseif (!Session::has('search.object_type')) {
            Session::put('search.object_type', Properties::getAvailablePropertyTypeIds());
        }

        if (isset($_POST['object_place']) && !empty($_POST['object_place'])) {
            Session::put('search.object_place', $_POST['object_place']);
        } elseif (!Session::has('search.object_place')) {
            Session::put('search.object_place', Properties::getCityListIds());
        }

        $properties_obj = new Properties();
        $properties = $properties_obj->getProperties(
            Session::get("search.items"),
            $cur_page,
            Session::get("search.sell_type"),
            Session::get("search.object_type"),
            Session::get("search.object_place")
        );

        /* Last 10 news on main page */
        $last_news = Posts::limit(10)->orderBy('id', 'desc')->where('status', '=', 'on')->get();

        /* Gallery (slider) */
        $gallery = Gallery::all();

        /* Gallery settings (Show gallery or show last properties) */
        $homepage_gallery_settings = GallerySettings::where('page', '=', 'homepage')->get();
        $france_gallery_settings = GallerySettings::where('page', '=', 'france')->get();
        $swiss_gallery_settings = GallerySettings::where('page', '=', 'swiss')->get();
        $usa_gallery_settings = GallerySettings::where('page', '=', 'usa')->get();
        $mauritius_gallery_settings = GallerySettings::where('page', '=', 'mauritius')->get();

        /* Count items (for menu) */
        $count_items = $properties_obj->all_property_count;

        /* Last update on site */
        $gallery_date = date('d.m.Y', strtotime(Gallery::orderBy('updated_at', 'desc')->value('updated_at')));
        $gallery_last_date = (!empty($gallery_date)) ? $gallery_date : '';
        $posts_date = date('d.m.Y', strtotime(Posts::orderBy('updated_at', 'desc')->value('updated_at')));
        $posts_last_date = (!empty($posts_date)) ? $posts_date : '';
        $properties_date = date('d.m.Y', strtotime(DB::table('apimo_properties')->select('updated_at')->orderBy('updated_at', 'desc')->value('updated_at')));
        $properties_last_date = (!empty($properties_date)) ? $properties_date : '';

        $last_update = max($posts_last_date, $gallery_last_date, $properties_last_date);

        preg_match("/[^\/]+$/", $_SERVER["REQUEST_URI"], $country);

        if(empty($country[0]) || $country[0] == 'fr' || $country[0] == 'en') {
            return view('index', ['city_list' => $city_list, 'type' => $type, 'properties' => $properties, 'view_type' => $view_type, 'last_update' => $last_update, 'gallery_settings' => $homepage_gallery_settings, 'gallery' => $gallery, 'count_items' => $count_items, 'last_news' => $last_news, 'search' => Session::get('search')]);
        }

        if($country[0] == 'france') {
           return view('countries.france', ['city_list' => $city_list, 'type' => $type, 'properties' => $properties, 'view_type' => $view_type, 'last_update' => $last_update, 'gallery_settings' => $france_gallery_settings, 'gallery' => $gallery, 'count_items' => $count_items, 'last_news' => $last_news, 'search' => Session::get('search')]);
        }

        if($country[0] == 'swiss') {
            return view('countries.swiss', ['city_list' => $city_list, 'type' => $type, 'properties' => $properties, 'view_type' => $view_type, 'last_update' => $last_update, 'gallery_settings' => $swiss_gallery_settings, 'gallery' => $gallery, 'count_items' => $count_items, 'last_news' => $last_news, 'search' => Session::get('search')]);
        }

        if($country[0] == 'usa') {
            return view('countries.usa', ['city_list' => $city_list, 'type' => $type, 'properties' => $properties, 'view_type' => $view_type, 'last_update' => $last_update, 'gallery_settings' => $usa_gallery_settings, 'gallery' => $gallery, 'count_items' => $count_items, 'last_news' => $last_news, 'search' => Session::get('search')]);
        }

        if($country[0] == 'mauritius') {
            return view('countries.mauritius', ['city_list' => $city_list, 'type' => $type, 'properties' => $properties, 'view_type' => $view_type, 'last_update' => $last_update, 'gallery_settings' => $mauritius_gallery_settings, 'gallery' => $gallery, 'count_items' => $count_items, 'last_news' => $last_news, 'search' => Session::get('search')]);
        }
    }

    public function results(Request $request)
    {
        SyncWithApimo::update();
        $city_list = Properties::getCityList();
        $type = Properties::getAvailablePropertyType();
        $cur_page = (empty($_GET['page']) ? 1 : $_GET['page']);
        $lang = LaravelLocalization::getCurrentLocale();
        $country = [];
        $type_view = $request->view_type;
        preg_match("/[^\/]+$/", $_SERVER["REQUEST_URI"], $matches);

        $check = isset($matches[0]) ? $matches[0] : false;

        if( stristr($check, '?') == true) {
            $country[] = stristr($check, '?', true);
        } else {
            $country[] = $check;
        }

        $url_page =  '/' . $lang. '/achat/results/' . ($country != 'results') ? implode($country) . '?page=' : '?page=';
        $view_type = 'grid_view';

        if (isset($_COOKIE['typeView'])) {
            $view_type = $_COOKIE['typeView'];
        }

        if (isset($_GET['items'])) {
            Session::put('search.items', $_GET['items']);
        } elseif (!Session::has('search.items')) {
            Session::put('search.items', 10);
        }

        Session::put('search.sell_type', 1);

        if (isset($_POST['object_type']) && !empty($_POST['object_type'])) {
            Session::put('search.object_type', $_POST['object_type']);
        } elseif (!Session::has('search.object_type')) {
            Session::put('search.object_type', Properties::getAvailablePropertyTypeIds());
        }

        if (isset($_POST['object_place']) && !empty($_POST['object_place'])) {
            Session::put('search.object_place', $_POST['object_place']);
        } elseif (!Session::has('search.object_place')) {
            Session::put('search.object_place', Properties::getCityListIds());
        }

        if (isset($_POST['search_keywords'])) {
            Session::put('search.search_keywords', $_POST['search_keywords']);
        } elseif (!Session::has('search.search_keywords')) {
            Session::put('search.search_keywords', '');
        }

        if (isset($_POST['price_min'])) {
            Session::put('search.price_min', $_POST['price_min']);
        } elseif (!Session::has('search.price_min')) {
            Session::put('search.price_min', '');
        }

        if (isset($_POST['price_max'])) {
            Session::put('search.price_max', $_POST['price_max']);
        } elseif (!Session::has('search.price_max')) {
            Session::put('search.price_max', '');
        }

        if (isset($_POST['surface_min'])) {
            Session::put('search.surface_min', $_POST['surface_min']);
        } elseif (!Session::has('search.surface_min')) {
            Session::put('search.surface_min', '');
        }

        if (isset($_POST['surface_max'])) {
            Session::put('search.surface_max', $_POST['surface_max']);
        } elseif (!Session::has('search.surface_max')) {
            Session::put('search.surface_max', '');
        }

        if (isset($_POST['bedrooms_min'])) {
            Session::put('search.bedrooms_min', $_POST['bedrooms_min']);
        } elseif (!Session::has('search.bedrooms_min')) {
            Session::put('search.bedrooms_min', '');
        }

        if (isset($_POST['bedrooms_max'])) {
            Session::put('search.bedrooms_max', $_POST['bedrooms_max']);
        } elseif (!Session::has('search.bedrooms_max')) {
            Session::put('search.bedrooms_max', '');
        }

        $properties_obj = new Properties();
        $properties = $properties_obj->getProperties(
            Session::get("search.items"),
            $cur_page,
            Session::get("search.sell_type"),
            Session::get("search.object_type"),
            Session::get("search.object_place"),
            Session::get("search.search_keywords"),
            Session::get("search.price_min"),
            Session::get("search.price_max"),
            Session::get("search.surface_min"),
            Session::get("search.surface_max"),
            Session::get("search.bedrooms_min"),
            Session::get("search.bedrooms_max")
        );

        $all_properties = $properties_obj->getAllProperties(
            Session::get("search.sell_type"),
            Session::get("search.object_type"),
            Session::get("search.object_place"),
            Session::get("search.search_keywords"),
            Session::get("search.price_min"),
            Session::get("search.price_max"),
            Session::get("search.surface_min"),
            Session::get("search.surface_max"),
            Session::get("search.bedrooms_min"),
            Session::get("search.bedrooms_max")
        );

        $pagination = $properties_obj->paginations(Session::get("search.items"), $cur_page, $url_page);
        $count_items = $properties_obj->property_count;

        return view(
            'results',
            [
                'properties' => $properties,
                'all_properties' => $all_properties,
                'pagination' => $pagination,
                'count_items' => $count_items,
                'city_list' => $city_list,
                'type' => $type,
                'search' => Session::get('search'),
                'view_type' => $view_type,
                'type_view' => $type_view
            ]
        );
    }

    public function locations(Request $request)
    {
        SyncWithApimo::update();
        $city_list = Properties::getCityList();
        $type = Properties::getAvailablePropertyType();
        $cur_page = (empty($_GET['page']) ? 1 : $_GET['page']);
        $lang = LaravelLocalization::getCurrentLocale();
        $country = [];
        $type_view = $request->view_type;

        preg_match("/[^\/]+$/", $_SERVER["REQUEST_URI"], $matches);

        $check = isset($matches[0]) ? $matches[0] : false;

        if( stristr($check, '?') == true) {
            $country[] = stristr($check, '?', true);
        } else {
            $country[] = $check;
        }

        $url_page =  '/' . $lang. '/locations/results/' . ($country != 'results') ? implode($country) . '?page=' : '?page=';
        $view_type = 'grid_view';

        if (isset($_COOKIE['typeView'])) {
            $view_type = $_COOKIE['typeView'];
        }

        if (isset($_GET['items'])) {
            Session::put('search.items', $_GET['items']);
        } elseif (!Session::has('search.items')) {
            Session::put('search.items', 10);
        }

        Session::put('search.sell_type', 3);

       /* if (isset($_POST['sell_type']) && !empty($_POST['sell_type'])) {
            Session::put('search.sell_type', $_POST['sell_type']);
        } elseif (!Session::has('search.sell_type')) {
            Session::put('search.sell_type', 1);
        }*/

        if (isset($_POST['object_type']) && !empty($_POST['object_type'])) {
            Session::put('search.object_type', $_POST['object_type']);
        } elseif (!Session::has('search.object_type')) {
            Session::put('search.object_type', Properties::getAvailablePropertyTypeIds());
        }

        if (isset($_POST['object_place']) && !empty($_POST['object_place'])) {
            Session::put('search.object_place', $_POST['object_place']);
        } elseif (!Session::has('search.object_place')) {
            Session::put('search.object_place', Properties::getCityListIds());
        }

        if (isset($_POST['search_keywords'])) {
            Session::put('search.search_keywords', $_POST['search_keywords']);
        } elseif (!Session::has('search.search_keywords')) {
            Session::put('search.search_keywords', '');
        }

        if (isset($_POST['search_keywords'])) {
            Session::put('search.search_keywords', $_POST['search_keywords']);
        } elseif (!Session::has('search.search_keywords')) {
            Session::put('search.search_keywords', '');
        }

        if (isset($_POST['price_min'])) {
            Session::put('search.price_min', $_POST['price_min']);
        } elseif (!Session::has('search.price_min')) {
            Session::put('search.price_min', '');
        }

        if (isset($_POST['price_max'])) {
            Session::put('search.price_max', $_POST['price_max']);
        } elseif (!Session::has('search.price_max')) {
            Session::put('search.price_max', '');
        }

        if (isset($_POST['surface_min'])) {
            Session::put('search.surface_min', $_POST['surface_min']);
        } elseif (!Session::has('search.surface_min')) {
            Session::put('search.surface_min', '');
        }

        if (isset($_POST['surface_max'])) {
            Session::put('search.surface_max', $_POST['surface_max']);
        } elseif (!Session::has('search.surface_max')) {
            Session::put('search.surface_max', '');
        }

        if (isset($_POST['bedrooms_min'])) {
            Session::put('search.bedrooms_min', $_POST['bedrooms_min']);
        } elseif (!Session::has('search.bedrooms_min')) {
            Session::put('search.bedrooms_min', '');
        }

        if (isset($_POST['bedrooms_max'])) {
            Session::put('search.bedrooms_max', $_POST['bedrooms_max']);
        } elseif (!Session::has('search.bedrooms_max')) {
            Session::put('search.bedrooms_max', '');
        }

        $properties_obj = new Properties();
        $properties = $properties_obj->getProperties(
            Session::get("search.items"),
            $cur_page,
            Session::get("search.sell_type"),
            Session::get("search.object_type"),
            Session::get("search.object_place"),
            Session::get("search.search_keywords"),
            Session::get("search.price_min"),
            Session::get("search.price_max"),
            Session::get("search.surface_min"),
            Session::get("search.surface_max"),
            Session::get("search.bedrooms_min"),
            Session::get("search.bedrooms_max")
        );

        $all_properties = $properties_obj->getAllProperties(
            Session::get("search.sell_type"),
            Session::get("search.object_type"),
            Session::get("search.object_place"),
            Session::get("search.search_keywords"),
            Session::get("search.price_min"),
            Session::get("search.price_max"),
            Session::get("search.surface_min"),
            Session::get("search.surface_max"),
            Session::get("search.bedrooms_min"),
            Session::get("search.bedrooms_max")
        );

        $pagination = $properties_obj->paginations(Session::get("search.items"), $cur_page, $url_page);
        $count_items = $properties_obj->property_count;
        return view(
            'results',
            [
                'properties' => $properties,
                'all_properties' => $all_properties,
                'pagination' => $pagination,
                'count_items' => $count_items,
                'city_list' => $city_list,
                'type' => $type,
                'search' => Session::get('search'),
                'view_type' => $view_type,
                'type_view' => $type_view
            ]
        );
    }

    public function details()
    {
        $view_type = 'grid_view';

        if (isset($_COOKIE['typeView'])) {
            $view_type = $_COOKIE['typeView'];
        }

        if (isset($_POST['object_type']) && !empty($_POST['object_type'])) {
            Session::put('search.object_type', $_POST['object_type']);
        } elseif (!Session::has('search.object_type')) {
            Session::put('search.object_type', Properties::getAvailablePropertyTypeIds());
        }

        if (isset($_POST['object_place']) && !empty($_POST['object_place'])) {
            Session::put('search.object_place', $_POST['object_place']);
        } elseif (!Session::has('search.object_place')) {
            Session::put('search.object_place', Properties::getCityListIds());
        }

        $id = $_GET['id'];
        if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
            $property = Properties::getProperty($id);
            $property_id = Properties::getPropertyId(
                Session::get("search.sell_type"),
                Session::get("search.object_type"),
                Session::get("search.object_place"),
                Session::get("search.search_keywords"),
                Session::get("search.price_min"),
                Session::get("search.price_max"),
                Session::get("search.surface_min"),
                Session::get("search.surface_max"),
                Session::get("search.bedrooms_min"),
                Session::get("search.bedrooms_max")
            );

            $current_index = array_search($id , $property_id);
            $next = $current_index + 1;
            $prev = $current_index - 1;

            /* services */
            $services = Services::select('reference', 'value', 'locale')->get();
            return view('details', ['property' => $property, 'services' => $services, 'property_id' => $property_id, 'next' => $next, 'prev' => $prev, 'view_type' => $view_type]);
        } else {
            return redirect('results');
        }
    }

    public function locationsDetails()
    {
        $view_type = 'grid_view';

        if (isset($_COOKIE['typeView'])) {
            $view_type = $_COOKIE['typeView'];
        }

        if (isset($_POST['object_type']) && !empty($_POST['object_type'])) {
            Session::put('search.object_type', $_POST['object_type']);
        } elseif (!Session::has('search.object_type')) {
            Session::put('search.object_type', Properties::getAvailablePropertyTypeIds());
        }

        if (isset($_POST['object_place']) && !empty($_POST['object_place'])) {
            Session::put('search.object_place', $_POST['object_place']);
        } elseif (!Session::has('search.object_place')) {
            Session::put('search.object_place', Properties::getCityListIds());
        }

        $id = $_GET['id'];
        if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
            $property = Properties::getProperty($id);
            $property_id = Properties::getPropertyId(
                Session::get("search.sell_type"),
                Session::get("search.object_type"),
                Session::get("search.object_place"),
                Session::get("search.search_keywords"),
                Session::get("search.price_min"),
                Session::get("search.price_max"),
                Session::get("search.surface_min"),
                Session::get("search.surface_max"),
                Session::get("search.bedrooms_min"),
                Session::get("search.bedrooms_max")
            );

            $current_index = array_search($id , $property_id);
            $next = $current_index + 1;
            $prev = $current_index - 1;

            /* services */
            $services = Services::select('reference', 'value', 'locale')->get();
            return view('details', ['property' => $property, 'services' => $services, 'property_id' => $property_id, 'next' => $next, 'prev' => $prev, 'view_type' => $view_type]);
        } else {
            return redirect('results');
        }
    }

//    public function news()
//    {
//        return view('news');
//    }

//    public function news_details()
//    {
//        return view('news_details');
//    }

    public function news_admin()
    {
        return view('news_admin');
    }

    public function news_edit()
    {
        return view('news_edit');
    }

    public function newsletters()
    {
        return view('newsletters');
    }

    public function contact()
    {
        return view('contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'bodyMessage' => $request->message,
        ];

        $success = array(
            'status' => 'success',
            'msg' => trans('lang.email_was_sent'),
        );

        $error = array(
            'status' => 'error',
            'msg' => trans('lang.email_was_not_sent')
        );

        $subscribers = new Subscribers;
        $subscribers->email = $request->email;
        $check_subscriber = Subscribers::select('email')->get();

        if($request->subscribe == 'true') {
            if (stristr((string)$check_subscriber, $subscribers->email) === false) {
                $subscribers->save();
            }
        }

        Mail::send('emails.email', $data, function ($message) use ($data) {
            $message->from($data['email'], 'Heraclee Contact form');
            $message->to(env('CONTACT_EMAIL'));
        });

        if (Mail::failures()) {
            return $error;
        } else {
            return $success;
        }

    }

    public function postContactToAgent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $data = [
//            'to' => $request->to,
            'to' => 'info@heraclee.com',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'bodyMessage' => $request->message,
        ];

        $success = array(
            'status' => 'success',
            'msg' => trans('lang.email_was_sent'),
        );

        $error = array(
            'status' => 'error',
            'msg' => trans('lang.email_was_not_sent')
        );

        $subscribers = new Subscribers;
        $subscribers->email = $request->email;
        $check_subscriber = Subscribers::select('email')->get();

        if($request->subscribe == 'true') {
            if (stristr((string)$check_subscriber, $subscribers->email) === false) {
                $subscribers->save();
            }
        }

        Mail::send('emails.email_agent', $data, function($message) use ($data){
            $message->from($data['email'],'Heraclee Contact form');
            $message->to($data['to']);
        });

        if (Mail::failures()) {
            return $error;
        } else {
            return $success;
        }

    }

    public function newsletter(Request $request)
    {
        $subscribers = new Subscribers;
        $subscribers->email = $request->email;
        $check_subscriber = Subscribers::select('email')->get();

        $response = array(
            'status' => 'success',
            'msg' => trans('lang.email_was_registered'),
        );

        $error = array(
            'status' => 'error',
            'msg' => trans('lang.email_is_already_registered')
        );

        if (stristr((string)$check_subscriber, $subscribers->email) === false) {
            $subscribers->save();

            return $response;

        } else {
            return $error;
        }
    }

    public function team()
    {
        $users = Team::where('active', 1)->get()->toArray();
        //dump($users);
        return view('team');
    }

    /**
     * Display a listing of news.
     */

    public function news()
    {
        $news = Posts::where('status', '=', 'on')->orderBy('date', 'desc')->get();

        return view('news', ['news' => $news]);
    }

    /**
     * Display a listing of virtual tours.
     */

    public function virtual_tours()
    {
        $preview = [];
        $properties = DB::table('apimo_properties')->get();

        foreach ($properties as $key => $property) {
            if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/virtual_tours/' . $property['property_id'] . '/property_' . $property['property_id'] . '.js')) {
                /* for title */
                $path = glob($_SERVER['DOCUMENT_ROOT'] . '/virtual_tours/' . $property['property_id'] . '/*.xml');
                $filename = basename($path[0],'.xml');
                $title = str_replace(array('_', '2', 'core'), ' ', $filename);

                /*city*/
                $city = DB::table('apimo_city')->where('city_id', $property['city'])->value('name');

                $preview[$property['property_id']] = [
                    'image'     => $property['pictures'],
                    'sell_type' => $property['category'],
                    'title'     => ucfirst($title),
                    'city'      => $city
                ];
            }
        }



        return view('tours', ['properties' => $properties, 'preview_tour' => $preview]);
    }

    /**
     * Display virtual tour.
     */

    public function details_virtual_tour($id)
    {
        $tour = DB::table('apimo_properties')
            ->where('property_id', $id)->first();
        return view('details_tour', ['tour' => $tour]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function news_details($id)
    {
        $news = Posts::find($id);

        return view('news_details', ['item' => $news]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
//    public function view_type(Request $request)
//    {
//        $view_type = $request->view_type;
//        return view('view_type', ['type_view' => $view_type]);
//    }


//    public static function getCityList($id, $country)
//    {
//        $country_array =[];
//
//        if($country == false || $country == 'results' || $country == 'fr' || $country == 'en') {
//            $country_array = ['FR', 'CH', 'US', 'ZA'];
//        }
//
//        if($country == 'france') {
//            $country_array = ['FR'];
//        }
//
//        if($country == 'swiss') {
//            $country_array = ['CH'];
//        }
//
//        if($country == 'usa') {
//            $country_array = ['US'];
//        }
//
//        if($country == 'mauritius') {
//            $country_array = ['ZA'];
//        }
//
//        if(
//            ($_SERVER['REQUEST_URI'] === '/') || ($_SERVER['REQUEST_URI'] === '/fr') || ($_SERVER['REQUEST_URI'] === '/en') ||
//            ($_SERVER['REQUEST_URI'] === '/france') || ($_SERVER['REQUEST_URI'] === '/fr/france') || ($_SERVER['REQUEST_URI'] === '/en/france') ||
//            ($_SERVER['REQUEST_URI'] === '/swiss') || ($_SERVER['REQUEST_URI'] === '/fr/swiss') || ($_SERVER['REQUEST_URI'] === '/en/swiss') ||
//            ($_SERVER['REQUEST_URI'] === '/usa') || ($_SERVER['REQUEST_URI'] === '/fr/usa') || ($_SERVER['REQUEST_URI'] === '/en/usa') ||
//            ($_SERVER['REQUEST_URI'] === '/mauritius') || ($_SERVER['REQUEST_URI'] === '/fr/mauritius') || ($_SERVER['REQUEST_URI'] === '/en/mauritius')
//        ){
//            $sell_type_array = [1, 2, 3, 4, 5, 6];
//        } else {
//            if ($id == 1) {
//                $sell_type_array = [1, 4, 5, 6];
//            } else {
//                $sell_type_array = [2, 3];
//            }
//        }
//
//        $properties = DB::table('apimo_properties')
//            ->whereIn('category',  $sell_type_array )
//            ->where('reference', 'like',  'HSTP%' )
//            ->whereIn('country', $country_array)->pluck('city');
//
//        $cities = DB::table('apimo_city')->whereIn('city_id', $properties)->get();
//
//        return json_encode($cities);
//
//    }

    public function api()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.apimo.pro/agencies/10338/properties');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, '1498:4b9e86c6bc4286a8bec6a0e8b02f9e014c2414a3');
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"limit": 10, "offset": 0, "timestamp": "" }');
        $output = curl_exec($ch);
        curl_close($ch);
        $values = json_decode($output, true);

        dd($values);
    }

//    public function login()
//    {
//        return view('login');
//    }
//
//    public function password_recover()
//    {
//        return view('password_recover');
//    }
}