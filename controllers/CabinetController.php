<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CabinetController
 *
 * @author andrey
 */
class CabinetController {
    //put your code here
    public function actionIndex(){
        
        $userId = user::checkLogged();
        
        $user = user::getUserById($userId);
        
        require_once (ROOT . TMPL . 'cabinet.php');
        
        return true;
    }
    
    public function actionEdit(){
        
        $userId = user::checkLogged();
        
        $user = user::getUserById($userId);
        
        
        $id = $user['id'];
        $name = $user['name'];
        $password = $user['password'];
        $email = $user['email'];
        
        $result = false;
        
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            
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
                $result = user::edit($id, $name, $password, $email);
            } 
        }
        
        require_once (ROOT . TMPL . 'edit.php');
        
        return true;
    }
}