<?php

use App\Model\Gallery;
?>
<h2 class="h2 text-center">
    Gallery
</h2><br><br>
<div class="container ">
    <div class="row">
        <?php
        $data = Gallery::GetAll($link);
        // var_dump($data);
        for ($i  = 0; $i < count($data) ; $i++) :
            // echo BASEURL . '/App/Image/Gallery/' . $data[$i]['name'];
        ?>
            <div class="col-sm-4 mx-auto mt-2 mx-auto" onmouseenter="mEnter();">
                <figure class="figure">
                    <img src="<?= BASEURL . '/App/Image/Gallery/' . $data[$i]['name'] ?>" class="figure-img img-fluid rounded" alt="not found">
                    <figcaption class="figure-caption text-right"><?= $data[$i]['ket'] ?></figcaption>
                </figure>
                <!-- <img src="https://picsum.photos/id/<?= $i ?>/200/300" alt="">
                <div>aa</div> -->
            </div>
        <?php
        endfor;
        ?>
    </div>
</div>

<script>
    function mEnter() {
        console.log("aaa");
    }
</script>