<?php

namespace Modules\Department\Export\Downloads;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class ABFormatDownload implements FromView
{

	protected $data;
	protected $semester;

	public function __construct($data,$semester)
	{

        $this->data = $data;
        $this->semester = $semester;
 	}

    public function view(): View
    {   
        return view('department::department.export.results.abformat', ['semester'=>$this->semester,'registrations'=>$this->data]);
    }

}
