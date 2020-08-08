<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmer;
use Auth;
use Session;
use Redirect;

class FarmerController extends Controller
{
    public function index(Request $request){
        $data['farmers']=Farmer::all();
        return view('cms.farmer.farmers')->with($data);
    }

    public function new(){
        return view('cms.farmer.new');
    }

    public function add(Request $request){
        $user = Auth::user();
        $request->validate([
            'farmer_code'=>'required',
            'title'=>'required',
            'gender'=>'required',
            'short_name'=>'required',
            'nic'=>'required',
            'address'=>'required',
        ]);

        $farmer = New Farmer;
        $farmer->farmer_code = $request->input('farmer_code');
        $farmer->title = $request->input('title');
        $farmer->full_name = $request->input('full_name');
        $farmer->gender = $request->input('gender');
        $farmer->short_name = $request->input('short_name');
        $farmer->nic = $request->input('nic');
        $farmer->address = $request->input('address');
        $farmer->phone = $request->input('phone');
        $farmer->whatsapp = $request->input('whatsapp');
        $farmer->created_by = $user->id;
        $farmer->save();

        Session::flash('success','Farmer added to Database');
        Redirect::back();
    }

    public function rem(Request $request){
        $request->validate([
            'farmer_code'=>'required'
        ]);

        $farmer = Farmer::findOrFail($request->input('farmer_code'));
        $farmer->delete();

        Session::flash('success','Farmer removed from Database');
        Redirect('/farmers');
    }
}
