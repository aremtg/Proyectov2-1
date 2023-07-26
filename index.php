<?php 
require_once('./php/conexion.php'); 
require_once('./php/helper.php'); 
require_once('./includes/header.php');
// hay algo aqui que afecta el login, hace que tenga dos head

if(!isset($_GET['vista']) || $_GET['vista'] == ""){

    $_GET['vista']='login';
}

if(is_file('./views/'.$_GET['vista'].'.php') &&  $_GET['vista'] != 'login'){
    
    require_once('./php/main.php'); 
    include('./views/nav_left.php');
    include('./views/'.$_GET['vista'].'.php');
    include('./includes/script.php');
    // quiero agregar el footer
}else{

    if($_GET['vista']=='login'){
        
        include('views/login.php');
    }else{
        include('views/404error.php');
    }
}
?>
</div><!--  se cierra contenedor derecha -->
<?php
    include('./includes/footer.php');
?>
    
</body>
</html>