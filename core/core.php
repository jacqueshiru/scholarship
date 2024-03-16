<?php

require "../vendor/autoload.php";

/**
 * Edugrant core backend
 * Written by Jacqueline Wanjiru Macharia 
 * 2024
*/

interface MediaHandler
{
    public static function Upload ( $file, string $folder="", $tmp="",array $formats=[]);
    public static function Delete ( string $file);
}

final class FileHandler implements MediaHandler
{

    public function __construct()
    {

    }
    public static function Upload ( $file, string $folder="", $tmp="",array $formats=[])
    {
            
        $filename = basename($file);
        $path = $folder.$filename;
        $extension = pathinfo($path,PATHINFO_EXTENSION);

        if (gettype($formats) == "array")
        {
            if (in_array($extension,$formats))
            {
                if (move_uploaded_file($tmp,$path))
                {
                    return true;
                }
                else
                {
                    
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public static function Delete ( string $file) : bool
    {
        if (file_exists($file))
        {
            if (unlink($file))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}


?>