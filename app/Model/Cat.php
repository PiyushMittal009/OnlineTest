<?php 
class Cat extends AppModel
{
    var $name= 'Cat';
    function category()
    {
    	$cats = $this->find('all');
    	return $cats;
    }
    function prev_result($category = Null)
    {
    	$prev = $this->find('all',
    		array('conditions' => array(
    			'Cat.id' => $category)));
    	return $prev;
    }

    function add($cats = array()){
pr($cats);
$this->set(
array(
'category' => $cats['User']['cat_name']
)
);
$this->save();

}

}
?>