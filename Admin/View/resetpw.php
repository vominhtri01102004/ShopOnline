<section class="login-block ">
  <div class="container col-8 float-end">
    <div class="row">
      <div class="col-md-6 login-sec background mt-6 p-5">
        <form action="index.php?action=forget&act=resetpass" class="login-form" method="post">
          <input type="hidden" name="email" value="">
          <p class="mt-4 ">Nhập Mã Code Ở Đây</p>
          <input type="text" autocomplete="off" required class="form-control rounded-10px" name='password'>
          <input type="submit" class="vmt btn" name="submit_password">
        </form>
        <div class="mt-6 d-flex justify-content-center">
          <p class="pe-2" id="luuy"> Lưu Ý Code Chỉ Còn Hiệu Lực Trong: </p>
          <p class="pe-2 d-noneimpt textorange" id="hethan"> Code Đã Hết Hạn, Hãy Lấy Lại Code Mới </p>
          <p id="countdown"></p>
        </div>
        <div class="justify-content-center d-flex">
          <a href="index.php?action=forget" class="col-8">
            <button id="hetgio" class="vmt btn col-12 d-noneimpt bg-rbg" type="button" >
              Lấy Lại Mã Code Mới
            </button>
          </a>
        </div>
      </div>
    </div>
</section>
<script>
 function updateCountdown() {
  let countdownElement = document.getElementById('countdown');
var codeCreationTime = <?php echo ($_SESSION['code_creation_time']); ?>;
var currentTime1 = Math.floor(Date.now() / 1000); // Thời gian hiện tại tính bằng giây
var remainingSeconds = 90 - (currentTime1 - codeCreationTime);
  if (remainingSeconds > 0) {
    countdownElement.textContent = remainingSeconds;
  } else {
    document.getElementById('hetgio').style.display = 'block';
    document.getElementById('hethan').style.display = 'block';
    document.getElementById('luuy').style.display = 'none';
    document.getElementById('countdown').style.display = 'none';
  }
}
// Call updateCountdown every second
setInterval(updateCountdown, 1000);

</script>