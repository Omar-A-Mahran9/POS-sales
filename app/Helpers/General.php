<?php

use Illuminate\Support\Facades\Config;

function uploadeImage($folder, $image)
{
    $extention=strtolower($image->extension());
    $filename=time().rand(100,999).'.'.$extention;
    $image->getClientOriginalName=$filename;
    $image->move($folder,$filename);
    return $filename;
    
}
