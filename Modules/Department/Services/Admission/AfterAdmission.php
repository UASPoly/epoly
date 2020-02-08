<?php
namespace Modules\Department\Services\Admission;

trait AfterAdmission
{
	public function revokeThisAdmission()
	{
		if($this->student->is_active == 1){
			$status = 'revoked';
            $this->student->is_active = 0;
        }else{
        	$status = 'activated';
            $this->student->is_active = 1;
        }
        $this->student->save();
        
        $this->student->update(['is_active'=>0]);

        return 'Congratulation this account has heen '.$status.' successfully';
	}

	public function deleteThisAdmission()
	{
        $this->reservedThisAdmissionNo();
		$this->student->studentAccount->delete();
        $this->student->delete();
        $this->delete();

        return 'Congratulation this admission is deleted successfully';
	}
}