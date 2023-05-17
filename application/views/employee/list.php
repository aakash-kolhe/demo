
<?php
  $this->load->view('common/header');
?>

 <!-- Navbar -->

  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
<?php
  $this->load->view('common/left_panel');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Employee</h3>
                    <a href="<?=site_url('Employee/create')?>" class="float-right btn btn-primary">Add Employee</a>
                  </div>
              <!-- /.card-header -->

              

              <?php if($this->session->flashdata('msg')){ ?>
                <div class="alert alert-success">
                    <strong><?php echo $this->session->flashdata('msg') ?></strong>
                </div>
              <?php } ?>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Emergency Contact</th>
                    <th>Action</th>
                   </tr>

                  </thead>
                  <tbody>
                    <?php 
                      $sr = 0;
                      if(!empty($getData)){
                        foreach($getData as $row){
                      
                    ?>
                  <tr>
                    <td><?php echo ++$sr?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo $row->mobile; ?></td>
                    <td><?php echo $row->address; ?></td>
                    <td><?php echo $row->emergency_contact; ?></td>

                    <td> 
                      <a class="m-2 text-success" href="<?= site_url('Employee/update/'.$row->id)?>" ><i class="far fa-edit"></i></a>
                      <a  class="m-2 text-danger" href="<?= site_url('Employee/delete/'.$row->id)?>"><i class="far fa-trash-alt"></i></a>
                    </td>

                  <?php } ?>
                  </tr>
                <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php
  $this->load->view('common/footer');
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


<script type="text/javascript">
  <?php if($this->session->flashdata('success')){ ?>
      toastr.success("<?php echo $this->session->flashdata('msg'); ?>");
  <?php } ?>
</script>