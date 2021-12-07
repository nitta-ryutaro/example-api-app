<?php

namespace App\Http\Controllers\Api\Users\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function read(Request $request)
    {
        return response()->success();
    }

    public function create(Request $request)
    {
        return response()->success();
    }

    public function update(Request $request)
    {
        return response()->success();
    }

    public function delete(Request $request)
    {
        return response()->success();
    }
}