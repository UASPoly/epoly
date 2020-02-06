<?php

namespace Modules\Core\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Staff\Entities\Lga;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getLgas($state_id)
    {
        return response()->json(Lga::where('state_id',$state_id)->pluck('name','id'));
    }

    
}
