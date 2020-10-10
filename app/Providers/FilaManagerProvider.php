<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;

class FilaManagerProvider extends ServiceProvider
{
    static public function moveFile($file, $path){
        $name = $file->getClientOriginalName();
        $path = public_path($path);
        $path = self::backToFrontSlash($path);
        $file_name = pathinfo($name, PATHINFO_FILENAME) . date("-Y-m-d-H-i-s.")  . pathinfo($name, PATHINFO_EXTENSION);
        $result = $file->move($path, $file_name);
        if($result) return $file_name;
        return false;
    }

    static public function deleteFile($path){
        unlink(self::backToFrontSlash($path));
    }

    static public function backToFrontSlash($path){
        return str_replace('\\', '/', $path);
    }

    static public function imageUploadToSM($file_name){
        $src_ar = [];
        $src_ar[] = $file_name;
        if(Session::has('files')){
            $data = Session::get('files');
            foreach($data as $item){
                $src_ar[] = $item;
            }
        }
        Session::put('files', $src_ar);
    }

    //upgrade summernote content images with and 'sm-' to image name;
    static public function addContentImages($path, $data_content){
        $images_name = Session::get('files');
        $new_names = [];
        $path = public_path($path);
        $path = self::backToFrontSlash($path);
        foreach($images_name as $iname){
            if(file_exists($path . $iname)){
                if(strpos($iname, 'sm-') === false){
                    rename($path . $iname, $path . 'sm-' . $iname);
                    $new_names[] = 'sm-' . $iname;
                    $data_content = str_replace( $iname, 'sm-' . $iname, $data_content);

                }else{
                    $new_names[] = $iname;
                }   
            }
        }
        Session::forget('files');
        Session::put('files', $new_names);
        return $data_content;
    }


    static public function cleanUselessFiles($path){
        $files = scandir($path);
        foreach($files as $key => $file){
            if($key > 1 && strpos($file, 'sm-') === false){
                unlink($path . $file);
            }
        }
    }

    static public function removeFileFromSM(&$file_name){

        $file_name = explode('/', $file_name);
        $file_name = $file_name[count($file_name)-1];

        $data = Session::get('files');
        Session::forget('files');
        $key = array_search($file_name, $data);
        unset($data[$key]);
        if(!empty($data)){
            Session::put('files', $data);
        }

    }


    static public function setFilesSession($files){
        if(!$files) return false;
        Session::put('files', unserialize($files));
    }



    static public function margeContentImages($content, $content_images = []){
        if(Session::has('files')){
            $updated_content_images = [];
            $images_name = Session::get('files');
            if(!empty($content_images)){
                $images_name = array_merge($images_name, $content_images);
            }
            foreach($images_name as $image){
                if(strpos($content, $image)){
                    $updated_content_images[] = $image;
                }
            }
            Session::forget('files');
            return array_unique($updated_content_images);
        }
        return false;
    }
    
}
