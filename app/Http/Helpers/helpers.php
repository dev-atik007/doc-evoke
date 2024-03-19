<?php

use App\Lib\fileManager;

use Illuminate\Support\Facades\Cache;
use App\Models\GeneralSetting;
use Carbon\Carbon;


function verificationCode($lenght)
{
    if ($lenght == 0) return 0;
    $min = pow(10, $lenght - 1);
    $max = (int) ($min - 1) . '9';
    return random_int($min, $max);
}

function keyToTitle($text)
{
    return ucfirst(preg_replace("/^A-Za-Z0-9/", ' ', $text));
}

function showDateTime($date, $format = 'Y-m-d h:i A')
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}

function diffForHumans($date)
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->diffForHumans();
}


// ??????
function gs()
{
    $general = Cache::get('GeneralSetting');
    if (!$general) {
        $general = GeneralSetting::first();
        Cache::put('GeneralSetting', $general);
    }
    return $general;
}

function passwordGen($lenght = 8)
{
    $characters = 'AbCdE1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i<$lenght; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
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

function getPaginate($paginate = 20)
{
    return $paginate;
}
function paginateLinks($data)
{
    return $data->appends(request()->all())->links();
}


function getImage($image, $size = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    if ($size) {
        // return route('placeholder.image', $size);
    }
    return asset('assets/images/default.png');
}

function notify()
{
    $general = gs();
    $globalShortCodes = [
        'site_name'         => $general->site_name,
        'site_currency'     => $general->cur_text,
        'currency_symbol'   => $general->cur_sym,
    ];
}
