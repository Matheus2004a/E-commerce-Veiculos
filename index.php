<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Homepage</title>
  <link rel="stylesheet" href="./bootstrap-5.1.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./screens/home/css/style.css">
</head>

<body>
  <a name="top-page"></a>
  <header>
    <a class="brand" href="#">Logomarca</a>
    <nav class="menus">
      <ul>
        <li>
          <a class="active" aria-current="page" href="#">Home</a>
        </li>
        <li>
          <a href="#services">Todos os serviços</a>
        </li>
        <li>
          <a href="#about">Sobre</a>
        </li>
        <li>
          <a href="#contact">Contate - nos</a>
        </li>
        <li>
          <a href="./screens/home/mapa_site.php">Mapa do Site</a>
        </li>
        <li>
          <a href="./screens/login/login.php">Login</a>
        </li>
      </ul>
    </nav>
  </header>


  <main>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <figure>
            <img src="./screens/home/assets/images/mustang.jpg" class="d-block w-100 images" alt="image-carousel">
          </figure>
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <figure>
            <img src="./screens/home/assets/images/audi.jpg" class="d-block w-100 images" alt="image">
          </figure>
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <figure>
            <img src="./screens/home/assets/images/bmw.jpg" class="d-block w-100 images" alt="image-por-do-sol">
          </figure>
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container">
      <section class="section-services" id="services">
        <h2>Serviços</h2>
        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <article>
          <div class="card" style="width: 18rem;">
            <span>
              <i class="fa-solid fa-location-dot"></i>
            </span>
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <span>
              <i class="fa-solid fa-truck"></i>
            </span>
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <span>
              <i class="fa-solid fa-screwdriver-wrench"></i>
            </span>
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </article>
      </section>

      <section class="presentation-system" id="about">
        <h2>Sobre nós</h2>
        <iframe src="https://www.youtube.com/embed/HnykKULVkoc" alt="video-presentation-system" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </section>

      <section class="section-accordions" id="">
        <h2>Dúvidas</h2>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Accordion Item #1
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Accordion Item #2
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Accordion Item #3
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Button return to top page -->
    <a href="#top-page">
      <button class="button-top-page"><i class="fas fa-arrow-up"></i></button>
    </a>
  </main>


  <footer class="footer-blog" id="contact">
    <div class="list-ordenate">
      <h5>Contatos</h5>
      <a href="">Lorem Ipsum</a>
      <a href="">Lorem Ipsum</a>
      <a href="">Lorem Ipsum</a>
    </div>

    <div class="list-ordenate">
      <h5>Suporte</h5>
      <a href="">Lorem Ipsum</a>
      <a href="">Lorem Ipsum</a>
      <a href="">Lorem Ipsum</a>
    </div>

    <div class="list-ordenate">
      <h5>Serviços</h5>
      <a href="">Lorem Ipsum</a>
      <a href="">Lorem Ipsum</a>
      <a href="">Lorem Ipsum</a>
    </div>

    <div class="list-ordenate">
      <h5>Pagamentos</h5>
      <ul>
        <li>
          <figure>
            <img src="./screens/home/assets/svg/american.png" alt="icon-card-american">
          </figure>
        </li>
        <li>
          <figure>
            <img src="./screens/home/assets/svg/paypal.png" alt="icon-card-paypal">
          </figure>
        </li>
        <li>
          <figure>
            <img src="./screens/home/assets/svg/mastercard.png" alt="icon-card-mastercard">
          </figure>
        </li>
        <li>
          <figure>
            <img src="./screens/home/assets/svg/pago.png" alt="icon-card-pago">
          </figure>
        </li>
        <li>
          <figure>
            <img src="./screens/home/assets/svg/boleto.png" alt="icon-card-boleto">
          </figure>
        </li>
      </ul>
    </div>
  </footer>

  <script src="./screens/home/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/51dc1929bd.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>