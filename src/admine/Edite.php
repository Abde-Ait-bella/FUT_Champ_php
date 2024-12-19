<?php
      include(__DIR__.'/partials/_header.html');
?>

  <div class="d-flex container-scroller">
 
    <?php
      include(__DIR__.'/../admine/partials/_leftbar.html');
    ?>

    <!-- Navbar Top -->
    <div class="container-fluid page-body-wrapper">
      <nav class="d-flex flex-row px-0 py-0 py-lg-4 col-12 col-lg-12 navbar" style="height: inherit">
        <div class="d-flex justify-content-end align-items-center navbar-menu-wrapper">
          <button class="align-self-center navbar-toggler navbar-toggler" type="button" data-toggle="minimize">
            <i class="fa-bars fa-solid"></i>
          </button>
          <div class="navbar-brand-wrapper">
            <a class="brand-logo navbar-brand" href="index.html"><img src="./images/logo.png" style="width: 7rem;" alt="logo" /></a>
            <a class="brand-logo-mini navbar-brand" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
          </div>
          <h4 class="d-md-block mt-1 mb-0 font-weight-bold d-none">Welcome back, Brandon Haynes</h4>
          <ul class="navbar-nav-right navbar-nav">
            <li class="nav-item">
              <h4 class="d-xl-block mb-0 font-weight-bold d-none">Mar 12, 2019 - Apr 10, 2019</h4>
            </li>
          </ul>
          <button class="navbar-toggler-right align-self-center d-lg-none navbar-toggler" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- Formulaire -->
      <div id="form" class="justify-center gap-3 grid py-5 p-3 transition-all duration-300 ease-in-out">
        <form class="z-10 gap-3 grid w-80 max-w-sm transition-all duration-300 ease-in-out"
          onsubmit="handleSubmit(event)"
          method="POST"
          enctype="multipart/form-data"
          action="../DAO/addData.php"
          >

          <?php include(__DIR__.'/../admine/partials/_form.php') ?>

          <div class="md:flex md:items-center">
            <div class="md:w-2/3">
              <button id="add_button"
                class="bg-slate-600 hover:bg-slate-400 shadow focus:shadow-outline px-4 py-2 rounded font-bold text-slate-900 text-white focus:outline-none"
                type="submit">
                Modifier
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
  </div>
 
  
  <?php
      include(__DIR__.'/partials/_footer.html');
  ?>