<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Master;

class CourseController extends Controller
{
    public function index()
    {
        // Retrieve all courses and categories
        $courses = Course::all();
        $categories = Category::pluck('name', 'id');

        // Load the index view with the retrieved data
        return view('Admin.courses.index', compact('courses', 'categories'));
    }

    public function create()
    {
        // Retrieve categories and masters
        $categories = Category::pluck('name', 'id');
        $masters = Master::all();

        // Load the create view with the retrieved data
        return view('Admin.courses.create', compact('categories', 'masters'));
    }

    

    // Handle image upload
   public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'teacher_name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'location' => 'required',
        'start' => 'required',
        'end' => 'required',
        'time' => 'required',
        'Target_group' => 'required',
        'status' => 'required',
        'category_id' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Create a new course
    $course = new Course();
    $course->title = $request->input('title');
    $course->teacher_name = $request->input('teacher_name');
    $course->description = $request->input('description');
    $course->price = $request->input('price');
    $course->location = $request->input('location');
    $course->start = $request->input('start');
    $course->end = $request->input('end');
    $course->time = $request->input('time');
    $course->Target_group = $request->input('Target_group');
    $course->status = $request->input('status');
    $course->category_id = $request->input('category_id');
    if ($request->hasFile('image')) {
        $profileImg = $request->file('image');
        $profileImgPath = Storage::disk('public')->put('images', $profileImg);
        $course->image = $profileImgPath;
    }  // Assign the image name if uploaded, otherwise null
    $course->save();

    // Redirect with success message
    return redirect()->route('course.index')->with('success', 'Course added successfully');
}


public function edit($id)
{
    $course = Course::find($id);
    if (!$course) {
        abort(404); // Handle the case when the course is not found
    }

    // You can also load categories if needed
    $categories = Category::all();

    return view('Admin.courses.edit', compact('course', 'categories'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        // dd($request ->all());

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required |image|mimes:jpeg,png,jpg,gif|max:2048',
            'location'=>'required',
            'start'=>'required',
            'end'=>'required',
            'time'=>'required',
            'Target_group'=>'required',

            ]);

            $input = $request ->all();
            if ($request->hasFile('image')) {
                $profileImg = $request->file('image');
                $profileImgPath = Storage::disk('public')->put('images', $profileImg);
                $course->image = $profileImgPath;
            }
        
            $course->update($input);
           return redirect()->route('Admin.courses.index')->with('success','course updated successfuly');
    }

    public function show(Course $course)
    {
        // Retrieve all courses
        $courses = Course::all();

        // Load the show view with the retrieved data
        return view('Admin.courses.show', compact('course', 'courses'));
    }

    // Other methods (edit, update, destroy) follow a similar pattern and have not been modified in this response
    // ...

    public function destroy(Course $course)
    {
        $course ->delete();
        return redirect()->route('Admin.courses.index')->with('success','course delete successfuly');
    }

}
