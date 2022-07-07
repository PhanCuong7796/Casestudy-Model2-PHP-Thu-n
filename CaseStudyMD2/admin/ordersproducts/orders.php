<?php
include '../layouts/header.php';
include '../layouts/sidebar.php';
include '../layouts/db.php';

$sql = "SELECT * FROM `orders`";

$sql = "SELECT COUNT(id) AS total_records FROM `orders`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$pagination = $stmt->fetch();
// print_r($sql);die;
$total_records = $pagination['total_records']; //45
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; //2
$limit = 3;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

$start = ($current_page - 1) * $limit;
$sql = "SELECT * FROM orders LIMIT $start, $limit";

$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$rows = $stmt->fetchAll();

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Đơn Đặt Hàng</h1>
            <div class="row">
                <div class="col-lg-12">
                    <form class="search-form" action="../ordersproducts/orders-search.php" method="POST">
                        <input class="btn btn-outline-dark" type="search" placeholder="Tìm Kiếm" name="search" title="Tìm Kiếm">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                    </form>
                    <table border="1" class="table">
                        <thead class="table-light">
                            <tr>
                                <th>STT</th>
                                <th>Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Trạng Thái Thanh Toán</th>
                                <th>Tùy Chọn</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($rows as $key => $row) : ?>
                                <tr>
                                    <td><?php echo $row->id; ?></td>
                                    <td><?php echo $row->customer_name; ?></td>
                                    <td><?php echo $row->phone_number; ?></td>
                                    <td><?php echo $row->payment_status; ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="orders-show.php?id=<?php echo $row->id; ?>">Xem</a> 
                                        <a class="btn btn-primary" href="orders-edit.php?id=<?php echo $row->id; ?>">Sửa</a> 
                                        <a class="btn btn-danger" href="orders-delete.php?id=<?php echo $row->id; ?>">Xoá</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="dataTable-bottom">
                        <nav class="dataTable-pagination">
                            <ul class="dataTable-pagination-list">
                                <?php
                                if ($current_page > 1 && $total_page > 1) {
                                    echo '<li><a href="orders.php?page=' . ($current_page - 1) . '">Prev</a></li>';
                                }
                                for ($i = 1; $i <= $total_page; $i++) {
                                    if ($i == $current_page) {
                                        echo '<a>' . $i . '</a>';
                                    } else {
                                        echo '<li><a href="orders.php?page=' . $i . '">' . $i . '</a></li>';
                                    }
                                }
                                if ($current_page < $total_page && $total_page > 1) {
                                    echo '<li><a href="orders.php?page=' . ($current_page + 1) . '">Next</a></li>';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>