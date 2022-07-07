<?php
include '../layouts/db.php';
include '../layouts/header.php';
include '../layouts/sidebar.php';
$rowsearch = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_REQUEST['search'];
    if ($key != '') {
        global $conn;
        $sql = "SELECT * FROM `users` WHERE email like'%$key%';";
        // print_r($sql);die;
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $rowsearch = $stmt->fetchAll();
    } else {
        $rowsearch = [];
    }
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thông Tin Tìm Kiếm</h1>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Mã Khách Hàng</th>
                                <th>Tên Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Email Khách Hàng</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (count($rowsearch) > 0) : ?>
                                <?php foreach ($rowsearch as $key => $row) : ?>
                                    <tr>
                                    <td><?php echo $row->id; ?></td>
                                    <td><?php echo $row->firstname.' '.$row->lastname; ?></td>
                                    <td><?php echo $row->phone_number; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4">Bạn Chưa Nhập Thông Tin Tìm Kiếm</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div>
                        <a type="button" href="../usersprofile/users.php" class="btn btn-primary">Quay Lại</a>
                    </div>