<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class userProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['seeker','verified']);
    }
    public function index()
    {
        $active = 'profile';
        return view('profile.index',compact('active'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'address' => 'required | min:5 | max: 150 | string',
            'phone_number' => 'required | string | min:10 ',
            'experience' => 'required | min:5 | string',
            'bio' => 'required | min:10 | string'
        ]);
        $user_id = auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
           'address'=> \request('address'),
           'phone_number'=> request('phone_number'),
            'experience' => request('experience'),
            'bio'=> request('bio')
        ]);
        return back()->with('message', 'Your Profile Updated Successfully');
    }

    public function coverletter(Request $request)
    {
        $user_id = auth()->user()->id;
        $this->validate($request,[
            'cover_letter' => 'required | max:3000 | mimes:pdf,doc,docx'
        ]);
        if ($request->file('cover_letter') == null) {
            return back()->withWarning('Please Choose Cover Letter');
        }else{
            Profile::where('user_id',$user_id)->update([
                'cover_letter' => $request->File('cover_letter')->store('public/files')
            ]);
            return back()->withSuccess('Cover Letter Entered Successfully');
        }

//        if ($cover){
//            Profile::where('user_id',$user_id)->update([
//                'cover_letter' => $cover
//            ]);
//            return back()->with('message', 'Your Cover Letter Updated Successfully');
//        }
//        else{
//            return back()->with('message', 'Please Chose Your Cover letter');
//
//        }
    }
    public function resume(Request $request)
    {

        $user_id = auth()->user()->id;
        $this->validate($request,[
            'resume' => 'required | mimes:pdf,doc,docx | max: 2000'
        ]);
        if ($request->file('resume') == null) {
            return back()->withWarning('Please Choose Resume');
        }else{
            Profile::where('user_id',$user_id)->update([
                'resume' => $request->File('resume')->store('public/files')
            ]);
            return back()->withSuccess('Resume Entered Successfully');
        }
    }

    public function avatar(Request $request)
    {
        $user_id = auth()->user()->id;
        $this->validate($request,[
            'avatar' => 'required | max:2048 | mimes:jpg,png,jpeg'
        ]);
        if ($request->hasFile('avatar')){
            $file = $request->File('avatar');
            $text = $file->getClientOriginalExtension();
            $file_name = time().'.'.$text;
            $file->move('uploads/avatar',$file_name);
            Profile::where('user_id',$user_id)->update([
                'avatar' => $file_name
            ]);
            return redirect()->back()->withSuccess('Avatar Updated Successfully');
        }
    }
}
