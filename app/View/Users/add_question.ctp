<html>
<body>
<?php
echo $this->Form->create('User',array('action'=>'add_question'));
?>
<?php
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

?>
<?php
echo $this->Form->input('question',
array(
'label'=>'Enter Question',
'placeholder' => 'Enter Question',
'type' => 'text'
)
);

echo $this->Form->radio('option',
array(
'a'=> $this->Form->input('a'),
'b'=> $this->Form->input('b'),
'c'=> $this->Form->input('c'),
'd'=> $this->Form->input('d')
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

echo $this->Form->end();

?>
</body>
</html>
