<?php
  $this->load->view('common/header');
?>
  <!-- Main Sidebar Container -->
<?php
  $this->load->view('common/left_panel');
?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Students</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="post" enctype="multipart/form-data" action="<?= site_url(). '/Students/updatedetails/'.$id?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" value="<?= set_value('name', $item->name)?>" class="form-control" id="name" placeholder="Enter name" >
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('name');  ?></h6>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" value="<?= set_value('email', $item->email)?>" >
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('email');  ?></h6>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile" value="<?= set_value('mobile', $item->mobile)?>" >
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('mobile');  ?></h6>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Standard/Class</label>
                        <input type="text" name="standard" class="form-control" id="standard" placeholder="Enter class or standard" value="<?= set_value('standard', $item->standard)?>" >
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('standard');  ?></h6>
                      </div>
                    </div>
                    <?php
                      $skills = $item->skills;
                      $skillsArr = (empty($skills))?[]:explode(",",$skills);
                    ?>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Skills</label><br>
                        <input type="checkbox" name="skills[]" value="Html" <?php if(in_array("Html",$skillsArr)){echo "checked='checked'";} ?>><span>Html</span>&nbsp;
                        <input type="checkbox" name="skills[]" value="CSS" <?php if(in_array("CSS",$skillsArr)){echo "checked='checked'";} ?>><span>CSS</span>&nbsp;
                        <input type="checkbox" name="skills[]" value="PHP" <?php if(in_array("PHP",$skillsArr)){echo "checked='checked'";} ?>><span>PHP</span>&nbsp;
                        <input type="checkbox" name="skills[]" value="MySQL" <?php if(in_array("MySQL",$skillsArr)){echo "checked='checked'";} ?>><span>MySQL</span>
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('skills');  ?></h6>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea name="address" rows="4" cols="50" class="form-control" id="address" placeholder="Enter address" ><?= $item->address?></textarea>
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('address');  ?></h6>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" accept="image/*" name="student_image" class="form-control" id="student_image" >
                        <input type="hidden" name = "student_image_old" value="<?= set_value('student_image', $item->student_image)?>">
                          <?php if(!empty($item->student_image)){ ?>
                            <img height="100" src="<?php echo base_url('assets/upload/'.$item->student_image); ?>">
                          <?php } ?>
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('student_image');  ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="actionButton" value="Update">Update</button>
                  <a href="<?= site_url(). 'Students'?>" class="btn btn-danger">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
<?php
  $this->load->view('common/footer');
?>