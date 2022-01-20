<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class CartController extends Controller
{
    public function index(){
        
        $cart = Cart::where('user_id', Auth::user()->id)->firstOrfail();

        return view('cart')->with('cart',$cart);
    }
    public function add(Request $req, $id){
        // print_r($req->input());
        $user = Auth::user()->id;
        $game = Game::findOrfail($id);
        $cart = new Cart();

        if(!Cart::where('user_id',$user)->exists()){
            $cart->user_id = $user;
            $cart->save();
        }else{
            $cart = Cart::where('user_id', $user)->firstOrFail();
        }

        $cart_details = new CartDetail();

        $cart_details->cart_id = $cart->id;
        $cart_details->game_id = $id;
        $cart_details->save();


        return back()->with('successMsg','Game Added to Cart!');
        // return $cart_details;
    }


    public function delete($cart_id, $game_id){
        $cart= CartDetail::where('cart_id',$cart_id)->where('game_id',$game_id)->first()->delete();

        return back()->with('successMsg','Game has been deleted from Cart!');
    }

    public function checkout($cart_id){
        $trans = new Transaction();
        $trans->user_id = Auth::user()->id;
        $trans->total=0;
        $trans->save();
        $cart = CartDetail::where('cart_id',$cart_id)->get();
        $total=0;

        for($a=0;$a<count($cart);$a++){
            $transDetails = new TransactionDetail();

            $transDetails->transaction_id = $trans->id;
            $transDetails->game_id = $cart[$a]->game_id;
            $total= $total+($transDetails->game->price);
            $transDetails->save();
            $cart[$a]->delete();
        }
        $trans->total=$total;
        $trans->save();

        return back()->with('successMsg','Checkout Success!');

    }
}

