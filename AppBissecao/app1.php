<?php

    // Assuming data has been written to $data_file...

    $image_file = tempnam("/tmp","gnuplotout");
    $gplot_start = date("y/m/d", $start_date);
    $gplot_finish = date("y/m/d", $finish_date);
    
    $gnuplot_cmds = <<< GNUPLOTCMDS
    set term pbm color small
    set output "$image_file"
    set size 1, 1
    set title "Title"
    set xlabel "Date"
    set ylabel "EUR"
    set xdata time
    set timefmt "%y/%m/%d"
    set xrange ["$gplot_start":"$gplot_finish"]
    set format x "%d/%m"
    set nokey
    plot "$data_file" using 1:2 with lines
    GNUPLOTCMDS;
    $gnuplot_cmds .= "\n";
    
    // Start gnuplot
    if(!($pgp = popen("/usr/bin/gnuplot", "w"))){
        # TODO Handle error
        exit;
    }
    fputs($pgp, $gnuplot_cmds);
    pclose($pgp);
    header("Content-Type: image/png");
    passthru("/usr/bin/pnmtopng $image_file");

    // Clean up and exit
    //unlink($data_file);
    //unlink($image_file);
    exit;
    
?>