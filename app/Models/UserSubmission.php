<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class UserSubmission extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_RESOLVED = 'resolved';

    protected $table = 'user_submissions';
    protected $guarded = [false];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment',
        'message',
        'user_id',
        'status',
    ];

    /**
     * replySubmit function
     *
     * @param string $comment
     * @return UserSubmission
     */
    public function replySubmit(string $comment)
    {
        $this->sendCommentToMail($comment);
        $this->update([
            'comment' => $comment,
            'status' => self::STATUS_RESOLVED,
        ]);
        return $this;
    }

    /**
     * sendCommentToMail function
     *
     * @param string $comment
     * @return void
     */
    public function sendCommentToMail(string $comment)
    {
        $email = User::find(auth()->id())->email;
        Mail::raw($comment, fn ($mail) => $mail->to($email));
    }

}
