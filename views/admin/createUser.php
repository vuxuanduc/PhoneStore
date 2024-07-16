<?php
require './views/admin/navAdmin.php';
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Thêm người dùng</th>
        </tr>
    </thead>
</table>
<form action="" method="post" class="" onsubmit="return validateCreateUser();" enctype="multipart/form-data">
    <h2 class="text-center">Thêm người dùng mới</h2>
    <div class="form-group">
        <label for=""><strong>Họ và tên</strong></label> <span style="color : red ;font-size: 12px;" id="fullname_signup_err"></span> <br>
        <input type="text" name="fullname_signup" placeholder="Họ và tên" class="form-control my-2 fullname_signup" value="<?php echo isset($_POST['fullname_signup']) ? $_POST['fullname_signup'] : ""; ?>">
    </div>
    <div class="form-group">
        <label for=""><strong>Số điện thoại</strong></label>
        <span style="color : red; font-size: 12px;">
            <?php
            if (isset($error['phone_signup'])) {
                echo $error['phone_signup'];
            }
            ?>
        </span>
        <span style="color : red ;font-size: 12px;" id="phone_signup_err"></span> <br>
        <input type="text" name="phone_signup" placeholder="Số điện thoại" class="form-control my-2 phone_signup" value="<?php echo isset($_POST['phone_signup']) ? $_POST['phone_signup'] : ""; ?>">
    </div>
    <div class="form-group">
        <label for=""><strong>Email</strong></label>
        <span style="color : red; font-size: 12px;">
            <?php
            if (isset($error['email_signup'])) {
                echo $error['email_signup'];
            }
            ?>
        </span>
        <span style="color : red ;font-size: 12px;" id="email_signup_err"></span> <br>
        <input type="text" name="email_signup" placeholder="Email" class="form-control my-2 email_signup" value="<?php echo isset($_POST['email_signup']) ? $_POST['email_signup'] : ""; ?>">
    </div>
    <div class="form-group">
        <input type="file" name="image_signup" class="form-control my-2" accept="image/*">
    </div>
    <div class="form-group">
        <label for=""><strong>Tên đăng nhập</strong></label>
        <span style="color : red; font-size: 12px;">
            <?php
            if (isset($error['username_signup'])) {
                echo $error['username_signup'];
            }
            ?>
        </span>
        <span style="color : red ;font-size: 12px;" id="username_signup_err"></span> <br>
        <input type="text" name="username_signup" placeholder="Tên đăng nhập" class="form-control my-2 username_signup" value="<?php echo isset($_POST['username_signup']) ? $_POST['username_signup'] : ""; ?>">
    </div>
    <div class="form-group">
        <label for=""><strong>Mật khẩu</strong></label> <span style="color : red ;font-size: 12px;" id="password_signup_err"></span> <br>
        <input type="password" name="password_signup" placeholder="Mật khẩu" class="form-control my-2 password_signup" value="<?php echo isset($_POST['password_signup']) ? $_POST['password_signup'] : ""; ?>">
    </div>
    <div class="form-group">
        <label for=""><strong>Kiểu người dùng</strong></label> <br>
        <select name="idrole" id="" class="form-control my-2">
            <?php foreach(getRole() as $key => $value) : ?>
                <option value="<?php echo $value -> idrole ?>"><?php echo $value -> role ?></option>
            <?php endforeach ; ?>
        </select>
    </div>
    <tr>
        <button type="submit" class="btn products" name="add_user">Thêm mới</button>
        <a class="btn retype_user products">Nhập lại</a>
        <a href="?action=users" class="btn add_users products">Danh sách</a>
    </tr>
</form>

<script>
    const fullname_signup = document.querySelector('.fullname_signup') ;
    const phone_signup = document.querySelector('.phone_signup') ;
    const email_signup = document.querySelector('.email_signup') ;
    const username_signup = document.querySelector('.username_signup') ;
    const password_signup = document.querySelector('.password_signup') ;
    const fullname_signup_err = document.querySelector('#fullname_signup_err') ;
    const phone_signup_err = document.querySelector('#phone_signup_err') ;
    const email_signup_err = document.querySelector('#email_signup_err') ;
    const username_signup_err = document.querySelector('#username_signup_err') ;
    const password_signup_err = document.querySelector('#password_signup_err') ;

    function validateCreateUser() {
        let check = true;
        
        if (fullname_signup.value.trim() == "" || phone_signup.value.trim() == "" || email_signup.value.trim() == "" || username_signup.value.trim() == "" || password_signup.value.trim() == "") {
            alert("Vui lòng điền đầy đủ thông tin.");
            check = false;
            return check;
        }

        else {
            fullname_signup_err.innerText = "";
        }

        let regaxPhone = /^0[0-9]\d{8}$/;
        if (regaxPhone.test(phone_signup.value) == false) {
            phone_signup_err.innerText = "SĐT không đúng định dạng";
            check = false;
        } else {
            phone_signup_err.innerText = "";
        }

        let regaxEmail = /^\w+([\._]?\w+)*@\w{2,}(\.\w{2,32})+$/;
        if (regaxEmail.test(email_signup.value) == false) {
            email_signup_err.innerText = "Email không đúng định dạng";
            check = false;
        } else {
            email_signup_err.innerText = "";
        }

        let regaxUser = /^\w{6,}$/;
        if (regaxUser.test(username_signup.value) == false) {
            username_signup_err.innerText = "Tên đăng nhập không đúng định dạng";
            check = false;
        } else {
            username_signup_err.innerText = "";
        }

        let regaxPass = /^(?=.*\w).{8,}$/;
        if (regaxPass.test(password_signup.value) == false) {
            password_signup_err.innerText = "Mật khẩu không đúng định dạng";
            check = false;
        } else {
            password_signup_err.innerText = "";
        }

        return check;
    }

    const retype_user = document.querySelector('.retype_user') ;
    const input = document.querySelectorAll('input') ;
    retype_user.addEventListener('click' , () => {
        input.forEach(index => {
            index.value = "" ;
        })
    })
</script>
