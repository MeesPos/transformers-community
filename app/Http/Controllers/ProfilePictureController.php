<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfilePictureController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Profile/ProfilePicture');
    }

    public function delete()
    {
        return Auth::user()->update([
            'profile_photo_path' => null
        ]);
    }

    public function upload(Request $request)
    {
        // TODO: Upload image
        dd($request->image);
    }
}
