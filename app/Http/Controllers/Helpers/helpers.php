<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use App\Lib\fileManager;
use Illuminate\Http\Request;
use App\Notify\Notify;



function verificationCode($lenght)
{
    if ($lenght == 0) return 0;
    $min = pow(10, $lenght - 1);
    $max = (int) ($min - 1) . '9';
    return random_int($min, $max);
}



function fileUploader($file, $location, $size = null, $old = null, $thumb = null)
{
    $fileManager = new FileManager($file);
    $fileManager->path = $location;
    $fileManager->size = $size;
    $fileManager->old  = $old;
    $fileManager->thumb = $thumb;
    $fileManager->upload();
    return $fileManager->filename;
}

function fileManager()
{
    return new FileManager();
}

function getFilePath($key)
{
    return fileManager()->$key()->path;
}

function getFileSize($key)
{
    return fileManager()->$key()->size;
}
