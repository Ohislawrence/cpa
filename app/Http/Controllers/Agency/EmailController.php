<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\EmailSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserEmail;
use App\Models\Message;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class EmailController extends Controller
{
    public function send()
    {
        $users = User::role('affiliate')->get();
        return view('agency.email.sendemail', compact('users'));
    }

    public function showSentMessages()
    {
    // Fetch messages with the count of related users
    $messages = Message::withCount('users')->get();

    return view('agency.email.sentemails', compact('messages'));
    }

    public function settings()
    {
        return view('agency.email.emailsettings');
    }

    public function systememail()
    {
        return view('agency.email.systememail');
    }

     // Update email settings
     public function updateEmailSettings(Request $request)
     {
         $data = $request->validate([
             'mail_mailer' => 'required',
             'mail_host' => 'required',
             'mail_port' => 'required',
             'mail_username' => 'required',
             'mail_password' => 'required',
             'mail_encryption' => 'required',
             'mail_from_address' => 'required|email',
             'mail_from_name' => 'required',
         ]);
 
         // Store or update settings
         EmailSetting::updateOrCreate(['id' => 1], $data);
 
         return back()->with('success', 'Email settings updated successfully!');
     }

     public function sendEmail(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string',
            'message' => 'required|string',
        ]);

        $user = User::find($request->user_id);
        $messageBody = $request->message;
        $title = $request->title;

        // Fetch email settings from the database
        $emailSettings = EmailSetting::first();

        // Dynamically configure mail settings
        config([
            'mail.mailer' => $emailSettings->mail_mailer,
            'mail.host' => $emailSettings->mail_host,
            'mail.port' => $emailSettings->mail_port,
            'mail.username' => $emailSettings->mail_username,
            'mail.password' => $emailSettings->mail_password,
            'mail.encryption' => $emailSettings->mail_encryption,
            'mail.from.address' => $emailSettings->mail_from_address,
            'mail.from.name' => $emailSettings->mail_from_name,
        ]);

        $message = Message::create([
            'title' => $title,
            'content' => $messageBody,
        ]);

        // Send email

        Mail::to($user->email)->queue(new UserEmail($user, $messageBody, $title));

        /*
        // Fetch users - for example, all active users
        $users = User::where('status', 'active')->get();

        foreach ($users as $user) {
            // Queue an email for each user in the group
            Mail::to($user->email)->queue(new UserEmail($user, $messageBody, $title));

            // Attach each user to the message record
            $message->users()->attach($user->id);
        }
        */

        return back()->with('success', 'Email sent successfully!');
    }

    public function getsentMessages(Request $request)
    {
        if ($request->ajax()) {
            $data = Message::withCount('users')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="affiliate/'.$row->id.'/overview" class="edit btn btn-primary btn-sm">View</a>';
                    return $actionBtn;
                })
                ->addColumn('sentAt',function($row){
                    $sentAt = $row->created_at->format('Y-m-d H:i');
                    return $sentAt;
                })
                ->addColumn('count',function($row){
                    $count = $row->users_count;
                    return $count;
                })
                ->rawColumns(['action','sentAt','count'])
                ->make(true);
        }
    }


}
