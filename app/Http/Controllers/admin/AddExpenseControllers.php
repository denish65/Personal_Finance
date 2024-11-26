<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpenseModel;

class AddExpenseControllers extends Controller
{
    //

    public function index()
    {

        $session = Session('admin');
        $session['id'];
        
        return view('admin.Expense');
    }

    public function show(Request $request)
    {
        
        $Expense=  ExpenseModel::all();



        return response()->json([
            'status' => 'success',
            'Expense' => $Expense,
            'message' => 'Expense added successfully!',
        ], 200);
    }

    public function AddExpense(Request $request)
    {

       // Step 1: Validate the incoming request data
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        // 'date' => 'required|date',
        'payment_type' => 'required|string|max:255',
        'reference_image' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf|max:2048', // Validating file type and size
        'expense_note' => 'nullable|string|max:500',
        'location' => 'nullable|string|max:255',
        'item_name' => 'required|string|max:255',
        'payment_for' => 'required|string|max:255',
        'payment_status' => 'required|string|max:255',
    ]);

    // Step 2: Handle the file upload (if it exists)
    $imagePath = null;
    if ($request->hasFile('reference_image')) {
        $image = $request->file('reference_image');
        // $imagePath = $image->store('expenses', 'public'); // Store file in 'public/expenses' directory
        $customFolder = 'images/expenses'; 
        $imagePath = $image->storeAs($customFolder, 'expense_' . time() . '.' . $image->getClientOriginalExtension(), 'public');

    }

    // Step 3: Prepare data for saving into the database (if necessary)
    $expenseData = [
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'date' => $request->input('date'),
        'payment_type' => $request->input('payment_type'),
        'reference_image' => $imagePath, // Store the path of the uploaded image
        'expense_note' => $request->input('expense_note'),
        'location' => $request->input('location'),
        'item_name' => $request->input('item_name'),
        'payment_for' => $request->input('payment_for'),
        'payment_status' => $request->input('payment_status'),
    ];

    ExpenseModel::create($expenseData);
    // echo "<PRE>";print_r($expenseData);exit();
    // Step 4: Save the data to the database (assuming you have an Expense model)
    // Example: Expense::create($expenseData); // Uncomment if you have an Expense model
    
    // Optionally, you can send back a JSON response with success message
    return response()->json([
        'status' => 'success',
        'message' => 'Expense added successfully!',
    ], 200);
    }


    public function editExpense($id)
    {
        
        $Expense =  ExpenseModel::where("id",$id);



        return response()->json([
            'status' => 'success',
            'Expense' => $Expense,
            'message' => 'Expense added successfully!',
        ], 200);
    }



    public function deleteExpense($id)
    {
        
        $Expense =  ExpenseModel::where("id",$id)->delete();



        return response()->json([
            'status' => 'success',
            // 'Expense' => $Expense,
            'message' => 'Expense added successfully!',
        ], 200);
    }


}
