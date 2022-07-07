<?php

include '../layouts/header.php';
include '../layouts/sidebar.php';
include_once '../layouts/db.php';

$sql = "SELECT products.*, categories.name AS category_name FROM `products` 
JOIN categories ON products.category_id = categories.id ";

$sql = "SELECT COUNT(id) AS total_records FROM `products`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$pagination = $stmt->fetch();
// echo '<pre>';
// print_r($pagination);die;

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
$sql = "SELECT products.*, categories.name AS category_name FROM `products` 
JOIN categories ON products.category_id = categories.id order by products.id desc LIMIT $start, $limit";
// echo '<pre>';
// print_r($sql);
//die;
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$rows = $stmt->fetchAll();


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="container-fluid px-4">
                <h1 class="mt-4">Sản Phẩm Hiện Tại</h1>
                <div class="row">
                    <div class="card-body">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                            <div class="dataTable-top">
                                <!-- <div class="dataTable-search"><input class="dataTable-input" placeholder="Tìm Kiếm" type="text"></div> -->
                            </div>
                            <div class="dataTable-container">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th data-sortable="" style="width: 1.241%;">STT</th>
                                            <th data-sortable="" style="width: 5.1262%;">Tên Sản Phẩm</a></th>
                                            <th data-sortable="" style="width: 3.3450%;">Mã Sản Phẩm</a></th>
                                            <th data-sortable="" style="width: 5.32613%;">Số Lượng Sản Phẩm</a></th>
                                            <th data-sortable="" style="width: 5.0044%;">Giá Sản Phẩm</a></th>
                                            <th data-sortable="" style="width: 4.00%;">Tên Danh Mục</a></th>
                                            <th data-sortable="" style="width: 1.1153%;">Hình Sản Phẩm</a></th>
                                            <th data-sortable="" style="width: 5.9153%;">Mô Sản Phẩm</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rows as $key => $row) : ?>
                                            <tr>
                                                <td><?php echo $row->id; ?></td>
                                                <td><?php echo $row->products_name; ?></td>
                                                <td><?php echo $row->id; ?></td>
                                                <td><?php echo $row->amount; ?></td>
                                                <td><?php echo $row->price; ?></td>
                                                <td><?php echo $row->category_name; ?></td>
                                                <td> <img src="../public/images/<?php echo $row->image; ?>" width="150px" height="150px"></td>
                                                <td><?php echo $row->description; ?></td>
                                           
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="dataTable-bottom">
                                <nav class="dataTable-pagination">
                                    <ul class="dataTable-pagination-list">
                                        <?php
                                        if ($current_page > 1 && $total_page > 1) {
                                            echo '<li><a href="main.php?page=' . ($current_page - 1) . '">Prev</a></li>';
                                        }
                                        for ($i = 1; $i <= $total_page; $i++) {
                                            if ($i == $current_page) {
                                                echo '<a>' . $i . '</a>';
                                            } else {
                                                echo '<li><a href="main.php?page=' . $i . '">' . $i . '</a></li>';
                                            }
                                        }
                                        if ($current_page < $total_page && $total_page > 1) {
                                            echo '<li><a href="main.php?page=' . ($current_page + 1) . '">Next</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</div>