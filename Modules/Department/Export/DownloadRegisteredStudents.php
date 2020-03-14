<?php

namespace Modules\Department\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DownloadRegisteredStudents implements FromView
{

	protected $data;

	public function __construct(array $data)
	{
		$this->data = $data;
 	}

    public function view(): View
    {   
        return view('department::department.export.students', ['students'=>$this->data]);
    }

}
