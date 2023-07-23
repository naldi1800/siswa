<?php

use  App\Model\Gallery;

if (isset($_POST["tambah"])) {
    $data["ket"] = $_POST['ket'];
    $data["foto"] = $_FILES;
    Gallery::Insert($link, $data);
    header("Location: index.php?page=gallery&c=index");
    exit;
}
?>
<div class="col-lg-8 mx-auto border rounded-3 border-primary">
    <h2 class="h2 text-center mt-3">
        Form Tambah Gallery
    </h2>
    <form class="row g-3 needs-validation p-3" method="post" enctype="multipart/form-data" novalidate>
        <div class="col-md-8">
            <label for="ket" class="form-label">Keterangan Gambar</label>
            <input type="text" class="form-control" id="ket" name="ket" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Masukan Keterangan Gambar
            </div>
        </div>

        <div class="col-md-4">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" accept="image/jpeg, image/png" class="form-control" id="foto" name="foto" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter a image (only PNG or JPEG)
            </div>
        </div>
        <div class="col-md-12">
            <!-- <label for="preview" class="form-label">Foto</label> -->
            <!-- <input type="file" accept="image/jpeg, image/png" class="form-control" id="preview" name="preview" required> -->
            <img src="" alt="" srcset="" width="250" id='preview' name='preview'>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit" name="tambah">Save</button>
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