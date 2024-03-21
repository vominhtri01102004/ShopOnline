<div class="table-responsive">
	<?php
	if (!isset($_SESSION['makh'])) :
		echo '<script> alert("Bạn Phải Đăng Nhập");</script>';
		echo '<meta  http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
	?>
		<!-- Chỉnh ! -->
	<?php
	else :
	?>
		<form action="" method="post">
			<?php
			if (isset($_SESSION['masohd'])) {
				$masohd = $_SESSION['masohd'];
				$hd = new hoadon();
				$kh = $hd->selectThongTinKH($masohd);
				$tenkh = $kh['tenkh'];
				$username = $kh['username'];
				$email = $kh['email'];
				$ngay = $kh['ngaydat'];
				$dc = $kh['diachi'];
				$sodt = $kh['sodienthoai'];
			?>
				<div class="text">
					<h2 class="test text-xxl-center">THANH TOÁN</h2>
				</div>
				<div class="untree_co-section">
					<div class="container">
						<div class="row">
							<div class="col-md-5 mb-5 mb-md-0">
								<span>
									<h2 class="h3 mb-3 text-black"> Chi Tiết Hóa Đơn</h2><span>
										<div class="p-3 p-lg-5 border bg-white">
											<div class="form-group row">
												<div class="col-md-6">
													<label for="c_lname" class="text-black">Số Hóa Đơn <span class="text-danger"></span></label>
													<input type="text" class="form-control" id="c_lname" name="c_lname" value="<?php echo $masohd; ?>" disabled>
												</div>
												<div class="col-md-6">
													<label for="c_fname" class="text-black">Tên Đăng Nhập <span class="text-danger"></span></label>
													<input type="text" class="form-control" id="c_fname" name="c_fname" value="<?php echo $username; ?>" disabled>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-12">
													<label for="c_fname" class="text-black">Tên Khách Hàng <span class="text-danger"></span></label>
													<input type="text" class="form-control" id="c_fname" name="c_fname" value="<?php echo $tenkh; ?>" disabled>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-12">
													<label for="c_address" class="text-black">Địa Chỉ <span class="text-danger"></span></label>
													<input type="text" class="form-control" id="c_address" name="c_address" value="<?php echo $dc; ?>" disabled>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-12">
													<label for="c_address" class="text-black">Ngày Lập <span class="text-danger"></span></label>
													<input type="text" class="form-control" id="c_address" name="c_address" value="<?php echo $ngay; ?>" disabled>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-12">
													<label for="c_email_address" class="text-black">Email <span class="text-danger"></span></label>
													<input type="text" class="form-control" id="c_email_address" name="c_email_address" value="<?php echo $email; ?>" disabled>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-12">
													<label for="c_phone" class="text-black">Số Điện Thoại <span class="text-danger"></span></label>
													<input type="text" class="form-control" id="c_phone" name="c_phone" value="<?php echo $sodt; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="c_order_notes" class="text-black">Ghi Chú</label>
												<textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Viết Ghi Chú Của Bạn Ở Đây..."></textarea>
											</div>


										</div>
							</div>
							<div class="col-md-7">
								<div class="row mb-5">
									<div class="col-md-12">
										<h2 class="h3 mb-3 text-black">Đơn Hàng Của Bạn</h2>
										<div class="p-3 p-lg-5 border bg-white">
											<table class="table site-block-order-table mb-5">
												<thead>
													<th class="mot">Thông Tin Sản Phẩm</th>
													<th>Size</th>
													<th>Màu</th>
													<th>Số Lượng</th>
													<th>Đơn Giá</th>
													<th>Tổng Cộng</th>
												</thead>
												<tbody>
													<?php
													$sp = $hd->selectThongTinHoaDon($masohd);
													while ($set = $sp->fetch()) :
													?>
														<tr>
															<td><?php echo $set['tenhh']; ?><strong class="mx-2"> </td>
															<td><?php echo $set['size']; ?> </td>
															<td><?php echo $set['mausac']; ?></td>
															<td class="text-xxl-end"><?php echo $set['soluongmua']; ?><strong class="mx-2">x</strong></td>
															<td>
																<?php
																if ($set['giamgia'] > 0) {
																	echo number_format($set['giamgia']);
																}
																if ($set['giamgia']  == 0) {
																	echo number_format($set['dongia']);
																}
																?><strong class="mx-2">=</strong></td>
															<td><?php
																if ($set['giamgia'] > 0) {
																	echo number_format($set['giamgia'] * number_format($set['soluongmua']));
																}
																if ($set['giamgia'] == 0) {
																	echo number_format($set['dongia'] * number_format($set['soluongmua']));
																}
																?></td>
														</tr>
													<?php
													endwhile;
													?>
													<tr>
														<td class="text-black font-weight-bold" colspan="5"><strong>Tổng Tiền</strong></td>

													<?php
													$gh = new giohang();
												}
													?>

													<td class="text-black" colspan="3"><?php echo $gh->getSubTotal(); ?></td>
													</tr>
												</tbody>
											</table>
											<h2 class="h3 mb-3 text-black">Phương Thức Thanh Toán</h2>
											<div class="border p-3 mb-3">
												<h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Thanh Toán Trực Tiếp</a></h3>

												<div class="collapse" id="collapsebank">
													<div class="py-2">
														<p class="mb-0">Bạn có thể thanh toán lúc nhận được hàng.</p>
													</div>
												</div>
											</div>

											<div class="border p-3 mb-3">
												<h3 class="h6 mb-0">
													<a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Ngân Hàng</a>
												</h3>

												<div class="collapse" id="collapsecheque">
													<div class="row">
														<div class="col-6">
															<p class="mb-0">VietComBank: <span><b>1022041034 - VO MINH TRI</b></span></p>
															<img src="Content/imagetourdien/vietcombank.jpg" alt="VietComBank"  class="img-fluid">
														</div>
														<div class="col-6">
															<p class="mb-0">MBank: <span><b>9632111821 - NGUYEN VO HOAI PHONG</b></span></p>
															<img src="Content/imagetourdien/vietcombank.jpg" alt="MBank" class="img-fluid">
														</div>
													</div>
												</div>
											</div>
											<div class="border p-3 mb-3">
												<h3 class="h6 mb-0">
													<a class="d-block" data-bs-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsecheque">Momo</a>
												</h3>

												<div class="collapse" id="collapsepaypal">
													<div class="row">
														<div class="col-6">
															<p class="mb-0"><span><b>0359418684 - Võ Minh Trí</b></span></p>
															<img src="Content/imagetourdien/momo.jpg" alt="VietComBank" class="img-fluidmomo1">
														</div>
														<div class="col-6">
															<p class="mb-0"><span><b>0367752143 - Nguyễn Võ Hoài Phong</b></span></p>
															<img src="Content/imagetourdien/momo.jpg" alt="MBank" class="img-fluidmomo2">
														</div>
													</div>
												</div>
											</div>
											<!-- <div class="border p-3 mb-5">
		                  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Momo</a></h3>

		                  <div class="collapse" id="collapsepaypal">
		                    <div class="py-2">
								<ul>
									<li><p class="mb-"><span ><b>0359418684 - Võ Minh Trí</b></span></p></li>
									<li><p class="mb-"><span ><b>0367752143 - Nguyễn Võ Hoài Phong</b></span></p></li>
								</ul>
							
		                      	
		                    </div>
		                  </div>
		                </div> -->

											<div class="form-group">
												<a href="index.php?action=thankyou&act=thankyou">
													<button class="btn btn-black btn-lg py-3 btn-block" type="button">Đặt Hàng</button>
												</a>
											</div>

										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
		</form>
	<?php
	endif;
	?>
</div>
</div>