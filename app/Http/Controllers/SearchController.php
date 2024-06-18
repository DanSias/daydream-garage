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

    public $detailString = '&order[0][column]=6&order[0][dir]=desc&length=15&search[value]=&search[regex]=false&sources[]=Bring A Trailer&sources[]=Cars And Bids&sources[]=Ebay&sources[]=Facebook';

    // Format request URL based on expected values
    public function columnDetails() {
        $columnString = base64_decode($this->urlBase) . '?draw=1&';
        foreach ($this->columns as $key => $value) {
           $columnString .= "columns[{$key}][data]=0&columns[{$key}][name]=&columns[{$key}][searchable]=true&columns[{$key}][orderable]=true&columns[{$key}][search][value]=&columns[{$key}][search][regex]=false&";
        }
        return $columnString;
    }

    // Build Request URL based on user filter
    public function url() {
        $query = $this->validateQuery();

        $userString = '';
        foreach ($query as $key => $value) {
            $userString .= "&{$key}={$value}";
        }

        $url = $this->columnDetails() . $this->detailString;
        $url .= $userString;
        return $url;
    }

    // Query and format car details
    public function getCars(Request $request) {
        $response = Http::get($this->url());
        $json = json_decode($response);
        $data = $json->data;

        // Add Keys
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

    // Validate search request   
    public function validateQuery()
    {
        return request()->validate([
            'make' => '',
            'model' => '',
            'start' => '',
            'zipcode' => '',
            'searchradius' => '',
            'mileagemin' => '',
            'mileagemax' => '',
            'yearmin' => '',
            'yearmax' => '',
            'pricemin' => '',
            'pricemax' => ''
        ]);
    }
}
