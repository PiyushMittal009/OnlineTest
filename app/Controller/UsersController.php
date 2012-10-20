<?php
class UsersController extends AppController
{
    var $name='Users';
    public $uses = array (
        'User',
        'Question'
    );

    function user(){

        echo "i m in user controller";
    }
    
    function index(){
    	$data=$this->data;
    	$result = $this->User->login($data);
    	if(empty($result)){
    	// /$this->Session->setFlash("userid doesnt exists");
    	}
    	else{
    		if(($data['User']['pass']) == ($result['User']['password'] )){
    			if($result['User']['type'] == 'u')
	    			{  
	    				$this->Session->setFlash("welcome ".$result['User']['name']);
	    				$this->redirect(array('action' => 'cat'));
					}
				else{
					$this->Session->setFlash("admin user");
	    				$this->redirect(array('action' => 'admin'));

				}

    		}
    	
    	}
    	
    }

    function registration(){
    	$this->User->register($this->data);
    	$this->Session->setFlash("ho gaya, ab login kar");
    	$this->redirect(array('action'=>'index'));
    }

    function cat()
    {
    	if(!empty($this->data)){
		$this->Session->write('category' ,  $this->data['User']['CATEGORY'] );
        $this->Session->write('count' , 1);
	 	$this->redirect(array(
            'action' => 'question'
            ));
                                }

    } 

    function question(){ // fetch qn from queston model and pass result to result model
       
        $cat = $this->Session->read('category');
        $count = $this->Session->read('count');
        if(empty($this->data)) {
             $qns = $this->Question->select($cat , $count); 
        }
        else {
                $cat = $this->Session->read('category');
                $qns = $this->Question->select($cat , $count); // fetch qn
            }

            if($count > 2 )
                {
                   /*$this->Session->write('category ', 0 );*/
                   $this->Session->setFlash("go to result");
                   $this->redirect(array('action'=>'result')); // go to result page to show result
                }
            else
                {
                 $count++;
                 $this->Session->write('count' , $count);
                 $this->set('qns', $qns);
         }
    }



    function result(){

    }
}

?>