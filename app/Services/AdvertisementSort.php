<?php


namespace App\Services;




class AdvertisementSort
{
    protected $request;
public function __construct($request)
{
    $this->request = $request['Sort'];
}
public function sort(){

    switch ($this->request){
        case 'Cheaper':
         $sort['name'] = 'Price';
         $sort['param'] = 'asc';
            break;
        case 'Expensive':
            $sort['name'] = 'Price';
            $sort['param'] = 'desc';
            break;
        case 'MCheaper':
            $sort['name'] = 'MPrice';
            $sort['param'] = 'asc';
            break;
        case 'MExpensive':
            $sort['name'] = 'MPrice';
            $sort['param'] = 'desc';
            break;
        case 'Smaller':
            $sort['name'] = 'Area';
            $sort['param'] = 'asc';
            break;
        case 'Bigger':
            $sort['name'] = 'Area';
            $sort['param'] = 'desk';
            break;

    }
    return $sort;
}
}
