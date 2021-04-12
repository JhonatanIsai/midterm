//$action = filter_input(INPUT_POST, 'action'); // What is the action LOg in or register?? 
        if($action == NULL){
            $action = filter_input(INPUT_GET, "action");
            if($action == NULL){
                $action = 'show_admin_menu';
            }
        }

        //Request log in from user
        if(!isset($_SESSION["is_valid_admin"])){
            $action = "login";
        }
