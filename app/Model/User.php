<?php
class User extends AppModel{
    var $name= 'User';

    function register($data = array()){
    	pr($data);
    	$this->set(
            array(

                'name' => $data['User']['name'],
                'email' => $data['User']['email'],
                'phone' => $data['User']['phone'],
                'password' =>$data['User']['password'],
                'gender' => $data['User']['gender']

            )
        );
        $this->save();
    }

    function login($data = array()){
	$result = $this->find('first',array(
                 'conditions' => array(
                     'User.email' => $data['User']['user']
                     /* OR 
                     'users.phone' => $data['User']['user']*/
                 )
             )


		);
		return $result;
    }
}
?>