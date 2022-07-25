<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id)
    {
        $jobs = Job::where('category_id',$id)->paginate(5);
        $category_name = Category::where('id',$id)->first();
        return view('jobs.job-category',compact('jobs','category_name'));
    }
}
