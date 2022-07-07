<?php
include '../admin/layouts/db.php';
global $conn;

$sql = "SELECT * FROM `categories`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$categories = $stmt->fetchAll();

$sql = "SELECT * FROM `products`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$products = $stmt->fetchAll();
// echo '<pre>';
// print_r($products);die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BEAR - Shopping</title>

    <link rel="icon" href="img/core-img/favicon.ico">

    <link rel="stylesheet" href="../shop/public/css/core-style.css">
    <link rel="stylesheet" href="../shop/public/style.css">

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
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="../shop/public/img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content-wrapper d-flex clearfix">
        <div class="mobile-nav">
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="../shop/public/img/core-img/logo.png" alt=""></a>
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
                <a href="index.php"><img src="../shop/public/img/core-img/logo.png" alt=""></a>
            </div>
            <nav class="amado-nav">
                <ul>
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li class="active"><a href="shop.php">Cửa Hàng</a></li>
                    <li><a href="cart.php">Giỏ Hàng</a></li>
                    <li><a href="checkout.php">Kiểm Tra Thanh Toán</a></li>
                </ul>
            </nav>
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Giảm Giá%</a>
                <a href="#" class="btn amado-btn active">Mới Tuần Này</a>
            </div>
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="../shop/public/img/core-img/cart.png" alt=""> Giỏ Hàng <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="../shop/public/img/core-img/favorites.png" alt=""> Yêu Thích </a>
                <a href="#" class="search-nav"><img src="../shop/public/img/core-img/search.png" alt=""> Tìm Kiếm </a>
            </div>
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <div class="shop_sidebar_area">

            <div class="widget catagory mb-50">
                <h6 class="widget-title mb-30">Thể Loại</h6>
                <div class="catagories-menu">
                    <ul>
                        <?php foreach ($categories as $categorie) : ?>
                            <li class="active"><a href="#"><?php echo  $categorie->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="widget brands mb-50">
                <h6 class="widget-title mb-30">Nhãn Hiệu</h6>
                <div class="widget-desc">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="amado">
                        <label class="form-check-label" for="amado">BEAR</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <div class="total-products">
                                <p>Hiển Thị 1-8 Của 25</p>
                                <div class="view d-flex">
                                    <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-sorting d-flex">
                                <div class="sort-by-date d-flex align-items-center mr-15">
                                    <p>Sắp Xếp Theo</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortBydate">
                                            <option value="value">Ngày</option>
                                            <option value="value">Mới Nhất</option>
                                            <option value="value">Nổi Tiếng</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="view-product d-flex align-items-center">
                                    <p>Lượt Xem</p>
                                    <form action="#" method="get">
                                        <select name="select" id="viewProduct">
                                            <option value="value">12</option>
                                            <option value="value">24</option>
                                            <option value="value">48</option>
                                            <option value="value">96</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($products as $product) : ?>

                        <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                            <div class="single-product-wrapper">
                                <div class="product-img">
                                    <a href="detail.php?id=<?php echo $product->id; ?>">
                                    <!-- <img src="../shop/public/img/product-img/product19.jpg" alt=""> -->
                                    <img src="../shop/public/img/product-img/<?php echo $product->image; ?>" alt="">
                                    </a>
                                </div>
                                <div class="product-description d-flex align-items-center justify-content-between">
                                    <div class="product-meta-data">
                                        <div class="line"></div>
                                        <p class="product-price"><?php echo number_format($product->price); ?>VNĐ</p>
                                        <a href="detail.php?id=<?php echo $product->id; ?>">
                                            <h6><?php echo $product->products_name; ?></h6>
                                        </a>
                                    </div>
                                    <div class="ratings-cart text-right">
                                        <div class="ratings">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <div class="cart">
                                            <a href="detail.php?id=<?php echo $product->id; ?>" data-toggle="tooltip" data-placement="left" title="Thêm Vào Giỏ Hàng"><img src="../shop/public/img/core-img/cart.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>



                </div>

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#">04</a></li>
                            </ul>
                        </nav>
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
                        <h2>Đăng Ký Để Được <span>Giảm Giá 25%</span></h2>
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
                            <a href="index.php"><img src="img/core-img/logo2.png" alt=""></a>
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
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>

</body>

</html>