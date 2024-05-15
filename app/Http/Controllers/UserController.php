<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $dataUsers = User::where('role', 'USER')
            ->orderBy('name')
            ->paginate(5);

        return view('admin.users', compact('dataUsers'));
    }

    
}
