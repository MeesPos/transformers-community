<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search($query): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::query()
            ->where('username', 'LIKE', "%$query%")
            ->where('username', '!=', Auth::user()->username)
            ->get();
    }
}
