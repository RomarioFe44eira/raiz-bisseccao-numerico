<!DOCTYPE html>
  <html>
    <head>
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
        <div class="container" style="margin-top:90px;">
            <div class="row">
                <div class="col s12 m8 offset-m3">
                    <div class="card-panel z-depth-5">
                        <h4 class="center">Método da Bissecção</h4>
                            <div class="row" style="background-color: #b2dfdb">
                                
                                <?php
                                    error_reporting(0);
                                    
                                    if(file_exists("charts.png")){
                                         echo "<img src=\"charts.png\" style=\"width: 95%\"></img>";
                                    }
                                    else{
                                         echo "<img src=\"erroGrafico.jpg\" style=\"width: 100%\"></img>";
                                    }
                                ?>
                                
                            </div><!--row-->
                            <a href="index.html" class="btn tooltipped center" style="width: 100%;;" data-position="bottom" data-tooltip="Redireciona para página inicial">Encontrar raiz de outra função</a>
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
        
