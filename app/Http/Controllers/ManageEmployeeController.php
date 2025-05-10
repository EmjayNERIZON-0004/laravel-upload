<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\employee;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Log; // Make sure this is at the top
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ManageEmployeeController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp = DB::table('employees')
        ->join('user_accounts', 'employees.id', '=', 'user_accounts.useraccount_id')
        ->select('employees.*', 'user_accounts.*') // Select all fields from both tables
        ->paginate(4);

return view('EmployeeList')->with('employees', $emp);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addEmployee');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            try {
                $validatedData =  $request->validate([
                    'employee_Id' => 'required|min:5|max:50|unique:employees,employee_Id',
                    'fname' => 'required|string|min:2|max:50',
                    'mname' => 'nullable|string|min:2|max:50',
                    'lname' => 'required|string|min:2|max:50',
                    'address' => 'required|string|min:5|max:255',
                    'contact' => 'required|string|max:11|min:11|regex:/^[0-9+\- ]+$/',
                    'email' => 'required|email|unique:employees,email',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
                ], [
                    'fname.required' => 'The First Name is required.',
                    'fname.min' => 'The First Name cannot be less than 2 letters.',
                    'lname.required' => 'The Last Name is required.',
                    'contact.required' => 'The Contact Number is required.',
                    'address.required' => 'The Address is required.',
                    'email.required' => 'The Email is required.',
                    'email.email' => 'The Email must be valid.'
                ]);
        
                // Handle image upload
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageName);
                    $validatedData['image_path'] = $imageName;
                }
        
                DB::beginTransaction(); // Start transaction
        
                $employee = Employee::create($validatedData);
        
                UserAccount::create([
                    'useraccount_id' => $employee->id,
                    'username' => $employee->email ,
                    'password' => Hash::make($employee->employee_Id .$employee->fname),
                    'default_password' => $employee->employee_Id .$employee->fname ,
                    'status' => 'active',
                ]);
        
                DB::commit(); // Save both
        
                Log::info("New employee added: (ID: {$employee->employee_Id}, Created At: {$employee->created_at})");
        
                return redirect('/employees')->with('success', 'Employee Added successfully!');
        
            } catch (\Throwable $e) {
                Log::error('Error adding employee: ' . $e->getMessage());
                return back()->withInput()->withErrors(['general' => 'An unexpected error occurred. Please try again.']);
            }
        }

    /**
     * Display the specified resource.e
     */
    public function show($id)
    {
        $employees = Employee::findOrFail($id); // This will automatically return a 404 if not found
    
    
        return view('viewEmployee', compact('employees'));
 
   }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);


        return view('editEmployee', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'employee_Id' => 'required|string|min:5|max:50|unique:employees,employee_Id,' . $id,
            'fname' => 'required|string|min:2|max:50',
            'mname' => 'nullable|string|min:2|max:50',
            'lname' => 'required|string|min:2|max:50',
            'address' => 'required|string|min:5|max:255',
            'contact' => 'required|string|max:11|min:11|regex:/^[0-9+\- ]+$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image file
        ],[
            'fname.required' => 'The First Name is required.',
            'fname.min' =>'The First Name cannot be less than 2 letters.',
            'lname.required' => 'The Last Name is required.',
            'contact.required' => 'The Contact Number is required.',
            'address.required' => 'The Address is required.',
        ]);
    
        $employee = Employee::findOrFail($id);
    
        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($employee->image_path && file_exists(public_path('images/' . $employee->image_path))) {
                unlink(public_path('images/' . $employee->image_path));
            }
        
            // Get original image name (e.g., "hashirama.jpg")
            $originalName = $request->file('image')->getClientOriginalName();
        
            // Optional: Ensure uniqueness by adding a prefix or suffix if needed
            // Example to avoid overwrite:
            // $imageName = time() . '_' . $originalName;
        
            // Move the file to public/images
            $request->file('image')->move(public_path('images'), $originalName);
        
            // Save to DB
            $employee->image_path = $originalName;
        }
        // Update other fields (excluding the image field)
        $employee->update($request->except('image'));
    
        // Log the update action
        Log::info("Employee Updated: (ID: {$employee->employee_Id}, Updated At: {$employee->updated_at})");
    
        // Redirect with a success message
        return redirect('/employees')->with('success', 'Employee updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();
        
            // Capture the current date and time for 'Deleted At'
            $deletedAt = Carbon::now()->toDateTimeString();  // Example: 2025-04-10 14:00:00
        
            // Log the deletion
            Log::info("Employee Deleted: (ID: {$employee->employee_Id}, Deleted At: {$deletedAt})");
        
            return redirect('/employees')->with('success', 'Employee removed successfully!');

            // return redirect()->route('employees.index')->with('success', 'Employee removed successfully!');
        } catch (\Exception $e) {
            return redirect('/employees')->with('error', 'Failed to delete employee.');

            // return redirect()->route('employees.index')->with('error', 'Failed to delete employee.');
        }
    }
    
}
