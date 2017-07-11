<?php

namespace App\Helpers;
use File;

class Upload
{

    /**
     * Método que salva arquivos e retorna seu camninho
     * @param $file
     * @param $name
     * @param $directory
     * @return string
     */
    public static function save($file, $name, $directory) : String
    {
        if($file) {
            $dr = DIRECTORY_SEPARATOR;
            $name = str_replace(' ', '', $name);
            $name = bcrypt($name).time();
            $extension = $file->getClientOriginalExtension();
            $filename =  'uploads' . $dr . 'imgs' . $dr . $directory . $dr . $name .'.'.$extension;
            File::move($file, public_path($filename));
            return $filename;
        }
    }
}