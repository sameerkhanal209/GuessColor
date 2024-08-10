<?php

namespace App\Http\Controllers;

use App\Rules\ReCaptcha;
use Illuminate\Http\Request;
use App\Models\ColorCommentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function CommentColor(Request $request, $slug){

        $incoming = Validator::make($request->all(), [
            'comment' => 'required|min:3|max:255',
            'g-recaptcha-response' => ['required', new ReCaptcha],
        ]);

        if ($incoming->fails()) {
            return redirect("/color/$slug#comments")
                        ->withErrors($incoming)
                        ->withInput();
        }

        $color = str_replace('#', '', $slug);

        $user_id = Auth::user()->id;

        ColorCommentModel::Create(([
            'user_id' => $user_id,
            'colorhex' => $color,
            'comment' => $request->comment,
        ]));

        return redirect("/color/$slug")->with('success', 'Comment added');
    }
}
