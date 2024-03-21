<section id="examples" class="text-center">
	<div class="product-section">
		<div class="container">
			<H2 class="text">Sản Phẩm Mới</H2>
			<div class="row">
				<a href="index.php?action=sanpham" class="xem">
					<span class="xemchitiet">Xem chi tiết</span>
				</a>
				<?php
				$hh = new hanghoa();
				$result = $hh->getHangHoaNew();
				while ($set = $result->fetch()) :
				?>
					<?php
					$ac = 1;

					if ($set['giamgia'] != 0) {
						$ac = 2;
					} else {
						$ac = 1;
					}

					?>
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0 sanphamhome">
						<a class="product-item" href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
							<img src=Content/imagetourdien/<?php echo $set['hinh']; ?> class="img-fluid product-thumbnail">
							<h3 class="product-title"><?php echo $set['tenhh']; ?></h3>
							<?php
							if ($ac == 1) {
								echo ' <strong class="product-price">' . (number_format($set['dongia'])) . '</strong> ';
							}
							if ($ac == 2) {
								echo ' <strong class="product-price">' . (number_format($set['giamgia'])) . '</strong> ';
								echo ' <strike class="strikehome"><strong class="product-pricemau">' . (number_format($set['dongia'])) . '</strong></strike>';
							}
							?>
							<span class="icon-cross">
								<img src="Content/imagetourdien/cross.svg" class="img-fluid">
							</span>
							<br>
							<span class="viewslx">Số lượt xem <?php echo $set['soluotxem']; ?></span>
							<?php
							if ($set['soluongton'] > 0) {
								echo '<span class="viewslt">Tồn Kho ' . ($set['soluongton']) . '</span>';
							}
							if ($set['soluongton'] <= 0) {
								echo '<span class="viewslt">Hết Hàng</span>';
							}
							?>
						</a>
					</div>
					<!-- End Column 4 -->
				<?php
				endwhile;
				?>
			</div>
		</div>
	</div>
	<!-- end san pham moi nhat -->

	<div class="product-section">
		<div class="container">
			<H2 class="textggia">Sản Phẩm Khuyến Mãi</H2>
			<div class="row">
				<a href="index.php?action=sanpham&act=sanphamkhuyenmai">
					<span class="xemchitit">Xem chi tiết</span>
				</a>
				<?php
				$hh = new hanghoa();
				$result = $hh->getHangHoaSale();
				while ($set = $result->fetch()) :
				?>
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0 sanphamhome">
						<a class="product-item" href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
							<img src=Content/imagetourdien/<?php echo $set['hinh']; ?> class="img-fluid product-thumbnail">
							<h3 class="product-title"><?php echo $set['tenhh']; ?></h3>
							<strong class="product-price"><?php echo number_format($set['giamgia']); ?></strong>
							<strike class="strikehome"><strong class="product-pricemau"><?php echo number_format($set['dongia']); ?></strong></strike>
							<span class="icon-cross">
								<img src="Content/imagetourdien/cross.svg" class="img-fluid">
							</span><br>
							<span class="viewslx">Số lượt xem <?php echo $set['soluotxem']; ?></span>
							<?php
							if ($set['soluongton'] > 0) {
								echo '<span class="viewslt">Tồn Kho ' . ($set['soluongton']) . '</span>';
							}
							if ($set['soluongton'] <= 0) {
								echo '<span class="viewslt">Hết Hàng</span>';
							}
							?>
						</a>
					</div>
					<!-- End Column 4 -->
				<?php
				endwhile;
				?>
			</div>
		</div>
	</div>
</section>