<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = User::where('is_club',true)->paginate();
        return view('admin.clubs.clublist', compact('clubs'));
    }
}
