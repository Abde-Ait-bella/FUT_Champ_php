<?php 
  $formatter = new IntlDateFormatter(
      'fr_FR',
      IntlDateFormatter::FULL,
      IntlDateFormatter::NONE
  );
  $formatter->setPattern('EEEE d MMM yyyy');

?>
<nav class="fixed-top bg-slate-800 d-flex d-flex navbar navbar-mini" >
  <div class="d-flex justify-content-end align-items-center navbar-menu-wrapper m-0 px-4 bg-transparent backdrop-blur-sm shadow-sm">
    <button class="align-self-center navbar-toggler navbar-toggler" type="button" data-toggle="minimize">
      <!-- <i class="fa-bars fa-solid"></i> -->
    </button>
    <div class="navbar-brand-wrapper">
      <a class="brand-logo navbar-brand" href="index.html"><img src="./images/logo.png" style="width: 7rem;" alt="logo"/></a>
      <a class="brand-logo-mini navbar-brand" href="index.html"><img src="./images/logo-mini.svg" alt="logo"/></a>
    </div>
    <!-- <h4 class="d-md-block mt-1 mb-0 font-weight-bold d-none">Welcome back, Brandon Haynes</h4> -->
    <ul class="navbar-nav-right navbar-nav">
      <li class="nav-item">
        <h4 class="d-xl-block text-slate-500 text-lg mb-0 font-weight-bold d-none font-bold "><?php echo ucfirst($formatter->format(new DateTime())) ?></h4>
      </li>
    </ul>
    <button class="navbar-toggler-right align-self-center d-lg-none navbar-toggler" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>