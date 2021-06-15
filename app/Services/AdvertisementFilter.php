<?php


namespace App\Services;

use Illuminate\Http\Request;


class AdvertisementFilter
{
    protected $advertisements, $request;

    public function __construct(Request $request,$advertisements)
    {

        $this->advertisements = $advertisements;
        $this->request = $request->all();
    }

    private function parameters()
    {
        return $this->request;
    }

    private function TypeAdvertise($value)
    {
        $this->advertisements = $this->advertisements->where('TypeAdvertise', 'like', "%$value%");
    }

    private function TypeHouse($value)
    {
        $this->advertisements = $this->advertisements->where('TypeHouse', 'like', "%$value%");
    }

    private function Place($value)
    {
        $this->advertisements = $this->advertisements->where('Place', 'like', "%$value%");
    }

    private function Price($value)
    {
        $min = 0;
        switch ($value) {

            case "До 25000$":
                $max = 25000;
                break;
            case "Від 25000$ до 50000$":
                $min = 25000;
                $max = 50000;
                break;
            case "Від 50000$ до 75000$":
                $min = 50000;
                $max = 75000;
                break;
            case "Від 75000$ до 100000$":
                $min = 75000;
                $max = 100000;
                break;
        }
        $this->advertisements = $this->advertisements->where('Price', '>=', "$min");
        $this->advertisements = $this->advertisements->where('Price', '<=', "$max");
    }


    private function SuperficialityFrom($value)
    {

        if ($value == null) {
            $value = 1;
        }
        $this->advertisements = $this->advertisements->where('Superficiality', '>=', "$value");

    }

    private function SuperficialityTo($value)
    {
        $this->advertisements = $this->advertisements->where('Superficiality', '<=', "$value");
    }
    private function Area ($value){
        $min = 0;
        $max = 999;
        switch ($value) {

            case "До 50":
                $max = 50;
                break;
            case "Від 50 до 75":
                $min = 50;
                $max = 75;
                break;
            case "Від 75 до 100":
                $min = 75;
                $max = 100;
                break;
            case "Від 100":
                $min = 100;
                break;
        }

        $this->advertisements = $this->advertisements->where('Area', '>=', "$min");
        $this->advertisements = $this->advertisements->where('Area', '<=', "$max");
    }
    private function Address($value){
        $this->advertisements = $this->advertisements->where('Address', 'like', "%$value%");
    }
    private function RoomNum($value){
        $this->advertisements = $this->advertisements->where('RoomNum', '=', "$value");
    }
    public function filter()
    {
        foreach ($this->parameters() as $filter => $value) {
            if (method_exists($this, $filter)&&$value!=null) {
                $this->$filter($value);
            }
        }

        return $this->advertisements;
    }
}
