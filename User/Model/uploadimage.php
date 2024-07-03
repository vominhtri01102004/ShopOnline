<?php
function uploadImage()
{
    //     $upload = 0;

    $target_dir = "../Admin/Content/imagetourdien/";
    $additional_dir = "../User/Content/imagetourdien/";

    // lấy hình về và để vào trong đường dẫn thiết lập
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $additional_file = $additional_dir . basename($_FILES['image']['name']);

    // lấy phần mở rộng của hình ra
    $imagefileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra xem hình đó có được upload lên server hay không
    $upload = 1;
    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check === false) {
            echo '<script>alert("Tập tin không phải là hình ảnh");</script>';
            return false;
        }
    }

    // // kiểm tra xem hình đó có tồn tại trong thư mục chính chưa
    // if (file_exists($target_file)) {
    //     echo '<script>alert("Hình đã tồn tại trong thư mục chính");</script>';
    // }

    // // kiểm tra xem hình đó có tồn tại trong thư mục bổ sung chưa
    // if (file_exists($additional_file)) {
    //     echo '<script>alert("Hình đã tồn tại trong thư mục phụ");</script>';
    //     return false;

    // }

    // kiểm tra hình có vượt quá dung lượng hay không 500kb = 500000b
    if ($_FILES['image']['size'] > 500000) {
        echo '<script>alert("Hình vượt quá dung lượng cho phép");</script>';
        return false;
    }

    // kiểm tra có phải là hình hay không
    if ($imagefileType != "jpg" && $imagefileType != "png" && $imagefileType != "jpeg" && $imagefileType != "gif") {
        echo '<script>alert("Không phải là định dạng hình ảnh cho phép");</script>';
        return false;
    }

    if ($upload == 1) {
        $primary_upload_successful = true;

        // Nếu tệp không tồn tại trong thư mục chính, cố gắng di chuyển tệp đã tải lên vào thư mục chính
        if (!file_exists($target_file)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                // echo '<script>alert("Upload hình thành công vào thư mục chính");</script>';
                echo '<script>alert("Upload hình thành công");</script>';
            } else {
                echo '<script>alert("Upload hình không thành công vào thư mục chính");</script>';
                $primary_upload_successful = false;
            }
        }

        // Nếu tệp tồn tại trong thư mục chính hoặc di chuyển thành công, cố gắng sao chép tệp vào thư mục bổ sung
        if ($primary_upload_successful) {
            if (copy($target_file, $additional_file)) {
                // echo '<script>alert("Copy hình thành công vào thư mục phụ");</script>';
                return true;
            } else {
                // echo '<script>alert("Copy hình không thành công vào thư mục phụ");</script>';
                return false;
            }
        } else {
            // Nếu di chuyển không thành công, cố gắng di chuyển trực tiếp vào thư mục bổ sung
            if (move_uploaded_file($_FILES['image']['tmp_name'], $additional_file)) {
                // echo '<script>alert("Upload hình thành công vào thư mục phụ");</script>';
                return true;
            } else {
                // echo '<script>alert("Upload hình không thành công vào thư mục phụ");</script>';
                return false;
            }
        }
    } else {
        echo '<script>alert("Upload hình Không thành công");</script>';
        return false;
    }
}
function uploadImagenew()
{
    $target_dir = "../Admin/Content/imagetourdien/";
    $additional_dir = "../User/Content/imagetourdien/";

    // lấy hình về và để vào trong đường dẫn thiết lập
    // $target_file = $target_dir . basename($_FILES['imagenew']['name']);
    // $additional_file = $additional_dir . basename($_FILES['imagenew']['name']);
    $target_file = $target_dir . str_replace(' ', '', basename($_FILES['imagenew']['name']));
    $additional_file = $additional_dir . str_replace(' ', '', basename($_FILES['imagenew']['name']));




    // lấy phần mở rộng của hình ra
    $imagefileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra xem hình đó có được upload lên server hay không
    $upload = 1;
    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['imagenew']['tmp_name']);
        if ($check === false) {
            echo '<script>alert("Tập tin không phải là hình ảnh");</script>';
            return false;
        }
    }

    // // kiểm tra xem hình đó có tồn tại trong thư mục chính chưa
    // if (file_exists($target_file)) {
    //     echo '<script>alert("Hình đã tồn tại trong thư mục chính");</script>';
    // }

    // // kiểm tra xem hình đó có tồn tại trong thư mục bổ sung chưa
    // if (file_exists($additional_file)) {
    //     echo '<script>alert("Hình đã tồn tại trong thư mục phụ");</script>';
    //     return false;

    // }

    // kiểm tra hình có vượt quá dung lượng hay không 500kb = 500000b
    if ($_FILES['imagenew']['size'] > 500000) {
        echo '<script>alert("Hình vượt quá dung lượng cho phép");</script>';
        return false;
    }

    // kiểm tra có phải là hình hay không
    if ($imagefileType != "jpg" && $imagefileType != "png" && $imagefileType != "jpeg" && $imagefileType != "gif") {
        echo '<script>alert("Không phải là định dạng hình ảnh cho phép");</script>';
        return false;
    }

    if ($upload == 1) {
        $primary_upload_successful = true;

        // Nếu tệp không tồn tại trong thư mục chính, cố gắng di chuyển tệp đã tải lên vào thư mục chính
        if (!file_exists($target_file)) {
            if (move_uploaded_file($_FILES['imagenew']['tmp_name'], $target_file)) {
                // echo '<script>alert("Upload hình thành công vào thư mục chính");</script>';
                echo '<script>alert("Upload hình thành công");</script>';
            } else {
                echo '<script>alert("Upload hình không thành công vào thư mục chính");</script>';
                $primary_upload_successful = false;
            }
        }

        // Nếu tệp tồn tại trong thư mục chính hoặc di chuyển thành công, cố gắng sao chép tệp vào thư mục bổ sung
        if ($primary_upload_successful) {
            if (copy($target_file, $additional_file)) {
                // echo '<script>alert("Copy hình thành công vào thư mục phụ");</script>';
                return true;
            } else {
                // echo '<script>alert("Copy hình không thành công vào thư mục phụ");</script>';
                return false;
            }
        } else {
            // Nếu di chuyển không thành công, cố gắng di chuyển trực tiếp vào thư mục bổ sung
            if (move_uploaded_file($_FILES['imagenew']['tmp_name'], $additional_file)) {
                // echo '<script>alert("Upload hình thành công vào thư mục phụ");</script>';
                return true;
            } else {
                // echo '<script>alert("Upload hình không thành công vào thư mục phụ");</script>';
                return false;
            }
        }
    } else {
        echo '<script>alert("Upload hình không thành công");</script>';
        return false;
    }
}
function uploadImagenew1()
{
    $target_dir = "../Admin/Content/imagetourdien/";
    $additional_dir = "../User/Content/imagetourdien/";

    // lấy hình về và để vào trong đường dẫn thiết lập
    // $target_file = $target_dir . basename($_FILES['imagenew']['name']);
    // $additional_file = $additional_dir . basename($_FILES['imagenew']['name']);
    $target_file = $target_dir . str_replace(' ', '', basename($_FILES['imagenew1']['name']));
    $additional_file = $additional_dir . str_replace(' ', '', basename($_FILES['imagenew1']['name']));




    // lấy phần mở rộng của hình ra
    $imagefileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra xem hình đó có được upload lên server hay không
    $upload = 1;
    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['imagenew1']['tmp_name']);
        if ($check === false) {
            echo '<script>alert("Tập tin không phải là hình ảnh");</script>';
            return false;
        }
    }

    // // kiểm tra xem hình đó có tồn tại trong thư mục chính chưa
    // if (file_exists($target_file)) {
    //     echo '<script>alert("Hình đã tồn tại trong thư mục chính");</script>';
    // }

    // // kiểm tra xem hình đó có tồn tại trong thư mục bổ sung chưa
    // if (file_exists($additional_file)) {
    //     echo '<script>alert("Hình đã tồn tại trong thư mục phụ");</script>';
    //     return false;

    // }

    // kiểm tra hình có vượt quá dung lượng hay không 500kb = 500000b
    if ($_FILES['imagenew1']['size'] > 500000) {
        echo '<script>alert("Hình vượt quá dung lượng cho phép");</script>';
        return false;
    }

    // kiểm tra có phải là hình hay không
    if ($imagefileType != "jpg" && $imagefileType != "png" && $imagefileType != "jpeg" && $imagefileType != "gif") {
        echo '<script>alert("Không phải là định dạng hình ảnh cho phép");</script>';
        return false;
    }

    if ($upload == 1) {
        $primary_upload_successful = true;

        // Nếu tệp không tồn tại trong thư mục chính, cố gắng di chuyển tệp đã tải lên vào thư mục chính
        if (!file_exists($target_file)) {
            if (move_uploaded_file($_FILES['imagenew1']['tmp_name'], $target_file)) {
                // echo '<script>alert("Upload hình thành công vào thư mục chính");</script>';
                echo '<script>alert("Upload hình thành công");</script>';
            } else {
                echo '<script>alert("Upload hình không thành công vào thư mục chính");</script>';
                $primary_upload_successful = false;
            }
        }

        // Nếu tệp tồn tại trong thư mục chính hoặc di chuyển thành công, cố gắng sao chép tệp vào thư mục bổ sung
        if ($primary_upload_successful) {
            if (copy($target_file, $additional_file)) {
                // echo '<script>alert("Copy hình thành công vào thư mục phụ");</script>';
                return true;
            } else {
                // echo '<script>alert("Copy hình không thành công vào thư mục phụ");</script>';
                return false;
            }
        } else {
            // Nếu di chuyển không thành công, cố gắng di chuyển trực tiếp vào thư mục bổ sung
            if (move_uploaded_file($_FILES['imagenew1']['tmp_name'], $additional_file)) {
                // echo '<script>alert("Upload hình thành công vào thư mục phụ");</script>';
                return true;
            } else {
                // echo '<script>alert("Upload hình không thành công vào thư mục phụ");</script>';
                return false;
            }
        }
    } else {
        echo '<script>alert("Upload hình không thành công");</script>';
        return false;
    }
}
