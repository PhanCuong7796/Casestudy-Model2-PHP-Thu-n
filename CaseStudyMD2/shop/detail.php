<?php
include '../admin/layouts/db.php';
global $conn;
$id = $_REQUEST['id'];
$sql = "SELECT * FROM `products` WHERE id = '$id'";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$row = $stmt->fetch();
// echo '<pre>';
// print_r($row);die;


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
                        <form action="#" method="get">
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
                    <li><a href="cart.php">Giỏ Hàng</a></li>
                    <li><a href="checkout.php">Kiểm Tra Thanh Toán</a></li>
                </ul>
            </nav>
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Giảm Giá%</a>
                <a href="#" class="btn amado-btn active">Mới Tuần Này</a>
            </div>
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="public/img/core-img/cart.png" alt=""> Giỏ Hàng <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="public/img/core-img/favorites.png" alt=""> Yêu Thích </a>
                <a href="#" class="search-nav"><img src="public/img/core-img/search.png" alt=""> Tìm Kiếm </a>
            </div>
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                                <li class="breadcrumb-item"><a href="#">Bàn Gỗ</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <!-- <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(public/img/product-img/pro-big-14.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(public/img/product-img/pro-big-15.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(public/img/product-img/pro-big-16.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(public/img/product-img/pro-big-17.jpg);">
                                    </li>

                                </ol> -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="../admin/public/images/<?php echo $row->image; ?>">
                                            <img class="d-block w-100" src="../admin/public/images/<?php echo $row->image; ?>" alt="First slide">
                                        </a>
                                    </div>
                                  

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <div class="product-meta-data">
                                
                                <div class="line"></div>
                                <p class="product-price"><?php echo number_format($row->price) ; ?> VNĐ</p>
                                <a href="detail.php">
                                    <h6><?php echo $row->products_name; ?></h6>
                                </a>
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <p class="avaibility"><i class="fa fa-circle"></i> Còn Hàng</p>
                            </div>

                            <div class="short_overview my-5">
                                <p><?php echo $row->description; ?></p>
                            </div>
                            <form action="add-to-cart.php" class="cart clearfix" method="get">
                                <input type="hidden" name="id" value="<?php echo $row->id?>">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Số Lượng</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <button type="submit" name="addtocart" value="5" class="btn amado-btn">Thêm Vào Giỏ Hàng</button>
                            </form>

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
                <!-- Newsletter Form -->
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
                            Bản Quyền &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> </script> Đã Đăng Ký Bản Quyền | Tác Giả <i class="fa fa-heart-o" aria-hidden="true"></i> Bear Nè?
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
                                            <a class="nav-link" href="checkout.php">Kiểm Tra Tha</a>
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