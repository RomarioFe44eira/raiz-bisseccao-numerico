<?php
    include("uCharts.class.php");
    
    
    $uChart = new uChart("(sin(x))", array(-10,10), array(-2,2));
    $uChart->createChart();
    $uChart->renderHtml();
    
    //$uChart->deleteChart();

    


?>