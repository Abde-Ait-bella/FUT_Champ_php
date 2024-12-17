<?php
        include '../includes/database.php';

        if (!$conn) {
          die("Échec de la connexion : " . mysqli_connect_error());
        }

        $sql_Nationality = "SELECT * FROM nationality";
        $sql_Club = "SELECT * FROM teams";

        $result_Nationality = $conn->query($sql_Nationality);
        $result_Club = $conn->query($sql_Club);

        $row_Nationality = $result_Nationality->fetch_assoc();
        $row_Club = $result_Club->fetch_assoc();
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link href="../output.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" href="./images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="d-flex container-scroller">
 
    <?php
      include './partials/_leftbar.html';
    ?>
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
          action="../includes/addData.php"
          >
          <div class="md:flex md:items-center">
            <div class="md:w-1/3">
            </div>
            <div class="md:w-2/3">
              <select onchange="toggleForm(event)"
                class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-slate-950 leading-tight appearance-none focus:outline-none"
                name="position" id="">
                <option class="text-gray-400" value="">Poste de joueur</option>
                <option class="text-gray-400" value="GK">GK</option>
                <option class="text-gray-950" value="CB">CB</option>
                <option class="text-gray-950" value="LB">LB</option>
                <option class="text-gray-950" value="RB">RB</option>
                <option class="text-gray-950" value="CM">CM</option>
                <option class="text-gray-950" value="RW">RW</option>
                <option class="text-gray-950" value="LW">LW</option>
                <option class="text-gray-950" value="ST">ST</option>
              </select>
            </div>
          </div>
          <div class="md:items-center gap-3 grid mb-6">
            <div class="flex gap-3 md:w-2/3">
              <input
                class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                type="text" name="name" placeholder="name">
            </div>
            <select
              class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-slate-950 leading-tight appearance-none focus:outline-none"
              name="flag" id="select-nation">
                <option class="text-gray-400" selected disabled value="">Nationalité</option>
                    <?php while ($row_Nationality = $result_Nationality->fetch_assoc()): ?>
                        <?php if ($row_Nationality > 0) { ?>
                        <option value="<?php echo $row_Nationality['N_id']; ?>"><?php echo $row_Nationality['N_Name']; ?></option>;
                        <?php } else { ?>
                          <option value="">Aucun joueur sélectionné</option>
                        <?php }  ?>
                    <?php endwhile; ?>
            </select>
            <input type="file" name="photo" id="input_img"
              class="file:border-0 bg-gray-100 file:bg-slate-600 file:hover:bg-gray-700 file:mr-4 file:px-4 file:py-2 rounded w-full font-medium text-gray-500 text-sm file:text-white cursor-pointer file:cursor-pointer" />
            <div class="flex gap-3 md:w-2/3">
                  <select
                    class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-slate-950 leading-tight appearance-none focus:outline-none"
                    name="logo" id="select-club">
                    <option class="text-gray-400" selected disabled value="">Club</option>
                    <?php while ($row_Club = $result_Club->fetch_assoc()): ?>
                      <img src="<?php echo $row_Club['team_image'] ?>" alt="">
                              <?php if ($row_Club > 0) { ?>
                                <option value="<?php echo $row_Club['team_id'] ?>"><?php echo $row_Club['team_name'] ?></option>
                                <?php } else { ?>
                                  <option value="">Aucun joueur sélectionné</option>
                                <?php }  ?>
                      <?php endwhile; ?>
                </select>
            </div>
            <div class="flex gap-3 md:w-2/3">
              <input
                class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                type="number" name="rating" placeholder="rating">
            </div>

            <div id="player_carater" class="gap-3 grid">
              <div class="flex gap-3 md:w-2/3">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="pace" placeholder="pace">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="shooting" placeholder="shooting">
              </div>
              <div class="flex gap-3 md:w-2/3">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="passing" placeholder="passing">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="dribbling" placeholder="dribbling">
              </div>
              <div class="flex gap-3 md:w-2/3">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="defending" placeholder="defending">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="physical" placeholder="physical">
              </div>
            </div>

            <div id="GK_carater" class="gap-3 hidden">
              <div class="flex gap-3 md:w-2/3">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="diving" placeholder="diving">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="handling" placeholder="handling">
              </div>
              <div class="flex gap-3 md:w-2/3">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="kicking" placeholder="kicking">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="reflexes" placeholder="reflexes">
              </div>
              <div class="flex gap-3 md:w-2/3">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="speed" placeholder="speed">
                <input
                  class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                  type="number" name="positioning" placeholder="positioning">
              </div>
            </div>
          </div>
          <div class="md:flex md:items-center">
            <div class="md:w-2/3">
              <button id="add_button"
                class="bg-slate-600 hover:bg-slate-400 shadow focus:shadow-outline px-4 py-2 rounded font-bold text-slate-900 text-white focus:outline-none"
                type="submit">
                Ajouter
              </button>
              <button id="update_button"
                class="hidden bg-slate-600 hover:bg-slate-400 shadow focus:shadow-outline px-4 py-2 rounded font-bold text-slate-900 text-white displ focus:outline-none"
                type="button"
                onclick="updateCard(event)">
                Modifier
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
  </div>
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/file-upload.js"></script>
</body>



</html>