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

        $user = $user->with('payments')->where('id', Auth::user()->id)->first();

        $payments = $user->payments()
            ->orderBy('id', 'DESC')
            ->paginate(8);

        return view('user.payment', [
            'user' => $user,
            'payments' => $payments
        ]);
    }

    public function payout(Request $request)
    {

        $request->validate([
            'total' => ['required', 'integer'],
            'method' => ['required'],
            'destination' => ['required'],
            'identity' => ['required'],
        ]);

        $total = $request->post('total');
        $method = $request->post('method');
        $destination = $request->post('destination');
        $identity = $request->post('identity');

        // check user reveneu
        $user = User::where('id', Auth::user()->id)->first();
        $user_reveneu = $user->getRawOriginal('reveneu');
        if ($total > $user_reveneu){
            return redirect()->back()->withErrors([
                'total' => 'Error! your revenue not enough !!!'
            ])->withInput();
        }

        // check minimum by method type
        if (str_contains(strtolower($method), 'wallet')){
            if ($total < 6000){
                return redirect()->back()->withErrors([
                    'total' => 'Minimum Payment Digital Wallet Rp 6.000'
                ])->withInput();
            }
        }elseif (str_contains(strtolower($method), 'pulsa')){
            if ($total < 6000){
                return redirect()->back()->withErrors([
                    'total' => 'Minimum Payment Pulsa Rp 6.000'
                ])->withInput();
            }
        }elseif (str_contains(strtolower($method), 'bank')){
            if ($total < 100000){
                return redirect()->back()->withErrors([
                    'total' => 'Minimum Payment Bank Transfer Rp 100.000'
                ])->withInput();
            }
        }else{
            // method not recognize show error
            return redirect()->back()->withErrors([
                'method' => 'Error! method not valid, please insert keyword [pulsa/wallet/bank] !!!'
            ])->withInput();
        }

        // crete payment
        Payment::create([
            'user_id' => Auth::user()->id,
            'total' => $total,
            'method' => $method,
            'destination' => $destination,
            'identity' => $identity,
            'status' => 'pending'
        ]);

        // update reveneu user
        User::where('id', Auth::user()->id)->decrement('reveneu', $total);

        return redirect()->route('user.payment')->with('message', 'Success! your payment has created! (wait admin process...)');
    }
}
