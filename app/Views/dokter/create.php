<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('dokter/simpanData', ['class' => 'formDokter']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
            <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">ID Dokter</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="id_dokter" name="id_dokter">
                        <div class="invalid-feedback errorIdDokter">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_dokter" name="nama_dokter">
                        <div class="invalid-feedback errorNamaDokter">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">No. Telp</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="no_telp" name="no_telp">
                        <div class="invalid-feedback errorNoTelp">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email_dokter" name="email_dokter">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Spesialisasi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="spesialisasi" name="spesialisasi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".formDokter").submit(function(e) {
            e.preventDefault();
            console.log($(this).serialize());
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disabled')
                    $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable')
                    $('.btnsimpan').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.id_dokter) {
                            $('#id_dokter').addClass('is-invalid');
                            $('.errorIdDokter').html(response.error.id_dokter);
                        } else {
                            $('#id_dokter').removeClass('is-invalid');
                            $('.errorIdDokter').html('');
                        } 

                        if (response.error.nama_dokter) {
                            $('#nama_dokter').addClass('is-invalid');
                            $('.errorNamaDokter').html(response.error.nama_dokter);
                        } else {
                            $('#nama_dokter').removeClass('is-invalid');
                            $('.errorNamaDokter').html('');
                        } 

                        if (response.error.no_telp) {
                            $('#no_telp').addClass('is-invalid');
                            $('.errorNoTelp').html(response.error.no_telp);
                            console.log(response.error.no_telp);
                        } else {
                            $('#no_telp').removeClass('is-invalid');
                            $('.errorNoTelp').html('');
                        }
                    } else {
                        Swal.fire(response.sukses);
                        $('#modalTambah').modal('hide');
                        dataDokter();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>