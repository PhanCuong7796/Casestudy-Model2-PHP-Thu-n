<?php
session_start();
// session_destroy();die;

include '../admin/layouts/db.php';

global $conn;
$ids = array();
foreach ($_SESSION['cart'] as $product_id => $cart) {
    if ($product_id !== '') {
        $ids[] = $product_id;
    }
}

$ids = implode(",", $ids);
$sql = "SELECT * FROM products WHERE id IN ($ids)";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$products = $stmt->fetchAll();
// echo '<pre>';
// print_r($_SESSION['cart']);die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BEAR - Shopping</title>
    <link rel="icon" href="public/img/core-img/favicon.ico">
    <link rel="stylesheet" href="public/css/core-style.css">
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="public/img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content-wrapper d-flex clearfix">
        <div class="mobile-nav">
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="public/img/core-img/logo.png" alt=""></a>
            </div>
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>
        <header class="header-area clearfix">
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <div class="logo">
                <a href="index.php"><img src="public/img/core-img/logo.png" alt=""></a>
            </div>
            <nav class="amado-nav">
                <ul>
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li><a href="shop.php">Cửa Hàng</a></li>
                    <li class="active"><a href="cart.php">Giỏ Hàng</a></li>
                    <li><a href="checkout.php">Kiểm Tra Thanh Toán</a></li>
                </ul>
            </nav>
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Giảm Giá%</a>
                <a href="#" class="btn amado-btn active">Mới Tuần Này</a>
            </div>
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="public/img/core-img/cart.png" alt=""> Giỏ Hàng <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="public/img/core-img/favorites.png" alt=""> Yêu Thích</a>
                <a href="#" class="search-nav"><img src="public/img/core-img/search.png" alt=""> Tìm Kiếm</a>
            </div>
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Giỏ Hàng</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Giá Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $total = 0;
                                    foreach ($products as $product) :
                                        $total += $product->price * $_SESSION['cart'][$product->id]['quantity'];
                                    ?>
                                        <tr>
                                            <td class="cart_product_img">
                                                <a href="#"><img src="public/img/bg-img/cart4.jpg" alt="Product"></a>
                                            </td>
                                            <td class="cart_product_desc">
                                                <h5><?= $product->products_name; ?></h5>
                                            </td>
                                            <td class="price">
                                                <span><?= number_format($product->price * $_SESSION['cart'][$product->id]['quantity']); ?>VND</span>
                                            </td>
                                            <td class="qty">
                                                <div class="qty-btn d-flex">
                                                    <div class="quantity">
                                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty<?= $product->id; ?>'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        <input type="number" class="qty-text" id="qty<?= $product->id; ?>" step="1" min="1" max="300" name="quantity" value="<?php echo $_SESSION['cart'][$product->id]['quantity']; ?>">

                                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty<?= $product->id; ?>'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Tổng Đơn Hàng</h5>
                            <ul class="summary-table">
                                <li><span>Tổng Tiền</span><span><?php echo number_format($total); ?></span></li>
                                <li><span>Phí Vận Chuyển:</span><span>Miễn Phí</span></li>
                                <li><span>Tổng Thanh Toán:</span><span><?php echo number_format($total); ?></span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="checkout.php" class="btn amado-btn w-100">Kiểm Tra Thanh Toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Đăng Ký Để Nhận Được <span>Giảm Giá 25%</span></h2>
                        <p>Hãy Mua Sản Phẩm Của Chúng Tôi. Để Trải Nghiệm Những Sản Phẩm Tốt Nhất</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="E-mail Của Bạn">
                            <input type="submit" value="Đăng Ký">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <div class="footer-logo mr-50">
                            <a href="index.php"><img src="public/img/core-img/logo2.png" alt=""></a>
                        </div>
                        <p class="copywrite">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Đã Đăng Ký Bản Quyền | Tác Giả <i class="fa fa-heart-o" aria-hidden="true"></i> Bear Nè?
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.php">Trang Chủ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="shop.php">Cửa Hàng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="detail.php">Sản Phẩm</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="cart.php">Giỏ Hàng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="checkout.php">Kiểm Tra Thanh Toán</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="public/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/plugins.js"></script>
    <script src="public/js/active.js"></script>
</body>

</html>