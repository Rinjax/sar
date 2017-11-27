<?php

namespace App\Http\Controllers;

use App\Managers\CalendarManager;
use App\Models\calendar;
use App\Models\calendar_attendance;
use App\Models\training_location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\member;
use Carbon\Carbon;


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
        
        return view('calendar')->with(['bookButton' => $bookButton]);
    }

    
    
    public function addEvent(request $request)
    {
        
        $cal = $this->calendarManager->addCalendarEvent($request->input('type'), $request->input('location'), $request->input('datetimepicker'), $request->input('notes'));
        
        if ($request->input('type') == 'Mock'){
            $this->calendarManager->addDogAssessment($cal->id, $request->input('assessor1'), $request->input('assessor2'));
        }

        Session::flash('success', 'event created');

        return back();
    }
    


    public function attendMockEvent(Request $request)
    {
        
        $this->calendarManager->attendEvent($request->input('calendar_id'), $request->input('calButton'));

        return redirect()->route('calendar');
    }
    


    public function modifyEvent($id)
    {

        $event = cal_training::where('id', (int)$id )->with('location')->with('attendance')->firstOrFail();

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
        
        $this->calendarManager->updateCalendar($request->input('eventID'), $request->input('location'), $request->input('datetimepicker1'), $request->input('note'));
        
        $this->calendarManager->removeAttendance($request->input('eventID'), $request->input('members_selected'));

        $this->calendarManager->addAttendance($request->input('eventID'), $request->input('members_selected'));

        return response()->json(['success' => true]);



    }

    
}
