<?php
if(($this->session->userdata('role') == "keuangan" || $this->session->userdata('role') == "admin") && $this->session->userdata('session') != NULL){
?>
<script type="text/javascript">
    //function getData(){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myArr = JSON.parse(this.responseText);

            var i=0;
            var a = "<thead>" +
                "<tr>" +
                "<th><center>No</center></th>" +
                "<th><center>Nama Pengguna Jasa</center></th>" +
                "<th><center>Alamat</center></th>" +
                "<th><center>No Telepon</center></th>" +
                "<th><center>Waktu Transaksi</center></th>" +
                "<th><center>Total Pengisian (Ton)</center></th>" +
                "<th><center>Tarif</center></th>" +
                "<th><center>Jumlah Pembayaran</center></th>"+
                "<th><center>Aksi</center></th>"+
                "</tr>" +
                "</thead>" +
                "<tbody>";
            while (i < myArr.length) {
                a +="<tr>" +
                    "<td align='center'>"+myArr[i]["no"]+"</td>" +
                    "<td align='center'>"+myArr[i]["nama_pelanggan"]+"</td>" +
                    "<td align='center'>"+myArr[i]["alamat"]+"</td>" +
                    "<td align='center'>"+myArr[i]["no_telp"]+"</td>" +
                    "<td align='center'>"+myArr[i]["waktu_transaksi"]+"</td>" +
                    "<td align='center'>"+myArr[i]["total_pengisian"]+"</td>" +
                    "<td align='center'>"+myArr[i]["tarif"]+"</td>" +
                    "<td align='center'>"+myArr[i]["pembayaran"]+"</td>";
                if(myArr[i]["aksi"] != null){
                    a += "<td align='center'>"+myArr[i]["aksi"]+"</td>";
                }
                a += "</tr>";
                i++;
            }
            a +="</tbody>" +
                "<tfoot>" +
                "<tr>" +
                "<th><center>No</center></th>" +
                "<th><center>Nama Pengguna Jasa</center></th>" +
                "<th><center>Alamat</center></th>" +
                "<th><center>No Telepon</center></th>" +
                "<th><center>Waktu Transaksi</center></th>" +
                "<th><center>Total Pengisian (Ton)</center></th>" +
                "<th><center>Tarif</center></th>" +
                "<th><center>Jumlah Pembayaran</center></th>"+
                "<th><center>Aksi</center></th>"+
                "</tr>" +
                "</tfoot>";
            document.getElementById("table").innerHTML= a;
        }
    }
    xmlhttp.open("GET", "<?php echo base_url("main/tabel_tagihan")?>", true);
    xmlhttp.send();
    //}

    //setInterval(getData, 4000);
</script>
<body>
<div class="container container-fluid">
    <div class="row">
        <center><h4>Status Pelayanan Jasa Air Bersih Untuk Darat</h4></center><br>
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
                            <label class="control-label col-md-3">Nama Pengguna Jasa</label>
                            <div class="col-md-9">
                                <input disabled name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama Pelanggan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input disabled name="alamat" placeholder="Alamat" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No Telepon</label>
                            <div class="col-md-9">
                                <input disabled name="no_telp" placeholder="No Telepon" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Waktu Transaksi</label>
                            <div class="col-md-9">
                                <input disabled name="tgl_transaksi" placeholder="Waktu Transaksi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Total Pengisian</label>
                            <div class="col-md-9">
                                <input disabled name="total_pengisian" placeholder="Total Pengisian" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jumlah Pembayaran</label>
                            <div class="col-md-9">
                                <input disabled name="pembayaran" placeholder="Rp. " class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No Nota</label>
                            <div class="col-md-9">
                                <input name="no_nota" placeholder="Masukkan No Nota" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No Faktur</label>
                            <div class="col-md-9">
                                <input name="no_faktur" placeholder="Masukkan No Faktur" class="form-control" type="text">
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

<script type="text/javascript">
    var base_url = '<?php echo base_url();?>';

    function realisasi(id) {
        $('#form_realisasi')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('main/pembayaran_darat')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id-transaksi"]').val(data.id_transaksi);
                $('[name="nama_pelanggan"]').val(data.nama_pengguna_jasa);
                $('[name="alamat"]').val(data.alamat);
                $('[name="no_telp"]').val(data.no_telp);
                $('[name="tgl_transaksi"]').val(data.tgl_transaksi);
                $('[name="total_pengisian"]').val(data.realisasi_pengisian);
                if(data.diskon != null){
                    $('[name="pembayaran"]').val((data.tarif - (data.tarif * data.diskon/100)) * data.realisasi_pengisian);
                } else{
                    $('[name="pembayaran"]').val(data.tarif * data.realisasi_pengisian);
                }
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

        url = "<?php echo site_url('main/realisasi_pembayaran_darat')?>";

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
                    window.location.replace('<?php echo base_url('main/view?id=realisasi_pembayaran_darat')?>');
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
</script>
<?php
}
else{
    redirect('main');
}