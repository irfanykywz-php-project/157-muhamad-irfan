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

        $payment_query = Payment::select([
                'payments.id',
                'payments.total',
                'payments.method',
                'payments.destination',
                'payments.status',
                'users.name as user'
            ])
            ->leftJoin('users', 'users.id', '=', 'payments.user_id');

        $totalNotFiltered = $payment_query->count();


        // search
        $search = $request->get('search');
        if (!empty($search)) {
            //dd($search);
            $payment_query->where('payments.user', 'like', '%'.$search.'%');
        }

        // sort & order
        $sort = $request->get('sort');
        $order = $request->get('order');
        if (isset($sort) AND isset($order)){
            $payment_query->orderBy($sort, $order);
        }

        // total after search
        $total = $payment_query->count();

        // offset & limit
        $offset = $request->get('offset');
        $limit = $request->get('limit');
        if (isset($offset) AND isset($limit)){
            $payment_query = $payment_query->offset($offset)->limit($limit);
        }

        $files = $payment_query->get();

        return response()->json([
            'total' => $total,
            'totalNotFiltered' => $totalNotFiltered,
            'rows' => $files
        ]);
    }

    public function update(Request $request)
    {
        $ids = $request->post('ids');
        $status = $request->post('status');

        Payment::whereIn('id', $ids)->update(['status' => $status]);

        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
