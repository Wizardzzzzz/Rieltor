<?php


namespace App\Classes;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use function React\Promise\all;

class AdvertisementFilter
{
    protected $advertisements, $request;

    public function __construct(Request $request)
    {
        $this->advertisements = new Advertisement();


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
                $min=25000;
                $max=50000;
                break;
            case "Від 50000$ до 75000$":
                $min=50000;
                $max=75000;
                break;
            case "Від 75000$ до 100000$":
                $min=75000;
                $max=100000;
                break;
        }
        $this->advertisements = $this->advertisements->where('Price', '>=', "$min");
        $this->advertisements = $this->advertisements->where('Price', '<=', "$max");
    }

    private function Superficiality($from, $to)
    {
        if ($to != null) {
            if ($from == null) {
                $from = 1;
            }
            $this->advertisements = $this->advertisements->where('Superficiality', '>=', "$from");
            $this->advertisements = $this->advertisements->where('Superficiality', '<=', "$to");
        }
    }

    public function filter()
    {
        foreach ($this->parameters() as $filter => $value) {
            if (method_exists($this, $filter) && $filter != 'SuperficialityFrom' && $filter != 'SuperficialityTo') {
                $this->$filter($value);
            } else {
                $this->Superficiality($this->parameters()['SuperficialityFrom'], $this->parameters()['SuperficialityTo']);
            }
        }

        return $this->advertisements;
    }
}
