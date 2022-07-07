<?php
// include '../layouts/header.php';
// include '../layouts/sidebar.php';
include '../layouts/db.php';

$id = $_REQUEST['id'];
$sql = "SELECT * FROM `orders` WHERE id = '$id'";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$row = $stmt->fetch();
// echo '<pre>';
// print_r($row);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_REQUEST['id'];
    $customer_name = $_REQUEST['customer_name'];
    $date_created = $_REQUEST['date_created'];
    $delivery_place = $_REQUEST['delivery_place'];
    $payment_method = $_REQUEST['payment_method'];
    $total_money = $_REQUEST['total_money'];
    $payment_status = $_REQUEST['payment_status'];

    if ($customer_name == '') {
        $errors['customer_name'] = 'Bạn Chưa Nhập Tên';
    }
    if ($date_created == '') {
        $errors['date_created'] = 'Bạn Chưa Nhập Ngày Tạo Đơn';
    }
    if ($delivery_place == '') {
        $errors['delivery_place'] = 'Bạn Chưa Nhập Địa Chỉ Giao Hàng';
    }
    if ($payment_method == '') {
        $errors['payment_method'] = 'Bạn Chưa Chọn Hình Thức Thanh Toán';
    }
    if ($total_money == '') {
        $errors['delivery_place'] = 'Bạn Chưa Nhập Tổng Số Tiền';
    }
    if ($payment_status == '') {
        $errors['payment_status'] = 'Bạn Chưa Chọn Trạng Thái Thanh Toán';
    }

    // echo '<pre>';
    // print_r($_REQUEST);die;
    if (count($errors) == 0) {
        $sql = "UPDATE orders SET customer_name = '$customer_name', date_created = '$date_created', delivery_place = '$delivery_place',payment_method = '$payment_method',total_money = '$total_money', payment_status = '$payment_status'
        WHERE id = '$id'";
        // echo $sql;die;
        $conn->query($sql);
        header('location:orders.php');
    }
}
$sql = "SELECT * FROM `order_details`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$categories = $stmt->fetchAll();
include '../layouts/header.php';
include '../layouts/sidebar.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Chi Tiết Đơn Hàng</h1>
            <div class="row">
                <ul>
                    <?php
                    if (count($errors) > 0) {
                        foreach ($errors as $error) {
                            echo '<li>' . $error . '</li>';
                        }
                    }
                    ?>
                </ul>
                <div class="col-lg-12">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Khách Hàng</label>
                            <input type="text" name="customer_name" class="form-control" value='<?= $row->customer_name ?>'>
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ngày Tạo Đơn</label>
                            <input type="date_created" class="form-control" name="date_created" value='<?= $row->date_created ?>'>
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa Chỉ Giao</label>
                            <input type="delivery_place" class="form-control" name="delivery_place" value='<?= $row->delivery_place ?>'>
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hình Thức Thanh Toán</label>
                            <input type="payment_method" class="form-control" name="payment_method" value='<?= $row->payment_method ?>'>
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tổng Thành Tiền</label>
                            <input type="total_money" class="form-control" name="total_money" value='<?= $row->total_money ?>'>
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Trạng Thái Thanh Toán</label>
                            <input type="payment_status" class="form-control" name="payment_status" value='<?= $row->payment_status ?>'>
                            <p class="text-danger"></p>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Danh Mục Sản Phẩm</label>
                            <select name="category_id" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nhập Danh Mục">
                                <option value="#">Chọn Danh Mục</option>
                                <?php foreach ($categories as $key => $category) : ?>
                                    <option value="<?php echo $category->id; ?>">
                                        <?php echo $category->name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div> -->
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="button" href="../ordersproducts/orders.php" class="btn btn-primary">Quay Lại</a>
                    </form>
                </div>
            </div>
        </div>
</div>

</body>