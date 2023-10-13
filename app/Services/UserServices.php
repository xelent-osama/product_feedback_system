<?php

namespace App\Services;

use App\Events\FeedbackNotification;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserServices
{

    public function getProduct()
    {
        $product = Product::find(1);
        event(new FeedbackNotification());
        return $product;
    }

    public function userAvater($request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $originalName = $file->getClientOriginalName();
            $fileName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME), '_') . '_' . time() . '.' . $extension;
            $path = $file->move(public_path('uploads'), $fileName);
        }

        $url = 'uploads/' . $fileName;

        return $url;
    }

    public function update($request, $id)
    {

        $user = User::findOrFail($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->image = $request['image'];
        $user->password = Hash::make($request['password']);
        $user->save();

        return $user;
    }

    public function findUser($id)
    {
        return User::findOrFail($id);
    }


}
