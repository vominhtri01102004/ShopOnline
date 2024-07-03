	<?php
	if (isset($_GET['action'])) {
		if (!isset($_GET['act'])) {
			$ac = 1;
		} elseif (isset($_GET['act']) && $_GET['act'] == 'tatcavoucher') {
			$ac = 2;
		}
	}
	?>


	<div class="why-choose-section">
		<div class="container">
			<div class="row justify-content-between align-items-center ">
				<div class="col-lg-12">
					<h2 class="section-title text-center mt-4"><?php echo $ac == 1 ? 'Voucher Mới Nhất' : 'Kho Voucher' ?> </h2>
					<div class="row p-5 background1 rounded-30px mh-1000px overflow-auto1">
						<div class="col-12">
							<?php
							$hh = new voucher();
							if (isset($_SESSION['makh'])) {
								$makh = $_SESSION['makh'];
							}
							if ($ac == 1) {
								$result = $hh->selectAllVoucher(); // phân trang
								$result1 = $hh->selectAllVoucher()->rowCount(); // phân trang
							} else {
								$result = $hh->selectAllVouCherDaLuu($makh); // phân trang
								$result1 = $hh->selectAllVouCherDaLuu($makh)->rowCount(); // phân trang
							}
							if ($result1 > 0) {
								while ($set = $result->fetch()) :
									if (isset($_SESSION['makh'])) {
										$kh = $hh->selectVouCherDaLuu($makh, $set['mavoucher']);
										if (!empty($kh)) {
											// Gán giá trị từ $kh vào các biến chỉ khi có dữ liệu
											$mavoucher = $kh['mavoucher'];
											$makh = $kh['makh'];
										} else {
											$mavoucher = 0;
										}
									} ?>
									<div class="border shadow-lg d-flex mt-4 bg-d9d9d9 rounded-30px">
										<div class="col-3 align-content-center rounded-30px <?php echo $set['dungcho'] == 'Hàng Hóa' ? 'bg-rbg3' : 'bg-rbg2' ?> ">
											<div class="col-12 text-center">
												<?php echo $set['dungcho'] == 'Hàng Hóa' ? '<i class="fa-solid fa-shirt fa-2xl mt-3 text-white"></i>'
													: '<i class="fa-solid fa-truck fa-2xl text-white"></i>' ?>
											</div>
										</div>
										<div class="col-9 voucher">
											<div class="col-12">
												<h3 class="text-center pt-4">Giảm
													<?php echo number_format($set['giatri']);
													echo $set['loaivoucher'] == 'Phần Trăm' ? ' %' : ''
													?> Cho
													<?php echo $set['dungcho'];
													?>
												</h3>
											</div>
											<div class="col-12 p-4 pt-0 d-flex">
												<div class="col-6">
													<h5 class="mt-4">Giảm Tối Đa: <?php echo number_format($set['toida']); ?></h5>
													<h5 class="mt-4 text-center">Đơn Tối Thiểu: <?php echo number_format($set['toithieu']); ?></h5>
												</div>
												<!-- <h3>Cho <?php echo $set['dungcho']; ?></h3> -->
												<div class="col-6">
													<h5 class="mt-4">Ngày Bắt Đầu: <?php echo $set['batdau']; ?></h5>
													<h5 class="mt-4 text-center">Ngày Hết Hạn: <?php echo $set['ketthuc']; ?></h5>
												</div>
											</div>
											<div class="text-end p-3 pt-0 d-flex">
												<div class="col-7">
													<?php if ($ac == 1) { ?>
														<h5>Số Lượng Còn Lại: <?php echo $set['soluongvoucher']; ?></h5>
													<?php } ?>
												</div>
												<div class="col-5">
													<?php
													if (isset($_SESSION['makh'])) {
														if ($makh == $_SESSION['makh'] && $mavoucher == $set['mavoucher']) {
															echo $ac == 2 ?
																'<a href="index.php?action=giohang">
														<button class="vmt col-8 border">Sử Dụng Voucher</button>
													</a>' :
																'<a href="index.php?action=voucher&act=tatcavoucher">
														<button class="vmt col-8 border">Đã Lưu</button>
													</a>';
													?>
														<?php
														} else {
														?>
															<a href="index.php?action=voucher&act=luuvoucher&mavoucher=<?php echo $set['mavoucher']; ?>">
																<button class="vmt col-8 border">Lưu Voucher</button>
															</a>
														<?php }
													} else {
														?>
														<a href="index.php?action=dangnhap">
															<button class="vmt col-9 border">Đăng Nhập Để Lưu Voucher</button>
														</a>
													<?php
													}
													?>
												</div>
											</div>
										</div>
									</div>
								<?php
								endwhile;
							} else { ?>
								<div class="text-center">
									<b>Không Có Voucher Để Hiển Thị</b>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>