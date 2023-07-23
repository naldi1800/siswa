<?php

use  App\Model\Gallery;

if (isset($_POST["ubah"])) {
    $data["ket"] = $_POST['ket'];
    var_dump($_FILES);
    $data["foto"] = $_FILES;
    Gallery::Update($link, $_POST['id'],  $data);

    // header("Location: index.php?page=gallery&c=index");
    exit;
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Gallery::GetWithId($link, $id);
    // var_dump($data);
?>
    <div class="col-lg-8 mx-auto border rounded-3 border-primary">
        <h2 class="h2 text-center mt-3">
            Form Edit Gallery
        </h2>
        <form class="row g-3 needs-validation p-3" method="post" enctype="multipart/form-data" novalidate>
            <input type="hidden" id="id" nama="id" value=<?= $id ?>>
            <div class="col-md-8">
                <label for="ket" class="form-label">Keterangan Gambar</label>
                <input type="text" class="form-control" id="ket" name="ket" value="<?= $data['ket'] ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Masukan Keterangan Gambar
                </div>
            </div>

            <div class="col-md-4">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" accept="image/jpeg, image/png" class="form-control" id="foto" name="foto">
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter a image (only PNG or JPEG)
                </div>
            </div>
            <div class="col-md-12">
                <img src="<?= BASEURL . '/App/Image/Gallery/' . $data['name'] ?>" alt="" srcset="" width="250" id='preview' name='preview'>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="ubah">Save</button>
            </div>
        </form>
    </div>

    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
        var foto = document.getElementById('foto')
        var preview = document.getElementById('preview')


        foto.onchange = evt => {
            const [file] = foto.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
<?php
} else {
    header("Location: " . BASEURL . "/index.php?page=siswa&c=index");
    exit;
}
?>