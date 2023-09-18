<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\Course;
class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masters = Master::all();
        $courses = Course::all();
        return view('Admin.master.index',compact('masters','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $masters = Master::all();
        $courses = Course::all();
        return view('Admin.master.create',compact('masters','courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required |image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'course_id'=>'required',
            ]);
        
            $input = $request ->all();
            if ($image = $request->file('image')) {
                $destinationPath ='imagess';
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath , $imageName);
                $input['image'] ="$imageName";
            }
            Master::create($input);
           return redirect()->route('master.index')->with('success','master added successfuly');
        
            }
   
    public function edit(Master $master)
    {
        $courses = Course::all();
        return view('Admin.master.edit',compact('master','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Master $master)
    {
        $request->validate([
            'name'=>'required',
            // 'image'=>'required |image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'course_id'=>'required',
            ]);
        
            $input = $request ->all();
            if ($image = $request->file('image')) {
                $destinationPath ='imagess';
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move($destinationPath , $imageName);
                $input['image'] ="$imageName";
            } else{
                unset( $input['image']);
            }
            $master->update($input);
           return redirect()->route('master.index')->with('success','master updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Master $master)
    {
        $master ->delete();
        return redirect()->route('master.index')->with('success','master delete successfuly');
    }
}
