<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Zekr;

class ZekrController extends Controller
{
    public function index()
    {
        return Zekr::all();
    }
}
