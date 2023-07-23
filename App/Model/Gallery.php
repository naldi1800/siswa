<?php

namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;

class Gallery extends Data
{
    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_gallery;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_gallery . " WHERE id='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $imageName = "";
        $glr = $data["ket"];
        $img = $data['foto'];
        if ($img != null) {
            $type = pathinfo($img['foto']['name'], PATHINFO_EXTENSION);
            $imageName = "gallery-" . $glr['id'] . "." . $type;


            $sql = "UPDATE " . parent::$t_gallery . " SET "
                . "ket='" . $glr . "' , "
                . "name='" . $imageName . "' WHERE id='" . $id . "'";

            $imageName = parent::$ImageFolder . $imageName;
        } else {
            $sql = "UPDATE " . parent::$t_gallery . " SET "
                . "ket='" . $glr . "' "
                . " WHERE id='" . $id . "'";
        }
        //        var_dump($imageName);

        $query = mysqli_query($link, $sql);
        if ($query) {
            if ($img != null) {
                if (file_exists($imageName)) {
                    unlink($imageName);
                    var_dump("UNLINK");
                }

                if (move_uploaded_file($img['foto']['tmp_name'], $imageName)) {
                    Alert::Set("Data gallery", "diubah", "berhasil");
                } else {
                    Alert::Set("Data gallery", "diubah", "gagal");
                }
            } else {
                Alert::Set("Data gallery", "diubah", "berhasil");
            }
        } else {
            Alert::Set("Data gallery", "diubah", "gagal");
                       echo "Error : " . mysqli_error($link);
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_gallery . " WHERE id='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data gallery", "dihapus", "berhasil");
            if (file_exists("App/Image/Gallery/gallery-" . $id . ".*")) {
                echo "hapus Image ";
                if (array_map('unlink', glob("App/Image/Gallery/gallery-" . $id . ".*"))) {
                    echo "berhasil";
                }
            }
        } else {
            Alert::Set("Data gallery", "dihapus", "gagal");
        }
    }

    public static function GetLastId($link)
    {
        $sql = "SELECT * FROM " . parent::$t_gallery . " ORDER BY id DESC LIMIT 1";
        $query = mysqli_query($link, $sql);
        $data = mysqli_fetch_assoc($query);
        return $data['id'];
    }

    public static function Insert($link, $data)
    {
        $glr = $data["ket"];
        $img = $data['foto'];
        $type = pathinfo($img['foto']['name'], PATHINFO_EXTENSION);
        $id = self::GetLastId($link) + 1;


        $imageName = "gallery-" . $id . "." . $type;

        $sql = "INSERT INTO " . parent::$t_gallery . " VALUES( '"
        . $id . "','"
        . $imageName . "','"
        . $glr . "')";



        $imageName = parent::$ImageFolder . $imageName;

        $query = mysqli_query($link, $sql);
        if ($query) {
            if (move_uploaded_file($img['foto']['tmp_name'], $imageName)) {
                Alert::Set("Data Gallery", "disimpan", "berhasil");
            } else {
                Alert::Set("Data Gallery", "disimpan", "gagal");
            }
        } else {
            Alert::Set("Data Gallery", "disimpan", "gagal");
            //            echo "Error : " . mysqli_error($link);
        }
    }
}
