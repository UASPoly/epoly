<?php
namespace Modules\Department\Services\Admission;

trait AfterAdmission
{
	public function revokeThisAdmission()
	{
		if($this->student->is_active == 1){
			$status = 'activated';
            $this->student->is_active = 0;
        }else{
        	$status = 'revoked';
            $this->student->is_active = 1;
        }
        $this->student->save();
        
        $this->student->update(['is_active'=>0]);

        session()->flash('message','Congratulation this admission is '.$status.' successfully');
	}

	public function deleteThisAdmission()
	{
		$this->student->studentAccount->delete();
        $this->student->delete();
        $this->delete();
        session()->flash('message','Congratulation this admission is deleted successfully');
	}
}