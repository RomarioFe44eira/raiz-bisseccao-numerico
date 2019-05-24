<?php
class uChart{
    private $workspace = "/home/ubuntu/workspace/AppBissecao";
    
    public $chart = array(
        "fun" => "sin(x)",
        "title" => "Grafico",
        "terminal" => "pngcairo",
        "font" => array(
            "type"=>"arial",
            "size"=>10,
            "fontscale" => "1.0"
        ),
        "irange" => array(
            "xrange" => array(-10,10),
            "yrange" => array(-2,2)
        )
    );

    public $uFile = array(
        "chart" => array(
            "name" => "charts.png",
            "width" => 600,
            "height" => 400
        ),
        "gnu" => array(
            "name" => "Ignuplot",
            "command" => "#!/usr/bin/gnuplot",
            "type" => "text/plain"
        )
    );



    public function uChart($fun, $xrange, $yrange){
        $this->chart['fun'] = $fun;
        $this->irange['irange']['xrange'] = $xrange;
        $this->irange['irange']['yrange'] = $yrange;
        
        /*
        echo "<pre>";
        print_r($this->chart);
        echo "</pre>";
        
        echo "<pre>";
        print_r($this->uFile);
        echo "</pre>";
        */
        
    }
    
    
    public function createChart(){
        $fp = fopen($this->uFile['gnu']['name'], "w");
        
        $conteudo = 
        "{$this->uFile['gnu']['command']}
set terminal {$this->chart['terminal']} transparent enhanced font \"{$this->chart['font']['type']}, {$this->chart['font']['size']}\" fontscale {$this->chart['font']['fontscale']} size {$this->uFile['chart']['width']}, {$this->uFile['chart']['height']};
set title \"{$this->chart['title']}\";
set output \"{$this->uFile['chart']['name']}\";
set size 1,1;
set grid;
set yrange [{$this->irange['irange']['yrange'][0]}:{$this->irange['irange']['yrange'][1]}];
plot {$this->chart['fun']} w l lt 1 lw 1 t \"{$this->chart['fun']}\";
";
        fputs($fp, $conteudo);
        fclose($fp);
        exec("chmod 765 ".$this->uFile['gnu']['name']);//Comando para dar permissão ao arquivo criado.
        
        exec("./{$this->uFile['gnu']['name']}");
    }
    
    public function deleteChart(){
        $linkImage = $workspace.$this->uFile['chart']['name'];
        $linkGnu = $workspace.$this->uFile['gnu']['name'];
        
        if(file_exists($linkImage) || file_exists($linkGnu)){
            unlink($linkImage);
            unlink($linkGnu);
        }
    }
    
    public function renderHtml(){
        echo "<img src=\"{$this->uFile['chart']['name']}\">Imagem gafico</img>";
    }

}

?>