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
                    <li><a href="index.php">Trang Ch???</a></li>
                    <li><a href="shop.php">C???a H??ng</a></li>
                    <li><a href="cart.php">Gi??? H??ng</a></li>
                    <li class="active"><a href="checkout.php">Ki???m Tra Thanh To??n</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Gi???m Gi??%</a>
                <a href="#" class="btn amado-btn active">M???i Tu???n N??y</a>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="public/img/core-img/cart.png" alt=""> Gi??? H??ng <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="public/img/core-img/favorites.png" alt=""> Y??u Th??ch </a>
                <a href="#" class="search-nav"><img src="public/img/core-img/search.png" alt=""> T??m Ki???m </a>
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
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Ki???m Tra Thanh To??n</h2>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="first_name" value="" placeholder="H???" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="last_name" value="" placeholder="T??n" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="email" placeholder="Email" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" id="country">
                                            <option value="vn">Vi???t Nam</option>
                                            <option value="uk">V????ng Qu???c Anh</option>
                                            <option value="ger">?????c</option>
                                            <option value="fra">Ph??p</option>
                                            <option value="ind">???n ?????</option>
                                            <option value="aus">??c</option>
                                            <option value="bra">Brazil</option>
                                            <option value="cana">Canada</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="street_address" placeholder="?????a Ch???" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="city" placeholder="T???nh/Th??nh Ph???" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="zipCode" placeholder="M?? B??u Ch??nh" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="phone_number" min="0" placeholder="S??? ??i???n Tho???i" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="????? L???i L??u ?? V??? ????n ?????t H??ng C???a B???n"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">T???o T??i Kho???n</label>
                                        </div>
                                        <div class="custom-control custom-checkbox d-block">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">G???i ?????n M???t ?????a Ch??? Kh??c</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Gi??? H??ng</h5>
                            <ul class="summary-table">
                            <?php
                                    $total = 0;
                                    foreach ($products as $product) :
                                        $total += $product->price * $_SESSION['cart'][$product->id]['quantity'];
                                        ?>
                                   <?php endforeach; ?>
                                <li><span>T???ng S??? Ti???n:</span> <span><?php echo number_format($total); ?></span></li>
                                <li><span>V???n Chuy???n:</span> <span>Mi???n Ph??</span></li>
                                <li><span>T???ng:</span> <span><?php echo number_format($total); ?></span></li>
                            </ul>
                            <div class="payment-method">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="cod" checked>
                                    <label class="custom-control-label" for="cod">Thanh To??n Khi Giao H??ng</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="paypal">
                                    <label class="custom-control-label" for="paypal">Th??? T??n D???ng & Ghi N??? <img class="ml-15" src="public/img/core-img/paypal.png" alt=""></label>
                                </div>
                            </div>
                            <div class="cart-btn mt-100">
                                <button class="btn amado-btn w-100">Thanh To??n</button>
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
                        <h2> ????ng K?? ????? Nh???n ???????c <span> Gi???m Gi?? 25% </span></h2>
                        <p> H??y Mua S???n Ph???m C???a Ch??ng T??i. ????? Tr???i Nghi???m Nh???ng S???n Ph???m T???t Nh???t </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="E-mail C???a B???n">
                            <input type="submit" value="????ng K??">
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
                            B???n Quy???n &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> ???? ????ng K?? B???n Quy???n | T??c Gi??? <i class="fa fa-heart-o" aria-hidden="true"></i> Bear N???
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
                                            <a class="nav-link" href="index.php">Trang Ch???</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="shop.php">C???a H??ng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="detail.php">S???n Ph???m</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="cart.php">Gi??? H??ng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="checkout.php">Ki???m Tra Thanh To??n</a>
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
