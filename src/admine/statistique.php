<?php
include '../DAO/getData.php';
?>

<?php
include(__DIR__ . '/partials/_header.html');
?>

<div class="d-flex container-scroller">

    <?php
    include(__DIR__ . '/partials/_leftbar.html');
    ?>

    <div class="container-fluid page-body-wrapper" style="margin-right:inherit; background-color: white !important ">

        <?php
        include(__DIR__ . '/partials/_navbar.php');
        ?>

        <div class="main-panel" style="background-color:white">


            <div class="m-6">
                <div class="flex flex-wrap -mx-6">
                    <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                        <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-slate-100">
                            <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                                <svg class="h-8 w-8 text-white" viewBox="0 0 28 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>

                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">
                                    <?php
                                    while ($row = $result_Players_count->fetch_assoc()) {
                                        echo $row['countPlayer'];
                                    } ?>
                                </h4>
                                <div class="text-gray-500">Joueurs</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                        <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-slate-100">
                            <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                                <i class="fa-solid fa-shield-halved" style=" font-size: 38px;"></i>
                            </div>

                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">
                                    <?php
                                    while ($row = $result_teams_count->fetch_assoc()) {
                                        echo $row['countTeams'];
                                    } ?>
                                </h4>
                                <div class="text-gray-500">Clubs</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                        <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-slate-100">
                            <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                                <i class="fa-solid fa-flag" style=" font-size: 38px;"></i>
                            </div>

                            <div class="mx-5">
                                <h4 class="text-2xl font-semibold text-gray-700">
                                    <?php
                                    while ($row = $result_nationality_count->fetch_assoc()) {
                                        echo $row['countNationality'];
                                    } ?>
                                </h4>
                                <div class="text-gray-500">Nationalites</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content-wrapper">
                <div class="row">
                    <div class="grid-margin grid stretch-card col-lg-12">
                        <div class="number_players">
                            <?php
                            while ($row = $result_Players_count->fetch_assoc()) {
                                echo $row['countPlayer'];
                            } ?>
                        </div>

                        <div class="number_clubs">
                            <?php
                            while ($row = $result_teams_count->fetch_assoc()) {
                                echo $row['countTeams'];
                            } ?>
                        </div>
                        <div class="number_nationality">
                            <?php
                            while ($row = $result_nationality_count->fetch_assoc()) {
                                echo $row['countNationality'];
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                        <span class="d-block d-sm-inline-block text-center text-muted text-sm-left">Copyright © <a
                                href="https://www.bootstrapdash.com/" target="_blank">fut-champ-php </a>2024</span>
                        <span class="d-block float-sm-right float-none mt-1 mt-sm-0 text-center">Only the best <a
                                href="https://www.bootstrapdash.com/" target="_blank">Statistique </a> </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
</div>

<?php
include(__DIR__ . '/partials/_footer.html');
?>