<?php
        include __DIR__.'/getData.php';

        
        function getPlayer($id){
            global $id;
            
            global $result_Players;
            
            $data = [];
            
            while($row_Players = $result_Players->fetch_assoc()) {
                $data[] = $row_Players;
            }
            
            function filterPlayer($var)
            {
                global $id;
                
                if ($var['player_id'] == $id) {
                    return array_values($var);
                }
            }

                return array_filter($data,"filterPlayer");
        }

        function getClub($id){
            global $id;
            
            global $result_Club;
            
            $dataClub = [];
            
            while($row_Club = $result_Club->fetch_assoc()) {
                $dataClub[] = $row_Club;
            }
            
            function filterClub($var)
            {
                global $id;
                
                if ($var['team_id'] == $id) {
                    return array_values($var);
                }
            }

                return array_filter($dataClub,"filterClub");
        }

        
        function getNationality($id){
            global $id;
            
            global $result_Nationality;
            
            $dataNat = [];
            
            while($row_Nat = $result_Nationality->fetch_assoc()) {
                $dataNat[] = $row_Nat;
            }
            
            function filterNat($var)
            {
                global $id;
                
                if ($var['N_id'] == $id) {
                    return array_values($var);
                }
            }

                return array_filter($dataNat,"filterNat");
        }

?>