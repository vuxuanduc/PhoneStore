<div class="main-login-category my-2">
    <?php
    if (!isset($_SESSION['login'])) {
    ?>
        <div class="main-form-login">

            <form action="" method="post" class="form-login" onsubmit="return validateLogin();">
                <h2 class="text-center">Đăng nhập</h2>
                <div class="form-group">
                    <label for="">Tên đăng nhập</label> 
                    <span style="color : red; font-size: 12px;">
                        <?php
                            if(isset($error_login['username_login'])) {
                                echo $error_login['username_login'] ;
                            }
                        ?>
                    </span>
                    <span style="color : red ;font-size: 12px;" id="username_login_err"></span><br>
                    <input type="text" value="<?php echo isset($_POST['username_login']) ? $_POST['username_login'] : "" ; ?>" name="username_login" placeholder="Tên đăng nhập" class="form-control my-2 username_login">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label> 
                    <span style="color : red; font-size: 12px;">
                        <?php
                            if(isset($error_login['password_login'])) {
                                echo $error_login['password_login'] ;
                            }
                        ?>
                    </span>
                    <span style="color : red ;font-size: 12px;" id="password_login_err"></span><br>
                    <input type="password" value="<?php echo isset($_POST['password_login']) ? $_POST['password_login'] : "" ; ?>" name="password_login" placeholder="Mật khẩu" class="form-control my-2 pass password_login">
                </div>
                <div class="form-group">
                    <input type="checkbox" class="my-2" id="check"> Hiển thị mật khẩu
                </div>
                <div class="form-group">
                    <input type="submit" name="btnLogin" value="Đăng nhập" class="form-control my-2 btn btn-primary">
                </div>
                <div id="right-left">
                    <a id="open-form-signup">Đăng kí</a>
                    <a id="open-form-forgot">Quên mật khẩu</a>
                </div>
            </form>

            <form action="" method="post" class="form-signup" onsubmit="return validateSignup();" enctype="multipart/form-data">
                <h2 class="text-center">Đăng kí</h2>
                <div class="form-group">
                    <label for="">Họ và tên</label> <span style="color : red ;font-size: 12px;" id="fullname_signup_err"></span> <br>
                    <input type="text" name="fullname_signup" placeholder="Họ và tên" class="form-control my-2 fullname_signup" value="<?php echo isset($_POST['fullname_signup']) ? $_POST['fullname_signup'] : "" ; ?>">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label> 
                    <span style="color : red; font-size: 12px;">
                        <?php
                            if(isset($error['phone_signup'])) {
                                echo $error['phone_signup'] ;
                            }
                        ?>
                    </span>
                    <span style="color : red ;font-size: 12px;" id="phone_signup_err"></span> <br>
                    <input type="text" name="phone_signup" placeholder="Số điện thoại" class="form-control my-2 phone_signup" value="<?php echo isset($_POST['phone_signup']) ? $_POST['phone_signup'] : "" ; ?>">
                </div>
                <div class="form-group">
                    <label for="">Email</label> 
                    <span style="color : red; font-size: 12px;">
                        <?php
                            if(isset($error['email_signup'])) {
                                echo $error['email_signup'] ;
                            }
                        ?>
                    </span>
                    <span style="color : red ;font-size: 12px;" id="email_signup_err"></span> <br>
                    <input type="text" name="email_signup" placeholder="Email" class="form-control my-2 email_signup" value="<?php echo isset($_POST['email_signup']) ? $_POST['email_signup'] : "" ; ?>">
                </div>
                <div class="form-group">
                    <input type="file" name="image_signup" class="form-control my-2" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="">Tên đăng nhập</label> 
                    <span style="color : red; font-size: 12px;">
                        <?php
                            if(isset($error['username_signup'])) {
                                echo $error['username_signup'] ;
                            }
                        ?>
                    </span>
                    <span style="color : red ;font-size: 12px;" id="username_signup_err"></span> <br>
                    <input type="text" name="username_signup" placeholder="Tên đăng nhập" class="form-control my-2 username_signup" value="<?php echo isset($_POST['username_signup']) ? $_POST['username_signup'] : "" ;?>">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label> <span style="color : red ;font-size: 12px;" id="password_signup_err"></span> <br>
                    <input type="password" name="password_signup" placeholder="Mật khẩu" class="form-control my-2 password_signup" value="<?php echo isset($_POST['password_signup']) ? $_POST['password_signup'] : "" ; ?>">
                </div>
                <div class="form-group">
                    <label for="">Kiểu người dùng</label> <br>
                    <select name="idrole" id="" class="form-control my-2">
                        <option value="2" selected>Người dùng</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnSignup" value="Đăng kí" class="form-control my-2 btn btn-primary">
                </div>
                <div id="right-left">
                    <a id="open-form-login">Đăng nhập</a>
                    <a id="open-form-forgot">Quên mật khẩu</a>
                </div>
            </form>
            <?php
                if(!isset($_SESSION['forgot_password'])) {
            ?>
            <form action="" method="post" class="form-forgot" onsubmit="return validateForgot();">
                <h2 class="text-center">Quên mật khẩu</h2>
                <div class="form-group">
                    <label for="" class="">Email</label> 
                    <span style="color : red; font-size: 12px;">
                        <?php
                            if(isset($error_forgot['email_forgot'])) {
                                echo $error_forgot['email_forgot'] ;
                            }
                        ?>
                    </span>
                    <span style="color : red ;font-size: 12px;" id="email_forgot_err"></span><br>
                    <input type="text"  value="<?php echo isset($_POST['email_forgot']) ? $_POST['email_forgot'] : "" ; ?>" name="email_forgot" placeholder="Email" class="form-control my-2 email_forgot">
                </div>
                <div class="form-group">
                    <label for="" class="">Username</label> 
                    <span style="color : red; font-size: 12px;">
                        <?php
                            if(isset($error_forgot['username_forgot'])) {
                                echo $error_forgot['username_forgot'] ;
                            }
                        ?>
                    </span>
                    <span style="color : red ;font-size: 12px;" id="username_forgot_err"></span><br>
                    <input type="text" value="<?php echo isset($_POST['username_forgot']) ? $_POST['username_forgot'] : "" ; ?>" name="username_forgot" placeholder="Tên đăng nhập" class="form-control my-2 username_forgot">
                </div>

                <div class="form-group">
                    <input type="submit" name="btnForgot" value="Gửi" class="form-control my-2 btn btn-primary">
                </div>
                <div id="right-left">
                    <a id="open-form-login">Đăng nhập</a>
                    <a id="open-form-signup">Đăng kí</a>
                </div>
            </form>
            <?php
                }else {
            ?>
            <form action="" method="post" class="form-forgot" onsubmit="return validateChangePass();">
                <h2 class="text-center">Quên mật khẩu</h2>
                <div class="form-group">
                    <label for="">Nhập mật khẩu mới</label> <span style="color : red ; font-size: 12px;" id="change_pass_err"></span>
                    <input type="password" name="update_password" placeholder="Mật khẩu mới" class="form-control my-2 pass change_pass">
                </div>
                <div class="form-group">
                    <input type="checkbox" class="my-2" id="check"> Hiển thị mật khẩu
                </div>
                <div class="form-group">
                    <input type="submit" name="btnForgot_update" value="Đổi mật khẩu" class="form-control my-2 btn btn-primary">
                </div>
                <div id="right-left">
                    <a id="open-form-login">Đăng nhập</a>
                    <a id="open-form-signup">Đăng kí</a>
                </div>
            </form>
                    
            <?php
                }
            ?>
        </div>
    <?php
    } else {
    ?>
        <div class="main-profile">
            <div class="avatar">
                <img src="<?php echo $userID->image ?>" width="150px" height="150px" alt="Lỗi tải ảnh">
            </div>
            <h4 class="text-center my-1"><?php echo $userID->fullname ?></h4>
            <div class="edit-profile">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item text-center"><a href="./backend/logout.php" class="text-decoration-none">Đăng xuất</a></li>
                    <li class="nav-item text-center"><a href="?action=changePassword" class="text-decoration-none">Đổi mật khẩu</a></li>
                    <li class="nav-item text-center"><a href="?action=update_acc" class="text-decoration-none">Cập nhật tài khoản</a></li>
                    <li class="nav-item text-center"><a href="?action=bought" class="text-decoration-none">Đơn hàng</a></li>
                    <?php
                        if($userID -> idrole == "1") {
                    ?>
                        <li class="nav-item text-center"><a href="?action=admin" class="text-decoration-none">Quản lí</a></li>
                    <?php
                        }
                    ?>
                </ul>
                
            </div>
        </div>
    <?php
    }
    ?>
    <div class="main-category">
        <ul>
            <li>
                <h5>Danh mục sản phẩm</h5>
            </li>
            <?php foreach ($category as $key => $value) : ?>
                <a class="dropdown-item" href="<?php echo $value->idsectors ?>"><?php echo $value->sectors ?></a>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="list-views-product">
        <ul>
            <li><h5>Top 10 sản phẩm nhiều lượt xem nhất</h5></li>
            <?php foreach($topViews as $views => $view) : ?>
                <li class="d-flex">
                    <img src="<?php echo explode(',' , $view -> image)[0] ?>" width="50px" height="auto" alt="Lỗi tải ảnh">
                    <a href="?action=productDetails&&idproduct=<?php echo $view->idproduct ?>"><?php echo $view -> nameproduct ?></a>
                </li>
            <?php endforeach ; ?>
        </ul>
    </div>
    <div class="list-posts">
        <ul>
            <li><h5>Bài viết liên quan</h5></li>
            <?php foreach($listPostsTop10 as $posts => $post) : ?>
                <li class="d-flex">
                    <img src="<?php echo  $post -> image ?>" width="50px" height="50px" alt="Lỗi tải ảnh">
                    <a href="?action=postDetails&&idpost=<?php echo $post -> idpost ?>"><?php echo substr($post -> title , 0 , 60) .'...' ?></a>
                </li>
            <?php endforeach ; ?>
        </ul>
    </div>
</div>