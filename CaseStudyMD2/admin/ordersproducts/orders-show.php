<?php
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/db.php';

$order_id = $_REQUEST['id'];
$sql = "SELECT * FROM `orders` WHERE id = $order_id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$order = $stmt->fetch();
// echo '<pre>';
// print_r($order);die;

//thông tin đơn hàng

//chi tiết đơn hàng
$sql = "SELECT order_details.*,products.products_name FROM `order_details` 
JOIN products ON order_details.product_id = products.id WHERE order_id = $order_id";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$rows = $stmt->fetchAll();


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Chi Tiết Đơn Đặt Hàng</h1>
            <div class="row">
                <div class="col-lg-12">
                    <table border="1" class="table table-dark">
                        <tr>
                            <td>Tên Khách Hàng</td>
                            <td><?php echo $order->customer_name; ?></td>
                        </tr>
                        <tr>
                            <td>Số Điện Thoại</td>
                            <td><?php echo $order->phone_number; ?></td>
                        </tr>
                        <tr>
                            <td>Ngày Đặt Hàng</td>
                            <td><?php echo $order->date_created; ?></td>
                        </tr>
                        <tr>
                            <td>Ngày Nhận Hàng</td>
                            <td><?php echo $order->delivery_date; ?></td>
                        </tr>

                        <tr>
                            <td>Địa Chỉ Nhận Hàng</td>
                            <td><?php echo $order->delivery_place; ?></td>
                        </tr>
                        <tr>
                            <td>Phương Thức Thanh Toán</td>
                            <td><?php echo $order->payment_method; ?></td>
                        </tr>
                        <tr>
                            <td>Tổng Số Tiền</td>
                            <td><?php echo $order->total_money; ?></td>
                        </tr>
                        <tr>
                            <td>Tình Trạng Thanh Toán</td>
                            <td><?php echo $order->payment_status; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-12">
                    </form>
                    <table border="1" class="dataTable-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Mã Đơn Hàng </th>
                                <th>Số Lượng Sản Phẩm</th>
                                <th>Giá Sản Phẩm</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($rows as $key => $row) : ?>
                                <tr>
                                    <td><?php echo $row->id; ?></td>
                                    <td><?php echo $row->products_name; ?></td>
                                    <td><?php echo $row->order_id; ?></td>
                                    <td><?php echo $row->quantity; ?></td>
                                    <td><?php echo $row->price; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a type="button" href="../ordersproducts/orders.php" class="btn btn-primary">Quay Lại</a>
                </div>
            </div>
        </div>
    </main>
</div>