<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserSearchController extends Controller
{
    public function index(Request $request)
    {
        $searchResults = null;
        if ($request->has('q') && $request->q !== null && $request->q !== '') {
            $searchResults = User::where('name', 'like', '%' . $request->q . '%')->get();
        }
        return view('users.search', compact('searchResults'));
    }
}
