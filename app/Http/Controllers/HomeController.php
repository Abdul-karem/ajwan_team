<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Master;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        $categories = Category::all();
        $masters = Master::all();
        
        if (auth()->check()) {
            $role = auth()->user()->role_as;
    
            if ($role == 1) {
                return view('Admin.index');
            }
        }
    
        return view('User.Home', compact('courses', 'categories', 'masters'));
    }


}
