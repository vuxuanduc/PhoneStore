<main>
    <div>
        <h3>Lịch sử mua hàng</h3>
        <div class="table-responsive">
            <table class="table">
                <thead class="table-white">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Số tiền</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach (listShoppingIdUser($_SESSION['iduser']) as $key => $value) : ?>
                        <tr>
                            <form action="" method="post">
                                <td class="d-flex">
                                    <img src="<?php echo $value->image ?>" width="70px" height="70px" alt="Lỗi tải ảnh">
                                    <div style="margin-left: 3px;">
                                        <a href="?action=productDetails&&idproduct=<?php echo $value->idproduct ?>" style="font-weight: 500;text-decoration: none;color:black;"><?php echo substr($value->nameproduct, 0, 45) . '...' ?></a> <br>
                                        <span style="font-size: 13px;">Ngày mua : <?php echo $value -> purchasedate ?></span>
                                    </div>
                                </td>
                                <td><?php echo number_format($value->price) ?>đ</td>
                                <td>
                                    <p><?php echo $value->quantity ?></p>
                                </td>
                                <td class="total-amount">
                                    <p style="color:red;"><?php echo number_format($value->totalamount) ?>đ</p>
                                </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    require './views/main_login_category.php';
    ?>
</main>