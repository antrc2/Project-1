<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Doanh Thu
                    <h2><?php echo number_format($doanhThu['doanhThu']); ?> VNĐ</h2>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    Tổng Đơn Hàng
                    <h2><?php echo $tongDonHang['tongDon']; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    Khách Hàng
                    <h2><?php echo $tongKhachHang['tongKH']; ?></h2>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#tuan">Thống kê tuần</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#thang">Thống kê tháng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#nam">Thống kê năm</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <div id="tuan" class="tab-pane active">
            <div class="card">
                <div class="card-header">
                    <h5>Thống kê 7 ngày gần nhất</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ngày</th>
                                <th>Số đơn hàng</th>
                                <th>Doanh thu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($thongKeTheoTuan)) { ?>
                            <tr>
                                <td><?php echo date('d/m/Y', strtotime($row['ngay'])); ?></td>
                                <td><?php echo $row['soDonHang']; ?></td>
                                <td><?php echo number_format($row['doanhThu']); ?> VNĐ</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="thang" class="tab-pane fade">
            <div class="card">
                <div class="card-header">
                    <h5>Thống kê theo tháng trong năm <?php echo date('Y'); ?></h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tháng</th>
                                <th>Số đơn hàng</th>
                                <th>Doanh thu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($thongKeTheoThang)) { ?>
                            <tr>
                                <td>Tháng <?php echo $row['thang']; ?></td>
                                <td><?php echo $row['soDonHang']; ?></td>
                                <td><?php echo number_format($row['doanhThu']); ?> VNĐ</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="nam" class="tab-pane fade">
            <div class="card">
                <div class="card-header">
                    <h5>Thống kê theo năm</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Năm</th>
                                <th>Số đơn hàng</th>
                                <th>Doanh thu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($thongKeTheoNam)) { ?>
                            <tr>
                                <td>Năm <?php echo $row['nam']; ?></td>
                                <td><?php echo $row['soDonHang']; ?></td>
                                <td><?php echo number_format($row['doanhThu']); ?> VNĐ</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Sản Phẩm Bán Chạy Nhất</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng Đã Bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($sp = mysqli_fetch_assoc($sanPhamBanChay)) { ?>
                            <tr>
                                <td><?php echo $sp['tenSP']; ?></td>
                                <td><?php echo $sp['daBan']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
