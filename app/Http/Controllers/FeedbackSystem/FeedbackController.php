<?php

namespace App\Http\Controllers\FeedbackSystem;

use App\Events\FeedbackNotification;
use App\Models\Feedback;
use App\Services\FeedbackServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Http\Resources\FeedbackResource;
use App\Traits\ApiResponser;
use App\Events;
use App\Events\FeedbackCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class FeedbackController extends Controller
{
    use ApiResponser;

    protected $feedbackServices;

    public function __construct(FeedbackServices $feedbackServices)
    {
        $this->feedbackServices = $feedbackServices;
    }

    public function index()
    {

        $product_feedbacks = $this->feedbackServices->getAllFeedback();

        return $this->successResponse(FeedbackResource::collection($product_feedbacks), 'Data Get Successfully!');
    }

    public function store(FeedbackRequest $request)
    {
        $data = $this->feedbackServices->create($request->all());

        $email = Auth::user()->email;

        Event::dispatch(new FeedbackCreated($email));
        event(new FeedbackNotification());
        return $this->apiSuccessResponse(new FeedbackResource($data), 'Feedback Save Successfully!');
    }


}
