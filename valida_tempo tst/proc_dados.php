<?php

if (isset($_COOKIE["c_usuario"])){
    $v_usuario = $_COOKIE["c_usuario"];
    $v_time = time();

    
     if (!isset($_COOKIE["c_time_acao"])){
         setcookie("c_time_acao", $v_time, time() + 7200);
	 }

    $ult_acao = $_COOKIE["c_time_acao"];
    $passou = $v_time - $ult_acao;

    
    if ($passou > 30){
        echo "<h1>Faça login novamente</h1>";
        echo "<p>Passaram $passou segundos de inatividade</p>";
        echo "<a href=index.html>Login</a>";
    } else{
        
        setcookie("c_time_acao", $v_time, time() + 7200);

        echo "Olá $v_usuario";
        echo "<p>Passaram $passou segundos desde a última ação</p>";
        echo "<p>Após 30 segundos de inatividade, será solicitado um novo login</p>";
        echo "<a href=proc_dados.php>Testar tempo após a última ação</a>";
    }
} else{
    echo "<h1>Faça login novamente</h1>";
    echo "<p>Você não está logado.</p>";
    echo "<a href=index.html>Login</a>";
}
?>
