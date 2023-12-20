<?php

namespace App\Http\Controllers\BOD_ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\resolution;
use App\Models\BOD;
use App\Models\Committee;
use App\Models\User;
use App\Models\DepartmentHead;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class crud_controller extends Controller
{
    public function bodres_add(){
        return view('1st_admin.actions.bodres_add');
    }
    public function bodres_store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'res_number' => 'required|string',
            'res_date' => 'required|date',
            'agenda' => 'required|string',
            'tags' => 'required|string',
            'status' => 'required|string',
            'encoded_by_name' => 'required|string',
            'encoded_by_date' => 'required|date',
        ]);

        // Convert the date format to 'YYYY-MM-DD'
        $resDate = Carbon::createFromFormat('m/d/Y', $request->input('res_date'))->format('Y-m-d');

        // Create a new resolution instance
        Resolution::create([
            'res_number' => $request->input('res_number'),
            'res_date' => $resDate,
            'tags' => $request->input('tags'),
            'agenda' => $request->input('agenda'),
            'status' => $request->input('status'),
            'encoded_by' => $request->input('encoded_by_name'),
            'encoded_by_date' => $request->input('encoded_by_date'),
        ]);

        // Redirect back or to a success page
        return redirect()->route('1st_admin.dashboard')->with('success', ' Resolution added successfully')->withInput();
    }


    public function bodres_edit($id){
        $resolution = resolution::find($id);
        return view('1st_admin.actions.bodres_edit', compact('resolution'));
       
    }

    public function bodres_update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'res_number' => 'required',
            'agenda' => 'required',
            'res_date' => 'required|date',
            'status' => 'required',
            'encoded_by_name' => 'required',
            'encoded_by_date' => 'required|date',
        ]);
    
        // Update data
        $resolution = Resolution::find($id);
        $resolution->update([
            'res_number' => $request->input('res_number'),
            'agenda' => $request->input('agenda'),
            'res_date' => date('Y-m-d H:i:s', strtotime($request->input('res_date'))),
            'status' => $request->input('status'),
            'encoded_by' => $request->input('encoded_by_name'),
            'encoded_by_date' => date('Y-m-d H:i:s', strtotime($request->input('encoded_by_date'))),
        ]);
    
        return redirect()->route('1st_admin.dashboard')->with('success', 'Resolution updated successfully.')->withInput();
    }

    public function bodres_destroy($id)
    {
        // Find the record by its ID
        $resolution = Resolution::find($id);

        // Check if the record exists
        if ($resolution) {
            // Delete the record
            $resolution->delete();

            // Optionally, you can redirect with a success message
            return redirect()->route('1st_admin.dashboard')->with('success', 'Resolution deleted successfully!');
        } else {
            // If the record doesn't exist, you may want to handle this case (e.g., show an error message)
            return redirect()->route('1st_admin.dashboard')->with('error', 'Resolution not found!');
        }
    }

