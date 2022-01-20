<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function index(){
        $user = Auth::user()->id;
        $trans = Transaction::where('user_id',$user)->get();

        return view('transaction')->with('trans',$trans);
    }

    public function detail($trans_id){
        $trans = TransactionDetail::where('transaction_id',$trans_id)->get();
        $total = Transaction::findOrfail($trans_id)->total;

        return view('transdetails')->with('trans',$trans)->with('total',$total);
        // return $trans;
    }


}
