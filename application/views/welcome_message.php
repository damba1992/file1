
 <!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="shortcut icon" href="<?php echo base_url('assets/theme');?>/img/favicon.ico">
    <title>Page Login Area</title>
  </head>

  <body>   

    

   <?php echo form_open('login/login_form'); ?>

    <?php echo validation_errors(); ?>

        <h2>Please Login !</h2>

    <label>Email</label>

        <input type="text" name="email" value="<?php echo set_value('email');?>">

    <?php echo form_error('email');?>

    <label>Password</label>

        <input type="password" name="password" value="<?php echo set_value('password');?>">

    <?php echo form_error('password');?>



        <input  type="submit" value="Sign In"><br>

    </form>

  </body>

</html>