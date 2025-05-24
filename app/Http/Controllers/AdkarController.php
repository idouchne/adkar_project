<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdkarUserInteraction;
use Illuminate\Support\Facades\Auth;
 
class AdkarController extends Controller
{
    // حفظ الإعجاب
    public function like($id)
    {
        $user = Auth::user();

        $interaction = AdkarUserInteraction::firstOrCreate([
            'user_id' => $user->id,
            'adkar_id' => $id
        ]);

        $interaction->liked = true;
        $interaction->save();

        return response()->json(['message' => 'تم تسجيل الإعجاب']);
    }

    // حفظ التكرار
    public function repeat($id)
    {
        $user = Auth::user();

        $interaction = AdkarUserInteraction::firstOrCreate([
            'user_id' => $user->id,
            'adkar_id' => $id
        ]);

        $interaction->repeat_count += 1;
        $interaction->save();

        return response()->json(['message' => 'تم زيادة العداد']);
    }


   

public function favorites()
{
    $userId = auth()->id();

    $favorites = AdkarUserInteraction::where('user_id', $userId)
        ->where('liked', true)
        ->with('adkar') // تأكد أن العلاقة adkar موجودة في الموديل
        ->get()
        ->pluck('adkar');

    return response()->json($favorites);
}

}
