<?php
if (isset($_GET['id'])) {
    $mahh = $_GET['id'];
    // truy vấn thông tin của id
    $hh = new hanghoa();
    $kq = $hh->getHangHoaID($mahh);
    $tenhh = $kq['tenhh'];
    $tenloai = $kq['tenloai'];
    $maloai = $kq['maloai'];
    $mota = $kq['mota'];
}
?>
<div class="col-12 mt-5">
    <?php
    $ac = 1;
    if (isset($_GET['action'])) {
        if (isset($_GET['act']) && $_GET['act'] == 'insert_hanghoa') {
            $ac = 1;
            echo '<div class="d-flex">
                <div class="col-2">
                    <a href="index.php?action=home">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </div>
                <div class="col-8">
                    <h1 class="text-center">Thêm Sản Phẩm Mới</h1>
                </div>
            </div>';
        } else {
            $ac = 2;
            echo '<div class="d-flex">
                <div class="col-2">
                    <a href="index.php?action=home">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </div>
                <div class="col-8">
                    <h1 class="text-center">Chỉnh Sửa Sản Phẩm</h1>
                </div>
            </div>';
        }
    }
    ?>
    <div class="d-flex col-md-12  mt-5 placecontentcenter mb-5">
        <?php
        if ($ac == 1) {
            echo '<form action="index.php?action=hanghoa&act=insert_action" method="post" enctype="multipart/form-data" class="col-md-12 background p-5">';
        } else {
            echo '<form action="index.php?action=hanghoa&act=update_action" method="post" enctype="multipart/form-data" class="col-md-12 background p-5">';
        }
        ?>

        <table class="table table-hover bordernone">

            <?php
            if ($ac == 2) {
            ?>
                <tr>
                    <td>Mã Hàng</td>
                    <td> <input type="text" class="form-control color-cell" required name="mahh" value="<?php if (isset($mahh)) echo $mahh; ?>" readonly /></td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td>Mã Hàng</td>
                    <td> <input type="text" class="form-control color-cell" required name="mahh" value="" readonly /></td>
                </tr>
            <?php } ?>
            <tr>
            <tr>
                <td>Tên Hàng Hóa</td>
                <td> <input type="text" class="form-control color-cell" autocomplete="off" required name="tenhh" value="<?php if (isset($tenhh)) echo $tenhh; ?>" /></td>
            </tr>
            <td>Mã loại</td>
            <td>
                <select name="maloai" class="form-control color-cell w-150px" required>
                    <option value="">- Chọn một loại -</option>
                    <?php
                    $selectloai = -1;
                    if (isset($maloai) && $maloai != -1) {
                        $selectloai = $maloai; //6
                    }
                    $loai = new loai();
                    $result = $loai->getLoai();
                    while ($set = $result->fetch()) :
                    ?>
                        <option value="<?php echo $set['maloai'] ?>
                        " <?php if ($selectloai == $set['maloai'])
                                echo 'selected'; ?>>
                            <?php echo $set['tenloai']; ?>
                        </option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </td>
            </tr>
            <tr>
                <td>Mô Tả</td>
                <td><textarea id="textarea" class="w-100 mh300" name="mota"><?php echo isset($mota) ? $mota : ''; ?></textarea></td>
            </tr>
        </table>
        <div class="col-12  text-center">

            <input class="btn btn-primary col-8 submit" type="submit" value="Xong">
        </div>
        </form>
    </div>
</div>
<!-- Place the first <script> tag in your HTML's <head> -->
<!-- <script src="https://cdn.tiny.cloud/1/5drzlle8kyxd7vxwctef9eo6ky1geilsx9pyit1cgbq72689/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        height: 700,
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
</script> -->
<!-- <textarea>
  Welcome to TinyMCE!
</textarea> -->