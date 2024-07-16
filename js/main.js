// Ẩn hiện form đăng nhập 
const open_login = document.getElementById("btn-open-login") ;
const form_login = document.getElementById("formLogin") ;
const closeFormLogin = document.querySelector(".close-login") ;
open_login.addEventListener("click" , () => {
    form_login.style.display = "block" ;
    setTimeout(function(){
        form_login.style.transform = "scale(1)" ;
        form_login.style.transition = "0.3s ease" ;
    } , 300) ;
    
}) ;
closeFormLogin.addEventListener("click" , () => {
    form_login.style.transform = "scale(0)" ;
        form_login.style.transition = "0.3s ease" ;
    setTimeout(function(){
        form_login.style.display = "none" ;
    } , 300) ;
})

// Check mật khẩu
const btn_check = document.querySelectorAll("#check");
const pass = document.querySelectorAll(".pass");
btn_check.forEach((e, index) => {
    e.addEventListener('change', () => {
        if (e.checked) {
            pass[index].type = "text";
        } else {
            pass[index].type = "password";
        }
    });
});

// Ẩn hiện nút đăng nhập khi kích thước màn hình thay đổi
const main_form_login = document.querySelector('.main-form-login') ;
const btn_cart = document.getElementById("btn-cart") ;
const btn_logout = document.getElementById("btn-open-logout") ;
const main_profile = document.querySelector('.main-profile') ;
window.addEventListener('resize' , () => {
    if(window.innerWidth <= 991) {
        open_login.style.display = "block" ;
    }else {
        open_login.style.display = "none" ;
    }
}) ;

// Nút cuộn cuối trang
const btn_scrollTop = document.querySelector('#scroll-top') ;
btn_scrollTop.addEventListener('click' , () => {
    window.scrollTo({
        top : 0 , 
        behavior : 'smooth'
    }) ;
}) ;
window.addEventListener('scroll' , () => {
    if(window.scrollY > 500) {
        btn_scrollTop.style.display = "block" ;
    }else {
        btn_scrollTop.style.display = "none" ;
    }
})

// Mở form đăng kí , đăng nhâp , quên mật khẩu ;
const open_form_login = document.querySelectorAll('#open-form-login') ;
const open_form_signup = document.querySelectorAll('#open-form-signup') ;
const open_form_forgot = document.querySelectorAll('#open-form-forgot') ;
const signup = document.querySelector('.form-signup') ;
const forgot = document.querySelector('.form-forgot') ;
const login = document.querySelector('.form-login') ;
open_form_signup.forEach((e , index) => {
    e.addEventListener('click' , () => {
        signup.style.transform = "translateX(0)" ;
        forgot.style.transform = "translateX(-100%)" ;
        main_form_login.scrollTop = 0 ;
        main_form_login.style.height = "710px" ;
    })
})
open_form_login.forEach((e , index) => {
    e.addEventListener('click' , () => {
        signup.style.transform = "translateX(100%)" ;
        forgot.style.transform = "translateX(-100%)" ;
        main_form_login.scrollTop = 0 ;
        main_form_login.style.height = "370px" ;
        login.style.display = "block" ;
    })
})
open_form_forgot.forEach((e , index) => {
    e.addEventListener('click' , () => {
        signup.style.transform = "translateX(100%)" ;
        forgot.style.transform = "translateX(0)" ;
        login.style.display = "none" ;
        main_form_login.scrollTop = 0 ;
        main_form_login.style.height = "360px" ;
    })
})

// Báo lỗi nhập liệu ở các form ;
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
function validateSignup() {
    let check = true;
    // Kiểm tra tổng quan cho toàn bộ biểu mẫu
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

const username_login = document.querySelector('.username_login') ;
const password_login = document.querySelector('.password_login') ;
const username_login_err = document.querySelector('#username_login_err') ;
const password_login_err = document.querySelector('#password_login_err') ;
function validateLogin() {
    let check = true ;
    let regaxUser = /^\w{6,}$/ ;
    if(username_login.value.trim() == "") {
        username_login_err.innerText = "Tên đăng nhập không được trống" ;
        check = false ;
    }else if(regaxUser.test(username_login.value) == false) {
        username_login_err.innerText = "Tên đăng nhập không đúng định dạng" ;
        check = false ;
    }else {
        username_login_err.innerText = "" ;
        check = true ;
    }
    let regaxPass = /^(?=.*\w).{8,}$/ ;
    if(password_login.value.trim() == "") {
        password_login_err.innerText = "Mật khẩu không được trống" ;
        check = false ;
    }else if(regaxPass.test(password_login.value) == false) {
        password_login_err.innerText = "Mật khẩu không đúng định dạng" ;
        check = false ;
    }else {
        password_login_err.innerText = "" ;
        check = true ;
    }
    return check ;
}
const email_forgot = document.querySelector('.email_forgot') ;
const email_forgot_err = document.querySelector('#email_forgot_err') ;
const username_forgot = document.querySelector('.username_forgot') ;
const username_forgot_err = document.querySelector('#username_forgot_err') ;
function validateForgot() {
    let check = true ;
    let regaxEmail = /^\w+@[a-zA-Z]{3,}\.com$/ ;
    if(email_forgot.value.trim() == "") {
        email_forgot_err.innerText = "Email không được trống" ;
        check = false ;
    }else if(regaxEmail.test(email_forgot.value) == false) {
        email_forgot_err.innerText = "Email không đúng định dạng" ;
        check = false ;
    }else {
        email_forgot_err.innerText = "" ;
        check = true ;
    }

    let regaxUser = /^\w{6,}$/ ;
    if(username_forgot.value.trim() == "") {
        username_forgot_err.innerText = "Tên đăng nhập không được trống" ;
        check = false ;
    }else if(regaxUser.test(username_forgot.value) == false) {
        username_forgot_err.innerText = "Tên đăng nhập không đúng định dạng" ;
        check = false ;
    }else {
        username_forgot_err.innerText = "" ;
        check = true ;
    }
    return check ;
}

const change_pass = document.querySelector('.change_pass') ;
const change_pass_err = document.getElementById('change_pass_err') ;
function validateChangePass() {
    let check = true ;
    let regaxPass = /^(?=.*\w).{8,}$/ ;
    if(change_pass.value.trim() == "") {
        change_pass_err.innerText = "Mật khẩu không được trống" ;
        check = false ;
    }else if(regaxPass.test(change_pass.value) == false) {
        change_pass_err.innerText = "Mật khẩu không đúng định dạng" ;
        check = false ;
    }else {
        change_pass_err.innerText = "" ;
        check = true ;
    }
    return check ;
}
