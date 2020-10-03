<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
}
