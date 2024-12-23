<?php

include(__DIR__ . "/DAO/getData.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>FUT Champ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css">
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="relative">
    <div id="full-container">
        <nav class="z-10 fixed flex justify-between items-center bg-transparent backdrop-blur-sm w-full h-16">
            <div id="berger_menu" class="flex bg-slate-500 px-5 p-3 rounded-full cursor-pointer ms-8">
                <i class="fa-arrow-left text-slate-950 transition-all ease-in-out fa-solid"></i>
            </div>
            <div>
                <select class="bg-slate-800 shadow-lg px-4 p-2 rounded-lg tablet:w-52 text-center text-white me-10"
                    name="" id="formation_selected" onchange="handleForamtion(event)">
                    <option value="0">4-3-3</option>
                    <option value="1">4-4-2</option>
                </select>
            </div>
        </nav>
        <div class="flex flex-col items-end bg-slate-800 h-full container_fut">
            <div class="popup_cards px-[1rem] grid-cols-3 overflow-x-hidden overflow-y-scroll items-center top-[50vh] bg-slate-500	 transform translate-x-[-50%] translate-y-[-50%] fixed left-1/2 z-20 h-[26rem] rounded-md hidden w-[32rem] bg-" ></div>
            <div class="popup_background opacity-[0.5] z-10 items-center top-0 left-0 fixed h-[100%] hidden w-[100%] bg-black" ></div>
            <div id="left_bar"
                class="desktop:w-96 left-0 z-[1] absolute bg-[url('./assets/img/grass.jpg')] bg-gray-900 bg-no-repeat p-5 pt-20 tablet:w-5/12 telephone:w-9/12 h-full transition-all duration-500 ease-in-out">
                <div class="bottom-0 left-0 z-0 absolute bg-slate-950 opacity-70 w-full h-full"></div>
                <div id="form" class="justify-center gap-3 grid p-3 transition-all duration-300 ease-in-out">
                    <div id="players_container"
                        class="z-10 gap-3 grid grid-cols-2 w-80 max-w-sm transition-all duration-300 ease-in-out">
                        <?php while ($player = $result_Players_all->fetch_assoc()) { ?>
                            <div class="card">
                                <div class="relative justify-center grid w-full">
                                    <div class="card_position">
                                        <div class="card_rating"><?= $player["player_rating"]  ? floor($player["player_rating"]) : 0 ?></div>
                                        <div><?= $player["player_position"] ?></div>
                                    </div>
                                    <div class="card_detaille">
                                        <p class="card_paragraph"><?= $player["player_name"] ?></p>
                                        <div class="card_detaille_elem">
                                            <div>
                                                PC
                                                <p><?= $player["player_passing"] ? floor($player["player_passing"]) : "" ?>
                                                </p>
                                            </div>
                                            <div>
                                                SH
                                                <p><?= $player["player_passing"] ? floor($player["player_shooting"]) : "" ?>
                                                </p>
                                            </div>
                                            <div>
                                                PS
                                                <p><?= $player["player_passing"] ? floor($player["player_passing"]) : "" ?>
                                                </p>
                                            </div>
                                            <div>
                                                DR
                                                <p><?= $player["player_passing"] ? floor($player["player_dribbling"]) : "" ?>
                                                </p>
                                            </div>
                                            <div>
                                                DE
                                                <p><?= $player["player_passing"] ? floor($player["player_defending"]) : "" ?>
                                                </p>
                                            </div>
                                            <div>
                                                PH
                                                <p><?= $player["player_passing"] ? floor($player["player_physical"]) : "" ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2 div_natio_club">
                                            <img src="<?= $player["N_Image"] ?>" alt="">
                                            <img src="<?= $player["team_image"] ?>" alt="">
                                        </div>
                                    </div>
                                    <img class="card_image" src="<?= str_replace("../uploads/", "./uploads/", $player["photo"])  ?>" alt="">
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div id="terrain"
                class="relative flex justify-center items-start bg-[url('./assets/svg/terrain.svg')] bg-transparent bg-contain bg-no-repeat bg-right mt-36 w-8/12 transition-all duration-700 ease-in-out me-5">
                <div class="grid justify-items-center items-center h-[90%]">
                    <div class="flex justify-center w-[27rem]">
                        <div id="card" class="mt-[-1rem]" id="card"position="RW">
                            <div class="card">
                                <div class="relative w-full grid justify-center">
                                    <div class="card_position">
                                        <div class="card_rating"></div>
                                        <div></div>
                                    </div>
                                    <div class="card_detaille">
                                        <p class="card_paragraph"></p>
                                        <div class="card_detaille_elem"></div>
                                        <div class="flex gap-2 items-center div_natio_club"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="card" position="ST">
                            <div class="card">
                                <div class="relative w-full grid justify-center">
                                    <div class="card_position">
                                        <div class="card_rating"></div>
                                        <div></div>
                                    </div>
                                    <div class="card_detaille">
                                        <p class="card_paragraph"></p>
                                        <div class="card_detaille_elem"></div>
                                        <div class="flex gap-2 items-center div_natio_club"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="card" class="mt-[-1rem]" position="LW">
                            <div class="card">
                                <div class="relative w-full grid justify-center">
                                    <div class="card_position">
                                        <div class="card_rating"></div>
                                        <div></div>
                                    </div>
                                    <div class="card_detaille">
                                        <p class="card_paragraph"></p>
                                        <div class="card_detaille_elem"></div>
                                        <div class="flex gap-2 items-center div_natio_club"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center w-[30rem]">
                        <div id="card" class="mt-[-1rem]" position="RM">
                            <div class="card">
                                <div class="relative w-full grid justify-center">
                                    <div class="card_position">
                                        <div class="card_rating"></div>
                                        <div></div>
                                    </div>
                                    <div class="card_detaille">
                                        <p class="card_paragraph"></p>
                                        <div class="card_detaille_elem"></div>
                                        <div class="flex gap-2 items-center div_natio_club"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="card" position="CM">
                            <div class="card">
                                <div class="relative w-full grid justify-center">
                                    <div class="card_position">
                                        <div class="card_rating"></div>
                                        <div></div>
                                    </div>
                                    <div class="card_detaille">
                                        <p class="card_paragraph"></p>
                                        <div class="card_detaille_elem"></div>
                                        <div class="flex gap-2 items-center div_natio_club"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="card" class="mt-[-1rem]" position="LM">
                            <div class="card">
                                <div class="relative w-full grid justify-center">
                                    <div class="card_position">
                                        <div class="card_rating"></div>
                                        <div></div>
                                    </div>
                                    <div class="card_detaille">
                                        <p class="card_paragraph"></p>
                                        <div class="card_detaille_elem"></div>
                                        <div class="flex gap-2 items-center div_natio_club"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center w-[35rem]">
                        <div id="card" class="mt-[-1rem]" position="LB">
                            <div class="card">
                                <div class="relative w-full grid justify-center">
                                    <div class="card_position">
                                        <div class="card_rating"></div>
                                        <div></div>
                                    </div>
                                    <div class="card_detaille">
                                        <p class="card_paragraph"></p>
                                        <div class="card_detaille_elem"></div>
                                        <div class="flex gap-2 items-center div_natio_club"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="card" position="CB">
                            <div class="card">
                                <div class="relative w-full grid justify-center">
                                    <div class="card_position">
                                        <div class="card_rating"></div>
                                        <div></div>
                                    </div>
                                    <div class="card_detaille">
                                        <p class="card_paragraph"></p>
                                        <div class="card_detaille_elem"></div>
                                        <div class="flex gap-2 items-center div_natio_club"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="card" position="CB">
                            <div class="card">
                                <div class="relative w-full grid justify-center">
                                    <div class="card_position">
                                        <div class="card_rating"></div>
                                        <div></div>
                                    </div>
                                    <div class="card_detaille">
                                        <p class="card_paragraph"></p>
                                        <div class="card_detaille_elem"></div>
                                        <div class="flex gap-2 items-center div_natio_club"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="card" class="mt-[-1rem]" position="RB">
                            <div class="card">
                                <div class="relative w-full grid justify-center">
                                    <div class="card_position">
                                        <div class="card_rating"></div>
                                        <div></div>
                                    </div>
                                    <div class="card_detaille">
                                        <p class="card_paragraph"></p>
                                        <div class="card_detaille_elem"></div>
                                        <div class="flex gap-2 items-center div_natio_club"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div id="card" class="card" position="GK">
                            <div class="relative w-full grid justify-center">
                                <div class="card_position">
                                    <div class="card_rating"></div>
                                    <div></div>
                                </div>
                                <div class="card_detaille">
                                    <p class="card_paragraph"></p>
                                    <div class="card_detaille_elem"></div>
                                    <div class="flex gap-2 items-center div_natio_club"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="chengement" class="flex overflow-auto">
            </div>
        </div>
        <div id="Layer_1" class="hidden">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170.75 181.2" width="30px">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #4e28eb;
                            stroke: #fff;
                            stroke-width: 7px;
                        }

                        .cls-1,
                        .cls-2 {
                            stroke-miterlimit: 10;
                        }

                        .cls-2,
                        .cls-3 {
                            fill: #fff;
                        }

                        .cls-2 {
                            stroke: #231f20;
                        }
                    </style>
                </defs>
                <polygon class="cls-1"
                    points="3.5 33.73 85.37 3.73 167.25 33.73 167.25 147.47 85.37 177.47 3.5 147.47 3.5 33.73">
                </polygon>
                <path class="cls-2" d="M100,68.13" transform="translate(-14.63 -9.4)"></path>
                <circle class="cls-3" cx="85.37" cy="62.6" r="9.18"></circle>
                <circle class="cls-3" cx="85.37" cy="90.6" r="9.18"></circle>
                <circle class="cls-3" cx="85.37" cy="118.6" r="9.18"></circle>
            </svg>
            <div class="edit__player-icon st__icon" onclick="editCard(event)">
                <i class="fa-pen fa-solid"></i>
            </div>
            <div onclick="removeCard(event)" class="delete__player-icon st__icon">
                <i class="fa-solid fa-trash ms-[0.5px]"></i>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./script.js">
        window.addEventListener('load', fetch_data);
    </script>
</body>

</html>