<?php

namespace App\Http\Controllers;

use App\Models\ColorCommentModel;
use App\Models\ColorNames;
use Spatie\Color\Factory;

use Illuminate\Http\Request;
use Mexitek\PHPColors\Color;
use App\Models\FavouriteColors;
use App\Models\SavedColors;
use OzdemirBurak\Iris\Color\Hex;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    
    private function GetColor($slug, $type){

        $hex = new Hex($slug);

        switch($type){
            case "hex":
                return $hex->values();
                break;
            case "hsl":
                $hsl = $hex->toHsl();
                $hsl = $hsl->values();

                return $hsl;
                break;
            case "hsv":
                $hsv = $hex->toHsv();
                $hsv = $hsv->values();
                return $hsv;
                break;
            case "rgb":
                $rgb = $hex->toRgb();
                $rgb = $rgb->values();
                return $rgb;
                break;
            case "xyz":
                $rgb = $hex->toRgb();
                
                $red = $rgb->red();
                $green = $rgb->green();
                $blue = $rgb->blue();

                $rgb = Factory::fromString("rgb($red,$green,$blue)");
                $xyz = $rgb->toXyz();

                return [
                    'x' => $xyz->x(),
                    'y' => $xyz->y(),
                    'z' => $xyz->z()
                ];
                break;
            case "lab":
                
                $rgb = $hex->toRgb();
                
                $red = $rgb->red();
                $green = $rgb->green();
                $blue = $rgb->blue();

                $rgb = Factory::fromString("rgb($red,$green,$blue)");
                $cmyk = $rgb->toCIELab();

                return [
                    'l' => $cmyk->l(),
                    'a' => $cmyk->a(),
                    'b' => $cmyk->b(),
                ];

                break;
            case "cmyk":

                $rgb = $hex->toRgb();
                
                $red = $rgb->red();
                $green = $rgb->green();
                $blue = $rgb->blue();

                $rgb = Factory::fromString("rgb($red,$green,$blue)");
                $cmyk = $rgb->toCmyk();

                return [
                    'cyan' => $cmyk->cyan(),
                    'magenta' => $cmyk->magenta(),
                    'yellow' => $cmyk->yellow(),
                    'key' => $cmyk->key()
                ];
                break;
            default:
                return false;
                break;
        }
    }

    private function getTints($hex){
        $hex = new Hex($hex);

        $hex_val = implode('', $hex->values());

        $tints = [];

        for ($i = 0; $i <= 10; $i++){
            $tint = $hex->tint($i * 10)->values();
            $tint = implode('', $tint);

            $hex_val = implode('', $hex->values());

            if($tint != $hex_val){
                array_push($tints, $tint);
            }
        }

        if(count($tints) != 0){
            array_unshift($tints, $hex_val);
        }

        return $tints;

    }

    private function getShades($hex){
        $hex = new Hex($hex);
        $hex_val = implode('', $hex->values());

        $shades = [];

        for ($i = 0; $i <= 10; $i++){
            $shade = $hex->shade($i * 10)->values();
            $shade = implode('', $shade);

            if($shade != $hex_val){
                array_push($shades, $shade);
            }
        }

        if(count($shades) != 0){
            array_unshift($shades, $hex_val);
        }

        return $shades;

    }

    private function CalculateColors($difference, $color){

        $color = new Color("#".$color);
        $hsl = $color->getHsl();

        $h = $hsl['H'];
        $s = $hsl['S'];
        $l = $hsl['L'];

        $colors = [];
        foreach($difference as $value){

            //$hsl = Factory::fromString("hsl(".($h+$value).",$s,$l)");
            //$hex = $hsl->toHex();
            //$hex = "#" . $hex->red() . $hex->green() . $hex->blue();

            //$hex = new Color("hsl(".($h+$value).",$s,$l)");

            $hex = Color::hslToHex([
                "H" => $h+$value, 
                "S" => $s, 
                "L" => $l
                ]);

            array_push($colors, $hex);
        }
        

        return $colors;
    }

    private function CalculateColorsLuminace($limit, $color){

        $color = new Color("#".$color);
        $hsl = $color->getHsl();

        $h = $hsl['H'];
        $s = $hsl['S'];
        $l = $hsl['L'];

        $colors = [];

        for($i=1; $i <= $limit; $i++){

            if($l * 0.2 * $i > 1){
                break;
            }

            $hex = Color::hslToHex([
                "H" => $h, 
                "S" => $s, 
                "L" => $l * 0.2 * $i
                ]);

            array_push($colors, $hex);
        }
        
        return $colors;
    }

    private function generateRandomColor() {
        return str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    private function getTriadic($hex){

        $colors = $this->CalculateColors([0, 120, -120], $hex);
        return $colors;

    }

    private function getAnalogus($hex){
        $colors = $this->CalculateColors([0, 30, -30], $hex);
        return $colors;
    }

    private function getTetradic($hex){
        $colors = $this->CalculateColors([0, 90, 180, 270], $hex);
        return $colors;
    }

    private function getComplimentary($hex){
        $colors = $this->CalculateColors([0, 180], $hex);
        return $colors;
    }

    private function getMonochromatic($hex){
        $colors = $this->CalculateColorsLuminace(11, $hex);
        return $colors;
    }

    private function luminance($r, $g, $b) {
        $a = array($r, $g, $b);
        $a = array_map(function ($v) {
            $v /= 255;
            return $v <= 0.03928 ? $v / 12.92 : pow(($v + 0.055) / 1.055, 2.4);
        }, $a);
        return $a[0] * 0.2126 + $a[1] * 0.7152 + $a[2] * 0.0722;
    }
    
    private function contrast($firstColor, $secondColor) {
        $lum1 = $this->luminance($firstColor[0], $firstColor[1], $firstColor[2]);
        $lum2 = $this->luminance($secondColor[0], $secondColor[1], $secondColor[2]);
        $brightest = max($lum1, $lum2);
        $darkest = min($lum1, $lum2);
        return ($brightest + 0.05) / ($darkest + 0.05);
    }

    private function getContrast($slug){
        $rgb = $this->getColor($slug, 'rgb');

        $black = [0, 0, 0];
        $white = [255, 255, 255];

        $blackContrast = $this->contrast($rgb, $black);
        $whiteContrast = $this->contrast($rgb, $white);

        return [
            'black' => $blackContrast,
            'white' => $whiteContrast
        ];
    }

    private function getRandomColors($limit){
        $colors = [];

        for($i=0; $i < $limit; $i++){
            array_push($colors, $this->generateRandomColor());
        }

        return $colors;
    }

    public function ColorPage($slug){

        $hex = $this->getColor($slug, 'hex');
        $hsl = $this->getColor($slug, 'hsl');
        $hsv = $this->getColor($slug, 'hsv');
        $rgb = $this->getColor($slug, 'rgb');
        $Xyz = $this->getColor($slug, 'xyz');
        $Lab = $this->getColor($slug, 'lab');
        $Cmyk = $this->getColor($slug, 'cmyk');

        $tints = $this->getTints($slug);
        $shades = $this->getShades($slug);

        $triadic = $this->getTriadic($slug);
        $analogous = $this->getAnalogus($slug);
        $tetradic = $this->getTetradic($slug);
        $complimentary = $this->getComplimentary($slug);
        $monochromatic = $this->getMonochromatic($slug);

        $contrast = $this->getContrast($slug);
        $randomColors = $this->getRandomColors(9);

        $favourite = FavouriteColors::where([
            'colorhex' => $slug,
            'user_id' => Auth::id()
        ])->count();

        if($favourite > 0){
            $favourite = true;
        }else{
            $favourite = false;
        }

        $comments = ColorCommentModel::where('colorhex', $slug)->with(['user'])->latest()->limit(10)->get();

        SavedColors::updateOrCreate([
            "colorhex" => $slug
        ])->increment('views');

        // $colorName = ColorNames::where('hex', "#$slug")->get()->first();
        $colorName = [
            'name' => '',
            'description' => ''
        ];

        return view('Page.Colors.Main', [
            'hex' => $slug,
            'hsl' => $hsl,
            'hsv' => $hsv,
            'rgb' => $rgb,
            'xyz' => $Xyz,
            'lab' => $Lab,
            'cmyk' => $Cmyk,
            "tints" => $tints,
            "shades" => $shades,
            "triadic" => $triadic,
            "analogous" => $analogous,
            "tetradic" => $tetradic,
            "complimentary" => $complimentary,
            "contrast" => $contrast,
            "monochromatic" => $monochromatic,
            "randomColors" => $randomColors,
            "favourite" => $favourite,
            "comments" => $comments,
            "colorName" => $colorName
        ]);
    }

    public function Search(Request $request){
        $color = str_replace('#', '', $request['color']);

        return redirect("/color/$color");
    }

    public function FavouriteColor($slug){

        $color = str_replace('#', '', $slug);

        $user_id = Auth::user()->id;

        $create = FavouriteColors::firstOrCreate(([
            'user_id' => $user_id,
            'colorhex' => $color
        ]));

        return redirect("/color/$color")->with('success', 'Color added to favourites!');
    }

    public function UnFavouriteColor($slug){

        $color = str_replace('#', '', $slug);

        $user_id = Auth::user()->id;

        FavouriteColors::where(([
            'user_id' => $user_id,
            'colorhex' => $color
        ]))->delete();

        return redirect("/color/$color")->with('success', 'Color removed from favourites!');
    }
}
