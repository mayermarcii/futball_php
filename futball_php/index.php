
        
<?php

session_start();
require 'includes/db.inc.php';
// default oldal
$page = 'index';
$_SESSION['search']='';
$team="";
$title='';
$szoveg = "Belépés";
$action = "login"; 
 if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

if(isset($_REQUEST['searched'])){
                $_SESSION['search']=$_REQUEST['searched'];
                $page = "searchedTeam"; 
                $title=$_REQUEST['searched'];
                

}elseif(isset($_REQUEST['team'])){
        $team=$_REQUEST['team'];
}
$menupontok = array(    'index' => "Főoldal",
                        $action => $szoveg,
                        'registration' => "Regisztráció"
        ); 
// ki vagy be vagyok lépve?
if(!empty($_SESSION["user_id"])) {
        $szoveg = "Kilépés ";
        $action = "logout";
        $fo="Profil: ".$_SESSION["username"];
        $sql="SELECT user_id FROM admin WHERE user_id='".$_SESSION['user_id']."'";
                if(!$result = $conn->query($sql)) echo $conn->error;
                if($result->num_rows > 0){
                        $menupontok = array(    
                                'index' => "Főoldal", 
                                'upload'=>"Feltöltés",
                                'teams'=>"Csapatok",
                                $action => $szoveg
                
        );
                }else{
                        $menupontok = array(    
                        'index' => "Főoldal", 
                        'teams'=>"Csapatok",
                        $action => $szoveg
        
);  
                }
               
        
}

if(array_key_exists($page,$menupontok)){
        $title = $menupontok[$page];
        
}

// router

        
include 'includes/htmlheader.inc.php';
require 'model/Users.php';
require 'model/Teams.php';
require 'model/Matches.php';
require 'model/Players.php';
$tanulo=new Users;
$teams= new Teams;
$teamIds=$teams->CsapatLista($conn);
$matches= new Matches;
$matchesIds=$matches->EredmenyLista($conn);
$players= new Players;
$playersIds=$players->jatekosokLista($conn);
?>


<body>
<?php
include 'includes/menu.inc.php';
include 'controller/'.$page.'.php';
?>
</body>
</html>