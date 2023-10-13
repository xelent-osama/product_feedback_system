<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Trait UploadAble
 * @package App\Traits
 */
trait ImageUploadAble
{
    /**
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
public function imageBase64($uploadedFile,$total = 1, $folder = 'uploads/', $disk = 'public', $filename = null) // Taking input image as parameter
    {
        $img = $uploadedFile;
        $img_len = explode("/image_split/",$img);
        $file_name = "";
        for($i=0; $i< count($img_len)-1 ; $i++){
            if($img_len[$i] != ''){
                $new = explode(",",$img_len[$i], 2);
                $extenstions = explode("/",$new[0]);
                $extenstion = explode(";",$extenstions[1]);
                $img = $new[1];
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                // $id = Auth::id();
                $file = 'image'.rand(0,1000).'.'.$extenstion[0];
                if (!file_exists('images')) {
                    mkdir('images', 0777, true);
                }
                if (!file_exists('images/'.$folder)) {
                    mkdir('images/'.$folder, 0777, true);
                }
                // if (!file_exists('images/'.$folder.'/'.$id)) {
                //     mkdir('images/'.$folder.'/'.$id, 0777, true);
                // }
                $success = file_put_contents('images/'.$folder.'/'.$file, $data);
                // $success = file_put_contents('images/'.$folder.'/'.$id.'/'.$file, $data);
                $file_name .= $file .',';
            }
        }
        return $file_name;
    }
}