<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{



public function insertform(Request $r){


		$data = array();
		$data['name'] = $r->name;
		$data['email'] = $r->email;
		$postimage       = $r->file('image');
		if ($postimage) {

			$immagename = time().'.'.$r->image->extension();
			$path = $r->image->move(public_path('image'),$immagename);
			$data['image'] = $immagename;


			$insert=DB::table('testforms')
			->insert($data);

		}else{
			$insert=DB::table('testforms')
			->insert($data);

		}



	}



	public function showdata(){

		$data = DB::table("testforms")->orderBy('id','DESC')->get();
		return view("showdata",compact('data'));
	}
}
