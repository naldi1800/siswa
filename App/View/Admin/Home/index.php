<?php

use App\Model\Siswa;
use App\Contorller\Fungsi;
use App\Model\Gallery;

?>

<h1 class="col-md-12 text-center mb-4">ADMIN</h1>

<div class="row">
    <div class="col">
        <div class="card col-md-12 text-black border-secondary">
            <div class="card-header bg-info text-white text-center">
                <h5>Siswa</h5>
            </div>
            <div class="card-body">
                <?php
                $siswa = Siswa::GetAll($link);
                $totalsiswa = count($siswa);
                ?>
                <p>Total Siswa : <?= $totalsiswa ?></p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card col-md-12s text-black border-secondary">
            <div class="card-header bg-info text-white text-center">
                <h5>Gallery</h5>
            </div>
            <div class="card-body">
                <?php
                $glr = Gallery::GetAll($link);
                $totalglr = count($glr);
                ?>
                <p>Total Foto Gallery : <?= $totalglr ?></p>
            </div>
        </div>
    </div>

    <div class="col invisible">
    </div>

</div>