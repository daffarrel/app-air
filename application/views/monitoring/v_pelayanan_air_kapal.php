<?php

?>
<script type="text/javascript">
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myArr = JSON.parse(this.responseText);

            var i = 0;
            var a = "<thead>" +
                "<tr>" +
                "<th><center>No</center></th>" +
                "<th><center>ID VESSEL</center></th>" +
                "<th><center>Voy No</center></th>" +
                "<th><center>Nama VESSEL</center></th>" +
                "<th><center>Nama Perusahaan</center></th>" +
                "<th><center>Nama Pemohon</center></th>" +
                "<th><center>Tanggal Transaksi</center></th>" +
                "<th><center>Waktu Permintaan Pelayanan</center></th>" +
                "<th><center>Jumlah Permintaan</center></th>" +
                "<th><center>Keterangan</center></th>" +
                "<th><center>Status</center></th>" +
                "<th><center>Aksi</center></th>" +
                "</tr>" +
                "</thead>" +
                "<tbody>";
            while (i < myArr.length) {
                a +="<tr>" +
                    "<td align='center'>"+myArr[i]["no"]+"</td>" +
                    "<td align='center'>"+myArr[i]["id_kapal"]+"</td>" +
                    "<td align='center'>"+myArr[i]["voy_no"]+"</td>" +
                    "<td align='center'>"+myArr[i]["nama_lct"]+"</td>" +
                    "<td align='center'>"+myArr[i]["nama_perusahaan"]+"</td>" +
                    "<td align='center'>"+myArr[i]["nama_pemohon"]+"</td>" +
                    "<td align='center'>"+myArr[i]["tgl_transaksi"]+"</td>" +
                    "<td align='center'>"+myArr[i]["waktu_pelayanan"]+"</td>" +
                    "<td align='center'>"+myArr[i]["total_permintaan"]+"</td>" +
                    "<td align='center'>"+myArr[i]["keterangan"]+"</td>" +
                    "<td align='center'>"+myArr[i]["status"]+"</td>" +
                    "<td align='center'>"+myArr[i]["aksi"]+"</td>" +
                    "</tr>";
                i++;
            }
            a +="</tbody>" +
                "<tfoot>" +
                "<tr>" +
                "<th><center>No</center></th>" +
                "<th><center>ID VESSEL</center></th>" +
                "<th><center>Voy No</center></th>" +
                "<th><center>Nama VESSEL</center></th>" +
                "<th><center>Nama Perusahaan</center></th>" +
                "<th><center>Nama Pemohon</center></th>" +
                "<th><center>Tanggal Transaksi</center></th>" +
                "<th><center>Waktu Permintaan Pelayanan</center></th>" +
                "<th><center>Jumlah Permintaan</center></th>" +
                "<th><center>Keterangan</center></th>" +
                "<th><center>Status</center></th>" +
                "<th><center>Aksi</center></th>" +
                "</tr>" +
                "</tfoot>";
            document.getElementById("table").innerHTML= a;
        }
    }
    xmlhttp.open("GET", "<?php echo base_url("kapal/tabel_pengantaran")?>", true);
    xmlhttp.send();

    var base_url = '<?php echo base_url();?>';

    function realisasi(id) {
        $('#form_realisasi')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('kapal/realisasi_pengantaran_laut')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id-transaksi"]').val(data.id_transaksi);
                $('[name="id_lct"]').val(data.id_vessel);
                $('[name="voy_no"]').val(data.voy_no);
                $('[name="nama_lct"]').val(data.nama_vessel);
                $('[name="nama_perusahaan"]').val(data.nama_agent);
                $('[name="nama_pemohon"]').val(data.nama_pemohon);
                $('[name="tgl_transaksi"]').val(data.tgl_transaksi);
                $('[name="tonnase"]').val(data.total_permintaan);
                $('#modal_menu').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Realisasi Pengisian'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Mengambil Data Dari Ajax');
            }
        });
    }

    function save() {
        $('#btnSave').text('Menyimpan...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        var url;

        url = "<?php echo site_url('kapal/update_realisasi_laut')?>";

        // ajax adding data to database
        var formData = new FormData($('#form_realisasi')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_menu').modal('hide');
                    alert('Realisasi Berhasil Disimpan');
                    window.location.replace('<?php echo base_url('main/monitoring/pelayanan_air_kapal')?>');
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable

            }
        });
    }

    function start_work(id){
        var url;
        var id = id;
        url = "<?php echo site_url('kapal/ubah_status_pengisian')?>";
        if (confirm('Mulai Pengisian ?')) {
            $.ajax({
                url : url,
                type: "POST",
                data: {
                    id_transaksi: id
                },
                dataType: "JSON",
                success: function(data) {
                    alert('Mulai Pengisian');
                    window.location.replace('<?php echo base_url('main/monitoring/pelayanan_air_kapal');?>');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Gagal Mengupdate Data');
                }
            });
        }
    }

</script>
<body>
    <div class="container container-fluid">
        <div class="row">
            <center><h4>Status Realisasi Pelayanan Jasa Air Bersih Untuk Kapal</h4></center><br>
            <table class="table table-responsive table-bordered table-striped" id="table"></table>
        </div>
    </div>
</body>

<div class="modal fade" id="modal_menu" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Realisasi</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_realisasi" class="form-horizontal">
                    <input type="hidden" value="" name="id-transaksi"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">ID VESSEL</label>
                            <div class="col-md-9">
                                <input disabled name="id_lct" id="id_lct" placeholder="ID LCT" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama VESSEL</label>
                            <div class="col-md-9">
                                <input disabled name="nama_lct" placeholder="Nama LCT" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Voy No</label>
                            <div class="col-md-9">
                                <input disabled name="voy_no" placeholder="Voy No" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Perusahaan</label>
                            <div class="col-md-9">
                                <input disabled name="nama_perusahaan" placeholder="Nama Perusahaan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pemohon</label>
                            <div class="col-md-9">
                                <input disabled name="nama_pemohon" placeholder="Nama Pemohon" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Transaksi</label>
                            <div class="col-md-9">
                                <input disabled name="tgl_transaksi" placeholder="Tanggal Transaksi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Total Permintaan</label>
                            <div class="col-md-9">
                                <input disabled name="tonnase" placeholder="Total Permintaan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Flow Meter 1 Awal</label>
                            <div class="col-md-9">
                                <input name="flowmeter_awal" placeholder="Satuan (Ton)" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Flow Meter 1 Akhir</label>
                            <div class="col-md-9">
                                <input name="flowmeter_akhir" placeholder="Satuan (Ton)" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Flow Meter 2 Awal</label>
                            <div class="col-md-9">
                                <input name="flowmeter_awal_2" placeholder="Satuan (Ton)" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Flow Meter 2 Akhir</label>
                            <div class="col-md-9">
                                <input name="flowmeter_akhir_2" placeholder="Satuan (Ton)" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Flow Meter 3 Awal</label>
                            <div class="col-md-9">
                                <input name="flowmeter_awal_3" placeholder="Satuan (Ton)" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Flow Meter 3 Akhir</label>
                            <div class="col-md-9">
                                <input name="flowmeter_akhir_3" placeholder="Satuan (Ton)" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Flow Meter 4 Awal</label>
                            <div class="col-md-9">
                                <input name="flowmeter_awal_4" placeholder="Satuan (Ton)" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Flow Meter 4 Akhir</label>
                            <div class="col-md-9">
                                <input name="flowmeter_akhir_4" placeholder="Satuan (Ton)" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pengisi</label>
                            <div class="col-md-9">
                                <input name="pengisi" placeholder="Penanggung Jawab Pengisi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save();" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->