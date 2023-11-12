<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Events\RegistrationConfirmationEvent;
use App\Http\Resources\LikeByGenderResource;
use App\Http\Resources\LikeResource;
use App\Models\Like;
use App\Notifications\NewLikeNotification;
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

        $likedUser->notify(new NewLikeNotification(Auth::user()));

        return response()->json([
            'status' => 'Success',
        ], 201);
    }

    public function likedByMe()
    {

        $likedByMe = Like::with('likedUser')
            ->where('user_id', Auth::id())
            ->paginate(10);

        return view('profile.liked-by-me', compact('likedByMe'));
    }

    public function likedMe()
    {
        $likedMe = Like::with('user')
            ->where('liked_user_id', Auth::id())
            ->paginate(10);

        return view('profile.liked-me', compact('likedMe'));
    }

    public function getUserLikes($id)
    {
        $userLikes = Like::with('likedUser')
            ->where('user_id', $id)
            ->paginate(15);

        if ($userLikes->isEmpty()) {
            return response()->json(['message' => 'User has no likes'], 404);
        }

        return LikeResource::collection($userLikes);
    }

    public function getUserLikesByGender($id): JsonResponse
    {
        $userLikes = Like::with('likedUser')
            ->where('user_id', $id)
            ->get();

        if ($userLikes->isEmpty()) {
            return response()->json(['message' => 'User has no likes'], 404);
        }
        $likeCountsByGender = $userLikes->groupBy('likedUser.gender')
            ->map(function ($likes, $gender) {
                return [
                    'gender' => GenderEnum::from($gender)->name,
                    'like_count' => count($likes),
                ];
            });

//        return LikeByGenderResource::collection($likeCountsByGender);

        return response()->json(['data' => $likeCountsByGender]);

    }
}
