<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public $urlBase = 'aHR0cHM6Ly9jb2xsZWN0b3JjYXJmZWVkLmNvbS9kYXRhL3NlcnZlcl9wcm9jZXNzaW5nLnBocA==';

    public $columns = [
        'price',
        'year',
        'title',
        'mileage',
        'city',
        'state',
        'timestamp',
        'make',
        'model',
        'image',
        'url',
        'latitude',
        'longitude',
        'source',
        'int',
        'status'
    ];

    public function columnDetails() {
        $columnString = base64_decode($this->urlBase) . '?draw=1&';
        foreach ($this->columns as $key => $value) {
           $columnString .= "columns[{$key}][data]=0&columns[{$key}][name]=&columns[{$key}][searchable]=true&columns[{$key}][orderable]=true&columns[{$key}][search][value]=&columns[{$key}][search][regex]=false&";
        }
        return $columnString;
    }

    public $restOfString = '&order[0][column]=6&order[0][dir]=desc&length=15&search[value]=&search[regex]=false&sources[]=Bring A Trailer&sources[]=Cars And Bids&sources[]=Ebay&sources[]=Facebook';

    public function url() {
        $query = $this->validateQuery();
        $url = $this->columnDetails() . $this->restOfString;
        $url .= "&make={$query['make']}";
        $url .= "&model={$query['model']}";
        $url .= "&start={$query['start']}";
        $url .= "&mileagemin={$query['mileagemin']}&mileagemax={$query['mileagemax']}&pricemin={$query['pricemin']}&pricemax={$query['pricemax']}&yearmin={$query['yearmin']}&yearmax={$query['yearmax']}&zipcode={$query['zip']}&searchradius={$query['distance']}";
        return $url;
    }

    public function getCars(Request $request) {
        
        $response = Http::get($this->url());
        $json = json_decode($response);
        $data = $json->data;

        $returnArray = [];
        foreach ($data as $i => $array) {
            $obj = new \StdClass();
            foreach ($array as $key => $value) {
                $col = $this->columns[$key];
                $obj->$col = $value;
            }
            array_push($returnArray, $obj);
        }
        return $returnArray;
    }

       
    public function validateQuery()
    {
        return request()->validate([
            'make' => '',
            'model' => '',
            'start' => '',
            'zip' => '',
            'distance' => '',
            'mileagemin' => '',
            'mileagemax' => '',
            'yearmin' => '',
            'yearmax' => '',
            'pricemin' => '',
            'pricemax' => ''
        ]);
    }
}
