<html>
<body>
	<?php 
   echo 'welcome '.$name; 
  echo $this->Form->create('User',array('action'=>'question' ));

	//foreach ($qns as $result) {?>
		<h1>Q.<?php echo $counter-1 ?></h1>
		<h2><?php echo $qns['Question']['question']; ?> </h2>
<br>
<?php 
		echo $this->Form->radio('option',
        array(
               'a'=> $qns['Question']['a'],
               'b'=> $qns['Question']['b'],
               'c'=> $qns['Question']['c'],
               'd'=> $qns['Question']['d']   
        )
    
        );
?>
           <input type="hidden" value= "<?php echo $qns['Question']['answer']; ?>" name="answer" />

		<!-- <input type="hidden" value= "<?php echo $cat; ?>" name="cat" />
        <input type="hidden" value= "<?php echo $count; ?>" name="count" /> -->
<?php
                  echo $this->Form->submit('next',
                     array(
                    'type' => 'submit',
                    'name' => 'next'
                     )
                     );
                    ?>
	<?php //} ?>

 
	</body>
	</html>


