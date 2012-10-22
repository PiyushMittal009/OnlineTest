<?php
class Question extends AppModel{
    var $name= 'Question';

function select($cat , $count){

		$result = $this->find('first',array(
                 'conditions' => array(
                     'Question.cat_id' => $cat ,
                      'Question.id' => $count
                       )
             )
		);
		return $result;

	}
  function all()
  {
    $all = $this->find('all');
    return $all;
  }
}
?>
