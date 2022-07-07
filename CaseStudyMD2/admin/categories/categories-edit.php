<?php
include '../layouts/db.php';
//lay du lieu tren url
$id = $_REQUEST['id'];
$sql = "SELECT * FROM `categories` WHERE id = $id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$row = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_REQUEST['name'];

    $sql = "UPDATE categories SET name = '$name' WHERE id = '$id'";
    $conn->query($sql);
    header('location:categories-list.php');
    $_SESSION['flash_message'] = "Chỉnh sửa thành công";
}
include '../layouts/header.php';
include '../layouts/sidebar.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sửa Thông Tin Sản Phẩm</h1>
            <div class="row">
                <div class="col-lg-12">
                    <!-- code o day -->
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Tên Sản Phẩm</label>
                            <input type="text" name="name" class="form-control" value='<?= $row->name ?>'>
                            <p class="text-danger"></p>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="button" href="categories-list.php" class="btn btn-primary">Quay Lại</a>
                    </form>
                </div>
            </div>
        </div>
</div>

</body>