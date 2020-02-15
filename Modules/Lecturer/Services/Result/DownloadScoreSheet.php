<?php
namespace Modules\Lecturer\Services\Result;
/**
* this class will download the score sheet of the course at particular session
*/
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Course;
use Modules\Lecturer\Exports\ResultTemplete;
use Modules\Student\Entities\CourseRegistration;

class DownloadScoreSheet
{
    protected $data;

    protected $course; 

    protected $session; 

    protected $courseRegistrations;

	function __construct(array $data)
	{
		$this->data = $data;
        $this->currentCourse();
        $this->currentSession();
        $this->availableRegisteredStudent();
	}
    
    public function currentCourse()
    {
     	$this->course = Course::find($this->data['course']);
    }

    public function currentSession()
    {
     	$this->session = Session::find($this->data['session']);
    }

    public function availableRegisteredStudent()
    {
        $this->courseRegistrations = CourseRegistration::where(['department_id'=>$data['department'],'course_id'=>$this->data['course'],'session_id'=>$this->data['session'],'drop_status'=>0])->get();
    }

	public function getFileData()
	{
        return ['courseRegistrations'=>$this->courseRegistrations,
            'session'=>$this->session,
            'course'=>$this->course
        ];
	}
	public function getFileName()
	{
		return $this->course->code.'_'.str_replace('/','_',$this->session->name).'_Result_Sheet.csv';
	}

	public function downloadFile()
	{
		return Excel::download(new ResultTemplete($this->getFileData()), $this->getFileName(),'Csv',['Content-Type' => 'text/csv']);
	}
}