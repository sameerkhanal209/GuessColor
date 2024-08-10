<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaletteController extends Controller
{
    public function CreatePalettePage()
    {
        return view('Palette.Create');
    }
}
