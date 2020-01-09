<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Department\Entities\Course;
use Illuminate\Database\Eloquent\Model;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        foreach ($this->courses() as $course) {
            $course['department_id'] = 1;
            $course['semester_id'] = substr($course['code'], 4,1);
            switch (substr($course['code'], 3,1)) {
                case '1':
                    $course['level_id'] = substr($course['code'], 3,1);
                    break;
                case '2':
                    $course['level_id'] = substr($course['code'], 3,1);
                    break;
                case '3':
                    $course['level_id'] = substr($course['code'], 3,1)+1;
                    break;
                case '4':
                    $course['level_id'] = substr($course['code'], 3,1)+1;
                    break;            
                
                default:
                    $course['level_id'] = 3;
                    break;
            }
            $registeredCourse = Course::firstOrCreate($course);
            $registeredCourse->departmentCourses()->firstOrCreate(['department_id'=>1]);
        } 
    }

    public function courses()
    {
        return [
            //ND 1 COURSES
            [
                'semester_id'=>1,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'COM111',
                'title'=>'Introduction to Computer',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'COM112',
                'title'=>'Introduction to Digital Electronics',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'COM113',
                'title'=>'Introduction to Programming',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'MTH111',
                'title'=>'Logic and Linear Algebra',
                'unit'=>2
            ],    
            [
                'semester_id'=>1,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'MTH112',
                'title'=>'Functions and Geometry',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'STA111',
                'title'=>'Descriptive Statistics I',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'STA112',
                'title'=>'Elementary Probability Theory',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'GNS111',
                'title'=>'Communication in English I',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'GNS112',
                'title'=>'Citizenship Education 1',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'COM121',
                'title'=>'Scientific Programming Language Using OO Java',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'COM122',
                'title'=>'Introduction to the Internet',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'COM123',
                'title'=>'Computer Application Packages I',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'COM124',
                'title'=>'Data Structure and Algorithms',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'COM125',
                'title'=>'Introduction to System Analysis',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'COM126',
                'title'=>'PC Upgrade and Maintenance',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'COM129',
                'title'=>'Research Methods',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'EED126',
                'title'=>'Introduction to Entrepreneurship',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'GNS121',
                'title'=>'Citizenship Education II',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>1,
                'department_id'=>1,
                'code'=>'PHY122',
                'title'=>'Electricity I',
                'unit'=>2
            ],
            //ND II COURSES
            [
                'semester_id'=>1,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM211',
                'title'=>'Computer Programming Using OO BASIC',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM212',
                'title'=>'Introduction to Systems Programming',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM213',
                'title'=>'OO COBOL',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM214',
                'title'=>'File Organization and Management',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM215',
                'title'=>'Computer Packages II',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM216',
                'title'=>'Computer Systems Troubleshooting I',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'ACC211',
                'title'=>'Principles of Accounting',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'EED216',
                'title'=>'Practice of Entrepreneurship',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'OTM217',
                'title'=>'Office Practice and Management',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'SWS211',
                'title'=>'SIWES',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM221',
                'title'=>'OO FORTRAN',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM222',
                'title'=>'Seminar on Computer and Society',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM223',
                'title'=>'Basic Hardware Maintenance',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM224',
                'title'=>'Management Information System',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM225',
                'title'=>'Web Technology',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM226',
                'title'=>'Computer Systems Troubleshooting II',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'COM229',
                'title'=>'Project',
                'unit'=>4
            ],
            [
                'semester_id'=>2,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'STA226',
                'title'=>'Small Business Startup',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>2,
                'department_id'=>1,
                'code'=>'PHY221',
                'title'=>'Electricity II',
                'unit'=>2
            ],
            //CONVERSION COURSES 
            [
                'semester_id'=>1,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM011',
                'title'=>'Computer Programming Using OO BASIC',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM012',
                'title'=>'Introduction to Systems Programming',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM013',
                'title'=>'OO COBOL',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM014',
                'title'=>'File Organization and Management',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM015',
                'title'=>'Computer Packages II',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM016',
                'title'=>'Computer Systems Troubleshooting I',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'ACC011',
                'title'=>'Principles of Accounting',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'EED016',
                'title'=>'Practice of Entrepreneurship',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'OTM017',
                'title'=>'Office Practice and Management',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'SWS011',
                'title'=>'SIWES',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM021',
                'title'=>'OO FORTRAN',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM022',
                'title'=>'Seminar on Computer and Society',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM023',
                'title'=>'Basic Hardware Maintenance',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM024',
                'title'=>'Management Information System',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM025',
                'title'=>'Web Technology',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM026',
                'title'=>'Computer Systems Troubleshooting II',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'COM029',
                'title'=>'Project',
                'unit'=>4
            ],
            [
                'semester_id'=>2,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'STA026',
                'title'=>'Small Business Startup',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>3,
                'department_id'=>1,
                'code'=>'PHY021',
                'title'=>'Electricity II',
                'unit'=>2
            ],
            //HND I COURSES
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM311',
                'title'=>'Operating System I',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM312',
                'title'=>'Database Design I',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM313',
                'title'=>'Computer Programming Using C++',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM314',
                'title'=>'Computer Architecture',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM315',
                'title'=>'Computer Electronics I',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'STA311',
                'title'=>'Operations Research I',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'STA314',
                'title'=>'Statistics Theory I',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'MTH313',
                'title'=>'Numerical Method',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'OTM315',
                'title'=>'Business Communications I',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM321',
                'title'=>'Operating system II',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM322',
                'title'=>'Database Design II',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM323',
                'title'=>'Assembly Language',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM324',
                'title'=>'Introduction to Software Engineering',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM325',
                'title'=>'Introduction to Human-Computer Interface (HCI)',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'EED323',
                'title'=>'Entrepreneurship Development I',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'STA321',
                'title'=>'Statistics Theory II',
                'unit'=>3
            ],
            //HND II COURSES
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM411',
                'title'=>'Computer Electronics II',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM412',
                'title'=>'Computer Programming (OO PASCAL)',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM413',
                'title'=>'Project Management',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM414',
                'title'=>'Compiler Construction',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM415',
                'title'=>'Data Communication and Networks',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM416',
                'title'=>'Multimedia',
                'unit'=>3
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'EED413',
                'title'=>'Entrepreneurship Development II',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'OTM412',
                'title'=>'Business Communications II',
                'unit'=>2
            ],
            [
                'semester_id'=>1,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'STA411',
                'title'=>'Operations Research II',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM422',
                'title'=>'Computer Graphics and Animation',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM423',
                'title'=>'Introduction to Artificial Intelligence and Expert systems.',
                'unit'=>3
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM424',
                'title'=>'Professional Practice in IT ',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM425',
                'title'=>'Seminar on current topics in computing ',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM426',
                'title'=>'Small Business Start Up',
                'unit'=>2
            ],
            [
                'semester_id'=>2,
                'level_id'=>5,
                'department_id'=>1,
                'code'=>'COM429',
                'title'=>'Project',
                'unit'=>4
            ]
        ];
    }   
}
