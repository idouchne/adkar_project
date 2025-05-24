<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdkarUserInteraction;
  use Illuminate\Support\Facades\Auth;
class AdkarUserInteractionController extends Controller
{
 

public function updateInteraction(Request $request)
{
    $request->validate([
        'adkar_id' => 'required|integer',
        'type' => 'required|in:like,repeat',
    ]);

    // تحقق إذا كان المستخدم مسجلاً الدخول
    $userId = Auth::check() ? Auth::id() : 0;

    // البحث أو الإنشاء للتفاعل
    $interaction = AdkarUserInteraction::firstOrCreate(
        ['adkar_id' => $request->adkar_id, 'user_id' => $userId],
        ['liked' => false, 'repeat_count' => 0]
    );

    if ($request->type === 'like') {
        $interaction->liked = true;
    }

    if ($request->type === 'repeat') {
        $interaction->repeat_count += 1;
    }

    $interaction->save();

    return response()->json([
        'success' => true,
        'interaction' => $interaction,
        'user_id' => $userId,
    ]);
}

public function unlike($adkarId)
{
    $userId = Auth::id();

    $interaction = AdkarUserInteraction::where('adkar_id', $adkarId)
        ->where('user_id', $userId)
        ->first();

    if (!$interaction || !$interaction->liked) {
        return response()->json(['message' => 'الذكر غير موجود في المفضلة'], 404);
    }

    $interaction->liked = false;
    $interaction->save();

    return response()->json(['message' => 'تم إزالة الذكر من المفضلة']);
}

public function removeFavorite($adkarId)
{
    $userId = Auth::id();

    $interaction = AdkarUserInteraction::where('adkar_id', $adkarId)
        ->where('user_id', $userId)
        ->first();

    if (!$interaction) {
        return response()->json(['message' => 'الذكر غير موجود في المفضلة'], 404);
    }

    $interaction->delete();

    return response()->json(['message' => 'تم حذف الذكر من المفضلة']);
}




}
