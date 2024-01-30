<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetModel;
use Auth;

class BudgetController extends Controller
{
    public function budget_list(Request $request)
    {
        $data['getRecord'] = BudgetModel::getRecord();
        $year = $request->input('year', now()->year);
        $budgets = BudgetModel::where('year', $year)->get();
        $TotalBudget = $budgets->sum('amount'); // Calculate the total budget

        return view('bursar.inventory.index', $data, compact('budgets', 'year', 'TotalBudget'));
    }

    public function add()
    {
        $data['header_title'] = "Add New Year Budget";
        return view('bursar.inventory.addbudget', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'year' => 'required|integer',
        ]);

        $save = new BudgetModel;
        $save->category = $request->category;
        $save->amount = $request->amount;
        $save->year = $request->year;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('bursar/inventory/budget')->with('success', "Budget Succesfully created.");
    }



    public function edit($id)
    {
        $data['getRecord'] = BudgetModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Selected Admin";
            return view('bursar.inventory.editbudget', $data);
        }
        else
        {
            abort(404);
        }
        
    } 
    public function update($id, Request $request)
    {
       
        $save = BudgetModel::getSingle($id);
        $save->category = $request->category;
        $save->amount = $request->amount;
        $save->year = $request->year;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('bursar/inventory/budget')->with('success', "Budget Succesfully Modified.");
    } 

    public function delete($id)
    {
        $user = BudgetModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect()->back()->with('success', "Budget Succesfully deleted.");
    } 

}
