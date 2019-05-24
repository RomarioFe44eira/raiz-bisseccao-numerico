<?php
    echo "<meta charset='utf-8'>";
    
    $chart = array(
        "terminal" => "pngcairo",
        "font" => array(
            "nome"=>"arial",
            "tam"=>10,
            "fontscale" => "1.0"
        ),
        
        "image" => array(
            "nome" => "charts.png",
            "largura" => 600,
            "altura" => 400
        ),
        
        "irange" => array(
            "xrange" => array(-10,10),
            "yrange" => array(-2,2)
        ),
        
        "fx" => "cos(x)"
        
    );
    
 
    $fp = fopen("uCharts", "w");
    
$escreve = fwrite($fp, 
"#!/usr/bin/gnuplot
set terminal {$chart["terminal"]} transparent enhanced font \"{$chart['font']['nome']},{$chart['font']['tam']}\" fontscale {$chart["font"]["fontscale"]} size {$chart["image"]["largura"]}, {$chart["image"]["altura"]};
set title 'Método da Bissecção - Grafico da Função'
set output \"{$chart["image"]["nome"]}\";
set size 1,1;
set grid;
set yrange [{$chart["irange"]["yrange"][0]}:{$chart["irange"]["yrange"][1]}];
plot {$chart['fx']} w l lt 1 lw 1 t \"cos(x)\";
");
    
    exec("chmod +x uCharts");
    
    fclose($fp);
    
   
    if(!exec("/home/ubuntu/workspace/AppBissecao/uCharts")){
        echo "<body style=\"background-color: #F6F1F1  \">
            <img src='charts.png'><strong>Gráfico gerado com sucesso!<strong></img></body>
        
        ";
       
        
        //header("Content-Type: image/png");
        //passthru("/home/ubuntu/workspace/AppBissecao/charts.png");
        //$local_file = "/home/ubuntu/workspace/AppBissecao/charts.png";
        //passthru("/usr/bin/pnmtopng $local_file");
        
        
    }
    else{
        //echo $command.'<hr>';
        echo "Não foi possível gerar o gráfico!";
    }
    
?>