<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassRoomController extends Controller
{
    // Constructor removed as auth middleware is already applied in routes/web.php

    public function index()
    {
        $classes = ClassRoom::with(['teacher', 'students'])->get();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $class = ClassRoom::create([
            'title' => $request->title,
            'description' => $request->description,
            'teacher_id' => Auth::id()
        ]);

        return redirect()->route('classes.show', $class)
            ->with('success', 'Class created successfully!');
    }

    public function show(ClassRoom $class)
    {
        $class->load(['teacher', 'students']);
        $availableStudents = User::whereDoesntHave('classes', function($query) use ($class) {
            $query->where('class_id', $class->id);
        })->get();

        return view('classes.show', compact('class', 'availableStudents'));
    }

    public function addStudent(Request $request, ClassRoom $class)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id'
        ]);

        $student = User::findOrFail($request->student_id);
        $class->addStudent($student);

        return redirect()->back()
            ->with('success', 'Student added to class successfully!');
    }

    public function removeStudent(ClassRoom $class, User $student)
    {
        $class->removeStudent($student);

        return redirect()->back()
            ->with('success', 'Student removed from class successfully!');
    }
}