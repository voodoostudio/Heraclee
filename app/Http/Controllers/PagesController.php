<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 05/04/2017
 * Time: 15:22
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;



class PagesController extends Controller {

    public function index() {
        return view('index');
    }

    public function results() {
        return view('results');
    }

    public function details() {
        return view('details');
    }

    public function contact() {
        return view('contact');
    }

    public function api() {


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