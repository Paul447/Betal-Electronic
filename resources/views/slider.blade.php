<!-- <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css" /> -->
<!-- <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<head>
   
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");
  
      img.slide {
        height: 75vh;
      }
      .Slidder
      {
        margin-top:20px; 
      }
      .carousel-item{
        z-index: -1;
      }
  
      #demo {
        width: 85%;
      }
    </style>
  </head>
  
 
    <div
      id="demo"
      class="carousel slide Slidder mx-auto justify-content-center"
      data-bs-ride="carousel"
    >
      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#demo"
          data-bs-slide-to="0"
          class="active"
        ></button>
        <button
          type="button"
          data-bs-target="#demo"
          data-bs-slide-to="1"
        ></button>
      </div>
  
      <!-- The slideshow/carousel -->
      <div class="row">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              class="slide"
              src="{{ asset('admin/img/Banner1.png')}}"
              alt=""
              class="d-block"
              height="500"
              width="100%"
            />
            <div class="carousel-caption">
                <h3 class="animate__animated animate__fadeInBottomLeft text-white bg-dark" style="font-family: cursive;">“Enhance your computing experience.”</h3>
                <p style="font-size:18px; font-family: cursive;" class="animate__animated animate__fadeInBottomRight text-white bg-dark">“Affordable and quality accessories for your PC.”</p>
              </div>
          </div>

          <div class="carousel-item">
            <img
              class="slide"
              src="{{ asset('admin/img/avatar.svg')}}"
              alt=""
              class="d-block"
              height="500"
              width="100%"
            />
            <div class="carousel-caption">
                <h3 class="animate__animated animate__fadeInBottomLeft text-white bg-dark" style="font-family: cursive;">“Providing a more efficient computing experience.”</h3>
                <p style="font-size:18px; font-family: cursive;" class="animate__animated animate__fadeInBottomRight text-white bg-dark">“The ultimate gaming accessories.”</p>
              </div>
           </div>

           <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>
    </div>
