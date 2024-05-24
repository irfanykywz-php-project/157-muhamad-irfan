<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($page){

        $data = [];
        // when its a member-payment page
        // get data payment
        if ($page == 'member-payment'){

            // optimize use with
            // https://laravel.com/docs/11.x/eloquent-relationships#eager-loading
            $data['payment'] = Payment::
                with(['user'])
                ->where('status', 'success')
                ->simplePaginate(8);

        }

        try {
            return view("page.{$page}", $data);
        } catch (\Throwable $th) {
            abort(404);
        }
    }

}
