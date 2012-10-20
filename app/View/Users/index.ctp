<html>
		<body>
<div class='login'>
<?php  echo $this->Form->create('User',array('action'=>'index')); ?>
<?php
                                echo $this->Form->input('user',
                                    array(
                                        'label'=> 'Email or Number',
                                        'placeholder' => 'enter email or number',
                                        'type' => 'text'

                                    )
                                );
                            ?>

<?php
                                echo $this->Form->input('pass',
                                    array(
                                        'label'=>'Password',
                                        'placeholder' => 'enter password',
                                        'type' => 'password'
                                    )
                                );
                            ?>

<?php
                                echo $this->Form->submit('Login',
                                    array(
                                        'type' => 'submit',
                                        'name' => 'Login'
                                        )
                                     );
                              ?>

<?php                           echo $this->Form->end();
                              ?>
</div>


<div>

<?php  echo $this->Form->create('User',array('action'=>'registration')); ?>
<?php
                                echo $this->Form->input('name',
                                    array(
                                        'label'=> 'Name',
                                        'placeholder' => 'enter full name',
                                        'type' => 'text'
                                    )
                                );
                            ?>
                            <?php
                                echo $this->Form->input('email',
                                    array(
                                        'label'=> 'email id',
                                        'placeholder' => 'enter your email id',
                                        'type' => 'text'
                                    )
                                );
                            ?>


<?php
                                echo $this->Form->input('phone',
                                    array(
                                        'label'=> 'contact No.',
                                        'placeholder' => 'enter contact no.',
                                        'type' => 'text'
                                    )
                                );
                            ?>


<?php
                                echo $this->Form->input('password',
                                    array(
                                        'label'=>'Password',
                                        'placeholder' => 'enter password',
                                        'type' => 'password'
                                    )
                                );
                            ?>

<?php                     
                           echo $this->Form->radio('gender',
                               array(
                                    'M'=>'Male',
                                    'F'=>'Female'
                                    ));

                            
?>



<?php
                                echo $this->Form->submit('Login',
                                    array(
                                        'type' => 'submit',
                                        'name' => 'Login'
                                        )
                                     );
                              ?>

<?php                           echo $this->Form->end();
                              ?>



</div>

		</body>

</html>