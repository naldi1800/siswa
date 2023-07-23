<h2 class="h2 text-center">
    Data Siswa
</h2>
<a href="?page=Siswa&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
    <tr>
        <th>NISN</th>
        <th>Nama Siswa</th>
        <th>Jenis Kelamin</th>
        <th>Kelas</th>
        <th>Alamat</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;

    use App\Model\Siswa;

    $datas = Siswa::GetAll($link);
    foreach ($datas as $data) :
        $jkl = ($data['jkl'] == "P") ? "Perempuan" : (($data['jkl'] == "L") ? "Laki-Laki" : "");
        ?>
        <tr>
            <td width="15%" class="text-center"><?= $data['nisn'] ?></td>
            <td width="30%"><?= $data['nama'] ?></td>
            <td width="15%" class="text-center"><?= $jkl ?></td>
            <td width="10%" class="text-center"><?= $data['kelas'] ?></td>
            <td width="15%" class="text-center"><?= $data['alamat'] ?></td>
            <td width="15%" class="">
                <center>
                    <a href="?page=siswa&c=ubah&id=<?= $data['nisn'] ?>" class="text-center btn btn-info">
                        Edit
                    </a>
                    <a href="?page=siswa&c=hapus&id=<?= $data['nisn'] ?>" class="text-center btn btn-danger">
                        Hapus
                    </a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>