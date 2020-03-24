<?php

use Modules\Admin\Entities\Session;
use RealRashid\SweetAlert\Facades\Alert;

if (!function_exists('user_image')) {
    function user_image()
    {
        if(auth()->guard('admin')->check()){
            $image = 'img/user.png';
        }elseif (auth()->guard('staff')->check()) {
            $image = optional(staff()->profile)->picture;
        }elseif (auth()->guard('lecturer')->check()) {
            $image = optional(lecturer()->staff->profile)->picture;
        }elseif (auth()->guard('head_of_department')->check()) {
            $image = headOfDepartment()->staff->profile->picture;
        }elseif (auth()->guard('directer')->check()) {
            $image = optional(directer()->staff->profile)->picture;
        }elseif(auth()->guard('exam_officer')->check()){
            $image = examOfficer()->lecturer->staff->profile->picture;
        }elseif(auth()->guard('student')->check()){
            $image = student()->studentAccount->picture;
        }
        if(!isset($image)){
            $image = 'img/user.png';
        }
        return $image;
    }
}

if (!function_exists('logout_route')) {
    function logout_route()
    {
        if(auth()->guard('admin')->check()){
            $route = 'admin.auth.logout';
        }elseif (auth()->guard('staff')->check()) {
            $route = 'staff.auth.logout';
        }elseif (auth()->guard('lecturer')->check()) {
            $route = 'lecturer.auth.logout';
        }elseif (auth()->guard('head_of_department')->check()) {
            $route = 'department.hod.auth.logout';
        }elseif (auth()->guard('directer')->check()) {
            $route = 'college.directer.auth.logout';
        }elseif(auth()->guard('exam_officer')->check()){
            $route = 'exam.officer.auth.logout';
        }else{
            $route = 'student.auth.logout';
        }
        return $route;
    }
}

if (!function_exists('calendar_route')) {
    function calendar_route()
    {
        if(auth()->guard('admin')->check()){
            $route = 'admin.college.calendar.management.view';
        }elseif (auth()->guard('staff')->check()) {
            $route = 'staff.calendar.view';
        }elseif (auth()->guard('lecturer')->check()) {
            $route = 'lecturer.calendar.view';
        }elseif (auth()->guard('head_of_department')->check()) {
            $route = 'department.calendar.view';
        }elseif (auth()->guard('directer')->check()) {
            $route = 'college.calebdar.view';
        }elseif(auth()->guard('exam_officer')->check()){
            $route = 'exam.officer.calendar.view';
        }elseif(auth()->guard('student')->check()){
            $route = 'student.calendar.view';
        }else{
            $route = 'calendar.view';
        }
        return $route;
    }
}

if (!function_exists('hasCurrentSession')) {
    function hasCurrentSession()
    {
        $start = date('Y')-1;
        $end = date('Y');
        $name = $start.'/'.$end;
        $flag = false;
        foreach (Session::where('name',$name)->get() as $session) {
            $flag = true;
        }
        return $flag;
    }
}

if (!function_exists('currentSemester')) {
    function currentSemester()
    {
        $semester = null;
        foreach (currentSession()->semesterCalendars as $semesterCalendar) {
            if(substr($semesterCalendar->end,5,2) >= date('m')){
                return $semesterCalendar->semester;
            }
        }
    }
}

if (!function_exists('home_route')) {
    function home_route()
    {
        if(auth()->guard('admin')->check()){
            $route = 'admin.dashboard';
        }elseif (auth()->guard('staff')->check()) {
            $route = 'staff.dashboard';
        }elseif (auth()->guard('lecturer')->check()) {
            $route = 'lecturer.dashboard';
        }elseif (auth()->guard('head_of_department')->check()) {
            $route = 'department.hod.dashboard';
        }elseif (auth()->guard('directer')->check()) {
            $route = 'college.directer.dashboard';
        }elseif(auth()->guard('exam_officer')->check()){
            $route = 'exam.officer.dashboard';
        }else{
            $route = 'student.dashboard';
        }
        return $route;
    }
}

if (!function_exists('storage_url')) {
    function storage_url($url)
    {
        return blank($url) ? $url: Storage::url($url);
    }
}

if (!function_exists('admin')) {
    function admin()
    {
        $admin = null;
        if(auth()->guard('admin')->check()){
            $admin = auth()->guard('admin')->user();
        }
        return $admin;
    }
}

if (!function_exists('staff')) {
    function staff()
    {
        $staff = null;
        if(auth()->guard('staff')->check()){
            $staff = auth()->guard('staff')->user();
        }
        return $staff;
    }
}

if (!function_exists('examOfficer')) {
    function examOfficer()
    {
        $examOfficer = null;
        if(auth()->guard('exam_officer')->check()){
            $examOfficer = auth()->guard('exam_officer')->user();
        }
        return $examOfficer;
    }
}

if (!function_exists('student')) {
    function student()
    {
        $student = null;
        if(auth()->guard('student')->check()){
            $student = auth()->guard('student')->user();
        }
        return $student;
    }
}

if (!function_exists('lecturer')) {
    function lecturer()
    {
        $lecturer = null;
        if(auth()->guard('lecturer')->check()){
            $lecturer = auth()->guard('lecturer')->user();
        }
        return $lecturer;
    }
}


if (!function_exists('directer')) {
    function headOfDepartment()
    {
        $headOfDepartment = null;
        if(auth()->guard('head_of_department')->check()){
            $headOfDepartment = auth()->guard('head_of_department')->user();
        }
        return $headOfDepartment;
    }
}

if (!function_exists('directer')) {
    function directer()
    {
        $directer = null;
        if(auth()->guard('directer')->check()){
            $directer = auth()->guard('directer')->user();
        }
        return $directer;
    }
}

if (!function_exists('currentSession')) {
    function currentSession()
    { 
        $currentSession = null;
        foreach (Session::where('status',1)->get() as $session) {
            $currentSession = $session;
        }
        return $currentSession;
    }
}

if (!function_exists('lastSession')) {
    function lastSession()
    {    
        return Session::find(currentSession()->id-1);
    }
}

if (!function_exists('sessions')) {
    function sessions()
    {    
        return Session::all();
    }
}

if (!function_exists('department')) {
    function department()
    {    
        $department = null;
        if(headOfDepartment()) {
            $department = headOfDepartment()->department;
        }elseif (examOfficer()) {
            $department = examOfficer()->department;
        }elseif (student()) {
            $department = student()->admission->department;
        }elseif (lecturer()) {
            $department = lecturer()->staff->department;
        }
        return $department;
    }
}



        