<style>
    #buy-product {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgb(0, 0, 0, 0.5);
        display: none;
        transform: scale(0);
    }

    #buy-product form {
        width: 400px;
        height:180px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        border-radius: 10px;
        padding: 0 10px;
    }
</style>
<main>
    <div>
        <h3>Giỏ hàng</h3>
        <div class="table-responsive">
            <!-- <form action="" method="post"> -->
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-white">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Số tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($getCart as $key => $value) : ?>
                            <tr>
                                <form action="" method="post">
                                    <td class="d-flex">
                                        <img src="<?php echo $value->image ?>" width="70px" height="70px" alt="Lỗi tải ảnh">
                                        <div style="margin-left: 3px;">
                                            <a href="?action=productDetails&&idproduct=<?php echo $value->idproduct ?>" style="font-weight: 500;text-decoration: none;color:black;"><?php echo substr($value->nameproduct, 0, 45) . '...' ?></a> <br>
                                            <span style="font-size: 13px;">Màu : <?php echo $value->color ?></span> <br>
                                            <span style="font-size: 13px;">Dung lượng : <?php echo $value->capacity ?> Gb</span>
                                        </div>
                                    </td>
                                    <td><?php echo number_format($value->price) ?>đ</td>
                                    <td>
                                        <p><?php echo $value->quantity ?></p>
                                        <!-- <label id="reduce" style="padding: 0 3px;border: 1px solid black;margin-right: -5px;">-</label> -->
                                        <!-- <input class="quantity-input" style="width: 30px;text-align: center;border: 1px solid black;margin-right: -5px;" type="number" name="quantity" min="1" value="<?php echo $value->quantity ?>" step="1"> -->
                                        <!-- <label id="increase" style="padding: 0px 3px;border: 1px solid black;">+</label> -->
                                    </td>
                                    <td class="total-amount">
                                        <p style="color:red;"><?php echo number_format($value->totalamount) ?>đ</p>
                                    </td>
                                    <td>
                                        <a href="?action=myCart&&idDeleteCart=<?php echo $value->idcart ?>" style="text-decoration: none;color:black;" onclick="return confirm('Bạn chắc chắn xóa chứ ?')">Xóa</a>
                                        <a id="myCart" data-idCart="<?php echo $value->idcart; ?>" data-idproduct="<?php echo $value->idproduct ?>" href="" style="text-decoration: none;color:black;">Mua</a>
                                    </td>
                                    
                                </form>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- </form> -->
        </div>
    </div>
    <?php
    require './views/main_login_category.php';
    ?>
</main>
<div id="buy-product">
    <form action="" method="post" onsubmit="return validateAddress();">
        <h4 class="text-center my-2">Thông tin đơn hàng</h4>
        <i id="close-form" class="fa-solid fa-xmark" style="position: absolute; top:10px;right:10px;cursor: pointer;"></i>
        <input type="hidden" class="form-control" name="idCart" id="idCart">
        <div class="form-group">
            <label for=""><strong>Nhập địa chỉ</strong></label>
            <input type="text" placeholder="Nhập địa chỉ..." id="address" name="address" class="form-control my-2">
        </div>
        <div class="form-group">
            <input style="margin-left: 50%;transform: translateX(-50%);" type="submit" name="btn-buy-in-cart" class="btn btn-danger my-1" value="Đặt hàng">
        </div>
    </form>
</div>
<script>
    const address = document.getElementById('address') ;
    function validateAddress() {
        let check = true ;
        if(address.value.trim() == "") {
            alert("Vui lòng nhập địa chỉ") ;
            check = false ;
        }else {
            alert("Đặt hàng thành công") ;
            check = true ;
        }
        return check ;
    }

    const close_form = document.querySelector('#close-form');
    const btn_form = document.querySelectorAll('#myCart');
    const form_buy = document.getElementById('buy-product');

    btn_form.forEach(index => {
        index.addEventListener('click', (e) => {
            e.preventDefault();

            const idCart = index.getAttribute('data-idCart') ;
            document.getElementById('idCart').value = idCart ;
            const newUrl = '?action=myCart&&idProductCart=' + index.getAttribute('data-idproduct') + '&&idCart=' + index.getAttribute('data-idCart');
            window.history.pushState({
                path: newUrl
            }, '', newUrl);

            

            form_buy.style.display = "block";
            setTimeout(() => {
                form_buy.style.transform = "scale(1)";
                form_buy.style.transition = "0.2s";
            }, 200);

        });
    });

    close_form.addEventListener('click', () => {
        form_buy.style.transform = "scale(0)";
        form_buy.style.transition = "0.2s";
        setTimeout(() => {
            form_buy.style.display = "none";
        }, 200);
    })
</script>
