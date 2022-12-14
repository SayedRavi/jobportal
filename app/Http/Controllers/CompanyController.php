<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer','verified']);
    }
    public function index($id, $slug)
    {
//        dd($id);

        $active = 'company';
        $company = Company::where('id',$id)->get();
        $companyy = Company::where('id',$slug)->get();
        return view('company.index2', compact('active','company', 'companyy'));
    }


    public function create()
    {
        $active = 'company';
        if (auth()->check())
        return view('company.create',compact('active'));
        else
            return redirect()->route('login');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'address' => 'required | min:5 | max:50 | string',
            'phone' => 'required | string | min:10 ',
            'website' => 'required | string',
            'slogan' => 'required | min:5 | string',
            'description' => 'required | min:10 | string'
        ]);
        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'address'=> \request('address'),
            'phone'=> request('phone'),
            'website' => request('website'),
            'slogan'=> request('slogan'),
            'description'=> request('description')

        ]);
        return back()->with('message', 'Your Company Profile Updated Successfully');
    }
    public function coverphoto(Request $request)
    {
        $user_id = auth()->user()->id;
        $this->validate($request,[
            'cover_photo' => 'required | max:2048 | mimes:jpg,png,jpeg'
        ]);
        if($request->hasFile('cover_photo')) {
            $file = $request->File('cover_photo');
            $text = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $text;
            $file->move('uploads/cover_photo', $file_name);
            Company::where('user_id', $user_id)->update([
                'cover_photo' => $file_name
            ]);
            return redirect()->back()->withSuccess('Cover Updated Successfully');
        }
            else{
                return back()->withWarning('Please Choose Cover photo');
            }

//        $user_id = auth()->user()->id;
//        $this->validate($request, [
//            'cover_photo' => 'required | max:2000 | mimes:jpg,png,jpeg'
//        ]);
//        if ($request->file('cover_photo') == null) {
//            return back()->withWarning('Please Choose Cover photo');
//        } else {
//            Company::where('user_id', $user_id)->update([
//                'cover_photo' => $request->File('cover_photo')->store('public/files')
//            ]);
//            return back()->withSuccess('Cover Photo Entered Successfully');
//        }
    }
    public function logo(Request $request)
    {
        $user_id = auth()->user()->id;
        $this->validate($request,[
            'logo' => 'required | max:2048 | mimes:jpg,png,jpeg'
        ]);
        if ($request->hasFile('logo')){
            $file = $request->File('logo');
            $text = $file->getClientOriginalExtension();
            $file_name = time().'.'.$text;
            $file->move('uploads/logo',$file_name);
            Company::where('user_id',$user_id)->update([
                'logo' => $file_name
            ]);
            return redirect()->back()->withSuccess('Logo Updated Successfully');
        }
    }

    public function password()
    {
        $active = 'c_pass';
        return view('company.password',compact('active'));
    }
    public function change_password(Request $request, User $user)
    {
        $id = Auth::user()->id;
        $request->validate([
            'password' => 'required | min:8',
            'confirm_password' => 'required | same:password'
        ]);
        $user->where('id',$id)->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->withSuccess('Password Changed Successfully');
    }

}
