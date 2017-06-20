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

class PagesController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function results()
    {
        SyncWithApimo::update();
        $cur_page = (empty($_GET['page']) ? 1 : $_GET['page']);
        $url_page = '/results?page=';
        $items = 10;
        $properties = Properties::getProperties($items, $cur_page);

        $pagination = Properties::paginations($items, $cur_page, $url_page);

        return view('results', ['properties' => $properties, 'pagination' => $pagination]);
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