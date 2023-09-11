<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                    <?php
                                    if (isset($_SESSION['sucsess'])) {
                                    ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo "Selamat!! Akun Anda Berhasil Dibuat" ?>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_SESSION['message'])) {
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo "Alamat Email Sudah Digunakan." ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <form action="koneksi_register.php" method="post" class="mx-1 mx-md-6">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-2">
                                                <label class="form-label" for="email"> Email</label>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-2">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" />
                                            </div>
                                        </div>

                                        <div class=" d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-2">
                                                <label class="form-label" for="form3Example3c">Password</label>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                                            </div>
                                        </div>
                                        <div class="text-center text-lg-center mt-4 pt-2">
                                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                                            <p class=" fw-bold mt-2 pt-1 mb-0">Have already an account? <a href="login.php" class="link-danger">Login</a></p>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://www.allen.ac.in/apps2324/assets/images/reset-password.jpg" class="img-fluid">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<?php
session_destroy();
?>