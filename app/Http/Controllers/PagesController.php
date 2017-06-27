<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 05/04/2017
 * Time: 15:22
 */

namespace App\Http\Controllers;

use App\Libraries\SyncWithApimo;
use App\Properties;
use App\Team;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{

    public function index()
    {
        Session::forget('search');
        $city_list = Properties::getCityList();
        $type = Properties::getAvailablePropertyType();
        return view('index', ['city_list' => $city_list, 'type' => $type]);
    }

    public function results()
    {
        SyncWithApimo::update();
        $city_list = Properties::getCityList();
        $type = Properties::getAvailablePropertyType();
        $cur_page = (empty($_GET['page']) ? 1 : $_GET['page']);
        $url_page = '/results?page=';

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
            Session::put('search.sell_type', 1);
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

        $pagination = $properties_obj->paginations(Session::get("search.items"), $cur_page, $url_page);
        return view(
            'results',
            [
                'properties' => $properties,
                'pagination' => $pagination,
                'city_list' => $city_list,
                'type' => $type,
                'search' => Session::get('search'),
                'view_type' => $view_type
            ]
        );
    }

    public function details()
    {
        $id = $_GET['id'];
        if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
            $property = Properties::getProperty($id);

            return view('details', ['property' => $property]);
        } else {
            return redirect('results');
        }
    }

    public function contact()
    {
        return view('contact');
    }

    public function team()
    {
        $users = Team::where('active', 1)->get()->toArray();
        dump($users);
        return view('team');
    }

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

}