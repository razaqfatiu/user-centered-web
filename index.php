<?php include './layout/header.php' ?>

<main class="container-fluid main">

  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="./public/images/e-commerce-img.png" height="400px" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="./public/images/slide-one.png" height="400px" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="./public/images/slide-two.png" height="400px" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <section>
    <h2 class="text-center m-5">Welcome to Opus Charity Coperation</h2>
    <p class="text-center mb-5">Choose from our various collection </p>

  </section>

  <div class="categories">

    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

        <a href="#">
          <div class="card shadow">
            <img src="https://img.freepik.com/free-photo/shop-clothing-clothes-shop-hanger-modern-shop-boutique_1150-8886.jpg?w=2000" class="card-img-top" alt="...">
            <div class="card-body">
              <h2 class="card-title">Card One</h2>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body card-p">
              <div class="row">
                <div class="col col-xs-4 ">
                  <i class="fa-solid fa-money-check-dollar"></i> 456
                </div>
                <div class="col col-xs-4 ">
                  <i class="far fa-heart"></i> 2.4k
                </div>
                <div class="col col-xs-4">
                  <i class="fa-solid fa-circle-info"></i> more
                </div>
              </div>
            </div>
          </div>
      </div>
      </a>

    </div>

  </div>


</main>

<footer></footer>
</body>

</html>