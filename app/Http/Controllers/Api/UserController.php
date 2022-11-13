<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function about(Request $request)
    {
        return $request->user()->fresh(['programs']);
    }
}
