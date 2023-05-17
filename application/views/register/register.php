<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container">
        <br />
            <form action="<?= site_url(); ?>register/doRegister" method="post">
                <h2>Registration</h2>
                <?php if($this->session->flashdata('msg')){ ?>
                    <div class="alert alert-success">
                        <strong><?php echo $this->session->flashdata('msg') ?></strong>
                    </div>
                <?php } ?>

                <hr />
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $this->input->post('name'); ?>">
                    <h6 style="color: red;"><?php echo form_error('name');  ?></h6>
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="text" name="email" class="form-control" id="email" value="<?php echo $this->input->post('email'); ?>">
                    <h6 style="color: red;"><?php echo form_error('email');  ?></h6>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" class="form-control" id="pwd" value="">
                    <h6 style="color: red;"><?php echo form_error('password');  ?></h6>
                </div>
                <div class="form-group">
                    <label for="pwd">Confirm Password:</label>
                    <input type="password" name="cpassword" class="form-control" id="cpassword">
                    <h6 style="color: red;"><?php echo form_error('cpassword');  ?></h6>
                </div>
                <button type="submit" class="btn btn-success">Register</button>
                <span class="float-right"><a href="<?= site_url() . 'Login'; ?>" class="btn btn-primary">Login</a></span>
            </form>
        </div>
    </body>
</html>