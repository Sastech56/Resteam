<?php

namespace Database\Seeders;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [    'name'=>'admin',
                 'username'=>'admin',
                 'password'=> Hash::make('adminn'),
                 'role'=>'2'
             ],
             [    'name'=>'member',
                 'username'=>'member',
                 'password'=> Hash::make('memberr'),
                 'role'=>'1'
            ]
            ]);
 
         DB::table('games')->insert([
             [
                 'name'=>'Counter Strike Global Offensive',
                 'description'=>'The Classic CSGO Competitive Game. Play with millions of players around the world!',
                 'photo'=>'../img/1.jpg',
                 'price'=> '95000'
             ],
             [
                 'name'=>'The Hollowknight: Silk Song',
                 'description'=>'The Sequel of the Award Winning Game : Hollowknight. Dive into the world of bugs where you fight other bugs to become the King of Bugs!',
                 'photo'=>'../img/2.jpg',
                 'price'=> '135000'
             ],
             [
                 'name'=>'The Witcher 3: Wildhunt',
                 'description'=>'Journey to the world of Witches and Knights, and fight demons to protect yourself.',
                 'photo'=>'../img/3.jpg',
                 'price'=> '335000'
             ],
             [
                 'name'=>'Forza Horizon 6',
                 'description'=>'Forza Horizon now takes place in Indonesia! home of the legendary becaks and delmans.',
                 'photo'=>'../img/4.jpg',
                 'price'=> '699000'
             ],
             [
                 'name'=>'Genshin Impact',
                 'description'=>'Game of The Year, Genshin Impact is now on ReXsteam! Become the strongest weeb and battle other weebs!',
                 'photo'=>'../img/5.jpg',
                 'price'=> '399000'
             ],
             [
                 'name'=>'Nier Automata',
                 'description'=>'Journey to the post-apocalyptic world where you are an Android fighting other Androids to survive',
                 'photo'=>'../img/6.jpg',
                 'price'=> '790000'
             ],
             [
                 'name'=>'Fortnite',
                 'description'=>'Beat other player in the battleground arena Fortnite and win become champion',
                 'photo'=>'../img/7.jpg',
                 'price'=> '120000'
             ],
             [
                 'name'=>'Demon Slayer',
                 'description'=>'Become Tanjiro and Fight Demons and Protect Your Cute Imouto and Become a Hashira!',
                 'photo'=>'../img/8.jpg',
                 'price'=> '990000'
             ],
             [
                 'name'=>'DOTA 2',
                 'description'=>'No need for introductions, you already know what this game is. Play and Train and win the TI Championship',
                 'photo'=>'../img/9.jpg',
                 'price'=> '29000'
             ]
         ]);
    }
}
