<?php
    if($_GET['id'])
        \App\Model\Gallery::Delete($link, $_GET['id']);

    header("location: " . BASEURL . "/index.php?page=Gallery&c=index");
    exit;