<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.payment');
    }

    public function show(Request $request)
    {

        $files_query = Payment::select([
            'payment.id',
            'payment.total',
            'payment.method',
            'payment.destination',
            'payment.status',
            'users.name as user'
        ])
            ->leftJoin('users', 'users.id', '=', 'payment.user_id');

        $totalNotFiltered = $files_query->count();


        // search
        $search = $request->get('search');
        if (!empty($search)) {
            //dd($search);
            $files_query->where('payment.user', 'like', '%'.$search.'%');
        }

        // sort & order
        $sort = $request->get('sort');
        $order = $request->get('order');
        if (isset($sort) AND isset($order)){
            $files_query->orderBy($sort, $order);
        }

        // total after search
        $total = $files_query->count();

        // offset & limit
        $offset = $request->get('offset');
        $limit = $request->get('limit');
        if (isset($offset) AND isset($limit)){
            $files_query = $files_query->offset($offset)->limit($limit);
        }

        $files = $files_query->get();

        return response()->json([
            'total' => $total,
            'totalNotFiltered' => $totalNotFiltered,
            'rows' => $files
        ]);
    }

    public function update()
    {

    }
}
