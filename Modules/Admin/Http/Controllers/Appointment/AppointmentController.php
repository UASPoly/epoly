<?php

namespace Modules\Admin\Http\Controllers\Appointment;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Admin\Services\Staff\SearchStaff as Searchable;

class AppointmentController extends AdminBaseController
{
    use Searchable;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::college.appointment.index');
    }

    public function searchStaff(Request $request)
    {
        $this->searchAvailableStaffs($request->all());
        return redirect()->route('admin.college.appointment.manage.display.staff');
    }

    public function displayStaff()
    {
        return view('admin::college.appointment.staff');
    }
}
