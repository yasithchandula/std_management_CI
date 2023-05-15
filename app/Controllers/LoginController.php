<?php

namespace App\Controllers;
use Config\Services;
use App\Model\Student;
use App\Controllers\FormValidation;
use App\Model\User;
use CodeIgniter\Commands\Utilities\Environment;
use CodeIgniter\Controller;
use CodeIgniter\Shield\Config\Auth;
use Firebase\JWT\JWT;



class LoginController extends BaseController{

    /**
     * - This function handles the user login of the system
     * - will initialize a session
     * @return view
     */

    public function login(){

        $data=[
            'username'=>$this->request->getPost('username'),
            'password'=>$this->request->getPost('password')
        ];

        $pwstr = implode(' ', [' ',$data['password']]);
        

        $user=new User();


        if (!($user=$user->find($data['username']))){
            
            return redirect()->to(base_url('user_login'))->with('errors',['User not found']);

        }else{

            if(password_verify($pwstr,$user['password'])){

                session()->set('user',1);
    
                return redirect()->to(base_url('user_index'));

            }else{

                return redirect()->to(base_url('user_login'))->with('errors',['Incorrect Password']);

            }

        }
        
    }

    
    /**
     * - Destroys the login session
     * @return view
     */

    public function logout(){

        session()->destroy();
        return redirect()->to(base_url('user_login'));


    }
}















?>