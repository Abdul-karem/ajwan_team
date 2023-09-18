<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Admin.categories.index', compact('categories'));
    }

    public function create()
    {

        return view('Admin.categories.create');
    }

    public function store(Request $request)
    {
        // Validation logic here
      $request->validate([
       'name'=>'required',
       'description'=>'required',
       'image'=>'required |image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);
      $input = $request->all();
      if ($image = $request->file('image')) {
        $destinationPath ='imagess';
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move($destinationPath , $imageName);
        $input['image'] ="$imageName";
    }
    Category::create($input);
   return redirect()->route('categories.index')->with('success','course added successfuly');
    
    }

    public function edit(Category $category )
    {
    
        return view('Admin.categories.edit', compact('category'));
    }

    public function update(Request $request,Category $category)
    {
        // Validation logic here
        $request->validate([
            'name'=>'required',
            'description'=>'required',
           ]);

           $input = $request->all();
           if ($image = $request->file('image')) {
             $destinationPath ='imagess';
             $imageName = time().'.'.$image->getClientOriginalExtension();
             $image->move($destinationPath , $imageName);
             $input['image'] ="$imageName";
         }else{
            unset($input['image']);

         }
         $category->update($input);
        return redirect()->route('categories.index')->with('success','course added successfuly');

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
