<?php

namespace Modules\Admin\Http\Controllers\State;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Staff\Entities\State;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class StateController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::state.index',['states'=>State::all()]);
    }

    

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $stateId)
    {
        State::find($stateId)->update(['name'=>$request->name]);
        session()->flash('message','Stae updated');
        return back();
    }
}
