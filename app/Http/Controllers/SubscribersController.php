<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribers;
use Illuminate\Support\Facades\Response;

class SubscribersController extends Controller
{
    public function index ()
    {
        $subscribers = Subscribers::all();

        return view('admin.subscribers.index',
            [
                'subscribers' => $subscribers
            ]);
    }

    public function getCSV() {
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="emails.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $file = fopen('php://output', 'w');
        $data = Subscribers::all();

        foreach($data as $row) {
            fputcsv($file, array($row->email));
        }
        exit();
    }
}
