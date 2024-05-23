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
            $data['payment'] = Payment::select([
                'payment.id',
                'payment.total',
                'payment.method',
                'payment.destination',
                'payment.status',
                'payment.created_at',
                'payment.updated_at',
                'users.name as user'
            ])
            ->leftJoin('users', 'users.id' ,'=', 'payment.user_id')
            ->where('payment.status', 'success')->simplePaginate(8);
        }

        try {
            return view("page.{$page}", $data);
        } catch (\Throwable $th) {
            abort(404);
        }
    }

}
