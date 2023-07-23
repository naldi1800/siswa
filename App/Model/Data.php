<?php

namespace App\Model;

abstract class Data
{
    protected static $t_siswa = "siswa";
    protected static $t_gallery = "galery";
    protected static $t_matakuliah = "matakuliah";

    protected static $ImageFolder = "App/Image/Gallery/";

    public static abstract function GetAll($link);

    public static abstract function GetWithId($link, $id);

    public static abstract function Update($link, $id, $data);

    public static abstract function Delete($link, $id);

    public static abstract function Insert($link, $data);
}