//Committee


    public function bodcom_add(){
        return view('1st_admin.actions.bodcom_add');
    }
    
    public function bodcom_store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'committee' => 'required|string',
            'position' => 'required|string',
            'period' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5048', // Adjust file types and size as needed
            'status' => 'required|string',
        ]);

        // Handle file upload if a photo is provided
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        } else {
            $photoPath = null;
        }

        // Create a new Committee instance
        $committee = new Committee([
            'name' => $request->input('name'),
            'committee' => $request->input('committee'),
            'position' => $request->input('position'),
            'period' => $request->input('period'),
            'photo' => $photoPath,
            'status' => $request->input('status'),
        ]);

        // Save the Committee instance to the database
        $committee->save();

        // Redirect back or to a specific route after successful storage
        return redirect()->route('1st_admin.bod_com_dashboard')->with('success', 'Committee added successfully!');
    }

   


    public function bodcom_edit($id){

        $committee = Committee::find($id);
        return view('1st_admin.actions.bodcom_edit',compact('committee'));

    }

    public function  bodcom_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'committee' => 'required|string',
            'position' => 'required|string',
            'period' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5048', // Adjust file types and size as needed
            'status' => 'required|string',

        ]);

        $committee = Committee::find($id);

        // Handle file upload if a new photo is provided
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($committee->photo) {
                Storage::disk('public')->delete($committee->photo);
            }

            // Upload the new photo
            $photoPath = $request->file('photo')->store('photos', 'public');
            $committee->photo = $photoPath;
        }

        // Update the Committee instance
        $committee->update([
            'name' => $request->input('name'),
            'committee' => $request->input('committee'),
            'position' => $request->input('position'),
            'period' => $request->input('period'),
            'status' => $request->input('status'),
        ]);


        // Redirect back or to a different page after successful update
        return redirect()->route('1st_admin.bod_com_dashboard')->with('success', 'Committee updated successfully!');
    }


    public function bodcom_destroy($id)
    {
        // Retrieve the committee by ID
        $committee = Committee::findOrFail($id);

        // Delete the photo if it exists
        if ($committee->photo_path) {
            Storage::disk('public')->delete($committee->photo_path);
        }

        // Delete the committee
        $committee->delete();

        // Redirect back or to a different page after successful deletion
        return redirect()->route('1st_admin.bod_com_dashboard')->with('success', 'Committee deleted successfully!');
    }


    //BOARD OF DIRECTORS FUNCTION

    public function bod_add(){
        return view('1st_admin.actions.bod_add');
    }

    public function bod_store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'period' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048', // Adjust the validation rules for the photo
            'status' => 'required|string',
        ]);

        // Handle file upload
        $photoPath = $request->file('photo')->store('photos', 'public');


        // Create a new BOD instance
        BOD::create([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'period' => $request->input('period'),
            'photo' => $photoPath,
            'status' => $request->input('status'),
        ]);

        // Redirect back or to a success page
        return redirect()->route('1st_admin.bod_dashboard')->with('success', 'BOD added successfully')->withInput();
    }

    public function bod_delete($id)
    {
        // Find the BOD record
        $BOD = BOD::find($id);
    
        // Check if the BOD record exists
        if (!$BOD) {
            return redirect()->route('1st_admin.bod_dashboard')->with('error', 'BOD not found');
        }
    
        // Delete the photo from storage
        Storage::disk('public')->delete($BOD->photo);
    
        // Delete the BOD record from the database
        $BOD->delete();
    
        // Redirect back or to a success page
        return redirect()->route('1st_admin.bod_dashboard')->with('success', 'BOD deleted successfully');
    } 
    
    


    public function bod_edit($id){
        // Retrieve the BOD record by ID
    $BOD = BOD::find($id);

    // Check if the BOD record exists
    if (!$BOD) {
        return redirect()->route('1st_admin.bod_dashboard')->with('error', 'BOD not found');
    }

    // Pass the BOD data to the view
    return view('1st_admin.actions.bod_edit', compact('BOD'));
    }



    public function dh_add(){
        return view('1st_admin.actions.dh_add');
    }

    // Store a newly created Department Head in the database
    public function dh_store(Request $request)
    {   
        
        // Validate the incoming request data
        $request->validate([
            'username' => 'required|string|unique:users', // Ensure username is unique in the users table
            'name' => 'required|string',
            'rights' => 'required|string',
            'module' => 'required|array', // Assuming module is an array of selected options
        ]);


        // Convert the 'module' array to a JSON string
        $moduleAsString = json_encode($request->input('module'));
        // Create a new DepartmentHead instance
        $dh = new DepartmentHead([
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'rights' => $request->input('rights'),
            'module' => $moduleAsString,
        ]);

        $dh->save();
        // Redirect back or to a specific route after successful storage
        return redirect()->route('1st_admin.dh_dashboard')->with('success', 'Department Head added successfully!')->withInput();
    }

        


    public function dh_edit($id){
        $user = DepartmentHead::find($id);
        return view('1st_admin.actions.dh_edit',compact('user'));
    }

    public function dh_update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:department_heads,username,' . $id,
            'rights' => 'required|string',
            'module' => 'required|array',
        ]);
    
        // Convert the 'module' array to a JSON string
        $moduleAsString = json_encode($request->input('module'));
    
        // Find the user by ID
        $user = DepartmentHead::find($id);
    
        // Update the user details
        $user->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'rights' => $request->input('rights'),
            'module' => $moduleAsString,
        ]);
    
        // Redirect back or to a specific route after successful update
        return redirect()->route('1st_admin.dh_dashboard')->with('success', 'Department Head updated successfully!');
    }

    public function dh_delete($id)
    {
        // Find the DepartmentHead by ID
        $departmentHead = DepartmentHead::find($id);

        if (!$departmentHead) {
            return redirect()->back()->with('error', 'Department Head not found.');
        }

        // Delete the DepartmentHead
        $departmentHead->delete();

        return redirect()->route('1st_admin.dh_dashboard')->with('success', 'Department Head deleted successfully!');
    }

    

    public function update_profile($id){
        $admin = User::find($id);
        return view('1st_admin.actions.update-profile',compact('admin'));
    }

    // Update user profile
public function edit_Profile(Request $request, $id)
{
    // Validate request data
    $request->validate([
        'name' => 'required|string',
        'username' => 'required|string',
        'email' => 'required|email',
        'password' => 'nullable|string|min:8', // You can make password optional for update
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
    ]);

    // Find the user by ID
    $user = User::find($id);

    // Handle file upload if a new photo is provided
    if ($request->hasFile('photo')) {
        // Delete the previous photo if it exists
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        // Store the new photo
        $photoPath = $request->file('photo')->store('photos', 'public');
        $user->photo = $photoPath;
    }

    // Update user data
    $user->name = $request->input('name');
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    // Update password only if provided
    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    // Save the updated user instance to the database
    $user->save();

    // Redirect back or to a specific route after successful update
    return redirect()->route('1st_admin.actions.update-profile', ['id' => $id])->with('success', 'Profile updated successfully!');
}

}
