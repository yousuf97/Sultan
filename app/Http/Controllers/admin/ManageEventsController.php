<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Mail\InvitationLetter;
use Illuminate\Support\Facades\Mail;

class ManageEventsController extends Controller
{
    public function create_events($id = null)
    {
        $event_categories = DB::table('event_categories')->select('*')->get();
        $countries = DB::table('countries')->select('*')->get();
        $file_formats = DB::table('file_formats')->select('*')->get();
        $all_institutes = DB::table('institutions')->select('*')->get();
        if ($id != null) {
            $events = DB::table('events')->where('id', $id)->select('*')->get();
            return view('admin.events.create_events')->with(['events' => $events, 'countries' => $countries, 'event_categories' => $event_categories, 'file_formats' => $file_formats, 'all_institutes' => $all_institutes, 'update_id' => $id]);
        } else {
            return view('admin.events.create_events')->with(['countries' => $countries, 'event_categories' => $event_categories, 'file_formats' => $file_formats, 'all_institutes' => $all_institutes, 'update_id' => null]);
        }
    }

    public function list_all_events()
    {
        $all_events = DB::table('events')->select('*')->get();
        return view('admin.events.all_events')->with(['all_events' => $all_events]);
    }

    public function save_events(Request $request)
    {
        $rules = [
            'title' => 'required|max:150',
            'description' => 'required',
            'category' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'acceptable_formats' => 'required',
            'acceptable_file_size' => 'required',
            'preffered_institute' => 'required',
            'age_restrictions' => 'required',
            'accept_payment' => 'required',
            'max_entry_limit' => 'required',
            'is_active' => 'required',
        ];

        if ($request->input('update_id') == null) {
            $rules['file'] = 'required|mimes:jpg,jpeg,png,gif,ttf|max:5009';
        } else {
            if ($request->hasFile('file')) {
                $rules['file'] = 'required|mimes:jpg,jpeg,png,gif,ttf|max:5009';
            }
        }
        $request->validate($rules);

        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('events', $fileName, 'public');

            $name = time() . '_' . $request->file->getClientOriginalName();

            //delete existing file for the
            if ($request->input('update_id') != null) {
                $current_institution = DB::table('events')->where('id', $request->input('update_id'))->pluck('file');
                $current_file = 'public/' . $current_institution[0];
                if (Storage::exists($current_file)) {
                    Storage::delete($current_file);
                }
            }
        } else {
            $filePath = '';
        }

        $events = array(
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'start_date' => Carbon::createFromFormat('Y/m/d', $request->input('start_date')),
            'end_date' => Carbon::createFromFormat('Y/m/d', $request->input('end_date')),
            'acceptable_formats' => implode(",", $request->input('acceptable_formats')),
            'acceptable_file_size' => $request->input('acceptable_file_size'),
            'acceptable_file_count' => 1,
            'max_entry_limit' => $request->input('max_entry_limit'),
            'preffered_institute' => implode(",", $request->input('preffered_institute')),
            'age_restrictions' => $request->input('age_restrictions'),
            'accept_payment' => $request->input('accept_payment'),
            'is_active' => $request->input('is_active'),
            'file' => $filePath,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        );

        try {
            if ($request->input('update_id') == null) {
                DB::table('events')->insert($events);
                $flash = array('type' => 'success', 'msg' => 'New Event created successfully');
                $request->session()->flash('flash', $flash);
            } else {
                if (!$request->hasFile('file')) {
                    unset($events["file"]);
                }
                unset($events["created_at"]);
                $update_id = $request->input('update_id');
                DB::table('events')->where('id', $update_id)->update($events);
                $flash = array('type' => 'success', 'msg' => 'Event details updated successfully');
                $request->session()->flash('flash', $flash);
            }
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
        return redirect('admin/events/manage_events');
    }


    public function event_participants()
    {
        $all_events = DB::table('events')->select('*')->get();

        return view('admin.events.event_participants')->with(['all_events' => $all_events]);
    }

