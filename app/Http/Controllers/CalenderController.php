<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Session;
class CalenderController extends Controller
{
	
    public function getThisSession($session)
    {
        foreach (Session::where('name',str_replace('-','/',$session))->get() as $session) {
            return $session;
        }
    }

    public function viewCalender($session)
    {   
        $current_session = $this->getThisSession($session);
        if(!$current_session){
            session()->flash('error',['sorry no calender register for '.$session]);
            return back();
        }
        return view('admin::calender.view',['session'=>$current_session]);
    }
}
