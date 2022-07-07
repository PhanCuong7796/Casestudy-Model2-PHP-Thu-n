<?php
include '../layouts/db.php';

$id = $_REQUEST['id'];
$sql = "SELECT * FROM `products` WHERE id = '$id'";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$row = $stmt->fetch();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_REQUEST['product_name'];
    $price = $_REQUEST['price'];
    $amount = $_REQUEST['amount'];
    $category_id = $_REQUEST['category_id'];
    $image = '';
    // print_r($image);die;
    $description = $_REQUEST['description'];

    if ($product_name == '') {
        $errors['product_name'] = 'Bạn Chưa Nhập Tên Sản Phẩm';
    }
    if ($price == '') {
        $errors['price'] = 'Bạn Chưa Nhập Giá Sản Phẩm';
    }
    if ($amount == '') {
        $errors['amount'] = 'Bạn Chưa Nhập Số Lượng Sản Phẩm';
    }

    if (isset($_FILES['upload_file'])) {
        $image = $_FILES['upload_file']['name'];
        move_uploaded_file($_FILES["upload_file"]["tmp_name"], '../public/images/' . $_FILES['upload_file']['name']);
    }
    // echo '<pre>';
    // print_r($_REQUEST);die;
    if (count($errors) == 0) {
        $sql = "UPDATE products SET products_name = '$product_name', amount = '$amount', price = '$price',image = '$image', description = '$description' WHERE id = '$id'";
        // echo $sql;die;
        $conn->query($sql);
        header('location:products-list.php');
    }
}
$sql = "SELECT * FROM `categories`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$categories = $stmt->fetchAll();
include '../layouts/header.php';
include '../layouts/sidebar.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sửa Thông Tin Sản Phẩm</h1>
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Tên Sản Phẩm</label>
                            <input type="text" name="product_name" class="form-control" value='<?= $row->products_name ?>'>
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá Sản Phẩm</label>
                            <input type="price" class="form-control" name="price" value='<?= $row->price ?>'>
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số Lượng Sản Phẩm</label>
                            <input type="amount" class="form-control" name="amount" value='<?= $row->amount ?>'>
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Tải Hình Ảnh</label>
                            <input type="file" name="upload_file">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô Sản Phẩm</label>
                            <input type="text" class="form-control" name="description" value='<?= $row->description ?>'>
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Danh Mục Sản Phẩm</label>
                            <select name="category_id" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nhập Danh Mục">
                                <option value="#">Chọn Danh Mục</option>
                                <?php foreach ($categories as $key => $category) : ?>
                                    <option value="<?php echo $category->id; ?>">
                                        <?php echo $category->name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a type="button" href="products-list.php" class="btn btn-primary">Quay Lại</a>
                    </form>
                </div>
            </div>
        </div>
</div>

</body>