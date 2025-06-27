<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AddTeacherRequest;
class TeachersController extends Controller
{
    public function index(Request $request)
    {
        $teachers = Teachers::with('images')
            ->when($request->search, function ($query) use ($request) {
                return $query->whereAny([
                    'name',
                    'email',
                    'phone',
                ], 'like', '%' . $request->search . '%');
            })->paginate(10);

        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.add'); // Hiển thị form thêm
    }

    public function store(AddTeacherRequest $request)
    {
    
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('photos', 'public');
        }

        $teacher = new Teachers();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->save();

        if ($imagePath) {
            $image = new Images();
            $image->path = $imagePath;
            $image->imageable_id = $teacher->id;
            $image->imageable_type = Teachers::class;
            $image->save();
        }

        return redirect('teachers')->with('success', 'Teacher created successfully');
    }

    public function edit($id)
    {
        $teacher = Teachers::findOrFail($id);
        return view('teachers.edit', ['student' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teachers::findOrFail($id);
        Gate::authorize('updateTeachers', $teacher);

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->update();

        return redirect('teachers')->with('success', 'Teacher updated successfully');
    }

    public function destroy($id)
    {
        $teacher = Teachers::findOrFail($id);

        foreach ($teacher->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        $teacher->delete();

        return redirect('teachers')->with('success', 'Teacher deleted successfully');
    }
}
