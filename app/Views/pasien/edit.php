<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('pasien/updateData', ['class' => 'formPasien']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">ID Pasien</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="id_pasien " name="id_pasien" value="<?= $id_pasien ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_pasien	" name="nama_pasien" value="<?= $nama_pasien ?>">
                        <div class="invalid-feedback errorNamaDokter">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">No. Telp</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="telp_pasien" name="telp_pasien" value="<?= $telp_pasien ?>">
                        <div class="invalid-feedback errorNoTelp">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Dokter</label>
                    <div class="col-sm-8">
                        <select name="id_dokter" id="id_dokter" class="form-control selectpicker">
                        <option value="<?= $id_dokter ?>"><?= $dokter["nama_dokter"] ?> ( <?= $dokter["spesialisasi"] ?> )</option>
                            <?php if ($dokterData) : ?>
                                <?php foreach ($dokterData as $dokter) : ?>
                                    <tr>
                                        <option value="<?= $dokter["id"] ?>"><?= $dokter["nama_dokter"] ?> ( <?= $dokter["spesialisasi"] ?> )
                                        </option>
                                    </tr>
                            <?php
                                endforeach;
                            endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Keluhan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?= $keluhan ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Alamat Pasien</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control" id="alamat_pasien" name="alamat_pasien"><?= $alamat_pasien ?></textarea>
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
        $(".formPasien").submit(function(e) {
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
                    dataPasien();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>