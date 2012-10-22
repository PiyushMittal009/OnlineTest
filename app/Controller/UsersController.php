
<?php
class UsersController extends AppController
{
    var $name='Users';
    public $uses = array (
        'User',
        'Question',
        'Result'
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
       // pr($result);
        
    	else{
    		if(($data['User']['pass']) == ($result['User']['password'])){

                $this->Session->write('user_id' , $result['User']['id']);
                $this->Session->write('user_name' , $result['User']['name']);
    			if($result['User']['type'] == 'u')
	    			{  
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
    { $name = $this->Session->read('user_name');
        $this->set('name',$name);
    	if(!empty($this->data)){
       
       // $this->set('name',$name);
		$this->Session->write('category' ,  $this->data['User']['CATEGORY'] );
        $this->Session->write('count' , 1);
        $this->Session->write('result' , 0 );
	 	$this->redirect(array(
            'action' => 'question'
            ));
                                }

    } 

    function question(){ // fetch qn from queston model and pass result to result model
        $name = $this->Session->read('user_name');
        $this->set('name',$name);
        $cat = $this->Session->read('category');
        $count = $this->Session->read('count');
        $result = $this->Session->read('result');
         if(!empty($this->data))
            {
            		if($this->data['answer'] == $this->data['User']['option']){
            		$result++;
            		$this->Session->write('result' , $result);
            		}
            }
            $qns = $this->Question->select($cat , $count); 
			
            $cat = $this->Session->read('category');
            if($count > 2 )
                {
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
                 $name = $this->Session->read('user_name');
                $this->set('name',$name);
                $result = $this->Session->read('result');
                $this->set('result',$result);
              $all=$this->Question->all();
              if(!empty($all))
              {
                $this->set('all', $all);
              }
                    }

            function prev_result()
            {
                $result = $this->Session->read('result');
                 $category = $this->Session->read('category');
                $user_id = $this->Session->read('user_id');
                $current = date("d/m/y");
                 $previous = $this->Result->display($result , $category , $user_id ,$current);
                $this->set('display',$previous);
            }
}

?>