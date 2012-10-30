<html>
	<body>
<?php
echo $this->Html->link('logout', array( 'action' => 'logout'));
echo "<table>";
	echo "<tr>";
		echo "<th>";
			echo "id";
		echo "</th>";
		echo "<th>";
			echo "name";
		echo "</th>";
		echo "<th>";
			echo "email";
		echo "</th>";
		echo "<th>";
			echo "phone";
		echo "</th>";
	echo "</tr>";
foreach($users as $key) {
?>
	<tr>
			<td>
				<?php echo $key['User']['id']; ?>
			</td>
			<td>
				<?php echo $key['User']['name']; ?>
			</td>
			<td>
				<?php echo $key['User']['email']; ?>
			</td>
			<td>
				<?php echo $key['User']['phone']; ?>
			</td>
	</tr>		
<?php
}
echo "</table>";
?>