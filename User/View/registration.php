<div class="untree_co-section">
  <div class="container">
    <div class="block">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 pb-4 rounded-30px background1 p-6 ">
          <form action="index.php?action=dangky&act=dangky_action" method="post" class="form" role="form" onsubmit="return check()" enctype="multipart/form-data">
            <div class="row">
              <div class="col-6">
                <div class="col-xs-4 col-md-8"> <label for="email">Tên Khách Hàng:</label></div>
                <div class="col-xs-8 col-md-12"><input required="" class="form-control" name="txttenkh" id="tenkh" placeholder="Tên khách hàng" autofocus="" autocomplete="off" type="text"> </div>
              </div>
              <div class="col-6">
                <div class="col-xs-4 col-md-5"><label for="email">Tên Đăng Nhập:</label> </div>
                <div class="col-xs-8 col-md-12"><input required="" class="form-control" name="txtusername" id="tendangnhap" placeholder="Tên đăng nhập" autocomplete="off" type="text"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="col-xs-4 col-md-4"> <label for="email">Số Điện Thoại:</label> </div>
                <div class="col-xs-8 col-md-12"><input required="" class="form-control" name="txtsodt" id="sodt" placeholder="Số điện thoại khách hàng" autofocus="" autocomplete="off" type="text"> </div>
              </div>
              <div class="col-6">
                <div class="col-xs-4 col-md-4"> <label for="email">Email:</label></div>
                <div class="col-xs-8 col-md-12"><input required="" class="form-control" name="txtemail" id="email" placeholder="Email khách hàng" autofocus="" autocomplete="off" type="email"> </div>
              </div>
            </div>
            <div class="form-group">
            </div><label for="email">Địa Chỉ:</label> <input required="" class="form-control" name="txtdiachi" id="diachi" placeholder="Địa chỉ khách hàng" autocomplete="off" type="text">
            <div class="form-group">
            </div><label for="email">Mật Khẩu:</label> <input required="" class="form-control" id="matkhau" name="txtpass" placeholder="Mật Khẩu" type="password">
            <div class="form-group">
            </div><label for="email">Nhập lại Mật Khẩu:</label> <input required="" class="form-control" id="matkhau2" name="retypepassword" placeholder="Nhập Lại Mật Khẩu" type="password">

            <input type="text" hidden id="randomImage" name="hinh">

            <div class="displayflex">
              <button class="btn registration" type="submit" name="submit"> Đăng ký</button>

              <p class="mt-4-5 mb-0 offset-025">Đã Có Tài Khoản ? <a href="index.php?action=dangnhap">Đăng Nhập</a> </p>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // Hàm để tăng số lượng nè non nớt
  function check(index) {
    var email = document.getElementById("email").value;
    var emailPattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    // var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3}$/;

    var tenkh = document.getElementById("tenkh");
    var tendangnhap = document.getElementById("tendangnhap");
    var sodt = document.getElementById("sodt").value;
    var diachi = document.getElementById("diachi");
    var matkhau = document.getElementById("matkhau");
    var matkhau2 = document.getElementById("matkhau2");
    var sodt = document.getElementById("sodienthoai").value;
    if (isNaN(sodt)) {
      alert("Số Điện Thoại phải là số");
      return false;
    }
    if (sodt.length != 10) {
      alert("Số Điện Thoại phải là 10 số");
      return false;
    }
    if (parseInt(sodt[0]) !== 0) {
      alert("Số Đầu Tiên Phải Là 0");
      return false;
    }
    if (matkhau.value != matkhau2.value) {
      alert("Mật Khẩu Nhập lại Không Đúng!");
      return false;
    }
    if (!emailPattern.test(email)) {
      alert("Email không hợp lệ.");
      return false; // Ngăn form được gửi đi
    }
  }
</script>
<script>
  // Danh sách các URL của hình ảnh đã chọn
  var imageUrls = [
    'admin.jpg',
    'admin1.jpg',
    'admin2.jpg',
    'admin3.jpg',
    'admin4.jpg'
    // Thêm các URL của hình ảnh khác ở đây
  ];

  // Chọn một URL ngẫu nhiên từ danh sách
  var randomImageUrl = imageUrls[Math.floor(Math.random() * imageUrls.length)];

  // Thay đổi src của hình ảnh để hiển thị hình ảnh ngẫu nhiên
  document.getElementById('randomImage').value = randomImageUrl;
</script>