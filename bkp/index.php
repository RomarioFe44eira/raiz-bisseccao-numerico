<?php
    include "form.html";
    
    if(isset($_POST['exe']) && $_POST['exe'] == 'Executar'){
        echo 'Ok você submeteu o formulário<br>';

        $xa = (isset($_POST['xa']))?$_POST['xa'] : 1;  //Valor de a   
        $xb = (isset($_POST['xb']))?$_POST['xb'] : 2; //Valor de b
        $eps = (isset($_POST['eps']))?$_POST['eps'] : -3;

        $xm;
        $epsilon = pow(10, $_POST['eps']);  //tolerancia
        $fx = $_POST['fx'];                 //Numero maximo iteracoes
        $k = 0;   

        $nmax = 100;                          //contador iteracoes
        
        function f($x){
            return pow($x, 3) - $x - 2;
        }
    
    echo "<table style='width:35%; align=center'>
        <tr>
            <th>k</th>
            <th>xa</th>
            <th>xb</th>
            <th>xm</th>
            <th>f(xm)</th>
        </tr>";
   
    while(abs(($xa - $xb)) > $epsilon && ($k < $nmax)){
        $k++;
        $xm = ($xa + $xb)/2;
       
      // echo 'k: '.$k.' | xa: '.$xa.' | xb: '.$xb.' $xm: '.$xm.' f(xm): '.f($xm).' |<br>';
       
       echo " 
       <tr>
        <td>{$k}</td>
        <td>{$xa}</td>
        <td>{$xb}</td>
        <td>{$xm}</td>
        <td>".f($xm)."</td>
      </tr>";
       
       (f($xa) * f($xm) < 0)? $xb = $xm : $xa = $xm;
    }
    
    echo '
        </table>
        <br>
        Grafico da Funçao: <a href="#grafico">gerar</a>
        <br>
        Fonte: <a href="https://www.mql5.com/pt/articles/114">Api Charts</a>
        <br><br>
        <br><br>
        <img src="chart.php"></img>
        
        </body> ';

    }
    else{
        echo 'Falsidade';
        echo '<p style="border-radius: 15px;background-color: red; color:white; font-size: 28px; margin:15px; padding:12px;">Você precisa submeter o formulário para executar o método';
    }   
    
?>