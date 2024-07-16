<?php
if (isset($_GET['keyword'])) {
    $listSearch = search($_GET['keyword']);
}
?>
<main>
    <div>
        <?php if(!empty($listSearch)) {
        ?>
            <div class="row">
                <?php foreach ($listSearch as $products => $product) : ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12 my-2">
                        <div class="card">
                            <img src="<?php echo explode(',', $product->image)[0]; ?>" class="card-img-top" alt="Lỗi tải ảnh">
                            <div class="card-name">
                                <h5 class="card-title"><?php echo substr($product->nameproduct, 0, 40) ?></h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo substr($product->nameproduct, 0, 40);  ?></h5>
                                <p class="card-text" style="margin-top: -5px;"><?php echo substr($product->description, 0, 40) ?></p>
                                <p class="card-text" style="margin-top: -10px;">Số lượt xem : <?php echo $product->views ?></p>
                                <p class="card-price" style="margin-top: -10px;"><strong class="text-danger"><?php echo number_format($product->price) ?></strong><del style="font-size: 13px;margin-left: 5px;"><?php echo number_format($product->discount) ?></del></p>
                                <a href="?action=productDetails&&idproduct=<?php echo $product->idproduct ?>" class="btn btn-buy">Mua ngay</a>
                                <!-- <a href="" class="btn-cart"><i class="fa-solid fa-cart-shopping"></i></a> -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php
        } else {
            ?>
                <h3>Không tìm thấy sản phẩm nào</h3>
            <?php
        }
            ?>
            </div>
    </div>
    <?php
    require './views/main_login_category.php';
    ?>
</main>