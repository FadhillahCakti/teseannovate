<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Class_;
use Response;

class Clas extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
    	$class = Class_::latest()->paginate(10);
    	if(count($class) > 0){ //mengecek apakah data kosong atau tidak
			$res['message'] = "Success!";
			$res['values'] = $class;
			return response($res);
		}
		else{
			$res['message'] = "Empty!";
			return response($res);
		}
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
			'title' => 'required',
			'major' => 'required',
    	]);
 
		$class = new Class_;
		$class->title = $request->title;
		$class->major = $request->major;

		if($class->save()){
			$res['message'] = "Success!";
			$res['value'] = "$class";
			return response($res);
		}
	}

	public function update(Request $request, $id)
	{
		$class = Class_::where('id',$id)->first();
		$class->title = $request->title;
		$class->major = $request->major;

		if($class->save()){
			$class['message'] = "Success!";
			$res['value'] = "$class";
			return response($res);
		}
		else{
			$res['message'] = "Failed!";
			return response($res);
		}
	}

	public function hapus($id)
	{
        $class = Class_::where('id', $id)->first();
		if($class->delete()){
			$res['message'] = "Success!";
			$res['value'] = "$class";
			return response($res);
		}
		else{
			$res['message'] = "Failed!";
			return response($res);
		}
	}

	public function consume(Request $request){
	$client = new Client(); //GuzzleHttp\Client
	$url = 'http://dummy.restapiexample.com/api/v1/';
	$api_url = $url . 'employees' ;
	$params = [
	//If you have any Params Pass here
	];
	
	$headers = ""; //Ususall pass API Tokens or AUTH Credentials
	
	$response = $client->request ('GET', $api_url, [
	//'debug' => config('app.env') !== 'production',
	'json' => $params,
	'headers' => $headers
	]);
	
	return json_decode ((string)$response->getBody ());
	}
	
}