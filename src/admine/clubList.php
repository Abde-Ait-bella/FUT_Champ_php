<?php
     include '../DAO/getData.php';
?>

<?php
      include(__DIR__.'/partials/_header.html');
?>

  <div class="d-flex container-scroller">

    <?php
        include (__DIR__ . '/partials/_leftbar.html');
    ?>

    <div class="container-fluid page-body-wrapper" style="margin-right:inherit">
      
    <?php
        include (__DIR__ . '/partials/_navbar.html');
    ?>
      
      <div class="main-panel">
        <div class="p-8 flex justify-end">
          <a href="<?php echo '../admine/addClub.php' ?>">
            <button
                type="button"
                class="inline-block text-sm	 rounded-md bg-cyan-600	ms-4 px-6 pb-2 pt-2.5 font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                ajouter un club
            </button>
          </a>
          <!-- <a href="<?php echo '../admine/editePlayer.php?id='.$row_Club['team_id']; ?>">
            <button
                type="button"
                class="inline-block text-sm rounded-md bg-cyan-600	ms-4 px-6 pb-2 pt-2.5 font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                ajouter un club
            </button>
          </a>
          <a href="<?php echo '../admine/editePlayer.php?id='.$row_Club['team_id']; ?>">
            <button
                type="button"
                class="inline-block text-sm rounded-md bg-cyan-600	ms-4 px-6 pb-2 pt-2.5 font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                ajouter une Nationalité
            </button>
          </a> -->
        </div>
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
                        <th colspan="2"> Club </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php while ($row_Club = mysqli_fetch_assoc($result_Club)): ?>
                            <tr>
                              <?php if ($row_Club > 0) { ?>
                              <td class="py-1">
                                <img src="<?php echo $row_Club['team_image']; ?>" alt="image"/>
                              </td>
                              <td>
                                <?php echo $row_Club['team_name']; ?>
                              </td>
                              <td>
                                <a href="<?php echo '../DAO/delete.php?id='.$row_Club['team_id'].'&table=teams'.'&column=team_id'; ?>">
                                  <button
                                      type="button"
                                      class="inline-block rounded-md bg-red-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                      <i class="fa-solid fa-trash"></i>
                                  </button>
                                </a>

                                <a href="<?php echo '../admine/editeClub.php?id='.$row_Club['team_id'].'&table=teams'; ?>">
                                  <button
                                      type="button"
                                      class="inline-block rounded-md bg-cyan-600	ms-4 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                      <i class="fa-solid fa-wrench"></i>
                                  </button>
                                </a>
                            </td>
                                <?php }  ?>

                            </tr>
                            <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                <span class="d-block d-sm-inline-block text-center text-muted text-sm-left">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                <span class="d-block float-sm-right float-none mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
              </div>
            </div>
          </div>
        </footer> -->
      </div>
    </div>
  </div>

  <?php
      include(__DIR__.'/partials/_footer.html');
  ?>