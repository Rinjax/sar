<?php

namespace App\Http\Controllers;

use App\Managers\CalendarManager;
use App\Models\calendar;
use App\Models\calendar_attendance;
use App\Models\permission;
use App\Models\training_location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\member;
use Carbon\Carbon;
use App\Models\roles;


/**
 * @property mixed handler_id
 */
class CalendarController extends Controller
{
    
    protected $calendarManager;

    
    
    public function __construct()
    {
        $this->calendarManager = new CalendarManager();
    }
    
    
    
    
    public function index()
    {
        $bookButton = $this->calendarManager->allowBookMock();
        $locations = training_location::all();

        $data = [
            'bookButton' => false,
            'locations' => $locations,
            //'assessors1' => Auth::user(),

        ];

        $assessors2 = permission::where('permission', 'Mock Assessor')->first()->members()->get();

        $data['assessors2'] = $assessors2; //->except(Auth::id());

        //dd($data['assessors1']['id']);
        
        return view('calendar')->with($data);
    }

    
    
    public function addEvent(request $request)
    {
        dd($request);
        
        $cal = $this->calendarManager->addCalendarEvent($request->input('cal_type'), $request->input('location'), $request->input('datetimepicker'), $request->input('notes'));
        
        if ($request->input('cal_type') == 'Mock Assessment'){
            $this->calendarManager->addDogAssessment($cal->id, $request->input('assessor1'), $request->input('assessor2'));
        }

        Session::flash('success', 'event created');

        return back();
    }
    


    public function attendEvent(Request $request)
    {

       // dd($request);
        $this->calendarManager->attendEvent($request->input('cal_id'), $request->input('calButton'));

        return redirect()->route('calendar');
    }
    


    public function modifyEvent($id)
    {

        $event = calendar::where('id', (int)$id )->with('location')->with('attendance')->firstOrFail();

        $locations = training_location::all();

        $availableMembers = member::whereNotIn('name', $event->attendance->pluck('name'))->get();
        
        $data = [
            'event' => $event,
            'locations' => $locations,
            'availableMembers' => $availableMembers
        ];
        
        return view('admin.modifyEvent')->with($data);
    }

    public function modifyEventPost(Request $request)
    {
        //return response()->json($request->input('eventID'));
        
        $this->calendarManager->updateCalendar($request->input('eventID'), $request->input('location'), $request->input('datetimepicker1'), $request->input('note'));
        
        $this->calendarManager->removeAttendance($request->input('eventID'), $request->input('members_selected'));

        $this->calendarManager->addAttendance($request->input('eventID'), $request->input('members_selected'));

        return response()->json(['success' => true]);



    }

    
}
