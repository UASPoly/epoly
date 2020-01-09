<?php

namespace Modules\Student\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Modules\Department\Entities\Admission;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        for ($i=1; $i <= 5 ; $i++) { 
            switch ($i) {
                case '1':
                    //create 500 NDI student
                    for ($j=1; $j <=500 ; $j++) { 
                        $number = '191'.$this->getSerialNumber($j);
                        $this->registerThisStudent($number); 
                    }
                    break;
                case '2':
                    //create 500 NDII student
                    for ($k=1; $k <=500 ; $k++) { 
                        $number = '181'.$this->getSerialNumber($k);
                        $this->registerThisStudent($number); 
                    }
                    break;
                case '4':
                    //create 500 HNDI student
                    for ($l=1; $l <=500 ; $l++) { 
                        $number = '192'.$this->getSerialNumber($l);
                        $this->registerThisStudent($number); 
                    }
                    break;
                case '5':
                    //create 500 HNDII student
                    for ($m=1; $m <=500 ; $m++) {
                        $number = '182'.$this->getSerialNumber($m);
                        $this->registerThisStudent($number);
                    }    
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

    public function getSerialNumber($number)
    {
        if($number < 10){
            $new_number = '00'.$number;
        }else if ($number > 10 && $number < 100) {
            $new_number = '0'.$number;
        }else{
            $new_number = $number;;
        }
        return $new_number;
    }
    public function registerThisStudent($number)
    {
        $admission = Admission::firstOrCreate([
            'admission_no'=>$number,
            'head_of_department_id'=>1
        ]);
        $student = $admission->student()->firstOrCreate([
            'first_name'=> 'first name',
            'last_name'=> 'last name',
            'email'=> $number.'@poly.com',
            'phone'=>'08243434343',
            'student_session_id'=> 1,
            'student_type_id'=>  1,
            'password'=> Hash::make($number),
        ]);
        $student->studentAccount()->firstOrCreate([
            'gender_id'=>1,
            'tribe_id'=>1,
            'religion_id'=>1
        ]);
    }
}
