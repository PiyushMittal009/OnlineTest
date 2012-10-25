
<?php
class UsersController extends AppController
{
    var $name='Users';
    public $uses = array (
        'User',
        'Question',
        'Result',
        'Cat'
    );

    function user(){

        echo "i m in user controller";
    }
    
    
    function registration(){
    	$this->User->register($this->data);
    	$this->Session->setFlash("ho gaya, ab login kar");
    	$this->redirect(array('action'=>'index'));
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
              if($result['User']['type'] == 'u'){
              $this->redirect(array('action' => 'cat'));
              }
                else{
                $this->Session->setFlash("admin user");
                $this->redirect(array('action' => 'admin'));
                }
            }
          }
        }
    function cat()
    { $name = $this->Session->read('user_name');
        $this->set('name',$name);
    	if(!empty($this->data)){
       
       // $this->set('name',$name);
		$this->Session->write('category' ,  $this->data['User']['CATEGORY'] );
        $this->Session->write('count' , 1);
        $this->Session->write('qno_push', array('0') );
        $this->Session->write('result' , 0 );
	 	$this->redirect(array(
            'action' => 'question'
            ));
                                }

    } 

    function question(){ ///**/ fetch qn from queston model and pass result to result model
      /*  $qno = rand(1, 10);
        $qno_push = $this->Session->read('qno_push');*/
        $flag = 0;
        while(!($flag)){
             $qno = rand(1, 10);
             $qno_push = $this->Session->read('qno_push');
             foreach($qno_push as $key){
             if($key == $qno){
             $flag = 2;
              break;
              }
            }
              if($flag != 2)
              {
                break;
              }
          
        }

        array_push($qno_push , $qno);
        $this->Session->write('qno_push', $qno_push);
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
            $qns = $this->Question->select($cat , $qno); 
			
            $cat = $this->Session->read('category');
            if($count > 5 )
                {
                  $qno_push = $this->Session->read('qno_push');
                  echo "<pre>";
                  print_r($qno_push);
                  echo "</pre>";
                  die;
                	$this->redirect(array('action'=>'result')); // go to result page to show result
                }
            else
                {
                 $count++;
                 $this->Session->write('count' , $count);
                 $this->Set('counter' , $count);
                 $this->set('qns', $qns);
         }
    }
             function result(){
                 $name = $this->Session->read('user_name');
                $this->set('name',$name);
                $result = $this->Session->read('result');
                $this->set('result',$result);
                  $cat = $this->Session->read('category');
              $all=$this->Question->all($cat);
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
                $current = date("y/m/d");
                 $previous = $this->Result->display($result , $category , $user_id ,$current);
                  $this->set('display',$previous);
             
                $store = $this->Cat->find('all',
                array('joins' => array(
                                       array('table' => 'results',
                                             'alias' => 'Result',
                                             'foreignKey' => false,
                                             'conditions'=> array('Result.cat_id = Cat.id')
                                        )),
                       
                      'conditions'=>array('Result.user'=>$user_id), 
                ));
                
                  $this->set('store',$store);

              }
          }

?>