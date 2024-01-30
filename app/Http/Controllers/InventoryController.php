<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Str;
use Carbon\Carbon;

class InventoryController extends Controller
{
    public function list(Request $request)
    {
        $data['TotalInventory'] = InventoryModel::count();
        $query = InventoryModel::getRecord($request);
    
        // Filter by name
        if ($request->has('name')) {
            $query = $query->where('inventory.name', 'like', '%' . $request->name . '%');
        }
    
        // Calculate total amount spent on each item
        $query->each(function ($item) {
            $item->total_amount_spent = $item->quantity * $item->unit_price;
        });
    
        // Calculate total amount spent on all assets
        $data['totalAmountSpentOnAllAssets'] = $query->sum('total_amount_spent');
    
        // Move the orderBy clause here only if $query is a query builder
        if ($query instanceof \Illuminate\Database\Eloquent\Builder) {
            $query = $query->orderBy('inventory.id', 'desc');
        }
    
        $data['getRecord'] = $query->paginate(20); // Paginate the query results
    
        $data['header_title'] = "Procurement List";
    
        return view('bursar.inventory.list', $data);
    }
    


    
    public function add()
    {
        $data['header_title'] = "Add New inventory";
        return view('bursar.inventory.add', $data);
    } 
    public function insert(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
        ]);
        $user = new InventoryModel;
        $user->name = trim($request->name);
        $user->description = trim($request->description);
        $user->quantity = trim($request->quantity);
        $user->unit_price = trim($request->unit_price);
        if(!empty($request->file('item_image')))
        {
            $ext = $request->file('item_image')->getClientOriginalExtension();
            $file = $request->file('item_image');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/inventory/', $filename);

            $user->item_image = $filename;
            
        }
        $user->created_by = Auth::user()->id;
        $user->save();

        return redirect('bursar/inventory/procurement')->with('success', "Item Succesfully created.");
    } 
    
    public function edit($id)
    {
        $data['getRecord'] = InventoryModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Selected Admin";
            return view('bursar.inventory.edit', $data);
        }
        else
        {
            abort(404);
        }
        
    } 
    public function update($id, Request $request)
    {
       
        $user = InventoryModel::getSingle($id);
        $user->name = trim($request->name);
        $user->description = trim($request->description);
        $user->quantity = trim($request->quantity);
        $user->unit_price = trim($request->unit_price);
        if(!empty($request->file('item_image')))
        {
            $ext = $request->file('item_image')->getClientOriginalExtension();
            $file = $request->file('item_image');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/inventory/', $filename);

            $user->item_image = $filename;
            
        }
        $user->created_by = Auth::user()->id;
        $user->save();

        return redirect('bursar/inventory/procurement')->with('success', "inventory itm Succesfully updated.");
    } 

    public function delete($id)
    {
        $user = InventoryModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect()->back()->with('success', "inventory item Succesfully deleted.");
    } 
}