    public function event_judgement($event_id = null)
    {
        $event = DB::table('events')->select('*')->where('id', '=', $event_id)->first();

        $participants_entry = DB::table('event_registrations as er')
            ->join('users as ud', 'er.participant_id', '=', 'ud.id')
            ->join('media_entries as me', 'me.id', '=', 'er.media_entries_id')
            ->join('media_files as mf', 'mf.id', '=', 'me.media_file_id')
            ->select('er.id as rId', 'me.id as media_entry_id', 'ud.name as uName', 'me.title as mTitle', 'me.description as mDescription', 'me.tags as mTags', 'me.media_thumbnail as mThumbnail', 'me.media_type as mType', 'me.status as mStatus', 'me.status_comment as mStatusComment', 'me.created_at as mCreatedAt', 'mf.file_url as fUrl', 'mf.file_type as mimeType', 'er.score as cScore', 'er.comments as cComments', 'er.created_at as registrationTime')
            ->where('er.event_id', '=', $event_id)
            ->orderBy('er.id', 'asc')
            ->paginate(10);
        return view('admin.events.event_judgement')->with(['event' => $event, 'participants_entry' => $participants_entry]);
    }

    public function save_judgement_result_and_publish(Request $request)
    {
        $competetion_entry_id = $request->competetion_entry_id;
        $media_entry_id = $request->media_entry_id;

        DB::table('media_entries')->where('id', '=', $media_entry_id)->update(array('status' => $request->status, 'status_comment' => 'Media entry updated'));

        $update_data = array('score' => $request->score, 'comments' => $request->comments);
        $upd =  DB::table('event_registrations')->where('id', '=', $competetion_entry_id)->update($update_data);

        $finalResult = setResponse(0, 'message_key', "Updated successfully", 0, $upd, 1);
        return response()->json($finalResult);
    }

    public function send_invitation($id = null)
    {
        $eventDetails = DB::table('events')->where('id', '=', $id)->first();
        $start_date = formatDate($eventDetails->start_date, 2);
        $end_date = formatDate($eventDetails->end_date, 2);
        $enc_id = encript($eventDetails->id);
        $url = url("competition/details/$enc_id");
        $subject = "Invitation From Sultan Of Art";
        $institute_id_array = explode(',', $eventDetails->preffered_institute);
        $send_emails = DB::table('institutions')->whereIn('id', $institute_id_array)->pluck('email');
        $send_email_arr = [];
        foreach ($send_emails as $row) {
            $send_email_arr[] = $row;
        }
        $send_emails_address_str = implode(',', $send_email_arr);
        $body = "   <p>Dear Sir/Madam,</p>
                    <p>We are proud to announce and invite you and your school to participate in the <b>$eventDetails->title</b>.  This contest, which will begin <b>$start_date</b> and end <b>$end_date</b>, is an excellent opportunity for your students to apply their lessons from the classroom to a real world.</p>
                    <p>Competition name: $eventDetails->title</p>
                    <p>Submit Applications on: <a href='$url'> Click here </a> </p>
                    <p>If you have any questions or you would like to participate, please contact us by email.  We look forward to submissions from your students.</p>
                    <p>Best regards,</p>
                    <p>Sultan of Art</p>
                    <p>info@sultanofart.com</p>
                    <p>www.sultanofart.com</p>";
        return view('admin.events.compose_invitation_mail')->with(['body' => $body, 'subject' => $subject, 'send_emails_address_str' => $send_emails_address_str]);
    }

    public function triggerEmail(Request $request)
    {
        $rules = [
            'subject' => 'required',
            'to' => 'required',
            'body' => 'required'
        ];
        $request->validate($rules);

        $subject = $request->input('subject');
        $to = $request->input('to');
        $body = $request->input('body');

        $maildata = [
            'subject' => $subject,
            'body' => $body
        ];

        $mail_to = explode(',', $to);
        Mail::to($mail_to)->send(new InvitationLetter($maildata));
        // var_dump( Mail:: failures());
        $flash = array('type' => 'success', 'msg' => 'Email Delivered');
        $request->session()->flash('flash', $flash);
        return redirect()->back();
    }
}
