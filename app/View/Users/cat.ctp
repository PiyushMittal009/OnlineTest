<html>
<body><center>
	<?php               echo $this->Form->create('User',array('action'=>'cat'));    
                           echo $this->Form->radio('CATEGORY',
                               array(
                                    '1'=>'PHP',
                                    '2'=>'JAVA',
                                    '3'=>'.NET'
                                    ));
                           echo $this->Form->submit('Select',
                                    array(
                                        'type' => 'submit'
                                        //'name' => 'Login'
                                        )
                                     );
 echo $this->Form->end();
                            
?>
	</center>
	</body>
</html>