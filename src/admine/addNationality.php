<?php
  include '../DAO/getData.php';
?>

<?php
  include(__DIR__ .'/partials/_header.html');
?>

<div class="d-flex container-scroller">
  <?php
  include(__DIR__ . './partials/_leftbar.html');
  ?>
  <!-- Navbar Top -->
  <div class="container-fluid mt-10 page-body-wrapper" style="margin-right:inherit ; padding-top: 65px; background-color: white !important ">
    <?php
    include(__DIR__ . '/partials/_navbar.html');
    ?>
    <h1 class="text-4xl mt-20 text-gray-900 dark:text-white text-center font-bold	">Ajouter un Nationalité</h1>

    <!-- Formulaire -->

    <?php include './partials/_formNationality.php' ?>

  </div>
</div>

<?php
include(__DIR__ . '/partials/_footer.html');
?>