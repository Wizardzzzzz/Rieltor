<?php


namespace App\Services;




class AdvertisementSort
{
    protected $advertisements;
public function __construct($request,$advertisements)
{

    $this->advertisements = $advertisements;
}
}
