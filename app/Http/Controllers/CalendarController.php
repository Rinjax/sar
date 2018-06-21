<?php

namespace App\Http\Controllers;

use App\Managers\CalendarManager;
use App\Managers\TimesheetManager;
use App\Models\Calendar;
use App\Models\CalendarAttendance;
use App\Models\DogAssessment;
use App\Models\Permission;
use App\Models\TrainingLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



/**
 * @property mixed handler_id
 */
class CalendarController extends Controller
{
    
    protected $calendarManager;

    protected $timesheetManager;

    
    
    public function __construct()
    {
        $this->calendarManager = new CalendarManager();

        $this->timesheetManager = new TimesheetManager();
    }
    
    
    
    
    public function index()
    {
        $bookButton = $this->calendarManager->allowBookMock();
        $locations = TrainingLocation::all();

        $data = [
            'bookButton' => $bookButton,
            'locations' => $locations,

        ];

        $assessors2 = Permission::where('permission', 'Mock Assessor')->first()->members()->get();

        $data['assessors2'] = $assessors2->except(Auth::id());
        
        return view('calendar')->with($data);
    }

    
    
    public function addEvent(Request $request)
    {
        $cal = $this->calendarManager->addCalendarEvent($request->input('cal_type'), $request->input('location'), $request->input('datetimepicker'), $request->input('notes'));
        
        if ($request->input('cal_type') == 'Mock Assessment'){
            $this->calendarManager->addDogAssessment($cal->id, $request->input('assessor1'));

            $this->calendarManager->addAttendance($cal->id, [Auth::id()]);
        }

        Session::flash('success', 'event created');

        return back();
    }

    public function removeEventPost(Request $request)
    {
        $this->calendarManager->removeCalendarEvent($request->input('cal_id'));

        Session::flash('success', 'Calendar Event Removed');

        return back;
    }
    


    public function attendEvent(Request $request)
    {
        $this->calendarManager->attendEvent($request->input('cal_id'), $request->input('calButton'));

        return redirect()->route('calendar');
    }
    


    public function modifyEvent($id)
    {

        $event = Calendar::where('id', (int)$id )->with('location')->with('attendance')->firstOrFail();

        $locations = TrainingLocation::all();

        $availableMembers = Member::whereNotIn('name', $event->attendance->pluck('name'))->orderBy('name')->get();
        
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

        Session::flash('success', 'Calendar Updated');

        return redirect()->route('calendar');



    }

    public function timesheetIndex($id)
    {
        $attendance = $this->timesheetManager->getCalendarAttendance($id);

        $event = $this->timesheetManager->getCalendarEvent($id);
        
        return view('admin.timesheet')->with(['event' => $event, 'attendance' => $attendance]);
    }

    public function timesheetPost(Request $request)
    {
        foreach ($request->except('_token','eventID') as $key => $val){
            if(!$val == null){
                $e = explode('_',$key);
                CalendarAttendance::where([
                    ['member_id', $e[1]], ['calendar_id', $request->input('eventID')]
                ])->update(['clock_'.$e[0] => $val]);
            }

        }

        Session::flash('success', 'Timesheet Updated');

        return redirect()->route('calendar');
    }

    public function addSecondAssessor(Request $request)
    {
       
        $id = $request->input('id');

        $member = Auth::user();
        
        $assessment = DogAssessment::where('calendar_id', $id)->first();

        if($assessment->assessor_2_id != null) return response()->json(['error' => true]);

        $assessment->assessor_2_id = $member->id;

        $assessment->save();

        CalendarAttendance::create([
            'calendar_id' => $id,
            'member_id' => $member->id
        ]);

        return response()->json(['Assessor' => $member->name], 200);
    }

    
}
