<?php
    
    error_reporting(0);
    
    $str = $_POST['fx'];

	//tratamento função php
	$uPhp = str_replace("x", '$x', $str);
	$uPhp = str_replace("e\$xp", 'exp', $uPhp);
	$uPhp = str_replace("/0", '/1', $uPhp);
	
	//Tratamento função gnuplot
	$str = str_replace("pow( x, x)", "(x**x)", $str);
	$str = str_replace("/0", '/1', $str);

	for($i; $i < 150; $i++){
		$str = str_replace("pow(x, $i)", "(x**$i)", $str);
		$str = str_replace("pow(x , $i)", "(x**$i)", $str);
		$str = str_replace("pow(x,$i)", "(x**$i)", $str);
		$str = str_replace("pow( x,$i)", "(x**$i)", $str);
		$str = str_replace("pow( x, $i)", "(x**$i)", $str);
		$str = str_replace("pow(x ,$i)", "(x**$i)", $str);
	
		$str = str_replace("pow($i, x)", "($i**x)", $str);
		$str = str_replace("pow($i,x)", "($i**x)", $str);
		
		
		$str = str_replace("pow($i, $i)", "($i**$i)", $str);
		$str = str_replace("pow($i,$i)", "($i**$i)", $str);
		
		$str = str_replace("pow({$i},", "({$i}**", $str);
		
		$str = str_replace("pow(x + {$i},", "(x+{$i}**", $str);
		$str = str_replace("pow(x +{$i},", "(x+{$i}**", $str);
		$str = str_replace("pow(x+ {$i},", "(x+{$i}**", $str);
		
		$str = str_replace("pow(x+{$i},", "(x+{$i}**", $str);
		
		$str = str_replace("pow({$i}+x,", "({$i}+x**", $str);
		$str = str_replace("pow({$i} +x,", "({$i}+x**", $str);
		$str = str_replace("pow({$i} + x,", "({$i}+x**", $str);
	}
	
	
	//echo "<b>Função php:</b> {$uPhp}<br>";
	//echo "<b>Função gnuPlot:</b> {$str}";
    
    //bloco para gerar o gráfico da função
        include("uCharts.class.php");
        $uChart = new uChart($str, array(-10,10), array(-10,10));
        $uChart->createChart();
        //$uChart->renderHtml();
        //$uChart->deleteChart();
    //Fim do bloco
    

    $dados = array(
        "fx" => $uPhp,
        "xa" => $_POST['xa'],
        "xb" => $_POST['xb'],
        "xm" => "",
        "eps" => $_POST['eps'],
        "kmax" => $_POST['kmax']
    );
    
    $dados['eps'] = pow(10, $dados['eps']);
    $k = 0;
    
    function printInfo($dados, $k){
        echo "
        <tr>
            <td>{$k}</td>
            <td>{$dados['xa']}</td>
            <td>{$dados['xb']}</td>
            <td>{$dados['xm']}</td>
            <td>".fx($dados['xm'], $dados['fx'])."</td>
        </tr>";
       
    }
    
    function fx($x, $fun){
        $p = eval('return '.$fun.';');
        return $p;
    }
?> 
 <!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <meta charset="utf-8">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <link type="text/css" rel="stylesheet" href="css/index.css">
      <link rel="shortcut icon" href="favicon (6).ico" type="image/x-icon">
      <link rel="icon" href="favicon (6).ico" type="image/x-icon">
    </head>

    <body class="teal lighten-2">

    <div class="container" style="margin-top:80px;">
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <div class="card-panel z-depth-5">
                <h4 class="center">Método da Bissecção</h4>
            
                <div class="row">
                    <table class="responsive-table centered highlight">
                        <thead>
                            <tr style="font-size: 16px">
                                <th>Função<br>[ php ]</th>
                                <th>Função<br>[gnuPlot]</th>
                                <th>Intevalo [ a ; b]</th>
                                <th>Precisão</th>
                                <th>Máx. Iteração</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i><?php print($dados['fx']) ?></i></td>
                                <td><i><?php print($str) ?>  </i></td>
                                <td><i><?php print("[{$dados['xa']} ; {$dados['xb']}] ") ?>  </i></td>
                                <td><i><?php print($dados['eps']) ?> </i></td>
                                <td><i><?php print($dados['kmax']) ?></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div><!--row-->
                
    <div class="row">
        <table class="responsive-table striped centered">
            <thead>
                <tr style="font-size: 16px">
                    
                </style>
                    <th>k</th>
                    <th>xa</th>
                    <th>xb</th>
                    <th>xm</th>
                    <th>f(xm)</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while(abs(($dados['xa'] - $dados['xb'])) > $dados['eps'] && ($k < $dados['kmax'])){
                    $k++;
                    $dados['xm'] = ($dados['xa'] + $dados['xb'])/2;
                    
                    printInfo($dados, $k);
                   
                   (fx($dados['xa'], $dados['fx']) * fx($dados['xm'], $dados['fx']) < 0)? $dados['xb'] = $dados['xm'] : $dados['xa'] = $dados['xm'];
                }
            ?>
            </tbody>
        </table>
        <div class="card-panel light-blue accent-1" style="font-size:16px;"><strong>Raiz aproximada: </strong><?php print($dados['xm']) ?></div>
    </div><!--row-->
    
    
  


  
  
    <a href="uChart.php" class="btn tooltipped center" style="width: 100%;;" data-position="bottom" data-tooltip="Gera o gráfico da função fx">gráfio fx</a>
    <a href="index.html" class="btn tooltipped center" style="width: 100%;;" data-position="bottom" data-tooltip="Redireciona para o inicio">Sair</a>
</div><!--card-->


</div><!--col-->
  </div><!--row-->
	</div><!--conatiner-->
	
    	
    	
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	    
	
			 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-60673008-2', 'auto');
  ga('send', 'pageview');
</script>
	    
	    
	    
    </body>
  </html>
        
