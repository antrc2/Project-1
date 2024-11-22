<?php
include './views/user/components/head.php';
include './views/user/components/nav.php';
include './views/user/components/sideshow.php'
?>


<!-- Product Start -->
<main>
<div class="container d-flex mt-4 pay">
        <!-- Form Wrapper -->
        <div class="container mt-4">
          <form class="needs-validation" name="frmthanhtoan" method="post" action="#">
            <input type="hidden" name="kh_tendangnhap" value="dnpcuong" />
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp pay" data-wow-delay="0.1s" style="max-width: 500px;">
              <h1 class="display-5 mb-3">Thanh toán</h1>
              
          </div>
  
            <div class="row-pay  d-flex">
              <div class="col-md-4 order-md-2 mb-4 mt-3 mx-3  pay-left">
                <div class="pay-con">
                  <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="">Giỏ hàng</span>
                    <span class="badge badge-secondary badge-pill">2</span>
                  </h4>
                  <ul class="list-group mb-3">
                    <input type="hidden" name="sanphamgiohang[1][sp_ma]" value="2" />
                    <input type="hidden" name="sanphamgiohang[1][gia]" value="11800000.00" />
                    <input type="hidden" name="sanphamgiohang[1][soluong]" value="2" />
    
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">Apple Ipad 4 Wifi 16GB</h6>
                        <small class="text-muted">11800000.00 x 2</small>
                      </div>
                      <span class="text-muted">23600000</span>
                    </li>
                    <input type="hidden" name="sanphamgiohang[2][sp_ma]" value="4" />
                    <input type="hidden" name="sanphamgiohang[2][gia]" value="14990000.00" />
                    <input type="hidden" name="sanphamgiohang[2][soluong]" value="8" />
    
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">Apple iPhone 5 16GB White</h6>
                        <small class="text-muted">14990000.00 x 8</small>
                      </div>
                      <span class="text-muted">119920000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                      <span>Tổng thành tiền</span>
                      <strong>143520000</strong>
                    </li>
                  </ul>
    
                  <div class="input-group">
                    <input type="text" class="form-control border-radius" placeholder="Mã khuyến mãi" />
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-red border-right">Xác nhận</button>
                    </div>
                </div>
                </div>
              </div>
              <div class="col-md-8 order-md-1 pay-right">
               <div class="pay-right-one">
                <div class="pay-right-boder">
                  <h4 class="mb-3">Thông tin khách hàng</h4>

              <div class="row">
                <div class="col-md-6 col">
                  <div class="form-floating">
                      <input type="text" class="form-control" id="name" placeholder="Your Name" value=""
                      required >
                      <label for="name">Họ và tên</label>
                  </div>
              </div>
              <div class="col-md-6 col">
                  <div class="form-floating">
                      <input type="address" class="form-control" id="address" placeholder="Address" value=""
                      required>
                      <label for="address">Địa chỉ</label>
                  </div>
              </div>
              <div class="col-md-6 col">
                <div class="form-floating">
                    <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại" value=""
                    required>
                    <label for="sdt">SĐT</label>
                </div>
            </div>
            <div class="col-md-6 col">
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="Your Email" value=""
                    required>
                    <label for="email">Email</label>
                </div>
            </div>
                </div>
            
          </div>
               </div>
                 <br> 
                <div class="pay-right-two">
                  <div class="pay-right-boder">
                    <h4 class="mb-3">Phương thức thanh toán</h4>
  
                <div class="d-block my-3">
                  <div class="custom-control custom-radio pay-boder">
                    <input id="httt-1" name="httt_ma" type="radio" class="custom-control-input" required="" value="1" />
                    <label class="custom-control-label" for="httt-1"> Thanh toán bằng tiền mặt</label>
                  </div>
                  <div class="custom-control custom-radio pay-boder">
                    <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required="" value="2" />
                    <label class="custom-control-label" for="httt-2">Chuyển khoản qua ngân hàng</label>
                  </div>
                  <div class="custom-control custom-radio pay-boder">
                    <input id="httt-3" name="httt_ma" type="radio" class="custom-control-input" required="" value="3" />
                    <label class="custom-control-label" for="httt-3">Ship COD</label>
                  </div>
                </div>
                  </div>
                </div>
                <div class="mb-4 d-flex   btn-block">
                  <button class="btn btn-pink border-radius " type="submit" name="btnhome" href="index.html">Trở về</button>
                <button class="btn btn-pink border-radius " type="submit" name="btnDatHang">Đặt hàng</button>
                </div> 
                
              </div>
            </div>
          </form>
        </div>
                </div>
      </div>
</main>
<!-- Blog End -->

<!-- Footer Start -->
<?php
include './views/user/components/footer.php';
?>