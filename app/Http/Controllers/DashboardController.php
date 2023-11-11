<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // Get IDs of users that the authenticated user has liked
        $likedUserIds = $user->likes()->pluck('liked_user_id')->all();

        // Get profiles that the user hasn't liked
        $users = User::with('likes')
            ->whereNotIn('id', $likedUserIds)
            ->orderByDesc('id')
            ->simplePaginate(15);

        return view('dashboard', compact('users'));
    }


}
