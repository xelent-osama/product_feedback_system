<?php

namespace App\Services;

use App\Events\FeedbackNotification;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FeedbackServices
{

    public function getAllFeedback()
    {

        $product_feedbacks = Feedback::with(['comments', 'votes']);
        if (isset($_GET['getAll']) && $_GET['getAll'] == '1') {
            $product_feedbacks = $product_feedbacks->orderBy('created_at', 'desc')->get();
            return $product_feedbacks;
        }


        if (isset($_GET['limit']) && $_GET['limit'] != '') {
            $limit = $_GET['limit'];
        } else {
            $limit = 10;
        }

        if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
            $product_feedbacks = $product_feedbacks->where('title', "LIKE", "%" . $_GET['searchParameter'] . "%");
        }

        return $product_feedbacks->orderBy('created_at', 'desc')->paginate($limit);

    }

    public function create(array $detail)
    {
        $user_id = Auth::user()->id;
        $detail['user_id'] = $user_id;
        $data = ['message' => 'New Feedback is added Successfully'];
        event(new FeedbackNotification($data));
        return Feedback::create($detail);

    }

}
