<?php

namespace Modules\Admin\Http\Controllers\College\Calendar\Management;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Services\Calender\CalenderInfo;
use Modules\Admin\Events\NewAcademicCalenderEvent;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Admin\Services\Calender\NewCalender as RegisterNewAcademicCalender;

class CalendarManagementController extends AdminBaseController
{
    use CalenderInfo;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::college.calendar.management.index');
    }

    public function updateSession(Request $request)
    {

        $this->validateRequest($request);

        switch ($request->update) {
            case 'session':
                currentSession()->update(['start'=>$request->start,'end'=>$request->end]);
                session()->flash('message', currentSession()->name.' Calendar updated');
                break;
            
            case 'allocation':
                foreach (currentSession()->semesterCalendars->where('semester_id',$request->semester_id) as $semesterCalendar) {
                    $semesterCalendar->courseAllocationCalendar->update(['start'=>$request->start,'end'=>$request->end]);
                    session()->flash('message', currentSession()->name.' '.$semesterCalendar->semester->name.' Course Allocation Calendar updated');
                }
                break;
            case 'lecture':
                foreach (currentSession()->semesterCalendars->where('semester_id',$request->semester_id) as $semesterCalendar) {
                    $semesterCalendar->lectureCalendar->update([
                        'start'=>$request->start,
                        'end'=>$request->end]);
                    session()->flash('message', currentSession()->name.' '.$semesterCalendar->semester->name.' Lecture Calendar updated');
                }
                break;
            case 'exam':
                foreach (currentSession()->semesterCalendars->where('semester_id',$request->semester_id) as $semesterCalendar) {
                    $semesterCalendar->examCalendar->update([
                        'start'=>$request->start,
                        'end'=>$request->end]);
                    session()->flash('message', currentSession()->name.' '.$semesterCalendar->semester->name.' Examination Calendar updated');
                }
                break;
            case 'marking':

                foreach (currentSession()->semesterCalendars->where('semester_id',$request->semester_id) as $semesterCalendar) {
                    $semesterCalendar->markingCalendar->update([
                        'start'=>$request->start,
                        'end'=>$request->end]);
                    session()->flash('message', currentSession()->name.' '.$semesterCalendar->semester->name.' Examination Marking Calendar updated');
                }
                break;
            case 'upload':
                foreach (currentSession()->semesterCalendars->where('semester_id',$request->semester_id) as $semesterCalendar) {
                    $semesterCalendar->uploadResultCalendar->update([
                        'start'=>$request->start,
                        'end'=>$request->end]);
                    session()->flash('message', currentSession()->name.' '.$semesterCalendar->semester->name.' Upload Examination Result Calendar updated');
                }
                break;                 
            default:
                session()->flash('error',['Un identify request']);
                break;
        }
        
        return back();
        
    }

    public function validateRequest(Request $request)
    {
        $request->validate([
            'start'=>'required',
            'end'=>'required'
        ]);
    }

    public function generate()
    {
       $calender = new RegisterNewAcademicCalender($this->newCalenderInfo(date('Y')));
        event(new NewAcademicCalenderEvent($calender->session));
        session()->flash('message', date('Y').' Academic calender generated success fully please verify it if there is need for amendment please do befor switching to the new generated calendar');
        return back();
    }

    public function view()
    {
        return view('admin::college.calendar.management.view');
    }
}
