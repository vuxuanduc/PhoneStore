    <main>
        <div>
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./images/banner1.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./images/banner2.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./images/banner3.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./images/banner4.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./images/banner5.webp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev btn-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next btn-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <div class="my-2">
                <?php foreach ($category as $key => $value) : ?>
                    <h3 class="border-bottom pb-2 d-inline-block"><?php echo $value->sectors ?></h3>
                    <div>
                        <div class="row">
                            <?php foreach (getProductsSector($value->idsectors) as $products => $product) : ?>

                                <div class="col-lg-3 col-md-3 col-md-4 col-sm-6 col-12 my-2">
                                    <div class="card">
                                        <img src="<?php echo explode(',', $product->image)[0]; ?>" class="card-img-top" alt="Lỗi tải ảnh">
                                        <div class="card-name">
                                        <h5 class="card-title"><?php echo substr($product -> nameproduct, 0, 40) ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo substr($product -> nameproduct, 0, 40) ?></h5>
                                            <p class="card-text" style="margin-top: -5px;"><?php echo substr($product -> description, 0, 40) ?></p>
                                            <p class="card-text" style="margin-top: -10px;">Số lượt xem : <?php echo $product -> views ?></p>
                                            <p class="card-price" style="margin-top: -10px;"><strong class="text-danger"><?php echo number_format($product->price) ?></strong><del style="font-size: 13px;margin-left: 5px;"><?php echo number_format($product->discount) ?></del></p>
                                            <!-- <div class="btn-option"> -->
                                            <a href="?action=productDetails&&idproduct=<?php echo $product->idproduct ?>" class="btn btn-buy">Mua ngay</a>
                                            <!-- <a href="" class="btn-cart"><i class="fa-solid fa-cart-shopping"></i></a> -->
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        require './views/main_login_category.php';
        ?>
    </main>