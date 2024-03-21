<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <form action="index.php?action=forget&act=doimatkhau_action" class="login-form" method="post" onsubmit="return check()">
                    <div class="form-group">
                        <label for="passcu" class="text-uppercase">Nhập Mật Khẩu Cũ Ở Đây</label>
                        <input type="password" class="form-control" id="passcu" name="passcu" placeholder="Nhập Mật Khẩu Cũ">
                        <label for="passmoi" class="text-uppercase">Nhập Mật Khẩu Mới Ở Đây</label>
                        <input type="password" class="form-control" id="passmoi" name="passmoi" placeholder="Nhập Mật Khẩu Mới">
                        <label for="passmoi1" class="text-uppercase">Nhập Lại Mật Khẩu Mới Ở Đây</label>
                        <input type="password" class="form-control" id="passmoi1" name="passmoi1" placeholder="Nhập Mật Lại Khẩu Mới">

                    </div>
                    <div class="form-check">
                        <input type="submit" name="doimatkhau" class="doimatkhau">
                    </div>
                </form>
            </div>
        </div>
</section>
<script>
    function check() {
        var passcu = document.getElementById("passcu");
        var newpass = document.getElementById("passmoi");
        var newpass1 = document.getElementById("passmoi1");
        if (passcu.value === "") {
            alert("Bạn Chưa Nhập Mật Khẩu Cũ");
            return false;
        }
        if (newpass.value === "") {
            alert("Bạn Chưa Nhập Mật Khẩu Mới");
            return false;
        }
        if (newpass.value === "") {
            alert("Bạn Chưa Nhập Lại Mật Khẩu Mới");
            return false;
        }
        if (newpass.value != newpass1.value) {
            alert("Mật Khẩu Nhập Lại Không Giống");
            return false;
        }
    }
</script>