

<main>
    <div>
        <h4 style="padding-bottom: 10px; border-bottom: 2px solid red;">Liên hệ với chúng tôi</h4> 
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3779.859313558294!2d105.68817072418977!3d18.670308132452597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cdd7a58af3ff%3A0x67a02a2b1f9d6c9b!2zUXXhuqNuZyB0csaw4budbmcgSOG7kyBDaMOtIE1pbmgsIFRyxrDhu51uZyBUaGksIFRwLiBWaW5oLCBOZ2jhu4cgQW4sIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1697360653363!5m2!1svi!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="my-3 contact" style="display: grid;grid-template-columns: 1fr 2fr;">
            <ul style="list-style: none;padding: 0;">
                <li class="d-flex">
                    <i style="border-radius: 50% ;text-align: center; line-height: 40px;font-size: 25px;width:40px ;height:40px ;color:red;border: 1px solid red;" class="fa-solid fa-location-dot"></i>
                    <p style="margin-left: 5px;"><strong>Địa chỉ: </strong> <br> <span style="font-size: 14px;">S1 Nguyễn Thái Học, TP Vinh</span></p>
                </li>
                <li class="d-flex">
                    <i style="border-radius: 50% ;text-align: center; line-height: 40px;font-size: 25px;width:40px ;height:40px ;color:red;border: 1px solid red;" class="fa-solid fa-envelope"></i>
                    <p style="margin-left: 5px;"><strong>Địa chỉ: </strong> <br> <span style="font-size: 14px;">ducvxph34548@fpt.edu.vn</span></p>
                </li>
                <li class="d-flex">
                    <i style="border-radius: 50% ;text-align: center; line-height: 40px;font-size: 25px;width:40px ;height:40px ;color:red;border: 1px solid red;" class="fa-solid fa-phone"></i>
                    <p style="margin-left: 5px;"><strong>Địa chỉ: </strong> <br> <span style="font-size: 14px;">0332768671</span></p>
                </li>
            </ul>
            <form action="" method="post">
                <div class="" style="display: grid;grid-template-columns: 1fr 1fr;">
                    <div class="form-group">
                        <label for=""><strong>Họ và tên</strong></label>
                        <input type="text" class="form-control my-2" placeholder="Họ và tên">
                    </div>
                    <div class="form-group" style="margin-left: 20px;">
                        <label for=""><strong>Email</strong></label>
                        <input type="text" class="form-control my-2" placeholder="Email">
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label for=""><strong>Nội dung</strong></label>
                        <textarea name="" class="form-control my-2" id="" placeholder="Nội dung"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Gửi" class="form-control btn-danger btn" style="margin-top: 10px;">
                </div>
            </form>
        </div>
    </div>
    <?php
    require './views/main_login_category.php';
    ?>
</main>