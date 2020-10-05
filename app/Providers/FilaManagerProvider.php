<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;

class FilaManagerProvider extends ServiceProvider
{
    static public function moveFile($file, $path){
        $name = $file->getClientOriginalName();
        $path = public_path($path);
        $file_name = pathinfo($name, PATHINFO_FILENAME) . date("-Y-m-d-H-i-s.")  . pathinfo($name, PATHINFO_EXTENSION);
        $result = $file->move($path, $file_name);
        if($result) return $file_name;
        return false;
    }

    static public function addContentImages($path, &$data_content, &$images_content){
        $images_name = Session::get('files');
        $path = public_path($path);
        foreach($images_name as $iname){
            rename($path . $iname, $path . 'sm-' . $iname);
            $images_content[] = 'sm-' . $iname;
            $data_content = str_replace( $iname, 'sm-' . $iname, $data_content);
        }
    }

    static public function cleanUselessFiles($path){
        $files = scandir($path);
        foreach($files as $key => $file){
            if($key > 1 && strpos($file, 'sm-') === false){
                unlink($path . $file);
            }
        }
    }
    
}
