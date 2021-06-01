<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

<br/>
<br/>
<center><h2>Request Jadwal Zoom</h2></center>	
<br/>
<div class="login">
<br/>
    <form action="<?php echo base_url(); ?>kalender/login_validation" method="post" onSubmit="return validasi()">
        <div>
            <label>Username:</label>
            <input type="text" name="username" id="username" />
            <span class="text-danger"><?php echo form_error('username'); ?></span>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" id="password" />
            <span class="text-danger"><?php echo form_error('password'); ?></span>
        </div>			
        <div>
            <input type="submit" name="insert"  value="Login" class="tombol">
            <?php echo $this->session->flashdata("error"); ?>
        </div>
    </form>
</div>