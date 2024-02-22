<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerAdminRequest;
use App\Http\Requests\UserSubmissionRequest;
use App\Models\UserSubmission;
use Illuminate\Http\Request;

class UserSubmissionsController extends Controller
{
    /**
     * getAllSubmissions function
     *
     * @param Request $request
     * @return void
     */
    public function getAllSubmissions(Request $request)
    {
        $query = UserSubmission::query();

        if(isset($request['status'])) {
            $query->where('status', '=', $request['status']);
        }

        if(isset($request['updated_at'])) {
            $query->orderBy('updated_at', $request['updated_at']);
        }

        $response = $query->get();

        return $response;
    }

    /**
     * update function
     *
     * @param AnswerAdminRequest $request
     * @return UserSubmission
     */
    public function updateSubmit(AnswerAdminRequest $request)
    {
        $userSubmission = UserSubmission::find($request->id);
        return $userSubmission->replySubmit($request->comment);
    }

    /**
     * setSubmisson function
     *
     * @param Request $request
     * @return void
     */
    public function setSubmisson(UserSubmissionRequest $request)
    {
        $userSubmission = UserSubmission::create(['message' => $request->message,'user_id'=>auth()->id()]);
        $userSubmission->save;
        return $userSubmission;
    }
}
