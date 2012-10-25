<?php 
class Cat extends AppModel
{
    var $name= 'Cat';
    function prev_result($category = Null)
    {
    	$prev = $this->find('first',
    		array('conditions' => array(
    			'Cat.id' => $category)));
    	return $prev;
    }
}
?>