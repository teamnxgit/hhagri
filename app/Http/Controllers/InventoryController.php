<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use Session;
use Redirect;

class InventoryController extends Controller
{
    public function items(){
        $data['items'] = Inventory::orderBy('id','desc')->get();
        return view('cms.inventory.items')->with($data);
    }

    public function new(){
        return view('cms.inventory.new');
    }

    public function add(Request $request){
        $request->validate([
            'name'=>'required|unique:inventories',
            'price'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);

        // Saving the Inventory
        $inventory = New Inventory;
        $inventory->name = $request->input('name');
        $inventory->price = $request->input('price');
        $inventory->description = $request->input('description');
        $inventory->in_hand = 0;
        $inventory->save();

        // Handle File Upload
        if ($request->hasFile('image')) {
            // Get File Name with extention
            $fileNameWithExt=$request->file('image')->getClientOriginalName();
            // Get extension
            $ext= $request->file('image')->getClientOriginalExtension();
            // File Name to Store Image
            $fileNametoStore = $inventory->id . "." . $ext;
            $path = $fileNametoStore;
            // Storing Image
            $request->file('image')->storeAs('public/inventory',$fileNametoStore);
        }
        else {
            $path ='no_image.jpg';
        }

        $inventory->image = $path;
        $inventory->save();

        Session::flash('success','Inventory Created');
        return Redirect::back();
    }
}
