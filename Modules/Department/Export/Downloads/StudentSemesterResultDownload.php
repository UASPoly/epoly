<?php

namespace Modules\Department\Export\Downloads;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class StudentSemesterResultDownload implements FromView
{

	protected $data;

	public function __construct($data)
	{
		$this->data = $data;
 	}

    public function view(): View
    {   
        return view('department::department.export.results.studentSemesterResult', ['semesterRegistration'=>$this->data]);
    }

}
