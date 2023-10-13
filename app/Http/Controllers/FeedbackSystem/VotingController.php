<?php

namespace App\Http\Controllers\FeedbackSystem;
use App\Events\FeedbackNotification;
use App\Models\Voting;
use App\Services\UserServices;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use Illuminate\Support\Facades\Auth;


class VotingController extends Controller
{
    use ApiResponser;


    public function addVoting(Request $request)
    {
        $user_id = Auth::user()->id;
        $record =   Voting::where('user_id', Auth::user()->id)->where('feedback_id', $request['feedback_id'])->first();

        if ($record == null){
            $data = ['message' => 'new Vote added Successfully'];
            event(new FeedbackNotification($data));
            if ($request['val'] == 'like') {

                $voting = new Voting();
                $voting->user_id = $user_id;
                $voting->feedback_id = $request['feedback_id'];
                $voting->like = 1;
                $voting->dislike = 0;
                $voting->save();
                return $this->successResponse($voting, ' comment save Successfully!');
            }
            if ($request['val'] == 'dislike') {
                $voting = new Voting();
                $voting->user_id = $user_id;
                $voting->feedback_id = $request['feedback_id'];
                $voting->like = 0;
                $voting->dislike = 1;
                $voting->save();
                return $this->successResponse($voting, ' comment save Successfully!');


            }
        }else{
            return $this->errorResponse('', ' vote save Successfully!');
        }







    }
}
