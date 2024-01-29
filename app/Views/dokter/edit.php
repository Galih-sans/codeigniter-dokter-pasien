<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('dokter/updateData', ['class' => 'formDokter']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">ID Dokter</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="id_dokter" name="id_dokter" value="<?= $id ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?= $nama_dokter ?>">
                        <div class="invalid-feedback errorNamaDokter">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">No. Telp</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="no_telp" name="no_telp" value="<?= $no_telp ?>">
                        <div class="invalid-feedback errorNoTelp">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email_dokter" name="email_dokter" value="<?= $email_dokter ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Spesialisasi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="<?= $spesialisasi ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control" id="alamat" name="alamat"><?= $alamat ?></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnupdate">Update</button>
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
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnupdate').attr('disable', 'disabled')
                    $('.btnupdate').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btnupdate').removeAttr('disable')
                    $('.btnupdate').html('Update');
                },
                success: function(response) {
                    Swal.fire(response.sukses);
                    $('#modalEdit').modal('hide');
                    dataDokter();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>