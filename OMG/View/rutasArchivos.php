<?php
//    $urls["fisica"] = "C:xampp/htdocs/enerin-omg/archivos/";
//    $urls["logica"] = "../../../enerin-omg/archivos/";

         $urls["fisica"] = "/home/fpa9q09nzhnx/public_html/cliente/archivos/";
         $urls["logica"] = 'http://www.enerin-omgapps.com/cliente/archivos/';

//     $urls["fisica"] = "/home/fpa9q09nzhnx/public_html/oficina/archivos/";
//     $urls["logica"] = 'http://www.enerin-omgapps.com/oficina/archivos/';
     
//     $urls["fisica"] = "/home/fpa9q09nzhnx/public_html/omgcum/archivos/";
//     $urls["logica"] = 'http://www.enerin-omgapps.com/omgcum/archivos/';

    Session::setSesion("URLS",$urls);
?>