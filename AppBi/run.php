#!/usr/bin/php
<?php
    
    error_reporting(0);
    
    require_once 'Console/Table.php';
    
    $tbl = new Console_Table();
    $tbl->setHeaders(array('k', 'xa', 'xb', 'xm', 'fx(xm)'));
    
    $tbu = new Console_Table();
    $tbu->setHeaders(array('Função', 'Precisão', 'Nmax'));

    $x = array(
        "a" => 0,
        "b" => 0,
        "m" => 0
    );

    $fx = readline("Função: ");
    
    $fx = str_replace("x", '$x', $fx);
	
	$fx = str_replace("e\$xp", 'exp', $fx);

	$fx = str_replace("/0", '/1', $fx);
	
	
	
    
    $x['a'] = readline("Intervalo A: ");
    $x['b'] = readline("Intervalo B: ");
    
    $eps = pow(10, readline("Precisão: "));
    $nmax = readline("Número máximo de iterações: ");
    $k = 0;
    
   // system("clear");
    
    $tbu->addRow(array($fx, $eps, $nmax));
    echo $tbu->getTable();
    
    echo "\n";
   
   // print("Função: {$fx} | Precisão: {$eps}| Nmax: {$nmax}\n");
    
    function printInfo($x, $k){
       //print("xa: {$x['a']}| xb: {$x['b']}| xm:{$x['m']}| fx: ".fx($x['m'])."\n");
       $tbl->addRow(array($k, $x['a'], $x['b'], $x['m'], '4'));
    }
    
    
    function fx($x, $fx){
        $p = eval('return '.$fx.';');
        return $p;
    }
   
    while(abs(($x['a'] - $x['b'])) > $eps && ($k < $nmax)){
        $k++;
        //printInfo($x, $k);
        $x['m'] = ($x['a'] + $x['b'])/2;
        $tbl->addRow(array($k, $x['a'], $x['b'], $x['m'], fx($x['m'], $fx)));
       (fx($x['a'], $fx) * fx($x['m'], $fx) < 0)? $x['b'] = $x['m'] : $x['a'] = $x['m'];
    }
   
    
    
    
    
    echo $tbl->getTable();


    print("\n\033[42m Raiz aproximada: {$x['m']}");
    print("\n\n\033[45m Romário Ferreira - Daniel Peixoto - Michelle Chan \033[0m \n");
    
?>