<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function likeProfile($likedUserId): JsonResponse
    {
        // Check if the current user has already liked the profile
        $existingLike = Like::where('user_id', Auth::id())
            ->where('liked_user_id', $likedUserId)
            ->first();

        if ($existingLike) {
            return response()->json([
                'status' => 'Error',
                'message' => 'User has already liked this profile.',
            ], 400);
        }

        // If no existing like, create a new like
        $like = Like::create([
            'user_id' => Auth::id(),
            'liked_user_id' => $likedUserId,
        ]);

        // Trigger notification to the liked user
        $likedUser = $like->likedUser;
        // $likedUser->notify(new LikeNotification(Auth::user()));

        return response()->json([
            'status' => 'Success',
        ], 201);
    }

}
