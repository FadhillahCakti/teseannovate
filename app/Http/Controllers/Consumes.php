<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Response;
use App\Consume;

class Consumes extends Controller
{
	public function api()
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = "https://www.eannov8.com/career/case/getMajor.json";


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('consumes.api', compact('responseBody'));
    }

}