<html>
<body>
	 <?php echo 'welcome '.$name;?>
<?php 
echo $this->Form->create('User',array('action'=>'result' ));
echo "<center><h4> Your Final Result:".$result."</h4></center>";
echo "<br/><br/>";
foreach ($all as $qns) {
?>
<table align="center">
	<tr>
	<td colspan='2' width="100px"><h1>Q.<?php echo $qns['Question']['id']; ?></h1><h2><?php echo $qns['Question']['question']; ?> </h2></td>
	</tr>
	<tr>
		<td><?php echo 'A :'.$qns['Question']['a']; if( $qns['Question']['answer'] == 'a'){ echo $this->Html->image('right.png');}?></td><td><?php echo 'B :'.$qns['Question']['b'];  if( $qns['Question']['answer'] == 'b'){ echo $this->Html->image('right.png');}?></td>
	</tr>
	<tr>
		<td><?php echo 'C :'.$qns['Question']['c'];  if( $qns['Question']['answer'] == 'c'){ echo $this->Html->image('right.png');}?></td><td><?php echo 'D :'.$qns['Question']['d']; if( $qns['Question']['answer'] == 'd'){ echo $this->Html->image('right.png');} ?></td>
	</tr>
</table>



<?php 
		
        
	}
echo $this->Html->link('Previous Result',  array('action'=>'prev_result'));
echo $this->Form->end();?>
<br>
	</body>
</html>