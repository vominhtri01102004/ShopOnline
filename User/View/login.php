<header class="mt-4">
  <div class="app">
    <form action="index.php?action=dangnhap&act=dangnhap_action" method="post">
      <h1>Đăng Nhập</h1>
      <div class="input-box">
        <input type="text" placeholder="Tên Đăng Nhập" autocomplete="off" required name="txtusername">
        <i class="bx bxs-user"></i>
      </div>

      <div class="input-box">
        <input type="password" placeholder="Mật Khẩu" name="txtpassword">
        <i class="bx bxs-lock-alt"></i>

      </div>

      <div class="remember-forgot">
        <label> <input type="checkbox">Nhớ Tôi</label>
        <a href="index.php?action=forget">Quên Mật Khẩu</a>
      </div>
      <button type="submit" class="btn">Đăng Nhập</button>

      <div class="register-link">
        <p>Chưa Có Tài Khoản ? <a href="index.php?action=dangky">Đăng Ký</a> </p>
      </div>
    </form>
  </div>
  <header>
    