<?php

namespace App\Http\Controllers\Api\Users\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function read(Request $request)
    {
        $response = [];

        $data = config('userData');

        foreach ($data as $key => $value) {
            if ($value['id'] == $request->id) $response = $value;
        }

        if (empty($response)) return response()->error('検索結果 : 0件');

        return response()->success($response);
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
