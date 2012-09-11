<?php


    class Home extends AppModel {
        var $name = 'Home';
        public $validate = array(
            'name' => 'alphaNumeric',
            'email' => 'email'
        );
        // var $useDbConfig = 'name of other db connection';
    }