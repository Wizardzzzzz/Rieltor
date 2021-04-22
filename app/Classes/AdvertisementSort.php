<?php


namespace App\Classes;




class AdvertisementSort
{
    protected $advertisements;
public function __construct($request,$advertisements)
{

    $this->advertisements = $advertisements;
}
}
