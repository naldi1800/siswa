<?php

namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;

class Siswa extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_siswa;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_siswa . " WHERE nisn='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $siswa = $data;
        $sql = "UPDATE " . parent::$t_siswa . " SET "
            . "nisn='" . $siswa['nisn'] . "' , "
            . "nama='" . $siswa['nama'] . "' , "
            . "jkl='" . $siswa['jkl'] . "' , "
            . "alamat='" . $siswa['alamat'] . "', "
            . "wali='" . $siswa['wali'] . "', "
            . "kelas='" . $siswa['kelas'] . "' WHERE id='" . $id . "'";


        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data siswa", "diubah", "berhasil");
        } else {
            Alert::Set("Data siswa", "diubah", "gagal");
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_siswa . " WHERE nisn='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data siswa", "dihapus", "berhasil");
        } else {
            Alert::Set("Data siswa", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $siswa = $data;

        $sql = "INSERT INTO " . parent::$t_siswa . " VALUES( null ,'"
            . $siswa['nisn'] . "','"
            . $siswa['nama'] . "' , '"
            . $siswa['jkl'] . "' , '"
            . $siswa['kelas'] . "' , '"
            . $siswa['wali'] . "' , '"
            . $siswa['alamat'] . "')";


        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data siswa", "disimpan", "berhasil");
        } else {
            Alert::Set("Data siswa", "disimpan", "gagal");
            echo "Error : " . mysqli_error($link);
        }
    }
}
