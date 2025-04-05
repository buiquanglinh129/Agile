<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function search(Request $request)
    {
        $users = User::search([
            'name' => $request->input('name'),
            'id' => $request->input('id')
        ])->paginate(10);

        return view('users.search', compact('users'));
    }
}