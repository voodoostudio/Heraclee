<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 05/04/2017
 * Time: 15:22
 */

namespace App\Http\Controllers;



class PagesController extends Controller {

    public function index() {
        return view('index');
    }

    public function results() {
        return view('results');
    }

}