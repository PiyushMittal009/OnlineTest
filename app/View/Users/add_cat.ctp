<html>
<body>
<center>
Add New Category
</center>

<?php echo $this->Form->create('User',array('action'=>'add_cat')); ?>
<?php
echo $this->Form->input('cat_name',
array(
'label'=>'Category Name',
'placeholder' => 'Enter Category Name',
'type' => 'text'
)
);
?>

<?php
echo $this->Form->submit('Add',
array(
'type' => 'submit',
'name' => 'Add',
)
);
?>
<?php
echo $this->Form->reset('Reset',
array(
'type' => 'Reset',
'name' => 'Reset'
)
);
echo $this->Html->link('Admin', array( 'action' => 'admin'));
echo $this->Html->link('logout', array( 'action' => 'logout'));
echo $this->Form->end();
?>
</body>
</html>