<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Job;
use Carbon\Traits\Date;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnArgument;

class JobController extends Controller
{

    public function index()
    {

        $jobs = Job::latest()->whereDate('last_date','>',Date('Y-m-d'))->limit(10)->get();
        $companies = Company::latest()->limit(12)->get();
        $categories = Category::with('jobs')->get();
//        dd($jobs);
        return view('welcome',compact('jobs','companies','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'post';
        return view('jobs.create',compact('active'));
    }


    public function store(JobPostRequest $request)
    {
//        dd($request);
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id =$company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => \request('title'),
            'slug' => \request('title'),
            'roles' => \request('roles'),
            'description' => \request('description'),
            'category_id' => \request('category_id'),
            'position' => \request('position'),
            'address' => \request('address'),
            'type' => \request('type'),
            'status' => \request('status'),
            'last_date' => \request('last_date'),
            'vacancy' => \request('vacancy'),
            'salary' => \request('salary'),
            'responsibility' => \request('responsibility'),
            'qualification' => \request('qualification'),
        ]);
        return redirect()->back()->withSuccess('Job Posted Successfully');
    }

    public function applicants()
    {
        $active = 'applicants';
        if (\auth()->check()) {
            $applicants = Job::has('users')->where('user_id', \auth()->user()->id)->get();
//        dd($applicants);
            return view('jobs.applicants', compact('applicants','active'));
        }
        else
          return redirect()->route('login');
    }

    public function show($id, Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function alljobs(Request $request)
    {
        $keyword = request('title');
        $type = request('type');
        $category = request('category_id');
        $address = request('address');
        if ($keyword || $type || $category || $address)
        {
            $jobs = Job::where('title','LIKE','%'. $keyword . '%')
            ->orWhere('type',$type)
//            ->orWhere('category_id,',$category)
            ->orWhere('address',$address)
            ->paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        }
        else {
            $jobs = Job::paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        }
    }

    public function myjobs()
    {
        $active = 'jobs';
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjobs',compact('jobs','active'));
    }

    public function apply(Request $request, $id)
    {
//dd($id);
//        $jobId = Job::find($id);
        $jobId = Job::find($id);
//        dd($jobId);
        $jobId -> users()->attach(auth::user()->id);
        return redirect()->back()->withSuccess('Job Applied Successfully');
    }

    public function searchJob(Request $request)
    {
        $keyword = $request->get('keyword');
        $users = Job::where('title','LIKE','%'. $keyword . '%')
            ->orWhere('position','LIKE','%' .$keyword . '%')
            ->limit(5)->get();
        return response()->json($users);
    }

    public function editjobs($id)
    {
       $job = Job::all()->where('id', $id)->first();
//       dd($job);
        $active = 'jobs';
        return view('jobs.edit_jobs', compact('active', 'job'));
    }

    public function update(JobPostRequest $request, Job $job)
    {
        Job::where('id',$request->id)->update([
            'title'=> $request->title,
            'slug' => $request->title,
            'roles' =>$request->roles,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'position' => $request->position,
            'address' => $request->address,
            'type' => $request->type,
            'status' => $request->status,
            'last_date' => $request->last_date,
            'vacancy' => $request->vacancy,
            'salary' => $request->salary,
            'responsibility' => $request->responsibility,
            'qualification' => $request->qualification,
        ]);
        return redirect()->back()->withSuccess('Job Updated Successfully');
    }

    public function about()
    {
        return view('partial.about');
    }

    public function contact()
    {
        return view('partial.contact');
    }

    public function save_contact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | min:3 | max:14 | string',
            'email' => 'required | email',
            'subject' => 'required | min:5 | max:30 | string',
            'message' => 'required | min:5 | max:191 | string'
        ]);
        Contact::create($data);
        return back()->withSuccess('Message Sent Successfully');
    }
    public function company_show($id, $slug)
    {
//        dd($id);
        $company = Company::where('id',$id)->get();
//        dd($company);
        return view('jobs.company_details', compact( 'company'));
    }
}
