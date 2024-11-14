<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php include './views/layouts/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa thông tin sản phẩm : <?= $sanpham['ten_san_pham']; ?> </h1>
                </div>
                <div class="col-sm-3 ">
                    <a href="<?= BASE_URL_ADMIN . '/?act=form-sua-san-pham'; ?>" class="btn btn-primary ">Quay lại</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" class="product-image" alt="Product Image">
                        </div>
                        <!-- <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
              </div> -->
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Tên tác phẩm : <?= $sanpham['ten_san_pham']; ?> </h3>
                        <!-- <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                            aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.
                        </p> -->
                        <hr>
                        <h4 class="mt-3">Giá sách : <small><?= number_format($sanpham['gia_san_pham']); ?><u>đ</u></small></h4>
                        <h4 class="mt-3">Giá khuyến mãi : <small><?= number_format($sanpham['gia_khuyen_mai']); ?><u>đ</u></small></h4>
                        <h4 class="mt-3">Số lượng : <small><?= $sanpham['so_luong']; ?></small></h4>
                        <h4 class="mt-3">Lượt xem : <small><?= $sanpham['luot_xem']; ?></small></h4>
                        <h4 class="mt-3">Ngày nhập : <small><?= $sanpham['ngay_nhap']; ?></small></h4>
                        <h4 class="mt-3">Tên danh mục : <small><?= $sanpham['ten_danh_muc']; ?></small></h4>
                        <h4 class="mt-3">Trạng thái :
                            <small><?= $sanpham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></small>
                        </h4>
                        <h4 class="mt-3">Mô tả : <small><?=  $sanpham['mo_ta']; ?></small></h4>

                    </div>
                </div>
                <!-- <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                href="#binh-luan" role="tab" aria-controls="product-desc" aria-selected="true">Bình luận
                                của sản phẩm</a>

                        </div>
                    </nav> -->
                <!-- <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="binh-luan" role="tabpanel"
                            aria-labelledby="product-desc-tab">
                            <div class="container">
                                
                            </div>

                        </div>
                    </div> -->
                <nav>
                    <div class="nav nav-tabs row mt-4 " id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home"
                            type="button" role="tab" aria-controls="nav-home" aria-selected="true">Bình luận của sản phẩm </button>
                        <!-- <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact"
                            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button> -->
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên người bình luận</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nguyễn Hữu Đan</td>
                                    <td>Sách hay vaiiii</td>
                                    <td>30/7/2024</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                                            <a href="#"><button class="btn btn-danger">Xóa</button></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Nguyễn Hữu Thắng</td>
                                    <td>Sách hay vaiiii</td>
                                    <td>30/7/2024</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                                            <a href="#"><button class="btn btn-danger">Xóa</button></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<?php include './views/layouts/footer.php'; ?>
</body>

</html>