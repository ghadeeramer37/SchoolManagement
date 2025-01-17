<?php

namespace App\Http\Controllers\students;

use App\Models\classes;
use App\Models\User;
use App\Models\student;
use App\Models\my_parent;
use App\Models\sections;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class studentController extends Controller
{

    public function index()
    {
        $students = student::all();
        $classes = classes::all();
        $sections = sections::all();
        return view('pages.Student.Student', compact('students', 'classes', 'sections'));
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $student = new student();
            $my_parent = new my_parent();


            //student's account
            $user->name = $request->name;
            $user->password = Hash::make($request->student_Password);
            $user->email = $request->email;
            $user->save();
            //parent's account
            $parent_account = new  User();
            $parent_account->name = $request->father_name;
            $parent_account->password = Hash::make($request->parent_Password);
            $parent_account->email = $request->parent_email;
            $parent_account->save();


            // parent's record
            $my_parent->father_name = $request->father_name;
            $my_parent->mother_name = $request->mother_name;
            $my_parent->father_phone = $request->father_phone;
            $my_parent->mother_phone = $request->mother_phone;
            $my_parent->parent_email = $request->parent_email;
            $email = $request->parent_email;
            $users = User::where('email', 'like', $email)->get();
            $my_parent->user_id = $users[0]->id;
            $my_parent->save();

            //student's record
            $student->name = $request->name;
            $email = $request->parent_email;
            $my_parent = my_parent::where('parent_email', 'like', $email)->get();
            $student->my_parent_id = $my_parent[0]->id;
            $student->class_id = $request->class_id;
            $student->section_id = $request->section_id;
            $student->gender = $request->gender;
            $student->date_of_birth = $request->date_of_birth;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $email = $request->email;
            $users = User::where('email', 'like', $email)->get();
            $student->user_id = $users[0]->id;
            $student->save();

            return redirect()->route('Student.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {

        try {

            return redirect()->route('Student.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {

        $student = student::findOrFail($request->id)->delete();
        return redirect()->route('Student.index');
    }
}
