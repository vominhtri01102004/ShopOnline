<style>
	body {
		background-color: #F2F2F2;
	}
</style>
<div class="table-responsive">
	<?php
	$gh = new giohang();
	$giohang = $gh->getGioHang($_SESSION['makh'])->rowcount();

	if ($giohang == 0) {
		echo '<script> alert("Giỏ Hàng Của Bạn Trống");</script>';
		echo '<meta  http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
	}
	if (!isset($_SESSION['makh'])) :
		echo '<script> alert("Bạn Phải Đăng Nhập");</script>';
		echo '<meta  http-equiv="refresh" content="0;url=./inFdex.php?action=dangnhap"/>';
	?>
	<?php
	else :
	?>
		<form action="index.php?action=thanhtoan&act=thanhtoan_action" method="post">
			<?php
			$date = new DateTime('now');
			$ngay = $date->format('Y-m-d');
			// $ngay = $ngaymua;
			if (isset($_SESSION['makh'])) {

				$makh = $_SESSION['makh'];
				$hd = new hoadon();
				$us = new user();
				$kh = $hd->selectSHD();
				$masohd = $kh['masohd'];
				$kh = $us->getUser($makh);
				$email = $kh['email'];
				$username = $kh['username'];
				if ($kh['datho'] != 0) {
					$dh = $us->selectDiaChiId($makh, $kh['datho']);
					$stt = $dh['stt'];
					if ($dh['tenkh'] == '' && $dh['sodienthoai'] == '') {
						$dc = $dh['diachi'];
						$tenkh = $kh['tenkh'];
						$sodt = $kh['sodienthoai'];
					} else {
						$dc = $dh['diachi'];
						$tenkh = $dh['tenkh'];
						$sodt = $dh['sodienthoai'];
					}
				} else {
					$dc = $kh['diachi'];
					$tenkh = $kh['tenkh'];
					$sodt = $kh['sodienthoai'];
				}
				$gh = new giohang();
				$tongtien = $gh->getSubTotal();
				$total = str_replace(',', '', $tongtien);

				$vc = new voucher();
				$kh = $vc->selectVoucherDangSuDung($makh);
				$mavoucher = $kh['mavoucher'];
				$ship = $vc->selectShipDangSuDung($makh);
				$idship = $ship['idship'];

				$kh = $vc->selectVouCherSuDung($mavoucher);
				if (!empty($kh)) {
					$loaivoucher = $kh['loaivoucher'];
					$dungcho = $kh['dungcho'];
					$toida = $kh['toida'];
					$toithieu = $kh['toithieu'];
					$giatri = $kh['giatri'];



					if ($dungcho == 'Hàng Hóa') {

						if ($loaivoucher == 'VND') {
							$giatri = $total - $giatri;
						}
						if ($loaivoucher == 'Phần Trăm') {
							$giatri = $total * ($giatri / 100);
						}
						if ($giatri > $toida) {
							$giatri = $toida;
						}

						$giatri = ceil($giatri / 1000) * 1000;
						$total = $total - $giatri;
					}
				} else {
					$mavoucher = 0;
					$dungcho = '';
					$giatri = 0;
				}


				$ship1 = $vc->selectShipSuDung($idship);
				if (!empty($ship1)) {
					$giaship = $ship1['gia'];
					$phivanchuyen = $ship1['gia'];
					$tienship = $ship1['gia'];


					if ($dungcho == 'Ship Hàng') {

						if ($loaivoucher == 'Phần Trăm') {
							$giatri = $phivanchuyen * ($giatri / 100);
						}
						if ($giatri > $toida) {
							$tienship = 0;
							$giatri = $toida;
						}
						if ($giatri > $phivanchuyen) {
							$tienship = 0;
							$giatri = $phivanchuyen;
						}
						if ($giatri > $phivanchuyen) {
							$giatri = $phivanchuyen;
						}
						// $giatri =$giaship;
						$tienship = $phivanchuyen - $giatri;
						if ($loaivoucher == 'VND') {
							$tienship = $phivanchuyen - $giatri;
						}
						if ($giatri > $phivanchuyen) {
							$tienship = 0;
							$giatri = $phivanchuyen;
						}
						$giatri = ceil($giatri / 1000) * 1000;
					}
				} else {
					$idship = 0;
					$tienship = 0;
					$phivanchuyen = 0;
				}

				$tongtienship = $total + $tienship;
				$tongtienship = ceil($tongtienship / 1000) * 1000;
				if ($tongtienship < 0) {
					$tongtienship = 0;
				}
			?>
				<input type="hidden" name="tenkh" value="<?php echo $tenkh; ?>">
				<input type="hidden" name="sodt" value="<?php echo $sodt; ?>">
				<input type="hidden" name="diachi" value="<?php echo $dc; ?>">
				<input type="hidden" name="mavoucher" value="<?php echo $mavoucher; ?>">
				<input type="hidden" name="idship" value="<?php echo $idship; ?>">
				<input type="hidden" name="tienship" value="<?php echo $phivanchuyen; ?>">
				<input type="hidden" name="giatri" value="<?php echo $giatri; ?>">
				<input type="hidden" name="dungcho" value="<?php echo $dungcho; ?>">
				<input type="hidden" name="tongtien" value="<?php echo $tongtienship; ?>">
				<div class="untree_co-section">
					<div class="container">
						<div class="row">
							<div class="col-md-2 mt-4">
								<div class="nav-item dropdown text-start col-12 mw-210px">
									<a class="nav-link dropdown-toggle text-dark" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thay Đổi Thông Tin</a>
									<div class="dropdown-menu rounded-20px ps-1 pe-1" aria-labelledby="dropdownId">
										<h5><a class="dropdown-item" href="index.php?action=user&act=diachimoi&makh=<?php echo $makh . '&tenkh=' . $tenkh . '&sdt=' . $sodt . '&diachi=' . $dc . '' ?>">Thêm Địa Chỉ Mới ?</a></h5>
										<h5><a class="dropdown-item" href="index.php?action=user&act=datho&makh=<?php echo $makh . '&tenkh=' . $tenkh . '&sdt=' . $sodt . '&diachi=' . $dc . '' ?>">Đặt Hộ ?</a></h5>
										<?php
										$user = new user();
										$result = $user->selectAllDiaChi($makh);
										while ($set = $result->fetch()) :
										?>
											<div class="d-flex">
												<h5 class="col-10"><a class="dropdown-item" href="index.php?action=user&act=sudungdiachimoi&id=<?php echo $set['stt'] ?>"><?php echo  strlen($set['diachi']) > 16 ? substr($set['diachi'], 0, 16) . '..' : $set['diachi'] ?></a></h5>
												<a class="col-2 text-center" href="index.php?action=user&act=xoathongtin&id=<?php echo $set['stt'] ?>"><i class="fa-regular fa-circle-xmark fa-xm"></i></a>
											</div>
										<?php endwhile; ?>
										<?php
										$i = 0;
										$user = new user();
										$result = $user->selectAllDatHo($makh);
										while ($set = $result->fetch()) :
											$i++;
										?>
											<div class="d-flex">
												<h5 class="col-10"><a class="dropdown-item" href="index.php?action=user&act=sudungdatho&id=<?php echo $set['stt'] ?>"><?php echo  strlen($set['tenkh']) > 16 ? substr('Kh' . $i . ': ' . $set['tenkh'], 0, 16) . '..' : 'Kh' . $i . ': ' . $set['tenkh'] ?></a></h5>
												<a class="col-2 text-center" href="index.php?action=user&act=xoathongtin&id=<?php echo $set['stt'] ?>"><i class="fa-regular fa-circle-xmark fa-xm"></i></a>
											</div>
										<?php endwhile; ?>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										<h2 class="mb-3 text-black text-center">Thông Tin Người Dùng</h2>
										<div class="p-4 p-lg-5 border bg-white rounded-20px">
											<table class="table site-block-order-table mb-5">
												<thead>
													<tr>
														<th class="fw-500">Số Hóa Đơn </th>
														<th class="fw-500">Tên Khách Hàng</th>
														<th class="fw-500">Ngày Lập</th>
														<th class="fw-500">Số Điện Thoại</th>
														<th class="fw-500 text-center">Email</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php echo ($masohd + 1); ?></td>
														<td><?php echo $tenkh; ?></td>
														<td><?php echo $ngay; ?></td>
														<td><?php echo $sodt; ?></td>
														<td><?php echo $email; ?></td>
													</tr>
												</tbody>
											</table>
											<div class="text-break d-flex">
												<h6 class="place-self-center m-0">Địa Chỉ: </h6> <?php echo $dc ?>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex mt-2">
							<div class="d-flex col-6">
								<h2 class="text-black mt-1 mb-2">Mã Giảm Giá</h2>
								<p class="mb-0 align-items-center d-flex">(Chỉ Được Sử Dụng 1 Mã Giảm Giá)</p>
							</div>
							<div class="col-6">
								<h2 class="text-black mt-1 mb-2 text-end">Chọn Loại Ship</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-12">
										<div class="p-5 pt-1 border bg-white rounded-20px voucherorder mh-258px align-content-center">
											<?php
											$hh = new voucher();
											$count = $hh->selectAllVouCherDaLuu($makh)->rowCount();
											if ($count == 0) {
												echo '<div class="text-center "><h5>Voucher Trống</H5></div>';
											}
											$makh = $_SESSION['makh'];
											$result = $hh->selectAllVouCherDaLuu($makh); // phân trang
											while ($set = $result->fetch()) : ?>
												<div class="border d-flex mt-4 shadow-sx p-4 voucher <?php echo $total < $set['toithieu'] ? 'toithieu' : '' ?> ">
													<div class="col-3 align-content-center rounded-20px <?php echo $set['dungcho'] == 'Hàng Hóa' ? 'bg-rbg3' : 'bg-rbg2' ?> ">
														<div class="col-12 text-center">
															<?php echo $set['dungcho'] == 'Hàng Hóa' ? '  <i class="fa-solid fa-shirt fa-2xl mt-3 text-white"></i>'
																: '<i class="fa-solid fa-truck fa-2xl text-white"></i>' ?>
														</div>
													</div>
													<div class="col-9 voucher p-3">
														<div class="col-12 d-flex">
															<div class="col-6">
																<b class="">Giảm
																	<?php echo number_format($set['giatri']);
																	echo ($set['loaivoucher']) == 'Phần Trăm' ? ' %' : ''
																	?> Cho
																	<?php echo $set['dungcho'];
																	?>
																</b>
																<h6 class="">Đơn Tối Thiểu: <?php echo number_format($set['toithieu']); ?></h6>
																<?php if ($set['loaivoucher'] == 'Phần Trăm') { ?>
																	<h6 class="">Giảm Tối Đa: <?php echo number_format($set['toida']); ?></h6>
																<?php } ?>
															</div>
															<div class="col-6">
																<div class="col-6">
																	<h6 class="">HSD: <?php echo $set['ketthuc']; ?></h6>
																</div>

																<?php if ($mavoucher == $set['mavoucher']) { ?>
																	<div class="col-12 text-end">
																		<a>
																			<button type="button" class="btn vmt col-md-12 my-sm-0 bg-c7c6c6 bordernone">
																				Voucher Đang Được Sử Dụng
																			</button>
																		</a>
																	</div>
																<?php
																} else {
																?>
																	<div class="col-12 text-center">
																		<a href="index.php?action=voucher&act=sudungvoucher&mavoucher=<?php echo $set['mavoucher']; ?>">
																			<button type="button" class="btn vmt col-md-12 my-sm-0 bg-c7c6c6 bordernone">
																				Sử Dụng Voucher
																			</button>
																		</a>
																	</div>
																<?php
																}
																?>
															</div>
														</div>
														<div class="col-12 text-start fw-bold mt-0">
															<?php echo $total < $set['toithieu'] ? 'Đặt Thêm ' . number_format($set['toithieu'] - $total) . ' Để Sử Dụng Voucher Này' : ''; ?>
														</div>
													</div>
												</div>
											<?php
											endwhile;
											?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="row mb-2 ">
									<div class="col-md-12">
										<div class="p-lg-3 border bg-white rounded-20px h250px overflow-auto">
											<div class="row">
												<?php
												$loai = new voucher();
												$result = $loai->selectAllShip();
												while ($set = $result->fetch()) : ?>
													<div class="p-2 mb-1">
														<div class="d-flex">
															<div class="col-6">
																<?php echo $set['tenship']; ?>
															</div>
															<div class="col-6">
																<?php echo number_format($set['gia']); ?>
															</div>
														</div>
														<?php if ($idship == $set['idship']) { ?>
															<a href="index.php?action=voucher&act=sudungship&idship=<?php echo $set['idship']; ?>">
																<button class="btn vmt col-md-8 my-sm-0 bg-rbg1 bordernone" type="button">Đang Sử Dụng</button>
															</a>
														<?php } else { ?>
															<a href="index.php?action=voucher&act=sudungship&idship=<?php echo $set['idship']; ?>">
																<button class="btn vmt col-md-8 my-sm-0 bg-rbg3 bordernone" type="button">Sử Dụng</button>
															</a>
														<?php } ?>
													</div>
												<?php endwhile; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="d-flex mt-4">
							<div class="col-12">
								<h2 class="mb-3 text-black text-center">Đơn Hàng Của Bạn</h2>
							</div>
						</div>
						<div class="row">

							<!-- <div class="col-md-2">
							</div> -->
							<div class="col-md-12">
								<div class="row mb-5">
									<div class="col-md-12">
										<div class="p-3 p-lg-5 border bg-white rounded-20px">
											<table class="table site-block-order-table mb-5">
												<thead>
													<th class="fw-500">Thông Tin Sản Phẩm</th>
													<th class="fw-500">Size</th>
													<th class="fw-500">Màu</th>
													<th class="fw-500">Số Lượng</th>
													<th class="fw-500">Đơn Giá</th>
													<th class="fw-500">Tổng Cộng</th>
												</thead>
												<tbody>
													<?php
													$gh = new giohang();
													$giohang = $gh->getGioHang($makh);
													foreach ($giohang as $key => $item) :
													?>
														<tr>
															<td><?php echo $item['tenhh']; ?></td>
															<td class="text-center"><?php echo $item['size']; ?> </td>
															<td><?php echo $item['mausac']; ?></td>
															<td class="text-center"><strong class="me-sm-2">x</strong><?php echo $item['soluongmua']; ?></td>
															<td>
																<?php
																if ($item['giamgia'] > 0) {
																	echo number_format($item['giamgia']);
																}
																if ($item['giamgia']  == 0) {
																	echo number_format($item['dongia']);
																}
																?><strong class="ms-2">=</strong></td>
															<td class="fw-normal">
																<?php
																if ($item['giamgia'] > 0) {
																	echo number_format($item['giamgia'] * number_format($item['soluongmua']));
																}
																if ($item['giamgia'] == 0) {
																	echo number_format($item['dongia'] * number_format($item['soluongmua']));
																}
																?>
															</td>

														</tr>
													<?php
													endforeach;
													?>
													<tr>
														<td class="text-black" colspan="5" id="phivanchuyen"><strong>Phí Vận Chuyển</strong></td>
														<td><?php echo $phivanchuyen != 0 ? number_format($phivanchuyen) : 'Hãy Chọn Loại Ship'; ?></td>
													</tr>
													<?php if ($mavoucher != 0) { ?>
														<tr>
															<td class="text-black" colspan="5"><strong>Giảm Giá Cho <?php echo $dungcho ?></strong></td>
															<td>- <?php echo number_format($giatri) ?></td>
														</tr>
													<?php } ?>
													<tr>
														<td class="text-black" colspan="5"><strong>Tổng Tiền</strong></td>
													<?php
												}
													?>
													<td class="text-black fw-500" colspan="3"><?php echo number_format($tongtienship) ?></td>
													</tr>
												</tbody>
											</table>
											<div class="form-group d-flex">
												<div class="col-3 text-center align-content-center">
													<button class="btn btn-black btn-lg py-3 btn-block" name="submit" type="submit">Đặt Hàng</button>
												</div>
												<div class="col-9">
													<div class="col-12 text-center mt-17px">
														<p class="mb-0">Ghi Chú Cho Đơn Hàng Của Bạn</p>
													</div>
													<div class="col-12 text-center">
														<input class="col-12 form-control text-center" placeholder="Ghi Chú Cho Đơn Hàng" autocomplete="off" name="ghichu" type="text">
													</div>
												</div>
											</div>
										</div>
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
<!-- <script>
	document.addEventListener("DOMContentLoaded", function() {
		// Bắt sự kiện thay đổi của dropdown
		var dropdown = document.querySelector('select[name="idship"]');
		dropdown.addEventListener('change', function() {
			// Lấy giá trị đã chọn
			var selectedOption = dropdown.options[dropdown.selectedIndex];
			var shippingCost = selectedOption.dataset.gia; // Giả sử bạn đặt giá trị cho thuộc tính data-gia trong thẻ option

			var $tong = shippingCost;
			// Cập nhật giá trị của phí vận chuyển
			var shippingFeeCell = document.querySelector('td[id="phivanchuyen"]');
			shippingFeeCell.nextElementSibling.textContent = shippingCost;

		});
	});
</script> -->