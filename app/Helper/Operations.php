<?php
/**
 * Created by PhpStorm.
 * User: mritunjay
 * Date: 3/5/19
 * Time: 11:36 AM
 */

namespace App\Helper;


use Slim\Http\UploadedFile;

class Operations
{

    public function moveUploadedFile($directory, $key)
    {
        $file_info = pathinfo($_FILES[$key]['name']);

        $extension = $file_info['extension'];
        $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
        $file_name = sprintf('%s.%0.8s', $basename, $extension);

        $file_path =  $_SERVER['DOCUMENT_ROOT'].'/storage-folder/assets/'.$directory.DIRECTORY_SEPARATOR.$file_name;

        if(move_uploaded_file($_FILES[$key]['tmp_name'],$file_path)){

            return array('path'=>$file_path, 'name'=> $file_name);
        }
        else{

            return false;
        }
    }

}
