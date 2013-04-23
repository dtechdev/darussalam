<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItstUploadFile
 *
 * @author Brain
 */
class DTUploadedFile extends CUploadedFile
{
    //put your code here

    /**
     *  to create recursive folder
     *  here images will be uploaded
     */
    public static function creeatRecurSiveDirectories($array = array())
    {
        $basePath = Yii::app()->basePath;

        if (strstr($basePath, "protected"))
        {
            $basePath = realPath($basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR);
        }
        if (is_array($array))
        {
            $newPath = $basePath;
            $array = array_merge(array("uploads"), $array);

            foreach ($array as $folder)
            {
                $newPath.=DIRECTORY_SEPARATOR . $folder;
                if (!is_dir($newPath))
                {
                    mkdir($newPath, 0755);
                }
            }
        }
        else
        {
            return "error";
        }
        return $newPath . DIRECTORY_SEPARATOR;
    }

    /**
     * to delete to folder recursivly data
     * @param type $folder 
     *   folder path 
     * @param type $is_actual_path 
     *       means folder full path is set to false
     *       folder is fullpath
     *       other wise on temp folder
     */
    public static function deleteRecursively($folder, $is_actual_path = false)
    {
        $basePath = Yii::app()->basePath;

        if (strstr($basePath, "protected"))
        {
            $basePath = realPath($basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR);
        }
        $deleted_dir = $basePath . DIRECTORY_SEPARATOR . "temp" . DIRECTORY_SEPARATOR . $folder;

        $deleted_dir = ($is_actual_path == true) ? $folder : $deleted_dir;

        if (is_dir($deleted_dir) && $handle = opendir($deleted_dir))
        {
           

            /* This is the correct way to loop over the directory. */
            while (($file = readdir($handle)) !== false)
            {

                if ($file != "." || $file != "..")
                {
                  
                    /**
                     * In case of direcotries 
                     * These line will done
                     * 
                     */
                    if (filetype($deleted_dir . DIRECTORY_SEPARATOR . $file) == "dir")
                    {
                        $dirData = scandir($deleted_dir . DIRECTORY_SEPARATOR . $file);
                     
                        if (!empty($dirData))
                        {
                            
                            self::deleteRecursively($folder . DIRECTORY_SEPARATOR . $file);
                            if (count($dirData) == 2 && in_array(".", $dirData) && in_array("..", $dirData))
                            {
                                rmdir($deleted_dir . DIRECTORY_SEPARATOR . $file);
                                self::deleteRecursively($deleted_dir . DIRECTORY_SEPARATOR . $file);
                            }
                        }
                    }
                    else
                    {
                        unlink($deleted_dir . DIRECTORY_SEPARATOR . $file);
                    }
                }
            }


            closedir($handle);
        }
    }

    /**
     * 
     * @param type $file 
     * to detled file on particulr locaton
     */
    public static function deleteExistingFile($file)
    {
        if (is_file($file))
        {
            unlink($file);
            return true;
        }
        else
        {
            return false;
        }
    }

}

?>
