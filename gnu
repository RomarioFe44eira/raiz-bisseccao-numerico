#!/usr/bin/gnuplot
set terminal pngcairo transparent enhanced font "arial,10" fontscale 1.0 size 600, 400;
set output "img.png";
set size 1,1;
set grid;
set yrange [-2:2];
plot abs(x) w l lt 1 lw 1 t "sin(x)";

    