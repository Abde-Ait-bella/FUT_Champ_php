<?php

include '../DAO/filterData.php';


if (isset($_GET['id'])) {
    global $id;
    $id = $_GET['id'];

    global $return;
    $return = getClub($id);
    $club = array_values($return)[0];
}
?>
<div id="form" class="justify-center gap-3 grid py-5 p-3 transition-all duration-300 ease-in-out">
    <form class="z-10 gap-3 grid w-80 max-w-sm transition-all duration-300 ease-in-out" method="POST"
        enctype="multipart/form-data"
        action="<?php echo isset($club) ? "../DAO/updateClub.php?id=".$club['team_id'] : "../DAO/addClubData.php" ?> ">

        <div class="md:items-center gap-3 grid mb-6">
            <div class="flex gap-3 ">
                <input value="<?php echo isset($club['team_name']) ? $club['team_name'] : "" ?>"
                    class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                    type="text" name="team_name" placeholder="name">
            </div>

            <input type="file" name="team_image" id="input_img"
                class="file:border-0 bg-gray-100 file:bg-slate-600 file:hover:bg-gray-700 file:mr-4 file:px-4 file:py-2 rounded w-full font-medium text-gray-500 text-sm file:text-white cursor-pointer file:cursor-pointer" />
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-2/3">
                <button id="add_button"
                    class="bg-slate-600 hover:bg-slate-400 shadow focus:shadow-outline px-4 py-2 rounded font-bold text-white focus:outline-none"
                    type="submit">
                    <?php echo isset($club) ? 'modifier' : 'Ajouter' ?>
                </button>
            </div>
        </div>
    </form>