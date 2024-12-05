<div
  class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
  data-wow-delay="0.1s">
  <div class="container py-5">
    <div class="row g-5">
      <div class="col-lg-3 col-md-6">
        <h1 class="fw-bold text-primary mb-4">
          <span class="text-secondary">
            <img class="logo" src="assets/img/z6003126580761_1dc5abb4974c3742684c7118e342bca9.jpg" alt="Image" style="height: 100px;" />
          </span>
        </h1>
        <p>
          Chúng tôi hy vọng sản phẩm của chúng tôi sẽ làm bạn cảm thấy hài lòng và thoải mái hơn.
        </p>
        <div class="d-flex pt-2">
          <a
            class="btn btn-square btn-outline-light rounded-circle me-1"
            href=""><i class="fab fa-twitter"></i></a>
          <a
            class="btn btn-square btn-outline-light rounded-circle me-1"
            href=""><i class="fab fa-facebook-f"></i></a>
          <a
            class="btn btn-square btn-outline-light rounded-circle me-1"
            href=""><i class="fab fa-youtube"></i></a>
          <a
            class="btn btn-square btn-outline-light rounded-circle me-0"
            href=""><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <h4 class="text-light mb-4">Địa chỉ</h4>
        <p>
          <i class="fa fa-map-marker-alt me-3"></i>Trường cao đẳng FPT ,Trịnh Văn Bô, Nam Từ Liêm ,Hà Nội
        </p>
        <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
        <p><i class="fa fa-envelope me-3"></i>superbe@gmail.com</p>
      </div>
      <div class="col-lg-3 col-md-6">
        <h4 class="text-light mb-4">Quick Links</h4>
        <a class="btn btn-link" href="index.php?act=/">Home</a>
        <a class="btn btn-link" href="#">Products</a>
        <a class="btn btn-link" href="contact.html">About Us</a>
      </div>
      <div class="col-lg-3 col-md-6">
        <h4 class="text-light mb-4">Newsletter</h4>
        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
        <div class="position-relative mx-auto" style="max-width: 400px">
          <input
            class="form-control bg-transparent w-100 py-3 ps-4 pe-5"
            type="text"
            placeholder="Your email" />
          <button
            type="button"
            class="btn btn-red py-2 position-absolute top-0 end-0 mt-2 me-2">
            SignUp
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-md-start mb-3 mb-md-0">
          &copy; <a href="#">Your Site Name</a>, All Right Reserved.
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a
  href="#"
  class="btn btn-lg btn-pink btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/web/lib/wow/wow.min.js"></script>
<script src="assets/web/lib/easing/easing.min.js"></script>
<script src="assets/web/lib/waypoints/waypoints.min.js"></script>
<script src="assets/web/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="assets/web/js/main.js"></script>
<script>
  function sortProducts(sortType) {
    const productContainer = document.querySelector('.row.g-4');
    const products = Array.from(productContainer.children);
    
    products.sort((a, b) => {
        const nameA = a.querySelector('.h5.mb-2').textContent;
        const nameB = b.querySelector('.h5.mb-2').textContent;
        
        switch(sortType) {
            case 'az':
                return nameA.localeCompare(nameB, 'vi');
            case 'za':
                return nameB.localeCompare(nameA, 'vi');
            case 'price_asc':
                return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
            case 'price_desc':
                return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
            default:
                return 0;
        }
    });
    
    productContainer.innerHTML = '';
    products.forEach(product => productContainer.appendChild(product));
}

</script>
</body>

</html>