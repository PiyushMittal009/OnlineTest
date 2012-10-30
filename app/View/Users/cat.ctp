<html>
<body><center>
	<?php     echo 'welcome '.$name;
            echo $this->Form->create('User',array('action'=>'cat'));
                       /* foreach ($cats as  $cats) {
                            echo "hiii";
                        echo $this->Form->radio('CATEGORY',
                        array(
                                 $cats['Cat']['id'] => $cats['Cat']['category']

                                    ));
                               }*/
            /*$options = array('category');
            foreach($cats as  $values){
                $arr[$values['id']] = $values['category'];
                array_push($options , $cats['Cat']['category']);
             }
            echo $this->Form->radio('gender',$options);
            pr($options);*/


                if (is_array($cats) && !empty($cats)) {
                    $arr = array();
                        foreach($cats as $key) {
                            foreach($key as $values) {
                                $arr[$values['id']] = $values['category'];
                                    }
                                }        
                }
                                        
              $options=$arr;
              echo $this->Form->radio('CATEGORY',$options);
                           echo $this->Form->submit('Select',
                                    array(
                                        'type' => 'submit',
                                        //'name' => 'Login'
                                        'id' => 'sub'
                                        )
                                     );
 echo $this->Form->end();
            echo $this->Html->link('logout', array( 'action' => 'logout'));
                
?>
	</center>
	</body>
</html>