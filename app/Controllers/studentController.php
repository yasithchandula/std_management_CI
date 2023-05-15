<?php

namespace App\Controllers;
use Config\Services;
use App\Model\Student;
use App\Controllers\FormValidation;
use CodeIgniter\Shield\Config\Auth;


/**
 * - This class created as a controller class for the Student model
 * 
 */

class StudentController extends BaseController{

    /**
     * - Restrives list of all students from the database
     * - @return Array
     */
    public function index (){

        if (session('user')==0){

            return view('user/login');

        }

        $student=new Student();

        $data['student']=$student->findAll();
        return view('student/index',$data);
    }



    /**
     * - Returns the student create view
     * @return String
     */
    public function create(){
        if (session('user')==0){

            return view('user/login');

        }
        return view('student/create');
    }
    


    /**
     * - Retrives sudent data from post request
     * - Validate the data
     * - If validated Save student data to the database
     * - if there are validation errors back to form with errors
     * 
     * @return \CodeIgniter\HTTP\RedirectResponse
     *
     */

    public function store(){

            $data=[
                'firstName'=>$this->request->getPost('firstName'),
                'lastName'=>$this->request->getPost('lastName'),
                'birthday'=>$this->request->getPost('birhtday'),
                'address'=>$this->request->getPost('address'),
                'contactNumber'=>$this->request->getPost('contactNumber'),
                'department'=>$this->request->getPost('department'),
                'course'=>$this->request->getPost('course'),
            ];
    
            $rules=[
                'firstName'=>['required','min_length[4]','alpha_space'],
                'lastName'=>['required','min_length[4]','alpha_space'],
                'birthday'=>['valid_date'],
                'address'=>'required',
                'contactNumber'=>['required','exact_length[10]','decimal'],
                'department'=>['required','min_length[2]','alpha_space'],
                'course'=>['required','min_length[2]','alpha_space'],
            ];
            
            if (! $this->validateData($data, $rules)) {

                return redirect()->back()->with('errors', $this->validator->getErrors());

            }else{

                $student=new Student();
                $student->save($data);
                return redirect()->to(base_url('student'))->with('errors','Student Successfully added');

            }
    }
    


    /**
     * - Redirect to single student edit view
     * @param number 
     * - Student ID
     * @return String
     */

    public function edit($id){

        if (session('user')==0){

            return view('user/login');

        }

        $student=new Student();
        $data['student']=$student->find($id);

        return view('student/edit', $data );

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
            'firstName'=>$this->request->getPost('firstName'),
            'lastName'=>$this->request->getPost('lastName'),
            'birthday'=>$this->request->getPost('birhtday'),
            'address'=>$this->request->getPost('address'),
            'contactNumber'=>$this->request->getPost('contactNumber'),
            'department'=>$this->request->getPost('department'),
            'course'=>$this->request->getPost('course'),
        ];

        $rules=[
            'firstName'=>['required','min_length[4]','alpha_space'],
            'lastName'=>['required','min_length[4]','alpha_space'],
            'birthday'=>['valid_date'],
            'address'=>'required',
            'contactNumber'=>['required','exact_length[10]','decimal'],
            'department'=>['required','min_length[2]','alpha_space'],
            'course'=>['required','min_length[2]','alpha_space'],
        ];

        if (! $this->validateData($data, $rules)) {

            return redirect()->back()->with('errors', $this->validator->getErrors());

        }else{

            $student=new Student();
            $student->update($id,$data);

            return redirect()->to(base_url('student'))->with('status','Student Successfully added');
        }
    }



    /**
     * Delete user record from the database
     * 
     * @param Decimal 
     * - Student ID
     * 
     * @return String
     */

    public function delete($id){

        $student=new Student();
        $student->delete($id);

        return redirect()->to(base_url('student'))->with('status','Student successfully deleted');

    }


    
    /**
     * Search Student in the database
     * @return view
     */
    public function stdsearch(){
        $student=new Student();
        $searchk=$this->request->getPost('searchkey');
        $data['student']=$student->like('firstname',$searchk)->findAll();
        return view('student/index',$data);


    }
}

?>