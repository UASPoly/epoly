<?php

namespace Modules\Admin\Http\Controllers\College;

use Illuminate\Http\Response;
use Modules\College\Entities\College;
use Modules\College\Http\Requests\CollegeFormRequest;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CollegeController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::college.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::college.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(CollegeFormRequest $request)
    {
        admin()->colleges()->firstOrCreate([
            'name'=>$request->name,
            'established_date'=>$request->established_date,
            'description'=>$request->description,
            'code'=>$request->code
        ]);
        session()->flash('message','College created successfully');
        return redirect()->route('admin.college.index');
    }

    public function edit($college,$college_id)
    {
        return view('admin::college.edit',['college'=>College::find($college_id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CollegeFormRequest $request, $college, $college_id)
    {
        $college = College::find($college_id);
        $college->update([
            'name'=>$request->name,
            'established_date'=>$request->established_date,
            'description'=>$request->description,
            'code'=>$request->code
        ]);

        session()->flash('message','College updated successfully');
        return redirect()->route('admin.college.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($college,$college_id)
    {
        $college = College::find($college_id);
        if($college->departments){
            session()->flash('error',['Sorry you cannot delete this college because there are other departments references this college for you to delete it you have to delete all other departments under it']);
        }else{
            $college->delete();
            session()->flash('message','College deleted successfully');
        }
        
        return redirect()->route('admin.college.index');
    }
}
