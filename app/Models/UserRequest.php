<?php

namespace App\Models;

use App\Http\Requests\AnswerAdminRequest;
use App\Mail\RequestMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class UserRequest extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_RESOLVED = 'resolved';

    protected $fillable = [
        'comment'
    ];


    public function replyRequest(int $userRequestId, array $attributes)
    {
        $userRequest = UserRequest::find($userRequestId);
        $this->sendCommentToMail($userRequest->user_id, $userRequest->comment);
        $userRequest->status = self::STATUS_RESOLVED;
        $userRequest->update($attributes);
        return $userRequest;
    }

    public function sendCommentToMail(int $userId, string $comment)
    {
        $email = User::find($userId)->email;
        Mail::raw($comment, fn ($mail) => $mail->to($email));
    }

}
