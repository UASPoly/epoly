<?php

namespace Modules\Admin\Http\Controllers\State\Lga;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Staff\Entities\Lga;
use Modules\Staff\Entities\State;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class LgaController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($stateId)
    {
        return view('admin::state.lga.index',['lgas'=>State::find($stateId)->lgas]);
    }

    

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $stateId, $lgaId)
    {
        $request->validate(['state_id'=>'required','name'=>'required']);

        Lga::find($lgaId)->update(['name'=>$request->name,'state_id'=>$request->state_id]);
        session()->flash('message','Local Government updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($stateId,$lgaId)
    {
        $lga = Lga::find($lgaId);
        if(count($lga->studentAccounts)==0){
            $lga->delete();
            session()->flash('message','Local government deleted deleted');
        }else{
            session()->flash('error',['Sorry you cant delete this local government because there are some student account referencing it to delete it you have to delete to delete it you must delete all the student of that local government']);
        }
        return back();
    }
}
