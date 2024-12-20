<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="./vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <div class="d-flex">
  <?php
          include (__DIR__ . '/partials/_leftbar.html');
      ?>
        
    <div class="container-fluid page-body-wrapper" style="margin-right:inherit">
      <?php
          include (__DIR__ . '/partials/_navbar.html');
      ?>
      <div class="container-fluid page-body-wrapper" style="margin-right:inherit">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="grid-margin stretch-card col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Line chart</h4>
                  <canvas id="lineChart"></canvas>
                </div>
              </div>
            </div>
            <div class="grid-margin stretch-card col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bar chart</h4>
                  <canvas id="barChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="grid-margin stretch-card col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Area chart</h4>
                  <canvas id="areaChart"></canvas>
                </div>
              </div>
            </div>
            <div class="grid-margin stretch-card col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Doughnut chart</h4>
                  <canvas id="doughnutChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="grid-margin grid-margin-lg-0 stretch-card col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pie chart</h4>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
            <div class="grid-margin grid-margin-lg-0 stretch-card col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Scatter chart</h4>
                  <canvas id="scatterChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                <span class="d-block d-sm-inline-block text-center text-muted text-sm-left">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                <span class="d-block float-sm-right float-none mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
    </div>
  </div>
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <script src="./js/off-canvas.js"></script>
  <script src="./js/hoverable-collapse.js"></script>
  <script src="./js/template.js"></script>
  <script src="./vendors/chart.js/Chart.min.js"></script>
  <script src="./js/chart.js"></script>
</body>

</html>
