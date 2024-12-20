<?php

include '../DAO/filterData.php';


if (isset($_GET['id'])) {
    global $id;
    $id = $_GET['id'];

    global $return;
    $return = getPlayer($id);
    $player = array_values($return)[0];
}
?>
<div id="form" class="justify-center gap-3 grid py-5 p-3 transition-all duration-300 ease-in-out">
    <form class="z-10 gap-3 grid w-80 max-w-sm transition-all duration-300 ease-in-out" method="POST"
        enctype="multipart/form-data"
        action="<?php echo isset($player) ? "../DAO/updatePlayer.php?id=" . $player['player_id'] : "../DAO/addData.php" ?> ">
        <div class="md:flex md:items-center">
            <div class="w-full">
                <select
                    class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-slate-950 leading-tight appearance-none focus:outline-none"
                    name="position" id="">
                    <option class="text-gray-400" value="">Poste de joueur</option>
                    <option <?php echo (isset($player['player_position']) && $player['player_position'] == "GK") ? 'selected' : ''; ?> class="text-gray-400" value="GK">GK</option>
                    <option <?php echo (isset($player['player_position']) && $player['player_position'] == "CB") ? 'selected' : ''; ?> class="text-gray-950" value="CB">CB</option>
                    <option <?php echo (isset($player['player_position']) && $player['player_position'] == "LB") ? 'selected' : ''; ?> class="text-gray-950" value="LB">LB</option>
                    <option <?php echo (isset($player['player_position']) && $player['player_position'] == "RB") ? 'selected' : ''; ?> class="text-gray-950" value="RB">RB</option>
                    <option <?php echo (isset($player['player_position']) && $player['player_position'] == "CM") ? 'selected' : ''; ?> class="text-gray-950" value="CM">CM</option>
                    <option <?php echo (isset($player['player_position']) && $player['player_position'] == "RW") ? 'selected' : ''; ?> class="text-gray-950" value="RW">RW</option>
                    <option <?php echo (isset($player['player_position']) && $player['player_position'] == "LW") ? 'selected' : ''; ?> class="text-gray-950" value="LW">LW</option>
                    <option <?php echo (isset($player['player_position']) && $player['player_position'] == "ST") ? 'selected' : ''; ?> class="text-gray-950" value="ST">ST</option>
                </select>
            </div>
        </div>
        <div class="md:items-center gap-3 grid mb-6">
            <div class="flex gap-3 ">
                <input value="<?php echo isset($player['player_name']) ? $player['player_name'] : "" ?>"
                    class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                    type="text" name="name" placeholder="name">
            </div>
            <select
                class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-slate-950 leading-tight appearance-none focus:outline-none"
                name="flag" id="select-nation">
                <option class="text-gray-400" selected disabled value="">Nationalité</option>
                <?php while ($row_Nationality = $result_Nationality->fetch_assoc()): ?>
                    <?php if ($row_Nationality > 0) { ?>
                        <option <?php echo isset($player['N_id']) && $player['N_id'] == $row_Nationality['N_id'] ? "selected" : "" ?> value="<?php echo $row_Nationality['N_id']; ?>"><?php echo $row_Nationality['N_Name']; ?>
                        </option>
                    <?php } else { ?>
                        <option value="">Aucun joueur sélectionné</option>
                    <?php } ?>
                <?php endwhile ?>
            </select>
            <input type="file" name="photo" id="input_img"
                class="file:border-0 bg-gray-100 file:bg-slate-600 file:hover:bg-gray-700 file:mr-4 file:px-4 file:py-2 rounded w-full font-medium text-gray-500 text-sm file:text-white cursor-pointer file:cursor-pointer" />
            <div class="flex gap-3 ">
                <select
                    class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-slate-950 leading-tight appearance-none focus:outline-none"
                    name="logo" id="select-club">
                    <option class="text-gray-400" selected disabled value="">Club</option>
                    <?php while ($row_Club = $result_Club->fetch_assoc()): ?>
                        <img src="<?php echo $row_Club['team_image'] ?>" alt="">
                        <?php if ($row_Club > 0) { ?>
                            <option <?php echo isset($player['team_id']) && $player['team_id'] == $row_Club['team_id'] ? "selected" : "" ?> value="<?php echo $row_Club['team_id'] ?>">
                                <?php echo $row_Club['team_name'] ?>
                            </option>
                        <?php } else { ?>
                            <option value="">Aucun joueur sélectionné</option>
                        <?php } ?>
                    <?php endwhile ?>
                </select>
            </div>
            <div class="flex gap-3 ">
                <input value="<?php echo isset($player['player_rating']) ? $player['player_rating'] : "" ?>"
                    class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                    type="number" name="rating" placeholder="rating">
            </div>

            <div id="player_carater" class="gap-3 grid">
                <div class="flex gap-3 ">
                    <input value="<?php echo isset($player['player_pace']) ? $player['player_pace'] : '' ?>"
                        class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                        type="number" name="pace" placeholder="pace">
                    <input value="<?php echo isset($player['player_shooting']) ? $player['player_shooting'] : '' ?>"
                        class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                        type="number" name="shooting" placeholder="shooting">
                </div>
                <div class="flex gap-3 ">
                    <input value="<?php echo isset($player['player_passing']) ? $player['player_passing'] : '' ?>"
                        class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                        type="number" name="passing" placeholder="passing">
                    <input value="<?php echo isset($player['player_dribbling']) ? $player['player_dribbling'] : '' ?>"
                        class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                        type="number" name="dribbling" placeholder="dribbling">
                </div>
                <div class="flex gap-3 ">
                    <input value="<?php echo isset($player['player_defending']) ? $player['player_defending'] : '' ?>"
                        class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                        type="number" name="defending" placeholder="defending">
                    <input value="<?php echo isset($player['player_physical']) ? $player['player_physical'] : '' ?>"
                        class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                        type="number" name="physical" placeholder="physical">
                </div>
            </div>

            <div id="GK_carater" class="gap-3 hidden">
                <div class="flex gap-3 ">
                    <input
                        class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                        type="number" name="diving" placeholder="diving">
                    <input
                        class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                        type="number" name="handling" placeholder="handling">
                </div>
                <div class="flex gap-3 ">
                    <input
                        class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                        type="number" name="kicking" placeholder="kicking">
                    <input
                        class="border-gray-200 focus:border-gray-700 bg-gray-200 px-4 py-2 rounded w-full text-gray-700 leading-tight appearance-none focus:outline-none"
                        type="number" name="reflexes" placeholder="reflexes">
                </div>
                <div class="flex gap-3 ">
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
                    <?php echo isset($player) ? 'modifier' : 'Ajouter' ?>
                </button>
            </div>
        </div>
    </form>