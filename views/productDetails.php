<style>
    .buy-product {
        margin-top: 20px;
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 20px;
    }

    .box-image {
        position: relative;
        overflow: hidden;
    }

    .fa-chevron-left,
    .fa-chevron-right {
        position: absolute;
        top: 50%;
        transform: translateY(-100%);
        padding: 7px 10px;
        background-color: transparent;
        border: 1px solid black;
        border-radius: 50%;
        transition: .3s;
    }

    .fa-chevron-left {
        left: 37px;
    }

    .fa-chevron-right {
        right: 0px;
    }

    .fa-chevron-left:hover,
    .fa-chevron-right:hover {
        background-color: red;
        border: none;
        color: white;
    }

    .color {
        padding: 4px 10px;

        display: inline-block;
        border-radius: 5px;
    }

    .active:active {
        background-color: red;
        color: white;
    }

    @media (max-width : 991px) {
        .buy-product {
            grid-template-columns: 1fr;
            align-items: center;
        }

    }

    .form-control:focus {
        border-color: red;
        box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25);
    }

    .form-control.is-invalid {
        border-color: red;
    }

    .add-to-cart-details,
    .buy-to-product {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgb(0, 0, 0, 0.5);
        display: none;
        transform: scale(0);
        z-index: 99999;
    }

    .buy-to-product div {
        position: absolute;
        width: 400px;
        height: 150px;
        background-color: white;
        border-radius: 10px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 0 15px;
    }

    .add-to-cart-details div {
        width: 350px;
        height: 150px;
        background-color: #fff;
        border-radius: 10px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<main>
    <div>
        <form action="" method="post" class="buy-product">
            <div class="box-image">
                <div class="image_product_slider d-flex">
                    <?php foreach (explode(',', $productId->image) as $images => $image) : ?>
                        <div class="image_product"><img src="<?php echo $image ?>" alt="Lỗi tải ảnh"></div>
                    <?php endforeach; ?>
                </div>
                <i class="fa-solid fa-chevron-left prev"></i>
                <i class="fa-solid fa-chevron-right next"></i>
            </div>
            <div class="">
                <h3><?php echo $productId->nameproduct ?></h3>
                <p><span style="font-weight: bold;">Giá : </span><strong class="text-danger font-weight-bold" style="font-size: 25px;"><?php echo number_format($productId->price) ?><span style="margin-left: 5px;">đ</span></strong><del style="margin-left: 10px;"><?php echo number_format($productId->discount) ?><span style="margin-left: 5px;">đ</span></del></p>
                <p style="font-weight: bold;">Màu sắc </p>
                <div class="d-flex">

                    <div class="active color mb-2" style="border: 1px solid red;">
                        <input type="radio" name="color" value="Trắng" id="color-1" checked> <label for="color-1">Trắng</label>
                    </div>
                    <div class="active color mb-2 mx-2" style="border: 1px solid red;">
                        <input type="radio" name="color" value="Đen" id="color-2"> <label for="color-2">Đen</label>
                    </div>
                    <div class="active color mb-2" style="border: 1px solid red;">
                        <input type="radio" name="color" value="Vàng" id="color-3"> <label for="color-3">Gold</label>
                    </div>
                    <div class="active color mb-2 mx-2" style="border: 1px solid red;">
                        <input type="radio" name="color" value="Tím" id="color-4"> <label for="color-4">Tím</label>
                    </div>
                    <div class="active color mb-2" style="border: 1px solid red;">
                        <input type="radio" name="color" value="Xanh" id="color-5"> <label for="color-5">Xanh</label>
                    </div>
                </div>
                <p style="font-weight: bold;">Dung lượng</p>
                <div class="d-flex">

                    <div class="active color mb-2" style="border: 1px solid red;">
                        <input type="radio" name="capacity" value="64" id="capacity-1" checked> <label for="capacity-1">64Gb</label>
                    </div>
                    <div class="active color mb-2 mx-2" style="border: 1px solid red;">
                        <input type="radio" name="capacity" value="128" id="capacity-2"> <label for="capacity-2">128Gb</label>
                    </div>
                    <div class="active color mb-2" style="border: 1px solid red;">
                        <input type="radio" name="capacity" value="256" id="capacity-3"> <label for="capacity-3">256Gb</label>
                    </div>
                    <div class="active color mb-2 mx-2" style="border: 1px solid red;">
                        <input type="radio" name="capacity" value="512" id="capacity-4"> <label for="capacity-4">512Gb</label>
                    </div>
                    <div class="active color mb-2" style="border: 1px solid red;">
                        <input type="radio" name="capacity" value="1024" id="capacity-5"> <label for="capacity-5">1Tb</label>
                    </div>
                </div>
                <p style="font-weight: bold;">Số lượng</p>
                <div class="d-flex">
                    <label id="reduce" style="padding: 1px 5px;border: 1px solid red;">-</label>
                    <input style="width:40px;text-align: center;border: 1px solid red;" type="number" name="quantity" id="quantity" min="1" value="1" step="1" readonly>
                    <label id="increase" style="padding: 1px 5px;border: 1px solid red;">+</label>
                </div>
                <div class="form-group">
                    <input type="hidden" name="name" value="<?php echo $productId->nameproduct ?>">
                    <input type="hidden" name="price" value="<?php echo $productId->price ?>">
                    <input type="hidden" name="image" value="<?php echo explode(',', $productId->image)[0] ?>">
                    <input type="hidden" name="idproduct" value="<?php echo $_GET['idproduct'] ?>">

                    <!-- Thông tin mua hàng -->
                    <?php
                    if (isset($_SESSION['login'])) {
                    ?>
                        <input type="hidden" name="fullname" value="<?php echo getIdUser($_SESSION['iduser'])->fullname ?>">
                        <input type="hidden" name="phone" value="<?php echo getIdUser($_SESSION['iduser'])->phone ?>">
                    <?php
                    }
                    ?>
                </div>
                <div class="d-flex my-3">
                    <a class="btn btn-danger open-form-buy">Mua ngay</a>
                    <a class="open-add-to-cart btn btn-danger mx-2">Thêm vào giỏ hàng</a>
                </div>
            </div>
            <?php
            if (isset($_SESSION['login'])) {
            ?>
                <div class="add-to-cart-details">
                    <div>
                        <p style="font-weight: bold;margin-top: 10px;text-align: center;">Thêm vào giỏ hàng thành công</p>
                        <i style="border-radius: 50%; color:#fff;margin-left: 50% ; transform: translateX(-50%);  padding: 7px 9px;background-color:rgba(72, 187, 120, 1) ;" class="fa-solid fa-check"></i> <br>
                        <button class="btn btn-add-to-cart btn-danger" style="margin-left: 50%;transform: translateX(-50%);margin-top: 15px;" type="submit" name="add-to-cart">Ok</button>

                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="add-to-cart-details">
                    <div>
                        <p style="font-weight: bold;margin-top: 10px;text-align: center;font-size: 20px;">Vui lòng đăng nhập</p>
                        <i class="bg-danger fa-solid fa-exclamation" style="position: absolute;top:50%;left:50%;transform: translate(-50%,-100%);padding:5px 13px;color:#fff;border-radius: 50%;"></i>
                        <a href="?action=home" class="btn btn-add-to-cart btn-danger" style="position: absolute; bottom: 20px;left:50%;transform: translateX(-50%);">Đăng nhập</a>
                        <i class="fa-solid fa-x close-modal-cart" style="position: absolute; top:10px;right:10px;cursor: pointer;"></i>
                    </div>
                </div>
            <?php
            }
            ?>
            <?php
            if (isset($_SESSION['login'])) {
            ?>
                <div class="buy-to-product">
                    <div>
                        <form action="" method="post" id="form-address" onsubmit="return validateAddress();">
                            <h4 style="position: absolute;z-index: 10000000;left:50% ;transform: translateX(-50%);font-size: 20px;top:5px">Vui lòng thêm địa chỉ</h4>
                            <div class="">
                                <input type="text" id="address" name="address" class="form-control" style="margin-top: 40px;" placeholder="Nhập địa chỉ...">
                                <input type="submit" name="btn-buy-product" value="Đặt hàng" class="btn btn-danger" style="position: absolute; bottom: 20px;left:50%;transform: translateX(-50%);">
                            </div>
                            <i class="fa-solid fa-xmark close-form-buy" style="position: absolute; top:10px;right:10px;cursor: pointer;"></i>
                        </form>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="buy-to-product">
                    <div>
                        <h4 style="position: absolute;z-index: 10000000;left:50% ;transform: translateX(-50%);font-size: 20px;top:5px">Vui lòng đăng nhập</h4>
                        <i class="bg-danger fa-solid fa-exclamation" style="position: absolute;top:50%;left:50%;transform: translate(-50%,-100%);padding:5px 13px;color:#fff;border-radius: 50%;"></i>
                        <a class="btn btn-danger" href="?action=home" style="position: absolute; bottom: 20px;left:50%;transform: translateX(-50%);">Đăng nhập</a>
                        <i class="fa-solid fa-xmark close-form-buy" style="position: absolute; top:10px;right:10px;cursor: pointer;"></i>
                    </div>
                </div>
            <?php
            }
            ?>
        </form>
        <div>
            <h5 class="my-2" style="font-weight: bold;">Mô tả chi tiết</h5>
            <p style="text-align: justify;"><?php echo $productId->description ?></p>
        </div>
        <div>
            <h4 class="my-2" style="font-weight: bold;">Đánh giá của khách hàng</h4>
            <ul class="list-comment" style="list-style: none;padding: 0;margin-top: 15px;">
                <?php foreach ($comment as $key => $value) : ?>
                    <li class="d-flex">
                        <img style="border-radius: 50%;vertical-align: middle;" src="<?php echo $value->image ?>" width="40px" height="40px" alt="lỗi tải ảnh">
                        <p class="mx-2" style="font-weight: bold;"><?php echo $value->fullname ?>
                            <span class="mx-1" style="font-size: 10px;padding: 2px 4px;background-color: red;border-radius: 50%;background-color: rgba(72, 187, 120, 1);color:white;"><i class="fa-solid fa-check"></i></span><span style="font-weight: 500;font-size: 13px;color:rgba(72, 187, 120, 1);">Đã mua tại X_Shop</span><br>
                            <span style="font-weight: 400;"><?php echo $value->content ?></span><br>
                            <span style="font-weight: 400;">Ngày <?php echo $value->commentdate ?></span>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
            if (isset($_SESSION['login'])) {
                $list = listShoppingId($_SESSION['iduser'], $_GET['idproduct']);
                foreach ($list as $shoppings => $shopping) {
                    if (($shopping->iduser) == $_SESSION['iduser'] && $shopping->idproduct == $_GET['idproduct']) {
            ?>
                        <form action="" method="post" onsubmit="return validateEvaluate();" id="submitComment">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="idproduct" value="<?php echo $_GET['idproduct']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="iduser" value="<?php echo $_SESSION['iduser']; ?>">
                            </div>
                            <div class="form-group">
                                <label for=""></label><span id="evaluate_err" style="color:red;"></span>
                                <input type="text" id="evaluate" placeholder="Viết đánh giá" class="form-control my-2" name="content">
                            </div>
                            <div class="form-group">
                                <input type="submit" id="btnSubmitComment" class="btn btn-danger" value="Gửi đánh giá" name="btnComment">
                            </div>
                        </form>
            <?php
                    }
                    break;
                }
            }
            ?>
        </div>
        <div>
        <h4 class="my-2" style="font-weight: bold;">Sản phẩm tương tự</h4>
            <div class="row">
                <?php foreach (similarProduct($_GET['idproduct'], $productId->idsectors) as $products => $product) : ?>

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
            </div>
        </div>
    </div>
    <?php
    require './views/main_login_category.php';
    ?>
</main>
<script>
    const slider = document.querySelector('.image_product_slider');
    const images = document.querySelectorAll('.image_product');
    const width = images[0].offsetWidth;
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    let index = 0;
    prev.style.display = "none";
    next.addEventListener('click', () => {
        index++;
        if (index >= images.length - 1) {
            next.style.display = "none";
            prev.style.display = "block";
        } else {
            prev.style.display = "block";
        }
        slider.style.transform = "translateX(-" + index * width + "px)";
        slider.style.transition = "transform 0.3s";
    });

    prev.addEventListener('click', () => {
        index--;
        if (index <= 0) {
            prev.style.display = "none";
            next.style.display = "block";
        } else {
            next.style.display = "block";
        }
        slider.style.transform = "translateX(-" + index * width + "px)";
        slider.style.transition = "transform 0.3s";
    });

    const evaluate = document.getElementById('evaluate');
    const evaluate_err = document.getElementById('evaluate_err');

    function validateEvaluate() {
        let check = true;
        if (evaluate.value.trim() == "") {
            evaluate_err.innerText = "Vui lòng nhập đánh giá";
            check = false;
        } else {
            evaluate_err.innerText = "";
        }
        return check;
    }

    // Tăng giảm số lượng ;
    const reduce = document.getElementById('reduce');
    const increase = document.getElementById('increase');
    const quantity = document.getElementById('quantity');

    increase.addEventListener('click', () => {
        quantity.value = parseInt(quantity.value) + 1;
    });

    reduce.addEventListener('click', () => {
        if (quantity.value > 1) {
            quantity.value = parseInt(quantity.value) - 1;
        }
    });

    document.querySelector('.btn-add-to-cart').addEventListener('click', () => {
        document.querySelector('.buy-product').submit();
    })

    const add_to_cart_details = document.querySelector('.add-to-cart-details');
    const open_add_to_cart = document.querySelector('.open-add-to-cart');
    const close_add_to_cart = document.querySelector('.close-modal-cart');

    open_add_to_cart.addEventListener('click', () => {
        add_to_cart_details.style.display = "block";
        setTimeout(() => {
            add_to_cart_details.style.transform = "scale(1)";
            add_to_cart_details.style.transition = "0.2s";
        }, 200);
    })
    <?php
    if (!isset($_SESSION['login'])) {
    ?>
        close_add_to_cart.addEventListener('click', () => {
            add_to_cart_details.style.transform = "scale(0)";
            add_to_cart_details.style.transition = "0.2s";
            setTimeout(() => {
                add_to_cart_details.style.display = "none";
            }, 200);
        })
    <?php
    }
    ?>

    const form_buy = document.querySelector('.buy-to-product');
    const open_form_buy = document.querySelector('.open-form-buy');
    const close_form_buy = document.querySelector('.close-form-buy');
    open_form_buy.addEventListener('click', () => {
        form_buy.style.display = "block";
        setTimeout(() => {
            form_buy.style.transform = "scale(1)";
            form_buy.style.transition = "0.2s";
        }, 200);
    });
    close_form_buy.addEventListener('click', () => {
        form_buy.style.transform = "scale(0)";
        form_buy.style.transition = "0.2s";
        setTimeout(() => {
            form_buy.style.display = "none";
        }, 200);
    })
</script>