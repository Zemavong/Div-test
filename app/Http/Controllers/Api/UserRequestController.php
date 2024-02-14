<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerAdminRequest;
use App\Models\UserRequest;
use Illuminate\Http\Request;
class UserRequestController extends Controller
{

    public function show(Request $request)
    {
        return UserRequest::find($request->id);
    }

    public function update(AnswerAdminRequest $request)
    {
        $userRequest = UserRequest::find($request->id);
        return $userRequest->replyRequest($request->id, $request->validated());
    }

    public function sendRequest(Request $request)
    {
        return 'hi';
    }
}
