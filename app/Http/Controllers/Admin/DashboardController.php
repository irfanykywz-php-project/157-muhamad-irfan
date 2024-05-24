<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Files;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $total_files = Files::count();
        $total_payments = Payment::where('status', 'success')->sum('total');
        $payments_pending = Payment::where('status', 'pending')->count();
        $total_user = User::count();

        return view('admin.dashboard', [
            'total_files' => $total_files,
            'total_payments' => $total_payments,
            'payments_pending' => $payments_pending,
            'total_user' => $total_user,
        ]);
    }
}
