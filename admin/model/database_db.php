<?php
    //Get all the cars ordered by year
    class GetByYearOrPrice{
        public static     function getAllByYear(){
            $db = Database::getDB();
            $query = "SELECT year, model, price, type ,class, make 
            FROM vehicles AS v 
            INNER JOIN Type AS t ON v.type_id = t.ID 
            LEFT JOIN Class AS a ON v.class_id = a.ID 
            LEFT JOIN Make As m ON v.make_id = m.ID 
            ORDER BY year ";
    
            $get_All = $db -> prepare($query);
            $get_All ->execute();
            $all = $get_All -> fetchAll();
            $get_All -> closeCursor();
            return $all;
    
        }
        //Get all the cars ordered by year
        public static function getAllByPrice(){
            $db = Database::getDB();
            $query = "SELECT year, model, price, type ,class, make 
            FROM vehicles AS v 
            INNER JOIN Type AS t ON v.type_id = t.ID 
            LEFT JOIN Class AS a ON v.class_id = a.ID 
            LEFT JOIN Make As m ON v.make_id = m.ID 
            ORDER BY price ";
    
            $get_All = $db -> prepare($query);
            $get_All ->execute();
            $all = $get_All -> fetchAll();
            $get_All -> closeCursor();
            return $all;
    
        }
  
    }
        function getAllByYear(){
            $db = Database::getDB();
            $query = "SELECT year, model, price, type ,class, make 
            FROM vehicles AS v 
            INNER JOIN Type AS t ON v.type_id = t.ID 
            LEFT JOIN Class AS a ON v.class_id = a.ID 
            LEFT JOIN Make As m ON v.make_id = m.ID 
            ORDER BY year ";
    
            $get_All = $db -> prepare($query);
            $get_All ->execute();
            $all = $get_All -> fetchAll();
            $get_All -> closeCursor();
            return $all;
    
        }
        //Get all the cars ordered by year
        function getAllByPrice(){
            $db = Database::getDB();
            $query = "SELECT year, model, price, type ,class, make 
            FROM vehicles AS v 
            INNER JOIN Type AS t ON v.type_id = t.ID 
            LEFT JOIN Class AS a ON v.class_id = a.ID 
            LEFT JOIN Make As m ON v.make_id = m.ID 
            ORDER BY price ";
    
            $get_All = $db -> prepare($query);
            $get_All ->execute();
            $all = $get_All -> fetchAll();
            $get_All -> closeCursor();
            return $all;
    
        }
  

?>