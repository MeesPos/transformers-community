<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class OnboardController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Onboarding');
    }

    public function finish()
    {
        Auth::user()
            ->update([
                'onboarding_completed' => true
            ]);

        return Redirect::route('chat');
    }
}
