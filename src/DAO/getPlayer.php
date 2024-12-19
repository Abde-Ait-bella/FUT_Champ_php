<?php
        include __DIR__.'/getData.php';

        
        function getPlayer($id){
            global $id;
            
            global $result_Players;
            
            $data = [];
            
            while($row_Players = $result_Players->fetch_assoc()) {
                $data[] = $row_Players;
            }
            
            function test_odd($var)
            {
                global $id;
                
                if ($var['player_id'] == $id) {
                    return array_values($var);
                }
            }

                return array_filter($data,"test_odd");

        }

?>