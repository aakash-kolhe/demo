<?php
  $this->load->view('common/header');
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
                <h3 class="card-title">Create Students</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="post" enctype="multipart/form-data" action="<?= site_url(). 'Students/store'?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?php echo $this->input->post('name'); ?>" >
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('name');  ?></h6>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" value="<?php echo $this->input->post('email'); ?>" >
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('email');  ?></h6>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile" value="<?php echo $this->input->post('mobile'); ?>" >
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('mobile');  ?></h6>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Standard/Class</label>
                        <input type="text" name="standard" class="form-control" id="standard" placeholder="Enter class or standard" value="<?php echo $this->input->post('class'); ?>" >
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('standard');  ?></h6>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Skills</label><br>
                        <input type="checkbox" name="skills[]" value="Html"><span>Html</span>&nbsp;
                        <input type="checkbox" name="skills[]" value="CSS"><span>CSS</span>&nbsp;
                        <input type="checkbox" name="skills[]" value="PHP"><span>PHP</span>&nbsp;
                        <input type="checkbox" name="skills[]" value="MySQL"><span>MySQL</span>
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('skills');  ?></h6>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" accept="image/*" name="student_image" class="form-control" id="student_image" value="<?php echo $this->input->post('student_image'); ?>" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea name="address" rows="4" cols="50" class="form-control" id="address" placeholder="Enter address" ><?php echo $this->input->post('address'); ?></textarea>
                        <h6 class="font-weight-bold" style="color: red;"><?php echo form_error('address');  ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="actionButton" value="">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <a href="<?= site_url(). 'Students'?>" class="btn btn-danger">Back</a>
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
</div>
<?php
  $this->load->view('common/footer');
?>