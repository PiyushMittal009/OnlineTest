<?php 
class Result extends AppModel
{
    var $name= 'Result';
     function display($result = array() , $category = null , $user_id = null ,$date =null) {
    	
    	$this->set(
            array(

                'user' => $user_id,
                'cat_id' => $category,
                'result' => $result,
                'date' =>$date
           		 )
        	);
        		$this->save();
		
    }

    function admin_result(){
    $adminresult = $this->find('all');
    return $adminresult;
    }

}
?>