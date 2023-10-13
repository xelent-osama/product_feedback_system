<?php

namespace App\Http\Controllers\FeedbackSystem;
use App\Services\UserServices;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;


class UsersController extends Controller
{
    use ApiResponser;
    protected $userServices;

    public function __construct(UserServices $userServices) {
        $this->userServices = $userServices;
    }
    public function show($id){
        $user = $this->userServices->findUser($id);
        return $this->apiSuccessResponse(new UsersResource($user), 'Data Get Successfully!');
    }

    public function uploadImage(Request $request)
    {
        $url = $this->userServices->userAvater($request);
        return response()->json(['image_url' => $url]);
    }

    public function update(Request $request,$id)
    {
        $data = $request->all();
        $user = $this->userServices->update($data,$id);
        return $this->successResponse($user, 'User Update Successfully!');
    }

    public function getProduct(){
        $product = $this->userServices->getProduct();
        return response()->json($product);
    }

    public function checkLoginStatus()
    {
        return response()->json(['loggedIn' => auth()->check()]);
    }
}
