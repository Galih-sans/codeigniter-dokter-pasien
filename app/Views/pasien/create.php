<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('pasien/simpanData', ['class' => 'formPasien']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">ID Pasien</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="id_pasien" name="id_pasien">
                        <div class="invalid-feedback errorIdPasien">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien">
                        <div class="invalid-feedback errorNamaPasien">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">No. Telp</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="telp_pasien" name="telp_pasien">
                        <div class="invalid-feedback errorNoTelp">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Pilih Dokter</label>
                    <div class="col-sm-8">
                        <select name="id_dokter" id="id_dokter" class="form-control selectpicker">
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
                        <textarea type="text" class="form-control" id="keluhan" name="keluhan"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control" id="alamat_pasien" name="alamat_pasien"></textarea>
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
        $(".formPasien").submit(function(e) {
            e.preventDefault();
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
                        if (response.error.id_pasien) {
                            $('#id_pasien').addClass('is-invalid');
                            $('.errorIdPasien').html(response.error.id_pasien);
                        } else {
                            $('#id_pasien').removeClass('is-invalid');
                            $('.errorIdPasien').html('');
                        }

                        if (response.error.nama_pasien) {
                            $('#nama_pasien').addClass('is-invalid');
                            $('.errorNamaPasien').html(response.error.nama_pasien);
                        } else {
                            $('#nama_pasien').removeClass('is-invalid');
                            $('.errorNamaPasien').html('');
                        }

                        if (response.error.telp_pasien) {
                            $('#telp_pasien').addClass('is-invalid');
                            $('.errorNoTelp').html(response.error.telp_pasien);
                        } else {
                            $('#telp_pasien').removeClass('is-invalid');
                            $('.errorNoTelp').html('');
                        }
                    } else {
                        Swal.fire(response.sukses);
                        $('#modalTambah').modal('hide');
                        dataPasien();
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