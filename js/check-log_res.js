// Kiểm ra input name
function xuli_1() { 
  var name = document.getElementById("name").value;
  var textError_1 = document.getElementById("error_1");

  if(name.length == 0) {
    textError_1.innerHTML = " (*) Họ và tên chưa hợp lệ!";
    return false;
  } else {
    textError_1.innerHTML = "";
  }
  return true;
}

// Kiểm ra input phone
function xuli_2() {
  var n_phone = document.getElementById("n_phone").value;
  var textError_2 = document.getElementById("error_2");
  if(n_phone.length == 0) {
    textError_2.innerHTML = " (*) Số điện thoại chưa hợp lệ!";
    return false;
  } else {
    textError_2.innerHTML = "";
    return true;
  }
  
}

// Kiểm ra input address
function xuli_3() {
  var address = document.getElementById("address").value;
  var textError_3 = document.getElementById("error_3");

  if(address.length == 0) {
    textError_3.innerHTML = " (*) Địa chỉ chưa hợp lệ!";
  return false;
  } else {
    textError_3.innerHTML = "";
  }
  return true;
}

// Kiểm ra input username
function xuli_4(){
    var username = document.getElementById("username").value;
    var textError_4 = document.getElementById("error_4");
    
    kt_4 = username.indexOf(" ");
    if( username.length == 0 || kt_4 != -1 || username.length > 15) {
      textError_4.innerHTML = " (*) Tên đăng nhập chưa hợp lệ!";
        return false;
    } else {
      textError_4.innerHTML = "";
    }
  return true;
}

// Kiểm ra input password
function xuli_5() {
  var password = document.getElementById("password").value;
  var textError_5 = document.getElementById("error_5");
  
  kt_pw= password.length;
    if( password.length == 0 || kt_pw < 8 || kt_pw > 16) {
      textError_5.innerHTML = " (*) Mật khẩu chưa hợp lệ!";
    return false;
    } else {
      textError_5.innerHTML = "";
    }
  return true;
}

// Kiểm ra input re-password
function xuli_6() {
  var password = document.getElementById("password").value;
  var re_password = document.getElementById("re_password").value;
  var textError_6 = document.getElementById("error_6");

  if(re_password != password) {
    textError_6.innerHTML = " (*) Mật khẩu chưa khớp!";
  return false;
  } else {
    textError_6.innerHTML = "";
  }
  return true;
}

// Kiểm ra input login username
function xuli_7(){
  var username = document.getElementById("log-username").value;
  var textError_7 = document.getElementById("error_7");
  
  kt_7 = username.indexOf(" ");
  if( username.length == 0 || kt_7 != -1 || username.length > 15) {
    textError_7.innerHTML = " (*) Tên đăng nhập chưa hợp lệ!";
      return false;
  } else {
    textError_7.innerHTML = "";
  }
return true;
}

// Kiểm ra input login password
function xuli_8() {
var password = document.getElementById("log-password").value;
var textError_8 = document.getElementById("error_8");

  if( password.length == 0 || password.length < 8 || password.length > 16) {
    textError_8.innerHTML = " (*) Mật khẩu chưa hợp lệ!";
  return false;
  } else {
    textError_8.innerHTML = "";
  }
return true;
}

function xuli() {
  return (xuli_1() && xuli_2() && xuli_3() && xuli_4() && xuli_5() && xuli_6()); 
}
