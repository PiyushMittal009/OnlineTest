<html>
<body>
<?php
	 echo $this->Form->create('User',array('action'=>'result' ));?>
	 <table align="left">
	 	<tr>
	 		<th>COURSE</th>
	 	</tr>
	 	<?php foreach ($store as  $val)
	 	 {?>
	 	<tr>
	 		<td> <?php echo $val['Cat']['category']; ?></td>
		</tr>
<?php }?>
</table>
<table align="right">
	 	<tr>
	 		<th>SCORE</th>
	 	</tr>
	 	<?php foreach ($display as $value)
	 	 {?>
	 	<tr>
	 		<td> <?php echo $value['Result']['result']; ?></td>
		</tr>
<?php }?>
</table>
	<?php 
	 echo $this->Form->end();
?>
	</body>
</html>