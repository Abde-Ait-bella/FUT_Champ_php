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
</head>

<body class="relative">
    <div class="">
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
        <div class="flex flex-col items-end bg-slate-800 h-full container_fut fle">
            <div id="left_bar"
                class="desktop:w-96 left-0 z-[1] absolute bg-[url('./assets/img/grass.jpg')] bg-gray-900 bg-no-repeat p-5 pt-20 tablet:w-5/12 telephone:w-9/12 h-full transition-all duration-500 ease-in-out">
                <div class="bottom-0 left-0 z-0 absolute bg-slate-950 opacity-70 w-full h-full"></div>
                <div id="form" class="justify-center gap-3 grid p-3 transition-all duration-300 ease-in-out">
                    <form class="z-10 gap-3 grid w-80 max-w-sm transition-all duration-300 ease-in-out"
                        onsubmit="handleSubmit(event)">
                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3">
                            </div>
                            <div class="md:w-2/3">
                                <select onchange="toggleForm(event)"
                                    class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-slate-950 leading-tight appearance-none focus:outline-none"
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
                                    class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                    type="text" name="name" placeholder="name">
                            </div>
                            <select
                                class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-slate-950 leading-tight appearance-none focus:outline-none"
                                name="flag" id="select-nation">
                                <option class="text-gray-400" selected disabled value="">Nationalité</option>
                            </select>
                            <input type="file" name="photo" id="input_img"
                                class="file:border-0 bg-gray-100 file:bg-slate-600 file:hover:bg-gray-700 file:mr-4 file:px-4 file:py-2 rounded w-full font-medium text-gray-500 text-sm file:text-white cursor-pointer file:cursor-pointer" />
                            <div class="flex gap-3 md:w-2/3">
                                <select
                                    class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-slate-950 leading-tight appearance-none focus:outline-none"
                                    name="logo" id="select-club">
                                    <option class="text-gray-400" selected disabled value="">Club</option>
                                </select>
                            </div>
                            <div class="flex gap-3 md:w-2/3">
                                <input
                                    class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                    type="number" name="rating" placeholder="rating">
                            </div>

                            <div id="player_carater" class="gap-3 grid">
                                <div class="flex gap-3 md:w-2/3">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="pace" placeholder="pace">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="shooting" placeholder="shooting">
                                </div>
                                <div class="flex gap-3 md:w-2/3">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="passing" placeholder="passing">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="dribbling" placeholder="dribbling">
                                </div>
                                <div class="flex gap-3 md:w-2/3">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="defending" placeholder="defending">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="physical" placeholder="physical">
                                </div>
                            </div>

                            <div id="GK_carater" class="gap-3 hidden">
                                <div class="flex gap-3 md:w-2/3">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="diving" placeholder="diving">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="handling" placeholder="handling">
                                </div>
                                <div class="flex gap-3 md:w-2/3">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="kicking" placeholder="kicking">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="reflexes" placeholder="reflexes">
                                </div>
                                <div class="flex gap-3 md:w-2/3">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="speed" placeholder="speed">
                                    <input
                                        class="border-gray-200 focus:border-gray-700 bg-gray-200 focus:bg-white px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                                        type="number" name="positioning" placeholder="positioning">
                                </div>
                            </div>


                        </div>
                        <div class="md:flex md:items-center">
                            <div class="md:w-2/3">
                                <button id="add_button"
                                    class="bg-slate-600 hover:bg-slate-400 shadow focus:shadow-outline px-4 py-2 text-slate-900 focus:outline-none rounded font-bold text-white"
                                    type="submit">
                                    Ajouter
                                </button> 
                                <button id="update_button"
                                class="hidden bg-slate-600 hover:bg-slate-400 shadow focus:shadow-outline px-4 py-2 rounded font-bold text-slate-900 displ focus:outline-none text-white"
                                type="button"
                                onclick="updateCard(event)">
                                Modifier
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                <div id="terrain"
                    class="relative justify-center items-end grid bg-[url('./assets/svg/terrain.svg')] bg-gray-600 bg-transparent bg-contain bg-no-repeat bg-right mt-36 w-8/12 h-[41rem] transition-all duration-700 ease-in-out me-5">
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
    <script src="./script.js"></script>
</body>

</html>