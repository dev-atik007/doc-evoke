<?php

namespace App\Lib;

use App\Constants\FileInfo;
use Intervention\Image\Facades\Image;

class fileManager
{
    /**
     * The path where will be uploaded
     *
     * @var string
     */
    public $path;

    /**
     * The size, if the file is image
     *
     * @var string
     */
    public $size;

    /**
     * Old filename, which will be removed
     *
     * @var string
     */
    public $old;

    /**
     * Thumbnail version size, if required
     * and if the file is image
     *
     * @var string
     */
    public $thumb;

    /**
     * Current filename, which is uploading
     *
     * @var string
     */
    public $filename;

    /**
     * File upload process
     *
     * @return void
     */
    public function upload()
    {
        //create the directory if doesn't exists
        $path = $this->makeDirectory();
        if (!$path) throw new \Exception('File Could not been created.');

        //remove the old file if exist
        if ($this->old) {
            $this->removeFile();
        }

        //get the filename
        $filename = $this->getFileName();
        $this->filename = $filename;
    }





    /**
     * Make directory doesn't exists
     * Developer can also call this method statically
     *
     * @param $location
     * @return string
     */
    public function makeDirectory($location = null)
    {
        if (!$location) $location = $this->path;
        if (file_exists($location)) return true;
        return mkdir($location, 0755, true);
    }

    /**
     * Remove the file if exists
     * Developer can also call this method statically
     *
     * @param $path
     * @return void
     */
    public function removeFile($path = null)
    {
        if (!$path) $path = $this->path . '/' . $this->old;

        file_exists($path) && is_file($path) ? @unlink($path) : false;

        if ($this->thumb) {
            if (!$path) $path = $this->path . '/thumb_' . $this->old;
            file_exists($path) && is_file($path) ? @unlink($path) : false;
        }
    }

    /**
     * Generating the filename which is uploading
     *
     * @return string
     */
    protected function getFileName()
    {
        return uniqid() . time() . '.' . $this->file->getClientOriginalExtension();
    }
}
