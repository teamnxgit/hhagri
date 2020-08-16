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
        $keyword = $request->input('keyword');
        $data['keyword']=$keyword;
        if($keyword==null||$keyword==''){
            $data['farmers']=Farmer::all();
        }
        else {
            $data['farmers']=Farmer::where('farmer_code','like','%'.$keyword.'%')->orWhere('full_name','like','%'.$keyword.'%')->orWhere('nic','like','%'.$keyword.'%')->orderBy('created_at','desc')->paginate(100);
        }
        return view('cms.farmer.farmers')->with($data);
    }

    public function new(){
        return view('cms.farmer.new');
    }

    public function farmer($farmer_code){
        $farmer = Farmer::findOrFail($farmer_code);
        $data['farmer']=$farmer;
        return view('cms.farmer.farmer')->with($data);
    }

    public function add(Request $request){
        $user = Auth::user();
        $request->validate([
            'farmer_code'=>'required',
            'title'=>'required',
            'gender'=>'required',
            'short_name'=>'required',
            'nic'=>'required',
        ]);

        $farmer = New Farmer;
        $farmer->farmer_code = $request->input('farmer_code');
        $farmer->title = $request->input('title');
        $farmer->full_name = $request->input('full_name');
        $farmer->gender = $request->input('gender');
        $farmer->short_name = $request->input('short_name');
        $farmer->nic = $request->input('nic');
        $farmer->house_no = $request->input('house_no');
        $farmer->street = $request->input('street');
        $farmer->town = $request->input('town');
        $farmer->district = $request->input('district');
        $farmer->phone = $request->input('phone');
        $farmer->whatsapp = $request->input('whatsapp');
        $farmer->created_by = $user->id;
        $farmer->save();

        Session::flash('success','Grower added to Database');
        return Redirect::back();
    }

    public function rem(Request $request){
        $request->validate([
            'farmer_code'=>'required'
        ]);

        $farmer = Farmer::findOrFail($request->input('farmer_code'));
        $farmer->delete();

        Session::flash('success','Grower removed from Database');
        return Redirect('/farmers');
    }

    public function update(Request $request){
        $user = Auth::user();

        $request->validate([
            'farmer_code'=>'required'
        ]);

        $farmer = Farmer::findOrFail($request->input('farmer_code'));

        $farmer->title=$request->input('title');
        $farmer->full_name=$request->input('full_name');
        $farmer->short_name=$request->input('short_name');
        $farmer->gender=$request->input('gender');
        $farmer->nic=$request->input('nic');
        $farmer->house_no=$request->input('house_no');
        $farmer->street=$request->input('street');
        $farmer->town=$request->input('town');
        $farmer->district=$request->input('district');
        $farmer->phone=$request->input('phone');
        $farmer->whatsapp=$request->input('whatsapp');
        $farmer->updated_by=$user->id;
        $farmer->save();

        Session::flash('success','Grower details updated');
        return Redirect::back();
    }
}
