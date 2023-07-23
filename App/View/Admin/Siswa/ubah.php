<?php

use  App\Model\Siswa;


if (isset($_POST["ubah"])) {

    $dataUpdate = $_POST;
    Siswa::Update($link, $dataUpdate['id'], $dataUpdate);
    header("Location: index.php?page=siswa&c=index");
    exit;
}

if (isset($_GET['id'])) {
    $nisn = $_GET['id'];
    $data = Siswa::GetWithId($link, $nisn);
?>
    <div class="col-lg-8 mx-auto border rounded-3 border-primary">
        <h2 class="h2 text-center mt-3">
            Form Ubah Mahasiswa
        </h2>
        <form name="ubahdata" class="row g-3 needs-validation p-3" method="post" novalidate>
            <input type="hidden" class="form-control" value="<?= $data['id'] ?>" id="id" name="id" required>

            <div class="col-md-4">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" maxlength="6" minlength="6" value="<?= $data['nisn'] ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the student's NISN, a minimum of 6 digits and a maximum of 6 digits
                </div>
            </div>
            <div class="col-md-8">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" value="<?= $data['nama'] ?>" id="nama" name="nama" minlength="3" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the student's name and at least 3 letters
                </div>
            </div>

            <div class="col-md-4">
                <label for="jkl" class="form-label">Jenis Kelamin</label>
                <div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="jeniskelaminL" name="jkl" value="L" required <?= ($data['jkl'] == "L") ? "checked" : "" ?>>
                        <label class="form-check-label" for="jeniskelaminL">Laki Laki</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="radio" class="form-check-input" id="jeniskelaminP" name="jkl" value="P" required <?= ($data['jkl'] == "P") ? "checked" : "" ?>>
                        <label class="form-check-label" for="jeniskelaminP">Perempuan</label>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please select the gender of the student
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-control" name="kelas" id="kelas" required>
                    <option value="">Pilih</option>
                    <?php for ($i = 1; $i <= 6; $i++) : ?>
                        <option value="<?= $i ?>" <?= ($data['kelas'] == $i) ? "selected" : "" ?>><?= $i ?></option>
                    <?php endfor; ?>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please select the class of students
                </div>
            </div>

            <div class="col-md-12">
                <label for="alamat" class="form-label">Alamat Siswa</label>
                <input type="text" class="form-control" id="alamat" name="alamat" minlength="3" required value="<?= $data['alamat'] ?>">
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter in the student's address and at least 3 letters
                </div>
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
    </script>
<?php
} else {
    header("Location: " . BASEURL . "/index.php?page=siswa&c=index");
    exit;
}
?>