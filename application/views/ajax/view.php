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

    <div class="card">
        <div class="card-header">
            <!-- <a href="<?=site_url('Students/create')?>" class="float-right btn btn-primary">Add Students</a> -->
            <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Students
            </button>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Class</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody id="show_data">

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Students</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" value="" name="id" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter name" value="<?php echo $this->input->post('name'); ?>">
                                    <h6 class="font-weight-bold" style="color: red;">
                                        <?php echo form_error('name');  ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="email"
                                        placeholder="Enter email" value="<?php echo $this->input->post('email'); ?>">
                                    <h6 class="font-weight-bold" style="color: red;">
                                        <?php echo form_error('email');  ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile</label>
                                    <input type="number" name="mobile" class="form-control" id="mobile"
                                        placeholder="Enter mobile" value="<?php echo $this->input->post('mobile'); ?>">
                                    <h6 class="font-weight-bold" style="color: red;">
                                        <?php echo form_error('mobile');  ?></h6>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Standard/Class</label>
                                    <input type="text" name="standard" class="form-control" id="standard"
                                        placeholder="Enter class or standard"
                                        value="<?php echo $this->input->post('standard'); ?>">
                                    <h6 class="font-weight-bold" style="color: red;">
                                        <?php echo form_error('standard');  ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <textarea name="address" rows="4" cols="50" class="form-control" id="address"
                                        placeholder="Enter address"><?php echo $this->input->post('address'); ?></textarea>
                                    <h6 class="font-weight-bold" style="color: red;">
                                        <?php echo form_error('address');  ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" id="btnSave" class="btn btn-primary bttn">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Students</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="id_edit" id="id_edit" class="form-control">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name_edit" class="form-control" id="name_edit"
                                        placeholder="Enter name">
                                    <h6 class="font-weight-bold" style="color: red;">
                                        <?php echo form_error('name');  ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email_edit" class="form-control" id="email_edit"
                                        placeholder="Enter email">
                                    <h6 class="font-weight-bold" style="color: red;">
                                        <?php echo form_error('email');  ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile</label>
                                    <input type="number" name="mobile_edit" class="form-control" id="mobile_edit"
                                        placeholder="Enter mobile">
                                    <h6 class="font-weight-bold" style="color: red;">
                                        <?php echo form_error('mobile');  ?></h6>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Standard/Class</label>
                                    <input type="text" name="standard_edit" class="form-control" id="standard_edit"
                                        placeholder="Enter class or standard">
                                    <h6 class="font-weight-bold" style="color: red;">
                                        <?php echo form_error('standard');  ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <textarea name="address_edit" rows="4" cols="50" class="form-control" id="address_edit"
                                        placeholder="Enter address"></textarea>
                                    <h6 class="font-weight-bold" style="color: red;">
                                        <?php echo form_error('address');  ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" id="btn_update" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- delete model -->
<form>
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete this record?</strong>
            </div>
            <div class="modal-footer">
            <input type="hidden" name="students_delete" id="students_delete" class="form-control">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
            </div>
        </div>
        </div>
    </div>
</form>

<?php
  $this->load->view('common/footer');
?>

<script type="text/javascript">
show_students(); //call function show all product

//  $('#example1').dataTable();

//function show all product
function show_students() {
    $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('/Ajax/Students_data')?>',
        async: true,
        dataType: 'JSON',
        success: function(data) {
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<tr>' +
                    '<td>' + data[i].id + '</td>' +
                    '<td>' + data[i].name + '</td>' +
                    '<td>' + data[i].email + '</td>' +
                    '<td>' + data[i].mobile + '</td>' +
                    '<td>' + data[i].standard + '</td>' +
                    '<td>' + data[i].address + '</td>' +
                    '<td style="text-align:center;">' +
                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="' + data[
                        i].id + '" data-name="' + data[i].name + '" data-email="' + data[i].email +
                    '" data-mobile="' + data[i].mobile + '" data-standard="' + data[i].standard +
                    '" data-address="' + data[i].address + '"><i class="far fa-edit"></i></a>' + ' ' +
                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="' +
                    data[i].id + '"><i class="far fa-trash-alt"></i></a>' +
                    '</td>' +
                    '</tr>';
            }
            $('#show_data').html(html);
        }

    });
}

$('#btnSave').on('click', function() {

    var name        =    $('#name').val();
    var email       =    $('#email').val();
    var mobile      =    $('#mobile').val();
    var standard    =    $('#standard').val();
    var address     =    $('#address').val();
    if (name != '' && email != '' && mobile != '' && standard != '' && address != '') {
        $.ajax({
            type: "POST",
            url: "<?= site_url(). '/Ajax/save'?>",
            dataType: "JSON",
            data: {
                name: name,
                email: email,
                mobile: mobile,
                standard: standard,
                address: address
            },
            success: function(data) {
                $('#name').val("");
                $('#email').val("");
                $('#mobile').val("");
                $('#standard').val("");
                $('#address').val("");
                $('#exampleModal').modal('hide');
                show_students();
            }
        });
    } else {
        alert('Please enter all field');
    }
    return false;
});

//get data for edit
$('#show_data').on('click', '.item_edit',function(){
    var id     =  $(this).data('id');
    var name     =  $(this).data('name');
    var email    =  $(this).data('email');
    var mobile   =  $(this).data('mobile');
    var standard =  $(this).data('standard');
    var address  =  $(this).data('address');

    $('#Modal_Edit').modal('show');
    $('#id_edit').val(id);
    $('#name_edit').val(name);
    $('#email_edit').val(email);
    $('#mobile_edit').val(mobile);
    $('#standard_edit').val(standard);
    $('#address_edit').val(address);
});

//update record

$('#btn_update').on('click', function(){
    var id        =   $('#id_edit').val();
    var name        =   $('#name_edit').val();
    var email       =   $('#email_edit').val();
    var mobile      =   $('#mobile_edit').val();
    var standard    =   $('#standard_edit').val();
    var address     =   $('#address_edit').val();

    $.ajax({
        type : "POST",
        url  : "<?= site_url().'/Ajax/update'?>",
        dataType : "JSON",
        data: {
                id: id,
                name: name,
                email: email,
                mobile: mobile,
                standard: standard,
                address: address
            },
        success: function(data){
            $('#id_edit').val("");
            $('#name_edit').val("");
            $('#email_edit').val("");
            $('#mobile_edit').val("");
            $('#standard_edit').val("");
            $('#address_edit').val("");
            $('#Modal_Edit').modal('hide');
            show_students();
        }
    });
    return false;
});

//for delete
$('#show_data').on('click','.item_delete', function(){
    var id = $(this).data('id');
    $('#Modal_Delete').modal('show');
    $('#students_delete').val(id);
});

$('#btn_delete').on('click', function(){
    var id = $('#students_delete').val();
    $.ajax({
        type : "POST",
        url  : "<?php echo site_url('/Ajax/delete')?>",
        dataType : "JSON",
        data: {
            id: id
        },
        success: function(data){
            $('#students_delete').val("");
            $('#Modal_Delete').modal('hide');
            show_students();
        }
    });
});

</script>