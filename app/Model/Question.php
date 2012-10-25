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
  function all($cat)
  {
    $all = $this->find('all',array(
      'order' => array('id ASC'),
      'conditions' => array(
        'Question.cat_id' => $cat 
        )));
    return $all;
  }
}
?>
