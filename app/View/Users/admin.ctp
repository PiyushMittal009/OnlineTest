<?php
echo $this->Html->link('logout', array( 'action' => 'logout'));
echo "Welcome admin";
echo "<br>";
echo $this->Html->link('view all users', array( 'action' => 'viewall'));
echo "<br>";
echo $this->Html->link('view all Result', array( 'action' => 'admin_result'));
echo "<br>";
echo $this->Html->link('add new category', array( 'action' => 'add_cat'));
echo "<br>";
echo $this->Html->link('add new question', array( 'action' => 'add_question'));


?>