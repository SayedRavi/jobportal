<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function __Construct(){
        $this->middleware('admin');
    }
    public function index()
    {
        $companies = Company::all()->count();
        $users = User::all()->count();
        $jobs = Job::all()->count();
        $admins = User::where('user_type','admin')->count();
        $active = 'dashboard';
        return view('admin.index',compact('companies','users','jobs','admins','active'));
    }

    public function users()
    {
        $active = 'users';
        $users = User::all()->where('user_type','seeker');
        return view('admin.users',compact('active','users'));
    }

    public function view($id)
    {
        $active = 'users';
        $users = User::all()->where('id',$id);
        $profiles = Profile::all()->where('user_id',$id);
        return view('admin.view_users',compact('active','users','profiles'));
    }

    public function delete($id,User $user, Profile $profile)
    {
        DB::table('users')->where('id',$id)->delete();
        DB::table('profiles')->where('user_id',$id)->delete();
//        DB::table('jobs')->where('user_id',$id)->delete();
        DB::table('job_user')->where('user_id',$id)->delete();

       return back()->withSuccess('User Deleted Successfully');
    }

    public function company_view()
    {
        $active = 'company';
        $companies = User::all()->where('user_type','employer');
        return view('admin.companies',compact('active','companies'));
    }

    public function company_show($id)
    {
        $active = 'company';
        $users = User::all()->where('id',$id);
        $companies = Company::where('user_id',$id)->get();
        return view('admin.company_view',compact('active','users','companies'));
    }

    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        DB::table('companies')->where('user_id',$id)->delete();
        DB::table('jobs')->where('user_id',$id)->delete();
        return back()->withSucess('Company Delted Successfully');
    }

    public function jobs()
    {
        $active = 'jobs';
        $jobs = Job::all();
        return view('admin.jobs', compact('active','jobs'));
    }

    public function jobs_view($id)
    {
        $active = 'jobs';
        $jobs = Job::all()->where('id',$id);
//        dd($job);
        return view('admin.view_jobs', compact('active','jobs'));
    }

    public function jobs_destroy($id)
    {
        DB::table('jobs')->where('id',$id)->delete();
        return back()->withSuccess('Job Deleted Successfully');
    }

    public function category()
    {
        $active = 'cat';
        $categories = Category::paginate(5);
        return view('admin.category', compact('active', 'categories'));
    }

    public function add_category()
    {
        $active = 'cat';
        return view('admin.cat_inputs',compact('active'));
    }

    public function save_category(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        Category::create($data);
        return back()->withSuccess('Category Added Successfully');
    }

    public function edit_category($id)
    {
        $active = 'cat';
        $category = Category::all()->where('id',$id);
        return view('admin.cat_edit',compact('active', 'category'));
    }

    public function update_category($id, Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $category->where('id',$id)->update($data);
        return back()->withSuccess('Category Updated Successfully');
    }

    public function delete_category(Category $category, $id)
    {
        $category->where('id',$id)->delete();
        return back()->withSuccess('Category Deleted Successfully');
    }

    public function password()
    {
        $active = 'pass';
        return view('admin.password',compact('active'));
    }

    public function change_password(Request $request, User $user)
    {
        $id = Auth::user()->id;
         $request->validate([
            'password' => 'required | min:8',
            'c_password' => 'required | same:password'
        ]);
        $user->where('id',$id)->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->withSuccess('Password Changed Successfully');
    }

}
