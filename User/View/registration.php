<!--  -->
<div class="untree_co-section">
  <div class="container">
    <div class="block">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 pb-4">
          <form action="index.php?action=dangky&act=dangky_action" method="post" class="form" role="form" onsubmit="return check()">
            <div class="row">
              <div class="col-6">
                <div class="col-xs-4 col-md-8"> <label for="email">Tên Khách Hàng:</label></div>
                <div class="col-xs-8 col-md-12"><input required="" class="form-control" name="txttenkh" id="tenkh" placeholder="Tên khách hàng" autofocus="" type="text"> </div>
              </div>
              <div class="col-6">
                <div class="col-xs-4 col-md-4"><label for="email">Tên Đăng Nhập:</label> </div>
                <div class="col-xs-8 col-md-12"><input required="" class="form-control" name="txtusername" id="tendangnhap" placeholder="Tên đăng nhập" type="text"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="col-xs-4 col-md-4"> <label for="email">Số Điện Thoại:</label> </div>
                <div class="col-xs-8 col-md-12"><input required="" class="form-control" name="txtsodt" id="sodt" placeholder="Số điện thoại khách hàng" autofocus="" type="text"> </div>
              </div>
              <div class="col-6">
                <div class="col-xs-4 col-md-4"> <label for="email">Email:</label></div>
                <div class="col-xs-8 col-md-12"><input required="" class="form-control" name="txtemail" id="email" placeholder="Email khách hàng" autofocus="" type="email"> </div>
              </div>
            </div>
            <div class="form-group">
            </div><label for="email">Địa Chỉ:</label> <input required="" class="form-control" name="txtdiachi" id="diachi" placeholder="Địa chỉ khách hàng" type="text">
            <div class="form-group">
            </div><label for="email">Mật Khẩu:</label> <input required="" class="form-control" id="matkhau" name="txtpass" placeholder="Mật Khẩu" type="password">
            <div class="form-group">
            </div><label for="email">Nhập lại Mật Khẩu:</label> <input required="" class="form-control" id="matkhau2" name="retypepassword" placeholder="Nhập Lại Mật Khẩu" type="password">

            <div>
              <button class="btn btn-lg btn-primary btn-block registration" type="submit" name="submit"> Đăng ký</button>

              <p>Đã Có Tài Khoản ? <a href="index.php?action=dangnhap">Đăng Nhập</a> </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // Hàm để tăng số lượng nè non nớt
  function check(index) {
    var tenkh = document.getElementById("tenkh");
    var tendangnhap = document.getElementById("tendangnhap");
    var sodt = document.getElementById("sodt");
    var email = document.getElementById("email");
    var diachi = document.getElementById("diachi");
    var matkhau = document.getElementById("matkhau");
    var matkhau2 = document.getElementById("matkhau2");
    if (isNaN(sodt.value)) {
      alert("Số Điện Thoại phải là số");
      return false;
    }
    if (sodt.value.length != 10) {
      alert("Số Điện Thoại phải là 10 số");
      return false;
    }
    if (matkhau.value != matkhau2.value) {
      alert("Mật Khẩu Nhập lại Không Đúng!");
      return false;
    }
  }
</script>