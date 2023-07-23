<h2 class="h2 text-center">
    Data Gallery
</h2>
<a href="?page=gallery&c=tambah" class="btn btn-outline-success mb-3">Tambah</a>
<table class="table table-hover table-bordered">
    <thead class="bg-secondary text-white text-center">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;

        use App\Model\Gallery;

        $datas = Gallery::GetAll($link);
        $no = 0;
        foreach ($datas as $data) :
            $no++;
        ?>
            <tr>
                <td width="10%" class="text-center text-middle"><?= $no ?></td>
                <td width="20%">
                    <img src="<?= BASEURL . '/App/Image/Gallery/' . $data['name']  ?>" alt="<?= BASEURL . '/App/Image/Gallery/' . $data['name']  ?>" width="250" >
                </td>
                <td width="50%" class="text-center"><?= $data['ket'] ?></td>
                <td width="20%" class="">
                    <center>
                        <!-- <a href="?page=gallery&c=ubah&id=<?= $data['id'] ?>" class="text-center btn btn-info">
                            Edit
                        </a> -->
                        <a href="?page=gallery&c=hapus&id=<?= $data['id'] ?>" class="text-center btn btn-danger">
                            Hapus
                        </a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>