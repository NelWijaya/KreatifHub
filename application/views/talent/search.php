<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/660a3db553.js" crossorigin="anonymous"></script>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url('/') ?>">Talent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Data Talent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('talent/kategori') ?>">Kategori</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- ALERT -->
        <?php if ($success = $this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>

            <strong>Success! </strong> <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
        <?php endif; ?>

        <?php if ($danger = $this->session->flashdata('danger')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>

            <strong>Danger! </strong> <?= $this->session->flashdata('danger'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
        <?php endif; ?>
        <!-- END ALERT -->

        <?php echo form_open('talent/search') ?>
        <div class="input-group mb-5">
            <input type="text" class="form-control" placeholder="Masukkan Nama/ Kategori"
                aria-label="Masukkan Nama/ Kategori" name="keyword" id="keyword" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <?php echo form_close() ?>


        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formRegist">
            Tambah Data Mahasiswa
        </button>

        <a href="<?php echo base_url('/') ?>" class="btn btn-info mr-2 mb-3">
            All
        </a>
        <!-- Modal -->
        <div class="modal fade" id="formRegist" tabindex="-1" aria-labelledby="Modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?php echo form_open_multipart('talent/addTalent'); ?>

                    <div class="modal-header">
                        <h5 class="modal-title" id="Modal">Form Registrasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="number" maxlength="13" minlength="12" class="form-control" id="phone_number"
                                name="phone_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" min="0" class="form-control" id="age" name="age" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Man" name="gender" id="Man" checked
                                    required>
                                <label class="form-check-label" for="Man">
                                    Man
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Woman" name="gender" id="Woman"
                                    required>
                                <label class="form-check-label" for="Woman">
                                    Woman
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" id="kategori" name="kategori"
                                aria-label="Default select example">
                                <?php
                                $no = 1;
                                foreach ($kategori as $row) {
                                ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->nama_kategori ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="skills" class="form-label">Skills</label>
                            <input type="text" class="form-control" id="skills" name="skills" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="aboutme" class="form-label">About Me</label>
                            <textarea name="aboutme" id="aboutme" class="form-control" cols="30" rows="10"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Foto Talent</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Skill</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($talent as $row) {
                ?>
                <tr>
                    <th><?php echo $no ?></th>
                    <th><?php echo $row->name ?></th>
                    <td><img src="<?php echo base_url(); ?>assets/photo/<?php echo $row->foto_profile ?>"
                            alt="<?php echo $row->foto_profile ?>" width="100" height="100"></td>
                    <td><?php echo $row->nama_kategori ?></td>
                    <td><?php echo $row->skills ?></td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#details<?php echo $row->id ?>">Details</button></td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="details<?php echo $row->id ?>" tabindex="-1" aria-labelledby="Modal"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Modal">Details Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label"><b>Name</b></label>
                                    <p id="name"><?php echo $row->name ?></p>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label"><b>Email</b></label>
                                    <p id="email"><?php echo $row->email ?></p>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label"><b>Phone Number</b></label>
                                    <p id="phone"><?php echo $row->phone_number ?></p>
                                </div>

                                <div class="mb-3">
                                    <label for="age" class="form-label"><b>Age</b></label>
                                    <p id="age"><?php echo $row->age ?></p>
                                </div>

                                <div class="mb-3">
                                    <label for="gender" class="form-label"><b>Gender</b></label>
                                    <p id="gender"><?php echo $row->gender ?></p>
                                </div>

                                <div class="mb-3">
                                    <label for="photo" class="form-label"><b>Photo</b></label>
                                    <p id="photo">
                                        <img src="<?php echo base_url(); ?>assets/photo/<?php echo $row->foto_profile ?>"
                                            alt="<?php echo $row->foto_profile ?>" width="100" height="100">
                                    </p>
                                </div>

                                <div class="mb-3">
                                    <label for="kategori" class="form-label"><b>Kategori</b></label>
                                    <p id="kategori"><?php echo $row->nama_kategori ?></p>
                                </div>

                                <div class="mb-3">
                                    <label for="skills" class="form-label"><b>Skills</b></label>
                                    <p id="skills"><?php echo $row->skills ?></p>
                                </div>

                                <div class="mb-3">
                                    <label for="aboutme" class="form-label"><b>About Me</b></label>
                                    <p id="aboutme"><?php echo $row->aboutme ?></p>
                                </div>


                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Okay</button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <?php
                    $no++;
                } ?>
            </tbody>
        </table>

    </div>

    <div class="row container">

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>