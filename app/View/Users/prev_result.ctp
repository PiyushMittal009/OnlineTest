<html>
<body>
<?php
echo $this->Html->link('logout', array( 'action' => 'logout'));
	 echo $this->Form->create('User',array('action'=>'result' ));?>
	 <table align="left">
	 	<tr>
	 		<th>COURSE</th><th>SCORE</th>
	 	</tr>
	 	<?php foreach ($store as  $val)
	 	 {?>
	 	<tr>
	 		<td> <?php echo $val['Cat']['category']; ?></td>
	 		<td> <?php echo $val['Result']['result']; ?></td>
		</tr>
<?php }?>
</table>


	<?php 
	 echo $this->Form->end();
	 echo $this->Html->link('Retry', array( 'action' => 'cat'));
?>
	</body>
</html>