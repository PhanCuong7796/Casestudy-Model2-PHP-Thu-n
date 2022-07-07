<?php
include 'layouts/header.php';
include 'layouts/sidebar.php';
include '../admin/layouts/db.php';
global $conn;
$sql = "SELECT * FROM `products`";
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$results = $stmt->fetchAll();
?>
<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">

        <?php foreach ($results as $result): ?>
        <div class="single-products-catagory clearfix">
            <a href="shop.php">
            <img src="../admin/public/images/<?php echo $result['image']; ?>">
                <div class="hover-content">
                    <div class="line"></div>
                    <p><?php echo $result['price']; ?></p> VNĐ</p>
                    <h4><?php echo $result['products_name']; ?></h4>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
<section class="newsletter-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="newsletter-text mb-100">
                    <h2> Đăng Ký Để Nhận Được <span> Giảm Giá 25% </span></h2>
                    <p> Hãy Mua Sản Phẩm Của Chúng Tôi. Để Trải Nghiệm Những Sản Phẩm Tốt Nhất </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="newsletter-form mb-100">
                    <form action="#" method="post">
                        <input type="email" name="email" class="nl-email" placeholder="E-mail Của Bạn">
                        <input type="submit" value="Theo Dõi">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include 'layouts/footer.php';
?>