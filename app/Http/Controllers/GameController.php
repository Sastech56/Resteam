<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;




class GameController extends Controller
{
    public function index()
    {
        $auth = Auth::check();
        $role = 0;
        if($auth){
            $role = Auth::user()->role;
        }

        $game = Game::paginate(6);

        Paginator::useBootstrap();
     

        // return view('home')->with('auth',$auth)->with('role','$role')->with('game','$game');
        return view('welcome')->with('game',$game)->with('role',$role)->with('auth',$auth);
       
    }



    public function search(Request $req){
        $game = Game::where('name', 'like', '%' . $req->search . '%')->paginate(6);

            return view('welcome', ['game' => $game]);
    }

    public function show($id){
        $game = Game::findOrfail($id);
        // return $game;
        return view('details')->with('game',$game);
    }

    public function add(){


        return view('add');
    }
    public function insert(Request $req){

        $validated = $req->validate([
            'name' => ['required','max:20','string'],
            'description' => ['required', 'min:20','string'],
            'price' => ['required','min:10000','numeric'],
            'photo' => ['required','image']
        ]);

        $game = new Game;
        $photo = $req->file('photo')->getClientOriginalName();
        $req->photo->move(public_path('img/'), $photo);

        $game->name = $req->name;
        $game->price = $req->price;
        $game->description = $req->description;
        $game->photo = '../img/' . $photo;

        $game->save();

        return back()->with('successMsg','Game Added!');
    
    }
    public function edit($id){
        $game = Game::findOrfail($id);
        return view('edit')->with('game',$game);
    }
    public function update(Request $req, $id){

        $validated = $req->validate([
            'name' => ['required','max:20','string'],
            'description' => ['required', 'min:20','string'],
            'price' => ['required','min:10000','numeric'],
            'photo' => ['required','image']
        ]);

        $game = Game::findOrfail($id);
        $photo = $req->file('photo')->getClientOriginalName();
        $req->photo->move(public_path('img/'), $photo);

        $game->name = $req->name;
        $game->price = $req->price;
        $game->description = $req->description;
        $game->photo = '../img/' . $photo;

        $game->save();

        return back()->with('successMsg','Game Edited!');
    
    }

    public function delete($id){
        Game::findOrfail($id)->delete();
        return back();
    }
}
