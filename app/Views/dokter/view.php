<table class="table table-sm table-stripped" id="dataDokter">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Dokter</th>
            <th>Nama Dokter</th>
            <th>No Telp</th>
            <th>Email</th>
            <th>Spesialisasi</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 0;
        foreach ($dokterData as $row) :
            $nomor++;
        ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama_dokter'] ?></td>
                <td><?= $row['no_telp'] ?></td>
                <td><?= $row['email_dokter'] ?></td>
                <td><?= $row['spesialisasi'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-alt-secondary" onclick="editDokter('<?= $row['id'] ?>')"><i class="fa fa-pencil text-warning" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-sm btn-alt-secondary" onclick="hapusDokter('<?= $row['id'] ?>')"><i class="fa fa-fw fa-times text-danger"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#dataDokter').DataTable();
    });

    function editDokter(idDokter) {
        $.ajax({
            type: "post",
            url: "<?= site_url('dokter/editDokter') ?>",
            data: {
                id: idDokter,
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

    function hapusDokter(idDokter) {
        Swal.fire({
            title: "Hapus",
            text: "Yakin ingin menghapus dokter ini? Menghapus dokter juga akan menghapus pasien",
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
                    url: "<?= site_url('dokter/hapusDokter') ?>",
                    data: {
                        id: idDokter,
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
                            dataDokter();
                        } else {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Dokter gagal dihapus.",
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