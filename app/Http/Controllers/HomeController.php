<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Staff\Entities\Lga;
use Modules\Department\Entities\Programme;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getLgas($state_id)
    {
        return response()->json(Lga::where('state_id',$state_id)->pluck('name','id'));
    }
}
