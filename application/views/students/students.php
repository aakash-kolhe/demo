<?php
  $this->load->view('common/header');
  $this->load->view('common/left_panel');
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    <div class="card">
        <div class="card-header">
            <a href="<?=site_url('Students/create')?>" class="float-right btn btn-primary">Add Students</a>
        </div>



        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Class</th>
                        <th>Image</th>
                        <th>Skills</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sr = 0;
                        foreach($data as $row){
                    ?>
                    <tr>
                        <td><?php echo ++$sr?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->mobile; ?></td>
                        <td><?php echo $row->address; ?></td>
                        <td><?php echo $row->standard; ?></td>
                        <td>
                            <img height="50" src="<?=base_url('assets/upload/'.$row->student_image)?>" alt="">
                        </td>
                        <td><?php echo $row->skills; ?></td>
                        <td>
                            <a class="m-2 text-success" href="<?= site_url('Students/getdetails/'.$row->id);?>"><i
                                    class="far fa-edit"></i></a>
                            <a class="m-2 text-danger remove" onClick="deleteRecord(<?= $row->id ?>)"
                                href="javascript:void(0);"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
  $this->load->view('common/footer');
if($this->session->flashdata('msg')){ ?>
<!--<div class="alert alert-success">
            <strong><?php echo $this->session->flashdata('msg') ?></strong>
        </div> -->
<script>
swal({
    title: "Done",
    text: "<?php echo $this->session->flashdata('msg'); ?>",
    icon: "success",
    timer: 2000,
    showConfirmButton: false,
    type: 'success'
});
</script>
<?php } ?>

<script>
function deleteRecord(id) {
    swal({
            title: "Are you sure?",
            text: "You won't to delete this student details!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = 'Students/delete/' + id;
            }
        });
}
</script>

<?php  
    for($i=0;$i<=5;$i++){  
        for($j=5-$i;$j>=1;$j--){
            echo "* ";
        }
        echo "<br>";
    }
?>

<?php
    for($i=0;$i<=5;$i++){
        for($j=1;$j<=$i;$j++){
            echo "* ";
        }
        echo "<br>";
    }
?>