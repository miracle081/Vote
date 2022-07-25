<?php
  $title = 'Voting | Elelting leaders';
  require_once 'assets/includes/headers.php';
  
?>

<!-- ================== CAROUSEL ================== -->
<section>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" id="now" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" id="now" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" id="now" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" id="now" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/7.jpg" class="d-block carol" alt="img">
            </div>
            <div class="carousel-item">
                <img src="assets/img/2.jpg" class="d-block carol" alt="img">
            </div>
            <div class="carousel-item">
                <img src="assets/img/3.jpg" class="d-block carol" alt="img">
            </div>
            <div class="carousel-item">
                <img src="assets/img/4.jpg" class="d-block carol" alt="img">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<div class="m-4 card shadow p-5 mt-5">
    <h1 class="header">Contact us</h1>
    <div class="d-flex ">
        <div class="pe-5 me-5">
            <p class="content">
                You can contact us with anything related to LEGS. We'll get in touch with you as soon as possible.
            </p>
            <form action="">
                <div class="col form-floating d-flex ms-2">
                    <i class="fa fa-user mt-3" aria-hidden="true"></i>
                    <input required type="text" class="form-control p-3 ms-3" name="fname" id="floatingname"
                        placeholder="First name" aria-label="First name">
                    <label for="floatingname" class="ms-5" id="fifthy">First Name</label>
                </div><br>
                <div class="col form-floating mb-3 d-flex forthrow">
                    <i class="far fa-envelope mt-4 ms-2"></i>
                    <input required type="email" class="form-control w-100 ms-3" id="floatingInput"
                        placeholder="name@example.com" name="email">
                    <label for="floatingInput" class="ms-5" id="fourth">Email address</label>
                </div><br>
                <div class="col form-floating d-flex ms-2 ten">
                    <i class="fas fa-phone mt-3"></i>
                    <input required type="tel" class="form-control p-3 ms-3" id="floatingthings" placeholder="phone"
                        name="phone">
                    <label for="floatingthings" class="ms-5" id="phone">Phone. eg 08166811597</label>
                </div> <br> <br>
                <div class="col form-floating d-flex ms-2 ten">
                    <i class="fas fa-envelope mt-3"></i>
                    <textarea required type="tel" class="form-control p-3 ms-3" id="floatingmessage" placeholder="phone"
                        name="message"></textarea>
                    <label for="floatingmessage" class="ms-5" id="phone">Your message</label>
                </div> <br> <br>
                <button class="nav-link" id="btn">contact us</button>
            </form>
        </div>

        <div class="pe-5">
            <h4 class="header">Find us at the office</h4>
            <p class="content">
                New Beersheba city, J.S Tarka Street, off FCT -UBEB/ Shopping Complex way Area 2, Garki Abuja,<br>
                Nigeria
            </p><br>

            <h4 class="header">Give us a ring</h4>
            <p>
                <a class="content-link" href="tel:08166811697">08166811697</a><br>
                <a class="content-link" href="tel:09045045668">09045045668</a><br>
                <a class="content-link" href="tel:07040678928">07040678928</a>
            </p><br>

            <h4 class="header">Email</h4>
            <p class="content">miracleobafemi09@gmail.com</p>
        </div>
    </div>
</div>
    <script>
        const nav = document.querySelector('nav');
      window.onscroll = ()=>{
        if (window.pageYOffset > 150) {
            nav.classList.add('fixed-top')
            nav.classList.add('bg-dark')
            nav.classList.add('shadow')
        }
        else{
            nav.classList.remove('bg-dark')
            nav.classList.remove('bg-light')
            nav.classList.remove('fixed-top')
        }
      }
    </script>
<!-- FOOTER -->
<?php include_once 'assets/includes/footer.php' ?>