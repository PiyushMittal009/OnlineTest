<?php
class UsersController extends AppController
  {
    var $name='Users';
    public $uses = array(
        'User',
        'Question',
        'Result',
        'Cat'
        );

    function beforeFilter() 
    {
      $this->disableCache();
      switch ($this->action)
      {
        case 'index':
        $this->title = 'Online Test :: Login';
        break;
        default:
        $this->title = 'Welcome';
        break;
      }
      $this->set('title',$this->title);
      $this->Session->write('currentPage', $this->action);
      $this->Session->write('currentController', $this->params['controller']);
      if ($this->action != 'index')
      {
        if ($this->Session->check('user_name') == false) 
        {
          $this->redirect(array('controller' => 'Users', 'action' => 'index'));
        }
      }
    }

    function registration()
    {
     $this->User->register($this->data);
     $to = $this->data['User']['email'];
     $subject = 'Testing sendmail.exe';
     $message = 'Hi, you are registered in OnlineTest';
     $headers = 'From: mittal.piyush100@gmail.com' . "\r\n" .
     'Reply-To: mittal.piyush100@gmail.com' . "\r\n" .
     'MIME-Version: 1.0' . "\r\n" .
     'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();
     mail($to, $subject, $message, $headers);
     $this->Session->setFlash("Registered");
     $this->redirect(array('action'=>'index'));
    }

    function index()
    {
      $data=$this->data;
      $result = $this->User->login($data);
      if(!empty($result))
      {
        if(($data['User']['pass']) == ($result['User']['password']))
          {
            $this->Session->write('user_id' , $result['User']['id']);
            $this->Session->write('user_name' , $result['User']['name']);
            if($result['User']['type'] == 'u')
              {
                $this->redirect(array('action' => 'cat'));
              }
            else
              {
                $this->redirect(array('action' => 'admin'));
              }
          }
       }
    }
  
    function cat()
    { 
      $name = $this->Session->read('user_name');
      $this->set('name',$name);
      $cats = $this->Cat->category();
      $this->set('cats',$cats);
    	if(!empty($this->data))
      {
         pr($this->data);
        $this->Session->write('category' , $this->data['User']['CATEGORY'] );
        $this->Session->write('count' , 1);
        $this->Session->write('qno_push', array('0') );
        $this->Session->write('result' , 0 );
	 	    $this->redirect(array('action' => 'question'));
      }
    } 

    function question()   // fetch qn from queston model and pass result to result model
    {
      $qno_push = $this->Session->read('qno_push');
      do     // function for prevent repeated values
      {
        $qno = rand(1 ,10);
      }
      while(in_array($qno , $qno_push));
      array_push($qno_push , $qno); // appending array
      $this->Session->write('qno_push', $qno_push);
      $name = $this->Session->read('user_name');
      $this->set('name',$name);
      $cat = $this->Session->read('category');
      $count = $this->Session->read('count');
      $result = $this->Session->read('result');
      if(!empty($this->data))
      {
        if($this->data['answer'] == $this->data['User']['option'])
        {
          $result++;
      		$this->Session->write('result' , $result);
     		}
      }
      $qns = $this->Question->select($cat , $qno); 
      $cat = $this->Session->read('category');
      if($count > 5 )
      {
        $qno_push = $this->Session->read('qno_push');
        $this->redirect(array('action'=>'result'));
      }
      else
      {
        $count++;
        $this->Session->write('count' , $count);
        $this->Set('counter' , $count);
        $this->set('qns', $qns);
      }
    }
             
    function result()
    {        
      $name = $this->Session->read('user_name');
      $this->set('name',$name);
      $result = $this->Session->read('result');
      $this->set('result',$result);
      $cat =  $this->Session->read('category');
      $current = date("y/m/d");
      $user_id = $this->Session->read('user_id');
      $this->Result->display($result , $cat , $user_id ,$current);
      $qno_push = $this->Session->read('qno_push');
      array_pop($qno_push);
      $all=$this->Question->all($cat, $qno_push);
      if(!empty($all))
      {
        $this->set('all', $all);
      }
    }

    function prev_result()
    {
      $user_id = $this->Session->read('user_id');
      $options['fields'] = array(
      'Result.*',
      'Cat.category',
      );
      $options['joins'] = array(
      array(
      'table' => 'cats',
      'alias' => 'Cat',
      'type' => 'inner',
      'conditions' => array(
      'Cat.id = Result.cat_id'
      )));
       $options['conditions'] = array('Result.user' => $user_id);
       $store = $this->Result->find('all', $options);
       $this->set('store',$store);
    }

    function admin()
    {

    }

    function viewall()
    {
      $view = $this->User->viewuser();
      $this->set('users' , $view);
    }

    function admin_result()
    {
      $options['fields'] = array(
      'Result.*',
      'Cat.category',
      'User.name'
      );
      $options['joins'] = array(
      array(
      'table' => 'cats',
      'alias' => 'Cat',
      'type' => 'inner',
      'conditions' => array(
      'Cat.id = Result.cat_id'
      )),
      array(
      'table' => 'users',
      'alias' => 'User',
      'type' => 'inner',
      'conditions' => array(
      'User.id = Result.user'
      )));
      $adminresult = $this->Result->find('all', $options);
      $this->set('adminresult' , $adminresult);
    }

    function logout()
    {
    $this->Session->setFlash('Good-Bye');
    ob_start();
    echo 'Text that wont get displayed.';
    ob_end_clean();
    $this->Session->destroy();
    $this->redirect(array('action' => 'index'));
    }
    function add_cat(){
if(!empty($this->data)){
$this->Cat->add($this->data);
// $this->redirect
}
}
function add_question(){
if(!empty($this->data)){
$this->Question->add_qn($this->data);
}

$cats = $this->Cat->category();
$this->set('cats',$cats);

}


  } 
?>