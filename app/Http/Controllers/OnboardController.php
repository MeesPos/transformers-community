<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OnboardController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Onboarding');
    }
}
