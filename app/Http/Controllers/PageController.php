<?php

namespace App\Http\Controllers;

use App\Models\SavedColors;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Homepage(){
        return view('Page.Homepage');
    }

    public function Profile(User $user){

        $favourites = $user->favouriteColors()->latest()->limit(27)->get();
        $comments = $user->comments()->latest()->limit(10)->get();

        return view('Page.Profile.Profile', [
            'username' => $user['username'],
            'favourites' => $favourites,
            'comments' => $comments
        ]);
    }

    private function generateRandomColor() {
        return str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    private function getRandomColors($limit){
        $colors = [];

        for($i=0; $i < $limit; $i++){
            array_push($colors, $this->generateRandomColor());
        }

        return $colors;
    }

    public function RandomColorPage(){
        
        $randomColors = $this->getRandomColors(54);

        return view('Page.Extra.RandomColorPage', [
            "randomColors" => $randomColors
        ]);
    }

    public function PopularColorsPage(){

        $popularColors = SavedColors::limit(54)->orderBy('views', 'desc')->select('colorhex')->get();

        return view('Page.Extra.PopularColorPage', [
            "popularColors" => $popularColors
        ]);
    }

    public function ColorGuessingGame(){
        return view('Page.Extra.ColorsGame');
    }

    public function ContactPage(){
        return view('Page.Extra.Contact');
    }

    public function PrivacyPage(){
        return view('Page.Extra.PrivacyPolicy');
    }
}
