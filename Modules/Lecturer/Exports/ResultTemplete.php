<?php

namespace Modules\Lecturer\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class ResultTemplete implements FromView
{

	protected $data;

	public function __construct(array $data)
	{
		$this->data = $data;
 	}

    public function view(): View
    {   
        return view('lecturer::course.result.scoreSheet', [
            'course'=>$this->data['course'],
            'session'=>$this->data['session'],
            'courseRegistrations'=>$this->data['courseRegistrations']
        ]);
    }

}
