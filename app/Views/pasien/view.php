<table class="table table-sm table-stripped" id="dataPasien">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Pasien</th>
            <th>Nama Pasien</th>
            <th>No Telp</th>
            <th>Dokter</th>
            <th>Alamat Pasien</th>
            <th>Keluhan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 0;
        foreach ($pasienData as $row) :
            $nomor++;
        ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $row['id_pasien'] ?></td>
                <td><?= $row['nama_pasien'] ?></td>
                <td><?= $row['telp_pasien'] ?></td>
                <td><?= $row['nama_dokter'] ?> ( <?= $row["spesialisasi"] ?> )</td>
                <td><?= $row['alamat_pasien'] ?></td>
                <td><?= $row['keluhan'] ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-alt-secondary" onclick="editPasien('<?= $row['id_pasien'] ?>')"><i class="fa fa-pencil text-warning" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-sm btn-alt-secondary" onclick="hapusPasien('<?= $row['id_pasien'] ?>')"><i class="fa fa-fw fa-times text-danger"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#dataPasien').DataTable();
    });

    function editPasien(idPasien) {
        $.ajax({
            type: "post",
            url: "<?= site_url('pasien/editPasien') ?>",
            data: {
                id_pasien: idPasien,
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalEdit').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
    }

    function hapusPasien(idPasien) {
        Swal.fire({
            title: "Hapus",
            text: "Yakin ingin menghapus pasien ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('pasien/hapusPasien') ?>",
                    data: {
                        id_pasien: idPasien,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                title: "Dihapus!",
                                text: response.sukses,
                                icon: "success"
                            });
                            $('.viewmodal').html(response.sukses).show();
                            $('#modalEdit').modal('show');
                            dataPasien();
                        } else {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Pasien gagal dihapus.",
                                icon: "danger"
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                })

            }
        });
    }
</script>