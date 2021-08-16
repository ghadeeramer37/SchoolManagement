<?php

namespace App\Http\Controllers\subjects;

use App\Http\Requests\storeSubject;
use App\Models\classes;
use App\Models\grade;
use App\Models\subject;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class subjectController extends Controller
{

    public function index()
    {
        $subjects = subject::all();
        return view('pages.Subject.Subject', compact('subjects'));
    }

    public function store(storeSubject $request)
    {
        try {
            $validated = $request->validated();
            $subject = new subject();
            $subject->name = $request->name;
            $subject->max_mark = $request->max_mark;
            $subject->min_mark = $request->min_mark;
            $subject->class_id = $request->class_id;
            $subject->note = $request->note;
            $subject->save();
            return redirect()->route('Subject.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {

        try {
            $subject = subject::findorfail($request->id);
            $subject->update([
                $subject->name = $request->name,
                $subject->max_mark = $request->max_mark,
                $subject->min_mark = $request->min_mark,
                $subject->class_id = $request->class_id,
                $subject->note = $request->note,
            ]);
            return redirect()->route('Subject.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {

        $subject = subject::findOrFail($request->id)->delete();
        return redirect()->route('Subject.index');
    }
}
