<?php

?>
<style type="text/css">
    .topright {
        position: fixed;
        top: 65px;
        right: 25px;
        padding:3px 3px 3px 3px;
    }
</style>
<!-- Bootstrap modal For Datatable-->
<div class="modal fade" id="md-form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Data Agent</h3>
            </div>
            <div class="modal-body form">
                <div class="form-group">
                    <form id="frm-modal" action="#" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Nama Perusahaan</label>
                                    <input hidden id="idm" name="idm">
                                    <input class="form-control" type="text" name="nama_perusahaan" id="nama_perusahaan" required>                                    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">Alamat</label>
                                    <input class="form-control" type="text" name="alamat" id="alamat" required>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">No Telepon</label>
                                    <input class="form-control" type="text" name="no_telp" id="no_telp" required>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agent_name" class="form-label">NPWP</label>
                                    <input class="form-control" type="text" name="npwp" id="npwp" required>                                    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer bg-warning" >
                <div class="row">
                    <div class="col-md-12">
                        <button onclick='save()' id='btnSave' type='button' class='btn btn-primary' >Save</button>
                        <button onclick='batal()' type='button' class='btn btn-danger' >Cancel</button>
                    </div>
                </div>
			</div>				
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<!-- End Bootstrap modal -->
<div class="container" data-role="main" class="ui-content">
    <h3>Master Data Agent</h3>
    <div class="row col-md-5">
        <button class="btn btn-primary" onclick="add()"> <span>Tambah Data</span></button>
        <button class="btn btn-info" onclick="reload_table()"> <span>Refresh Halaman</span></button><br><br> 
    </div>
</div>

<div class="container">
    <div class="row col-md-12">
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="70%">
            <thead>
            <tr>
                <th>
                    <center>No
                </th>
                <th>
                    <center>Nama Perusahaan
                </th>
                <th>
                    <center>Alamat
                </th>
                <th>
                    <center>No Telepon
                </th>
                <th>
                    <center>NPWP
                </th>
                <th>
                    <center>Aksi
                </th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            <tr>
                <th>
                    <center>No
                </th>
                <th>
                    <center>Nama Perusahaan
                </th>
                <th>
                    <center>Alamat
                </th>
                <th>
                    <center>No Telepon
                </th>
                <th>
                    <center>NPWP
                </th>
                <th>
                    <center>Aksi
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<script type="text/javascript">
    var table;

    $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('master/ajax_data_agent')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ 0 ], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
        });
    });

    function reload_table() {
        table.ajax.reload(null,false);
    }

    function edit(id){
        save_method = 'update';
        $('#frm-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#btnSave').text('Update');
        $('.select2').select2({
        });

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('master/editAgent/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {		
                $('#md-form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data Agent'); // Set title to Bootstrap modal title

                $('#idm').val(data.id_agent);
                $('#nama_perusahaan').val(data.nama_agent);
                $('#alamat').val(data.alamat);
                $('#npwp').val(data.npwp);
                $('#no_telp').val(data.no_telp);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function save(){    
        var url;

        if(save_method == 'add') {
            $('#btnSave').text('Saving...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable
            url = "<?php echo site_url('master/input_data_agent');?>"; 
        } else {
            $('#btnSave').text('Updating...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
            url = "<?php echo site_url('master/edit_agent');?>"; 
        }
        
        formData = new FormData($('#frm-modal')[0]);
        formData.append( 'save_method', save_method );

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            async: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data){
                //if success close modal and reload ajax table
                if(data.status){
                    reload_table();
                    $('#frm-modal')[0].reset();
                }
                else{
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                    $('#btnSave').attr('disabled',false); //set button enable
                }

                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
                $('#md-form').modal('hide');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding data');
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
            }
        });
    }

    function add(){
        save_method = 'add';
        $('#frm-modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#btnSave').text('Save');
        $('.select2').select2({
        });
        $('#md-form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Tambah Data Agent'); // Set title to Bootstrap modal title
    }

    function batal(){
        $('#frm-modal')[0].reset();
        $('#btnSave').text('Save'); //change button text
        $('#btnSave').attr('class','btn btn-primary'); //set button disable 
        $('#md-form').modal('hide');
    }

    $('.modal').on('hidden.bs.modal', function () {
        reload_table();
    });

</script>