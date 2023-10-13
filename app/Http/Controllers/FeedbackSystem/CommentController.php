<?php

namespace App\Http\Controllers\FeedbackSystem;

use App\Events\FeedbackNotification;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Voting;
use App\Services\UserServices;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    use ApiResponser;


    public function store(Request $request)
    {

        $user_id = Auth::user()->id;

        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->feedback_id = $request['feedback_id'];
        $comment->content = $request['comment'];

        $data = ['message' => 'New Comment added Successfully'];
        event(new FeedbackNotification($data));

        $comment->save();


        return $this->successResponse($comment, ' comment save Successfully!');
    }





}
