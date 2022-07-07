<?php
// session_start();
// error_reporting(0);
// include '../layouts/db.php';

// if (isset($_POST['submit'])) {
//     $email = $_SESSION['email'];
//     $password = md5($_POST['newpassword']);

//     $sql = "UPDATE users SET password ='$password' where email ='$email'";

//     $stmt = $conn->query($sql);
//     $stmt->setFetchMode(PDO::FETCH_OBJ);
//     $row = $stmt->fetch();


//     if ($sql) {
//         echo 'Mật Khẩu Được Thay Đổi Thành Công';
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Khôi Phục Mật Khẩu</title>
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Khôi Phục Mật Khẩu</h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">Nhập Địa Chỉ Email Của Bạn. Để Đặt Lại Mật Khẩu</div>
                                    <form method="post" action="">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Địa Chỉ Email</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="../login/login.php">Trở Về Trang Đăng Nhập</a>
                                            <button type="submit" class="btn btn-primary">Đặt Lại Mật Khẩu</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="../login/register.php">Chưa Có Tài Khoản? Đăng Ký!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Cường Bear</div>
                        <div>
                            <a href="#">Chính sách bảo mật</a>
                            &middot;
                            <a href="#">Điều Kiện &amp; Các Điều Kiện</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>