<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HomePet</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/194e38739f.js" crossorigin="anonymous"></script>
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/script-admin.js"></script>
</head>

<body>
  <div class="container-fluid">
    <header class="row">
      <div class="col-md-7 col-sm-12 col-12 header__logo">
        <div class="row">
          <div class="col-lg-6">
            <img src="../img/logo/Logo-header.png" alt="logo" class="header__logo--img" />
          </div>
          <div class="col-lg-6 mt-1">
            <div class="row align-items-lg-end" style="height: 50px">
              <div class="col">
                <form class="form-inline">
                  <input class="header__search--ip" type="text" placeholder="Bạn muốn mua gì?" />
                  <button class="header__search--btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 col-sm-12 col-12 header__list-title">
        <div class="row mt-3">
          <div class="col-3">
            <a name="" id="" class="header__list-title--btn --btn" href="#">
              GIỚI THIỆU
            </a>
          </div>
          <div class="col-3">
            <a name="" id="" class="header__list-title--btn --btn" href="#">
              LIÊN HỆ
            </a>
          </div>
          <div class="col-3">
            <a name="" id="" class="header__list-title--btn --btn" href="#">
              FACEBOOK
            </a>
          </div>
          <div class="col-3">
            <a name="" id="" class="header__list-title--btn --btn" href="#">
              <i class="fas fa-user"></i>
            </a>
          </div>
        </div>
      </div>
    </header>
    <hr />

    <div class="row">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="col">
                <span class="admin__title" id="list-order">DS ĐƠN HÀNG</span>
              </div>
              <div class="col">
                <span class="admin__title" id="list-personnel">DS NHÂN VIÊN</span>
              </div>
              <div class="col">
                <span class="admin__title" id="list-product-type-1">DS VẬT NUÔI</span>
              </div>
              <div class="col">
                <span class="admin__title" id="list-product-type-2">DS LOẠI SẢN PHẨM</span>
              </div>
              <div class="col">
                <span class="admin__title" id="list-trademark">DS THƯƠNG HIỆU</span>
              </div>
              <div class="col">
                <span class="admin__title" id="list-product">DS SẢN PHẨM</span>
              </div>
            </div>
            <div class="row admin__table admin__bg " id="tb-list">
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../bootstrap/jquery-3.5.1.min.js"></script>
  <script src="../bootstrap/popper.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>