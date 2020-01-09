<?php

namespace Modules\Department\Http\Controllers\Admission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class DiferringController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.admission.diferring.index');
    }

    
    public function verify($type,$id)
    {
        if($type == 'session'){
            $session = DiferredSession::find($id);
            $session->update(['diferring_status_id'=>2]);
        }else{
            $session = DiferredSemester::find($id);
            $session->update(['diferring_status_id'=>2]);
        }
        session()->flash('message','The diferring Application is approve successfully and passed the request to the exam officer for the actual implementation of the Application');
        return back();
    }

    public function delete($type,$id)
    {
        
        if($type == 'session'){
            $session = DiferredSession::find($id);
            $session->delete();
        }else{
            $session = DiferredSemester::find($id);
            $session->delete();
        }

        session()->flash('message','The diferring Application has been deleted successfully');
        return back();
    }
    
}
