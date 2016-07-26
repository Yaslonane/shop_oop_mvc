<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author andrey
 */
class UserController {
    //put your code here
    
    public function actionRegister(){
        
        $name = '';
        $email = '';
        $password = '';
        $result = false;
            
        if(isset($_POST['submit'])){
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if(!user::checkName($name)){
                $errors[] = 'Warning!!! It\'s name short 2 elements';
            }
            
            if(!User::checkPassword($password)){
                $errors[] = 'Warning!!! It\'s password short 6 elements';
            }
            
            if(!User::checkEmail($email)){
                $errors[] = 'Warning!!! It\'s e-mail dont valid';
            }
            
            if(user::checkEmailExists($email)){
                $errors[] = 'Sorry, this is e-mail is using';
            }
            
            if($errors == false){
                $result = (user::register($name, $password, $email));
            }
            
        }
        
        
        require_once (ROOT. TMPL. 'register.php');
        
        return true;
    }
    
    public function actionLogin(){
        
        $email = '';
        $password = '';
        
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            // valid data login and password
            if(!user::checkEmail($email)){
                $errors[] = 'Неверный e-mail';
            }
            if(!user::checkPassword($password)){
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }
            
            //check exist user
            $userId = user::checkUserData($email, $password);
            
            if($userId == false){
                $errors[] = 'Uncorrect login and/or password';
            }
            else {
                user::auth($userId);
                
                header("Location: /cabinet/");
            }
        }
        
        require_once (ROOT . TMPL . 'login.php');
        
        return true;
    }
    
    public function actionLogout(){
        
        session_start();
        unset($_SESSION['user']);
        
        header("location: /");
    }
    
}
