<?php
  $this->load->view('common/header');
?>
<?php
  $this->load->view('common/left_panel');
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> <?= $title;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('Dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active"> <?= $title;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $title;?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="post" enctype="multipart/form-data" action="<?=$action;?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <div class="name-msg">
                          <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                        </div>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?=$name;?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <div class="email-msg">
                          <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                        </div>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="<?=$email?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <div class="mobile-msg">
                          <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
                        </div>
                        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile" value="<?=$mobile?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Emergency Contact Number</label>
                        <div class="emergency_contact-msg">
                          <?php echo form_error('emergency_contact', '<div class="error">', '</div>'); ?>
                        </div>
                        <input type="number" name="emergency_contact" class="form-control" id="emergency_contact" placeholder="Enter Emergency Contact Number" value="<?=$emergency_contact?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <div class="address-msg">
                          <?php echo form_error('address', '<div class="error">', '</div>'); ?>
                        </div>
                        <textarea name="address" rows="4" cols="50" class="form-control" id="address" placeholder="Enter address"><?=$address?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="return validate();" id="actionButton" value="<?= $btn_name;?>"><?= $btn_name;?></button>
                  <a href="<?php echo site_url('Employee'); ?>" class="btn btn-danger">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



<script>
  function validate()
  {
    var name = $("#name").val();
    var email = $("#email").val();
    var emailExp = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var mobile = $("#mobile").val();
    var button = $("#actionButton").val();
    var address = $("#address").val();
    var emergency_contact = $("#emergency_contact").val();


    if (name == '') {

      $('.name-msg').addClass('invalid-msg').text("Please Enter Name");
              setTimeout(function(){
                $('.name-msg').html('&nbsp;');
              },4000);
              return false;
      }

      if (email == '') {

      $('.email-msg').addClass('invalid-msg').text("Please Enter email");
            setTimeout(function(){
              $('.email-msg').html('&nbsp;');
            },4000);
            return false;
      }
      
      if (!emailExp.test(email)){
          $('.email-msg').addClass('invalid-msg').text("Please Enter a valid email");
          setTimeout(function(){
            $('.email-msg').html('&nbsp;');
          },4000);
          return false;
      }

      if (mobile == '') {

      $('.mobile-msg').addClass('invalid-msg').text("Please Enter mobile");
            setTimeout(function(){
              $('.mobile-msg').html('&nbsp;');
            },4000);
            return false;
      }

      if (emergency_contact == '') {

      $('.emergency_contact-msg').addClass('invalid-msg').text("Please Enter Emergency contact no.");
            setTimeout(function(){
              $('.emergency_contact-msg').html('&nbsp;');
            },4000);
            return false;
      }

      if (address == '') {

      $('.address-msg').addClass('invalid-msg').text("Please Enter address");
            setTimeout(function(){
              $('.address-msg').html('&nbsp;');
            },4000);
            return false;
      }
  }
</script>

<?php
  $this->load->view('common/footer');
?>