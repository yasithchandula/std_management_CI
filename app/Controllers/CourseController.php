<?php

namespace App\Controllers;
use Config\Services;
use App\Model\Course;
use App\Controllers\FormValidation;
use CodeIgniter\Shield\Config\Auth;

class CourseController extends BaseController{


    /**
     * - Restrives list of all Courses from the database
     * - @return Array
     */
    public function index(){

        if (session('user')==0){

            return view('user/login');

        }

        $course=new Course();

        $data['course']=$course->findAll();

        return view('course/index',$data);

    }



    /**
     * - Returns the Course create view
     * @return String
     */
    public function create(){
        if (session('user')==0){

            return view('user/login');

        }

        return view('course/create');
    }


    /**
     * - Retrives course data from post request
     * - Validate the data
     * - If validated Save course data to the database
     * - if there are validation errors back to form with errors
     * 
     * @return \CodeIgniter\HTTP\RedirectResponse
     *
     */

     public function store(){

        $data=[
            'cID'=>$this->request->getPost('cID'),
            'Department'=>$this->request->getPost('Department'),
            'Course'=>$this->request->getPost('Course'),
            'fee'=>$this->request->getPost('fee'),
        ];

        $rules=[
            'cID'=>['required',],
            'Department'=>['required'],
            'Course'=>['required'],
            'fee'=>['required','decimal'],
        ];
        
        if (! $this->validateData($data, $rules)) {

            return redirect()->back()->with('errors', $this->validator->getErrors());

        }else{

            $course=new Course();
            $course->insert($data);

            return redirect()->to(base_url('course'))->with('message','course Successfully added');

        }

    }


    /**
     * - Redirect to single course edit view
     * @param number 
     * - course ID
     * @return String
     */

    public function edit($id){

        if (session('user')==0){

            return view('user/login');

        }

        $course=new Course();
        $data['course']=$course->find($id);

        return view('Course/edit', $data );

    }


        /**
     * 
     * - Retrives the updated sudent data from post request
     * - Validate the data
     * - If validated update the database
     * - if there are validation errors redirect back to the form with errors
     * @param Decimal 
     * - Student ID
     * @return String
     * 
     */

     public function update($id){

        $data=[
            'cID'=>$this->request->getPost('cID'),
            'Department'=>$this->request->getPost('Department'),
            'Course'=>$this->request->getPost('Course'),
            'fee'=>$this->request->getPost('fee'),
        ];

        $rules=[
            'cID'=>['required',],
            'Department'=>['required'],
            'Course'=>['required'],
            'fee'=>['required','decimal'],
        ];

        if (! $this->validateData($data, $rules)) {

            return redirect()->back()->with('errors', $this->validator->getErrors());

        }else{

            $course=new Course();
            $course->update($id,$data);

            return redirect()->to(base_url('course'))->with('status','course Successfully added');
        }
    }



    /**
     * Delete course record from the database
     * 
     * @param Decimal 
     * - Course ID
     * 
     * @return String
     */

     public function delete($id){

        $course=new Course();
        $course->delete($id);

        return redirect()->to(base_url('course'))->with('status','course successfully deleted');

    }



    /**
     * - Search Courses from the database
     * @return view
     */

    public function crsearch(){
        $course=new Course();
        $searchk=$this->request->getPost('searchkey');
        $data['course']=$course->like('course',$searchk)->findAll();
        return view('course/index',$data);

    }


}


?>
