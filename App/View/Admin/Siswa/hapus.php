<?php
    if($_GET['id'])
        \App\Model\Siswa::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=Siswa&c=index");
    exit;