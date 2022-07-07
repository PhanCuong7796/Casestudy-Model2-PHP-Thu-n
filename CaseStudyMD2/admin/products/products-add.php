<?php
include '../layouts/db.php';

$sql = "SELECT * FROM `categories`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$categories = $stmt->fetchAll();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $products_name = $_REQUEST['products_name'];
    $amount = $_REQUEST['amount'];
    $price = $_REQUEST['price'];
    $image = '';
    $category_id = $_REQUEST['category_id'];
    $description = $_REQUEST['description'];


    if ($products_name == '') {
        $errors['products_name'] = 'Bạn Chưa Nhập Tên Sản Phẩm';
    }

    if ($amount == '') {
        $errors['amount'] = 'Bạn Chưa Nhập Số Lượng Sản Phẩm';
    }

    if ($price == '') {
        $errors['price'] = 'Bạn Chưa Nhập Giá Sản Phẩm';
    }

    if ($category_id == '') {
        $errors['category_id'] = 'Bạn Chưa Nhập Danh Mục Sản Phẩm';
    }

    if (isset($_FILES['upload_file'])) {
        $image = $_FILES['upload_file']['name'];
        move_uploaded_file($_FILES["upload_file"]["tmp_name"], '../public/images/' . $_FILES['upload_file']['name']);
    }

    if (count($errors) == 0) {
        $sql = "INSERT INTO products VALUES(null,'$products_name','$amount','$price',$category_id,'$image','$description')";
        $conn->exec($sql);
        header('location:products-list.php');
    }
}

include '../layouts/header.php';
include '../layouts/sidebar.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sản Phẩm</h1>
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <?php
                        if (count($errors) > 0) {
                            foreach ($errors as $error) {
                                echo '<li>' . $error . '</li>';
                            }
                        }
                        ?>
                    </ul>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Tên Sản Phẩm</label>
                            <input name="products_name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nhập Tên Sản Phẩm">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Số Lượng Sản Phẩm</label>
                            <input name="amount" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nhập Số Lượng Sản Phẩm">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Giá Sản Phẩm</label>
                            <input name="price" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nhập Giá Sản Phẩm">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Tải Hình Ảnh</label>
                            <input type="file" name="upload_file">
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
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" name="save" value="Lưu">
                            <a type="button" href="products-list.php" class="btn btn-primary">Quay Lại</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
</div>