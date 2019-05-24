<?php
    
    $dados = array(
        "fx" => $_GET['fx'],
        "xa" => $_GET['xa'],
        "xb" => $_GET['xb'],
        "xm" => "",
        "eps" => $_GET['eps'],
        "kmax" => $_GET['kmax']
    );
    
    
    echo "<pre>";
        print_r($dados);
    echo "</pre>";
    
    
    $dados['eps'] = pow(10, $dados['eps']);
    
    $k = 0;
    
    function printInfo($dados, $k){
       print("k: {$k}| xa: {$dados['xa']}| xb: {$dados['xb']}| xm:{$dados['xm']}| fx: ".fx($dados['xm'], $dados['fx'])."<br>");
    }
    
    
    function fx($x, $fun){
        $p = eval('return '.$fun.';');
        return $p;
    }
   
    while(abs(($dados['xa'] - $dados['xb'])) > $dados['eps'] && ($k < $dados['kmax'])){
        $k++;
        $dados['xm'] = ($dados['xa'] + $dados['xb'])/2;
        
        printInfo($dados, $k);
       
       (fx($dados['xa'], $dados['fx']) * fx($dados['xm'], $dados['fx']) < 0)? $dados['xb'] = $dados['xm'] : $dados['xa'] = $dados['xm'];
    }
    
    

    print("<br>Raiz aproximada: {$dados['xm']}");
   

?>