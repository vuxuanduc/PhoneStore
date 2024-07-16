<main>
    <div>
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateUpdateAcc();">
            <h3 class="text-center">Cập nhật tài khoản</h3>
            <div class="form-group">
                <input type="hidden" class="form-control" name="iduser" value="<?php echo $userID -> iduser ?>">
            </div>
            <div class="form-group">
                <label for="">Họ và tên</label> <span id="fullname_update_err" style="color : red;"></span>
                <input type="text" class="form-control my-2 fullname_update" name="fullname" value="<?php echo $userID -> fullname ?>">
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label> <span id="phone_update_err" style="color : red;"></span>
                <span style="color:red;">
                    <?php
                        if(isset($error_update_acc['phone_err'])) {
                            echo $error_update_acc['phone_err'] ;
                        }
                    ?>
                </span>
                <input type="text" class="form-control my-2 phone_update" name="phone" value="<?php echo $userID -> phone ?>">
            </div>
            <div class="form-group">
                <label for="">Email</label> <span id="email_update_err" style="color : red;"></span>
                <span style="color:red;">
                    <?php
                        if(isset($error_update_acc['email_err'])) {
                            echo $error_update_acc['email_err'] ;
                        }
                    ?>
                </span>
                <input type="text" class="form-control my-2 email_update" name="email" value="<?php echo $userID -> email ?>">
            </div>
            <div class="form-group">
                <label for="">Ảnh</label>
                <input type="text" class="form-control my-2" name="" value="<?php echo $userID -> image ?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Cập nhật ảnh mới</label>
                <input type="file" class="form-control my-2" name="image" accept="image/*">
            </div>
            <div class="form-group"> 
                <label for="">Tên đăng nhập</label> <span id="username_update_err" style="color : red;"></span>
                <span style="color:red;">
                    <?php
                        if(isset($error_update_acc['username_err'])) {
                            echo $error_update_acc['username_err'] ;
                        }
                    ?>
                </span>
                <input type="text" class="form-control my-2 username_update" name="username" value="<?php echo $userID -> username ?>">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label> <span id="password_update_err" style="color : red;"></span>
                <input type="password" class="form-control my-2 password_update" name="password" value="<?php echo $userID -> password ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary my-2" name="btn_update_acc" value="Cập nhật tài khoản">
            </div>
        </form>
    </div>
    <?php
        require './views/main_login_category.php' ;
    ?>
</main>

<script>
    const fullname = document.querySelector(".fullname_update") ;
    const phone = document.querySelector(".phone_update") ;
    const email = document.querySelector(".email_update") ;
    const username = document.querySelector(".username_update") ;
    const password = document.querySelector(".password_update") ;
    const fullname_err = document.querySelector("#fullname_update_err") ;
    const phone_err = document.querySelector("#phone_update_err") ;
    const email_err = document.querySelector("#email_update_err") ;
    const username_err = document.querySelector("#username_update_err") ;
    const password_err = document.querySelector("#password_update_err") ;

    function validateUpdateAcc() {
        let check = true ;
        if(fullname.value.trim() == "" || phone.value.trim() == "" || email.value.trim() == "" || username.value.trim() == "" || password.value.trim() == "") {
            alert("Vui lòng nhập đầy đủ thông tin") ;
            check = false ;
        }

        let regaxPhone = /^0[0-9]\d{8}$/;
    if (regaxPhone.test(phone.value) == false) {
        phone_err.innerText = "SĐT không đúng định dạng";
        check = false;
    } else {
        phone_err.innerText = "";
    }

    let regaxEmail = /^\w+([\._]?\w+)*@\w{2,}(\.\w{2,32})+$/;
    if (regaxEmail.test(email.value) == false) {
        email_err.innerText = "Email không đúng định dạng";
        check = false;
    } else {
        email_err.innerText = "";
    }

    let regaxUser = /^\w{6,}$/;
    if (regaxUser.test(username.value) == false) {
        username_err.innerText = "Tên đăng nhập không đúng định dạng";
        check = false;
    } else {
        username_err.innerText = "";
    }

    let regaxPass = /^(?=.*\w).{8,}$/;
    if (regaxPass.test(password.value) == false) {
        password_err.innerText = "Mật khẩu không đúng định dạng";
        check = false;
    } else {
        password_err.innerText = "";
    }
        return check ;
    }

</script>