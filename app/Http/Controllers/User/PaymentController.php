<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function payment(User $user)
    {

        $user = $user->where('id', Auth::user()->id)->first();

        $payment = Payment::latest()
            ->where('user_id', $user['id'])
            ->paginate(8);

        return view('user.payment', [
            'user' => $user,
            'payment' => $payment
        ]);
    }

    public function payout(Request $request)
    {

        $request->validate([
            'total' => ['required'],
            'method' => ['required'],
            'destination' => ['required'],
        ]);

        $total = $request->post('total');
        $method = $request->post('method');
        $destination = $request->post('destination');

        // validate reveneu with total input
        $user = User::where('id', Auth::user()->id)->first();
        if ($total > $user['reveneu']){
            return redirect()->back()->withErrors([
                'total' => 'Error! your revenue not enough !!!'
            ])->withInput();
        }

        // crete payment
        Payment::create([
            'user_id' => Auth::user()->id,
            'total' => $total,
            'method' => $method,
            'destination' => $destination,
            'status' => 'pending'
        ]);

        // update reveneu user
        User::where('id', Auth::user()->id)->decrement('reveneu', $total);

        return redirect()->route('user.payment')->with('message', 'Success! your payment has created! (wait admin process...)');
    }
}
