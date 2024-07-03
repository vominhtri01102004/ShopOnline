<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h3 class="text-center mt-3 mb-5">Đổi Mật Khẩu</h3>
                <?php if (isset($_GET['action'])) {
                            if (isset($_GET['act']) && $_GET['act'] == 'doimatkhau') {
                                echo '<form action="index.php?action=forget&act=doimatkhau_action" class="login-form" method="post" onsubmit="return check()">';
                            }else
                            {
                                echo '<form action="index.php?action=forget&act=doimatkhau_actionemail" class="login-form" method="post" onsubmit="return check()">';

                            }
                        }
                            ?>
                    <div class="form-group">
                        <?php if (isset($_GET['action'])) {
                            if (isset($_GET['act']) && $_GET['act'] == 'doimatkhau') {
                              echo  '<label for="passcu" class="">Nhập Mật Khẩu Cũ Ở Đây</label>
                              <input type="password" class="form-control mb-3" id="passcu" name="passcu" placeholder="Nhập Mật Khẩu Cũ">';
                            }else{
                                echo  '<label for="passcu" class="">Nhập Lại Mã Code Ở Đây</label>
                                <input type="password" class="form-control mb-3" id="passcu" name="passcuemail" placeholder="Nhập Mã Code Ở Đây">';
                            }
                        } ?>
                        <label for="passmoi" class="">Nhập Mật Khẩu Mới Ở Đây</label>
                        <input type="password" class="form-control mb-3" id="passmoi" name="passmoi" placeholder="Nhập Mật Khẩu Mới">
                        <label for="passmoi1" class="">Nhập Lại Mật Khẩu Mới Ở Đây</label>
                        <input type="password" class="form-control" id="passmoi1" name="passmoi1" placeholder="Nhập Mật Lại Khẩu Mới">

                    </div>
                    <div class="form-check">
                        <input type="submit" class="vmt btn " name="doimatkhau" class="doimatkhau">
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
        // if (passcu.value === "") {
        //     alert("Bạn Chưa Nhập Mật Khẩu Cũ");
        //     return false;
        // }
        if (passcu.value === "") {
            alert("Hãy Nhập Mật Khẩu Cũ");
            return false;
        }
        if (newpass.value === "") {
            alert("Hãy Nhập Mật Khẩu Mới");
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