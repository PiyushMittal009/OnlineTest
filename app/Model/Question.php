<?php
class Question extends AppModel{
    var $name= 'Question';

function select($cat , $qno){

		$result = $this->find('first',array(
                 'conditions' => array(
                     'Question.cat_id' => $cat ,
                      'Question.id' => $qno
                       )
             )
		);
		return $result;

	}

  function add_qn($data = array())
{

$this->set(
array(
'question' => $data['User']['question'],
'a' => $data['User']['a'],
'b' => $data['User']['b'],
'c' => $data['User']['c'],
'd' => $data['User']['d'],
'answer' => $data['User']['option'],
'cat_id' => $data['User']['CATEGORY']

)
);
$this->save();
}

  function all($cat , $qno_push)
  {
    $all = $this->find('all',array(
      'conditions' => array(
        'Question.cat_id' => $cat ,
        'Question.id' => $qno_push
        )));
    return $all;
  }
}
?>
