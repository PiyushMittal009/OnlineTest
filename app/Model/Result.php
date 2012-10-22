<?php 
class Result extends AppModel
{
    var $name= 'Result';
     function display($result = array() , $category = null , $user_id = null ,$date =null) {
    	/*pr($result);
    	echo $category;
    	echo $user_id;
    	die;*/

    	$this->set(
            array(

                'user' => $user_id,
                'cat_id' => $category,
                'result' => $result,
                'date' =>$date
           		 )
        	);
        		$this->save();
		 $previous = $this->find('all', 
    		array('conditions' => array(
    			'user' => $user_id
    			))
        	);
        return $previous;
    }
}
?>