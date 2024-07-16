<main>
    <div class="box-change-pass">
        <form action="" method="post" onsubmit="return validateChangePassword();">
            <h3 class="text-center">Đổi mật khẩu</h3>
            <div class="form-group">
                <input type="hidden" name="iduser" value="<?php echo $userID->iduser ?>" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input type="text" name="username" id="" value="<?php echo $userID->username ?>" readonly class="form-control my-2">
            </div>
            <div class="form-group">
                <label for="">Nhập mật khẩu cũ</label> <span id="old_password_err" style="color:red;"></span>
                <span style="color:red;">
                    <?php
                        if(isset($error_change['old_password'])) {
                            echo $error_change['old_password'] ;
                        }
                    ?>
                </span>
                <input type="password" name="old_password" value="<?php echo isset($_POST['old_password']) ? $_POST['old_password'] : "" ; ?>" id="old_password" class="form-control my-2">
            </div>
            <div class="form-group">
                <label for="">Nhập mật khẩu mới</label> <span id="new_password_err" style="color:red;"></span>
                <input type="password" name="new_password" value="<?php echo isset($_POST['new_password']) ? $_POST['new_password'] : "" ; ?>" id="new_password" class="form-control my-2">
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu mới</label> <span id="retype_new_password_err" style="color:red;"></span>
                <input type="password" name="retype_new_password" value="<?php echo isset($_POST['retype_new_password']) ? $_POST['retype_new_password'] : "" ; ?>" id="retype_new_password" class="form-control my-2 mb-2">
            </div>
            <div class="form-group">
                <input type="submit" value="Đổi mật khẩu" class="btn btn-primary" name="btn_change_password" id="" class="form-control my-2">
            </div>
        </form>
    </div>
    <?php
    require './views/main_login_category.php';
    ?>
</main>
<script>
    const old_password = document.getElementById('old_password');
    const old_password_err = document.getElementById('old_password_err')
    const new_password = document.getElementById('new_password');
    const new_password_err = document.getElementById('new_password_err');
    const retype_new_password = document.getElementById('retype_new_password');
    const retype_new_password_err = document.getElementById('retype_new_password_err');

    function validateChangePassword() {
        let check = true;
        if (old_password.value.trim() == "" || new_password.value.trim() == "" || retype_new_password.value.trim() == "") {
            // old_password_err.innerText = "Vui lòng nhập mật khẩu cũ" ;
            // new_password_err.innerText = "Vui lòng nhập mật khẩu mới" ;
            // retype_new_password_err.innerText = "Vui lòng nhập lại mật khẩu mới" ;
            alert("Vui lòng điền đầy đủ thông tin") ;
            check = false;
            return check;
        }

        let regaxPass = /^(?=.*\w).{8,}$/ ;
        if(regaxPass.test(old_password.value) == false) {
            old_password_err.innerText = "Mật khẩu không đúng định dạng" ;
            check = false ;
        }else {
            old_password_err.innerText = "" ;
        }
        if(regaxPass.test(new_password.value) == false) {
            new_password_err.innerText = "Mật khẩu không đúng định dạng" ;
            check = false ;
        }else {
            new_password_err.innerText = "" ;
        }
        if(new_password.value != retype_new_password.value) {
            retype_new_password_err.innerText = "Mật khẩu không khớp nhau" ;
            check = false ;
        }else {
            retype_new_password_err.innerText = "" ;
        }
        return check ;
    }
</script>