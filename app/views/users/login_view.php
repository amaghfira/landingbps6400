<?php $attr = array('id' => 'login_form', 'class' => 'form-horizontal'); ?>
<!-- controller/method -->
<?php echo form_open('user/login', $attr); ?> 

<p>
    <?php echo form_label('Username:'); ?>
    <?php
    $data = array('name' => 'username',
                    'placeholder' => 'Masukkan Username',
                    'style' => 'width:90%',
                    'value' => set_value('username'));
    ?>
    <?php echo form_input($data); ?>
</p>
<p>
    <?php echo form_label('Password:'); ?>
    <?php
    $data = array('name' => 'password',
                    'placeholder' => 'Masukkan Password',
                    'style' => 'width:90%',
                    'value' => set_value('password'));
    ?>
    <?php echo form_password($data); ?>
</p>
<p>
    <?php
    $data = array('name' => 'submit',
                    'class' => 'btn btn-primary',
                    'value' => 'Login');
    ?>
    <?php echo form_submit($data); ?>
</p>

<?php echo form_close(); ?>