<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\InventoryHistory;
use Session;
use Redirect;
use Auth;

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
            'purchase_price'=>'required',
            'sale_price'=>'required',
            'unit'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);

        // Saving the Inventory
        $inventory = New Inventory;
        $inventory->name = $request->input('name');
        $inventory->invoice_name = $request->input('invoice_name');
        $inventory->purchase_price = $request->input('purchase_price');
        $inventory->sale_price = $request->input('sale_price');
        $inventory->unit = $request->input('unit');
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
            $fileNametoStore = $inventory->id .time(). "." . $ext;
            $path = $fileNametoStore;
            // Storing Image
            $request->file('image')->storeAs('public/inventory',$fileNametoStore);
        }
        else {
            $path ='no_image.jpg';
        }

        $inventory->image = $path;
        $inventory->save();

        $history = New InventoryHistory;

        $history->inventory_id = $inventory->id;
        $history->name = $inventory->name;
        $history->invoice_name = $inventory->invoice_name;
        $history->purchase_price = $inventory->purchase_price;
        $history->sale_price = $inventory->sale_price;
        $history->unit = $inventory->unit;
        $history->description = $inventory->description;
        $history->in_hand = $inventory->in_hand;
        $history->image = $inventory->image;
        $history->user_id = Auth::user()->id;

        $history->save();

        Session::flash('success','Inventory Created');
        return Redirect::back();
    }
}
