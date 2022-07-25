<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SendEmail;
class EmailController extends Controller
{
    public function send(Request $request)
    {
        $homeURL = url('/');
        $jobId = $request->get('job_id');
        $jobSlug = $request->get('job_slug');
        $jobURL = $homeURL.'/'.$jobId.'/'.$jobSlug;

        $data = array(
          'your_name' => $request->get('your_name'),
          'your_email' => $request->get('your_email'),
          'friend_name' => $request->get('friend_name'),
          'friend_email' => $request->get('friend_email'),
        );
        $emailTo = $request->get('friend_email');
        Mail::to($emailTo)->Send(new SendEmail($data));
        return redirect()->back()->withSuccess('Mail Sent Successfully');
    }
}
