<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Conexion con MySQL</title>		

    </head>
    <body>
        <h1>FORMULARIO CONTROL POSTERIOR</h1>
        <h5>Datos Distribuidos a nivel Nacional dirigido a cada OSPE.
        </h5>
        <style type="text/css">
            .tg  
            {
                border-collapse:collapse;border-spacing:0;border-color:#999;
            }
            .tg td
            {
                font-family:Arial, sans-serif;
                font-size:14px;padding:10px 5px;

                border-style:solid;
                border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#444;
                background-color:#F7FDFA;
            }
            .tg th{
                font-family:Arial, sans-serif;font-size:14px;font-weight:normal;
                padding:10px 5px;
                border-style:solid;

                border-width:1px;
                overflow:hidden;
                word-break:normal;
                border-color:#999;
                color:#fff;
                background-color:#26ADE4;
            }
            .tg .tg-yw4l{
                vertical-align:top
            }
            th.tg-sort-header::-moz-selection {
                background:transparent; 
            }
            th.tg-sort-header::selection      {
                background:transparent; 
            }
            th.tg-sort-header {
                cursor:pointer; 
            }
            table th.tg-sort-header:after 
            {  content:'';  float:right;  margin-top:7px;  border-width:0 4px 4px;  border-style:solid;  border-color:#404040 transparent;  visibility:hidden;  
            }
            table th.tg-sort-header:hover:after {
                visibility:visible;  
            }
            table th.tg-sort-desc:after,table th.tg-sort-asc:after,table th.tg-sort-asc:hover:after 
            {  visibility:visible;  opacity:0.4;  
            }table th.tg-sort-desc:after {  border-bottom:none;  border-width:4px 4px 0;  }@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}
        </style>
        <form name="form1" action="" method="POST">
            <div class="tg-wrap">
                <!--Incrustar php
            <form action="" method="GET">-->	

                <table id="tg-zYo7u" class="tg">     
                    <tr>
                        <th class="tg-031e" colspan="2">DATOS PERSONALES DEL TITULAR</th>
                    </tr>
                    <tr>
                    <br>
                    </tr>
                    <!--Incrustar php-->
                    <?php
                    $dni = $_GET['dni'];

                    //incluir el archivo de conexion
                    include '../SISGASV/conexionesbd/conexion_oracle.php';
                    //realizando una consulta usando la clausula select
                    $queryT = oci_parse($conexionora, "SELECT  
                                                    case when sc.dgactdi='1' then 'LE/DNI'
                                                     when sc.dgactdi='2' then 'Carné de Extranjería'
                                                     when sc.dgactdi='3' then 'Partida de Nacimiento'
                                                     when sc.dgactdi='4' then 'RUC'
                                                     when sc.dgactdi='5' then 'Identificacion Militar'
                                                     when sc.dgactdi='6' then 'Doc.Prov.de Identidad'
                                                     when sc.dgactdi='7' then 'Nro Documento'
                                                     when sc.dgactdi='8' then 'Doc.Educacion Superior'
                                                     when sc.dgactdi='9' then 'Trabajador Menor de Edad'
                                                     end as dgactdi_des,
                                                    sc.dgandid as dni, sc.dgatapa || ' ' ||  sc.dgatama || ' ' ||sc.dgatpno || ' ' || nvl(sc.dgatsno, '') as datos, 
                                                    sc.dgafnac,
                                                    TRUNC(MONTHS_BETWEEN(TO_DATE(TO_CHAR(SYSDATE, 'DD/MM/YYYY'),'DD/MM/YYYY'),  sc.dgafnac) / 12, 0) as edad,
                                                    case when substr(sc.dgacaut,7,1)='1' then 'MASCULINO'
                                                     when substr(sc.dgacaut,7,1)='0' then 'FEMENINO'
                                                     end as sexo,                                                    
                                                    case when sc.dgaceci='S' then 'SOLTERO'
                                                     when sc.dgaceci='C' then 'CASADO'
                                                     when sc.dgaceci='V' then 'VIUDO'
                                                     when sc.dgaceci='D' then 'DIVORCIADO'                                                     
                                                     end as dgaceci,
                                                    sc.dgansas
                                                    FROM dim_SCCMDGAT sc
                                                    where sc.dgandid='$dni'");
                    oci_execute($queryT);
                    //Obteniendo el conjunto de resultados

                    while ($row = oci_fetch_array($queryT, OCI_NUM + OCI_RETURN_NULLS)) {
                        ?>

                        <tr>
                            <td>TIPO DE DOCUMENTO DE IDENTIDAD</td>
                            <td><?php echo $row[0] ?></td>
                        </tr>
                        <tr>      
                            <td>NUMERO DEL DOCUMENTO IDENTIDAD</td>
                            <td><?php echo $row[1] ?></td>
                        </tr>
                        <tr>      
                            <td>APELLIDOS Y NOMBRES</td>
                            <td><?php echo $row[2] ?></td>
                        </tr>
                        <tr>      
                            <td>FECHA DE NACIMIENTO</td>
                            <td><?php echo $row[3] ?></td>
                        </tr>
                        <tr>      
                            <td>EDAD</td>
                            <td><?php echo $row[4] ?></td>
                        </tr>
                        <tr>      
                            <td>SEXO</td>
                            <td><?php echo $row[5] ?></td>
                        </tr>
                        <tr>      
                            <td>ESTADO CIVIL</td>
                            <td><?php echo $row[6] ?></td>
                        </tr>                                                        
                        <tr>
                        </tr>
                        <?php
                    }
                    //liberando los recursos
                    oci_free_statement($queryT);
                    //cerrando los recursos
                    //$conexion->close()
                    ?>                        
                </table>
                <?php
                $queryCI = oci_parse($conexionora, "Select 
                        t.num_docide_empl, t.per_aporta, t.mto_aporta, 
                        t.mto_base_imp, t.ind_situacion, t.ruc_eps, t.COD_TRIBUTO, t.tip_trabajador, 
                        t.ctd_dias_labor, t.fec_inscrip_aseg, t.fec_cese
                        from DIM_CUENTA_INDIV_01_10_XX t 
                        where --substr(t.per_aporta,1,4)>='2016' and 
                        t.num_docide_aseg='$dni'
                        order by t.per_aporta desc");
                oci_execute($queryCI);
                //Obteniendo el conjunto de resultados
                ?>
            </DIV>
            <br>
            <div style="width: auto; height: 300px; overflow-y: auto; ">
                <table id="tg-zYo7u" class="tg">
                    <thead>
                        <tr class="centro">
                            <th class="tg-031e">
                                RUC
                            </th>
                            <th class="tg-031e">
                                APORTE
                            </th>
                            <th class="tg-031e">
                                MONTO APORTA
                            </th>
                            <th class="tg-031e">
                                SUELDO
                            </th>
                            <th class="tg-031e">
                                SITUACION LABORAL
                            </th>
                            <th class="tg-031e">
                                RUC EPS
                            </th>
                            <th class="tg-031e">
                                CODIGO TRIBUTO
                            </th>
                            <th class="tg-031e">
                                TIPO TRABAJADOR
                            </th>
                            <th class="tg-031e">
                                DIAS LABORADOS
                            </th>
                            <th class="tg-031e">
                                FECHA INGRESO
                            </th>
                            <th class="tg-031e">
                                FECHA CESE
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = oci_fetch_array($queryCI, OCI_NUM + OCI_RETURN_NULLS)) {
                            ?>      
                            <TR>
                                <td>
                                    <?php echo $row[0] ?>
                                </td>
                                <td>
                                    <?php echo $row[1] ?>
                                </td>
                                <td>
                                    <?php echo $row[2] ?>
                                </td>
                                <td>
                                    <?php echo $row[3] ?>
                                </td>
                                <td>
                                    <?php echo $row[4] ?>
                                </td>
                                <td>
                                    <?php echo $row[5] ?>
                                </td>
                                <td>
                                    <?php echo $row[6] ?>
                                </td>
                                <td>
                                    <?php echo $row[7] ?>
                                </td>
                                <td>
                                    <?php echo $row[8] ?>
                                </td>
                                <td>
                                    <?php echo $row[9] ?>
                                </td>
                                <td>
                                    <?php echo $row[10] ?>
                                </td>
                            </TR>                    
                            <?php
                        }
                        //liberando los recursos
                        oci_free_statement($queryCI);
                        //cerrando los recursos
                        //$conexion->close()
                        ?>   
                    </tbody>
                </table>
            </div>
        </form>
        <!-- <script type="text/javascript" charset="utf-8">var TgTableSort = window.TgTableSort || function(n, t){"use strict"; function r(n, t){for (var e = [], o = n.childNodes, i = 0; i < o.length; ++i){var u = o[i]; if ("." == t.substring(0, 1)){var a = t.substring(1); f(u, a) && e.push(u)} else u.nodeName.toLowerCase() == t && e.push(u); var c = r(u, t); e = e.concat(c)}return e}function e(n, t){var e = [], o = r(n, "tr"); return o.forEach(function(n){var o = r(n, "td"); t >= 0 && t < o.length && e.push(o[t])}), e}function o(n){return n.textContent || n.innerText || ""}function i(n){return n.innerHTML || ""}function u(n, t){var r = e(n, t); return r.map(o)}function a(n, t){var r = e(n, t); return r.map(i)}function c(n){var t = n.className || ""; return t.match(/\S+/g) || []}function f(n, t){return - 1 != c(n).indexOf(t)}function s(n, t){f(n, t) || (n.className += " " + t)}function d(n, t){if (f(n, t)){var r = c(n), e = r.indexOf(t); r.splice(e, 1), n.className = r.join(" ")}}function v(n){d(n, L), d(n, E)}function l(n, t, e){r(n, "." + E).map(v), r(n, "." + L).map(v), e == T?s(t, E):s(t, L)}function g(n){return function(t, r){var e = n * t.str.localeCompare(r.str); return 0 == e && (e = t.index - r.index), e}}function h(n){return function(t, r){var e = + t.str, o = + r.str; return e == o?t.index - r.index:n * (e - o)}}function m(n, t, r){var e = u(n, t), o = e.map(function(n, t){return{str:n, index:t}}), i = e && - 1 == e.map(isNaN).indexOf(!0), a = i?h(r):g(r); return o.sort(a), o.map(function(n){return n.index})}function p(n, t, r, o){for (var i = f(o, E)?N:T, u = m(n, r, i), c = 0; t > c; ++c){var s = e(n, c), d = a(n, c); s.forEach(function(n, t){n.innerHTML = d[u[t]]})}l(n, o, i)}function x(n, t){var r = t.length; t.forEach(function(t, e){t.addEventListener("click", function(){p(n, r, e, t)}), s(t, "tg-sort-header")})}var T = 1, N = - 1, E = "tg-sort-asc", L = "tg-sort-desc"; return function(t){var e = n.getElementById(t), o = r(e, "tr"), i = o.length > 0?r(o[0], "td"):[]; 0 == i.length && (i = r(o[0], "th")); for (var u = 1; u < o.length; ++u){var a = r(o[u], "td"); if (a.length != i.length)return}x(e, i)}}(document); document.addEventListener("DOMContentLoaded", function(n){TgTableSort("tg-9TJBQ")});</script> -->
    </body>
</html>