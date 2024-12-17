<?php
     include '../includes/getData.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="d-flex container-scroller">
    <div class="m-0 p-0 proBanner row" id="proBanner">
    </div>

    <?php
        include (__DIR__ . '/partials/_leftbar.html');
    ?>

    <div class="container-fluid page-body-wrapper">
      
    <?php
        include (__DIR__ . '/partials/_navbar.html');
    ?>
      
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="grid-margin stretch-card col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste des joueurs</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Joueur</th>
                          <th>
                            First name
                          </th>
                          <th>
                            position
                          </th>
                          <th>
                            Rating
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <?php while ($row_Players = $result_Players->fetch_assoc()): ?>
                              <?php if ($row_Players > 0) { ?>
                              <td class="py-1">
                                <img src="<?php echo $row_Players['photo']; ?>" alt="image"/>
                              </td>
                              <td>
                                <?php echo $row_Players['player_name']; ?>
                              </td>
                              <td>
                                <?php echo $row_Players['player_position']; ?>
                              </td>
                              <td>
                                <?php echo $row_Players['player_rating']; ?>
                              </td>
                              <td>
                                <a href="<?php echo '../includes/delete.php?id='.$row_Players['player_id']; ?>">
                                  <button
                                      type="button"
                                      class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                      Modifier
                                  </button>
                                </a>
                              </td>
                            <?php }  ?>
                        </tr>
                            <!-- <?php if ($row_Nationality > 0) { ?>
                            <option value="<?php echo $row_Nationality['N_id']; ?>"><?php echo $row_Nationality['N_Name']; ?></option>;

                            <?php } else { ?>
                              <option value="">Aucun joueur sélectionné</option>
                            <?php }  ?> -->
                        <?php endwhile; ?>
<!-- 
                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            <div class="progress">
                              <div class="bg-success progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
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
      </div>
    </div>
  </div>

  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
</body>

</html>