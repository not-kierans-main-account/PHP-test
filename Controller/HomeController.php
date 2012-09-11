<?php

    class HomeController extends AppController {
        var $name = 'Home';
        public $components = array('Session', 'Cookie', 'RequestHandler', 'Facebook');
        var $helpers = array('Html', 'Form', 'Js');

        function index($progress = null, $errors = null) {
            $this -> layout = 'default';

            $this -> set ('title_for_layout', 'Johnny 5, is ALIVE.');
        
           
            $like = $this -> Facebook -> getLike();
            
            //successfully completed form
            if ($progress == 1) {
                $buttonColour = 'blue';
                $buttonCopy = 'Thank you for your input';
            }
            
            //there were some errors that need fixing!
            elseif ($progress == -1){
                
                $buttonColour = 'grey';
                $buttonCopy = 'Re-submit';              
               
                
            }
            
            else {
                $buttonColour = 'blue';
                $buttonCopy = 'Need input';
            }

            if (isset($_COOKIE['c4lReg']))
            {
                $user = $_COOKIE['c4lReg'];
                $user = explode(',', $user);
                $this -> Set ('oldName', $user[0]);
                $this -> Set ('oldEmail', $user[1]);
                $this -> Set ('btnStatus', "disabled='disabled'");
            }
            
            $this -> Set (array(
                'buttonColour' => $buttonColour,
                'buttonCopy' => $buttonCopy,
                'like' => $like,
                'header1' => 'Do you want to be a pepper too?',
                'copyDeck' => 'Number 5 of a group of experimental robots in a lab is electrocuted, suddenly becomes intelligent, and escapes.',
                'errors' => (isset($errors)) ? unserialize($errors) : array(), //unserialize errors passed to handler
                'progress' => $progress
            ));

        }

        function saveData() {
            $this -> autoRender = false;
            $this -> layout = false;

            $userName  = $_POST['name'];
            $userEmail = $_POST['email'];
            
            
            $this -> Home -> set(array(
                'name' => $userName,
                'email' => $userEmail
            ));
            
            //get any validation errors
            $errors = $this-> Home ->invalidFields();
            
            //did they agree terms and conditions?
            if (!$_POST['tnc']){
                $errors['terms'] =  array('Please agree to the terms &amp; conditions');
            }

            //if we had errors, pass them back to the handler to be printed on template
            if ($errors){
                return $this->redirect(array('controller' => 'Home', 'action' => 'index', -1, serialize($errors)));
            }
            
            
            //looks like we're good...            
            $this -> Home -> Save();

            setcookie('c4lReg', $userName . ',' . $userEmail, time()+Configure::read('cookie.time'), Configure::read('cookie.path'), Configure::read('cookie.domain'));

            //redirect and set progress to 1
            $this->redirect(array('controller' => 'Home', 'action' => 'index', 1));
        }

        function tab() {
            $this -> layout = 'default';
        }

    }