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
			echo "user";
		echo "</th>";
		echo "<th>";
			echo "Category";
		echo "</th>";
		echo "<th>";
			echo "result";
		echo "</th>";
		echo "<th>";
			echo "date";
		echo "</th>";
	echo "</tr>";
foreach($adminresult as $key) {
?>
	<tr>
			<td>
				<?php echo $key['Result']['id']; ?>
			</td>
			<td>
				<?php echo $key['User']['name']; ?>
			</td>
			<td>
				<?php echo $key['Cat']['category']; ?>
			</td>
			<td>
				<?php echo $key['Result']['result']; ?>
			</td>
			<td>
				<?php echo $key['Result']['date']; ?>
			</td>
	</tr>		
<?php
}
echo "</table>";
?>