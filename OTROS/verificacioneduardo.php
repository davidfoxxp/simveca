<table id="t1" border="1" summary="Rellena Formulario"> 
    <tr>
        <th id="th1" scope="row" class="especial" colspan="4">
            INGRESE LOS DATOS BASICOS PARA EL REGISTRO
        </th>
    </tr> 
    <tr> <td>
            ESTADO ACTUAL
        </td>
        <td>
            <select name = "idTEstadoActual" onchange="habilitar22(this.value);" id = "idTEstadoActual">
                <option value="1">PENDIENTE</option>
                <option value="2">EN PROCESO</option>
                <option value="3">TERMINADO</option>
                <option value="4">ARCHIVADO</option>
            </select>
        </td>
    </tr>
    <tr> <td>
            AÑO GENERACION DEL CASO</td>
        <td><select name = "anocaso" id="idTGeneraBaja">
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>                                            
            </select>
        </td>
    </tr>
    <tr>
        <td>
            N° DE CASO DE LA ORDEN VERIFICACION (OV)
        </td>
        <TD>
            <input type = "number" name = "nov"><br></TD>
    </tr>

    <tr>
        <td>
            SECUENCIA DEL SUFIJO DE LA ORDEN DE VERIFICACION (OV)
        </td>
        <TD>
            <input type = "number" name = "sov"><br></TD>
    </tr>

    <tr>
        <td>Nº ORDEN DE VERIFICACIÓN</td>
        <td><input type = "number" name = "numOrdenVerificacion" id="numOrdenVerificacciono"></td>
    </tr>

    <tr><td>
            FECHA EMISION DE LA ORDEN DE VERIFICACIÓN (OV)
        </td>
        <TD>
            <input type = "date" name = "FEmisionOV" id="FEmisionOV"
                   min="0001-01-01"><br></TD>
    </tr>    

    <tr><td>
            FECHA DE NOTIFICACIÓN OV AL EMPLEADOR
        </td>
        <TD>
            <input type = "date" name = "FNotOvEmpleador" id="FNotOvEmpleador"
                   min="0001-01-01"><br></TD>
    </tr>   

    <tr><td>
            FECHA DE NOTIFICACIÓN OV AL ASEGURADO
        </td>
        <TD>
            <input type = "date" name = "FNotOvAsegurado" id="FNotOvAsegurado"
                   min="0001-01-01"><br></TD>
    </tr> 

    <tr><td>
            FECHA DE LA ULTIMA ACTA O DJ TOMADA
        </td>
        <TD>
            <input type = "date" name = "FUltActaTomada" id="FUltActaTomada"
                   min="0001-01-01"><br></TD>
    </tr> 

    <tr><td>
            FECHA DE ENTREGA INFORME FINAL AL JEFE DE OSPE
        </td>
        <TD>
            <input type = "date" name = "EntregaIFOSPE" id="EntregaIFOSPE"
                   min="0001-01-01"><br></TD>
    </tr> 

    <tr><td>
            FECHA APROBACION POR JEFE DE OSPE DE INFORME FINAL
        </td>
        <TD>
            <input type = "date" name = "FDevIF" id="FDevIF"
                   min="0001-01-01"><br></TD>
    </tr> 


    <tr> <td>
            TIPO DE ACTO RESOLUTIVO / DERIVADO / INFORME FINAL</td>
        <td><select name = "idTAResol" id="idTAResol">
                <option value = "0"></option>
                <option value = "1">RESOLUCION DE BAJA</option>
                <option value = "2">RESOLUCION DE MULTA</option>
                <option value = "3">RESOLUCION DE INHABILITACION</option>
                <option value = "4">DERIVADO</option>
                <option value = "5">INFORME FINAL</option>
            </select>
        </td>
    </tr>

    <tr><td>
            FECHA DE CASO DERIVADO
        </td>
        <TD>
            <input type = "date" name = "FCasoDerivado" id="FCasoDerivado"
                   min="0001-01-01"><br></TD>
    </tr>

    <tr> <td>
            CASO DERIVADO A LA OSPE</td>
        <td><select name = "idTAResol" id="idTAResol">
                <option value = "0"></option>
                <option value = "1">AMAZONAS</option>
                <option value = "2">ANCASH</option>
                <option value = "3">APURIMAC</option>
                <option value = "4">AREQUIPA</option>
                <option value = "5">AYACUCHO</option>
                <option value = "6">CAJAMARCA</option>
                <option value = "7">CUSCO</option>
                <option value = "8">HUANCAVELICA</option>
                <option value = "9">HUANUCO</option>
                <option value = "10">ICA</option>
                <option value = "11">JUNIN</option>
                <option value = "12">LA LIBERTAD</option>
                <option value = "13">LAMBAYEQUE</option>
                <option value = "14">LORETO</option>
                <option value = "15">MADRE DE DIOS</option>
                <option value = "16">MOQUEGUA</option>
                <option value = "17">PASCO</option>
                <option value = "18">PIURA</option>
                <option value = "19">PUNO</option>
                <option value = "20">SAN MARTIN</option>
                <option value = "21">TACNA</option>
                <option value = "22">TUMBES/option>
                <option value = "23">UCAYALI</option>
                <option value = "24">CORPORATIVA</option>
                <option value = "25">JESUS MARIA</option>
                <option value = "26">SAN ISIDRO</option>
                <option value = "27">SAN MIGUEL</option>
                <option value = "28">HUACHO</option>
                <option value = "29">JULIACA</option>
                <option value = "30">MOYOBAMBA</option>


            </select>
        </td>
    </tr>

    <tr><td>
            FECHA DE NOTIFICACION CARTA CUMPLIMIENTO O ARCHIVO
        </td>
        <TD>
            <input type = "date" name = "FNotCartaArch" id="FNotCartaArch"
                   min="0001-01-01"><br></TD>
    </tr>

    <TR>
        <td>
            OBSERVACIONES OSPE
        </td>
        <td>
            <textarea rows = "4" cols = "80" name = "obsOSPE" id="obsOSPE"></textarea><br>
        </td>
    </tr>

    <TR>
        <td>
            OBSERVACIONES SGVCA
        </td>
        <td>
            <textarea rows = "4" cols = "80" name = "obsSGVCA" id="obsSGVCA"></textarea><br>
        </td>
    </tr>

    <tr align = "center">
        <td colspan = "2">
            <input type = "submit" name = "grabarCP" value = "Grabar"></td>
    </tr>
    <tr>                                
</table>

<br><br><br><br><br><br>

<table id="t1" border="1" summary="Rellena Formulario"> 
    <tr>
        <th id="th1" scope="row" class="especial" colspan="4">
            DATOS DE LA RESOLUCION DE BAJA
        </th>
    </tr> 

    <tr><td>
            FECHA DE EMISION DE BAJA OFICIO
        </td>
        <TD>
            <input type = "date" name = "FEmisionBajaOficio" min="0001-01-01" id="FEmisionBajaOficio"><br></TD>
    </tr>
    <tr>
        <td>Nº RESOLUCION DE BAJA DE OFICIO</td>
        <td><input type = "number" name = "numResBaja" id="numResBaja"></td>
    </tr>
    <tr><td>
            PERIODO INICIO DE LA BAJA DE OFICIO
        </td>
        <TD>
            <input type = "date" name = "PeriodoInicioBaja" id="PeriodoInicioBaja"
                   min="0001-01-01"><br></TD>
    </tr>

    <tr><td>
            PERIODO FIN DE LA BAJA DE OFICIO
        </td>
        <TD>
            <input type = "date" name = "PeriodoFinBaja" id="PeriodoFinBaja"
                   min="0001-01-01"><br></TD>
    </tr>

    <tr><td>
            FECHA NOTIFICACION PERSONAL EMPLEADOR
        </td>
        <TD>
            <input type = "date" name = "NotBajaEmpleador" id="NotBajaEmpleador"
                   min="0001-01-01"><br></TD>
    </tr>

    <tr><td>
            FECHA NOTIFICACION PERSONAL ASEGURADO
        </td>
        <TD>
            <input type = "date" name = "NotBajaAsegurado" id="NotBajaAsegurado"
                   min="0001-01-01"><br></TD>
    </tr>

    <tr> <td>
            ESTADO DE LA RESOLUCION /<br> RESPUESTA A LA RESOLUCION DE BAJA</td>
        <td><select name = "idTRRBOficio" id="idTRRBOficio">
                <option value = "0"></option>
                <option value = "1">FIRME Y CONSENTIDA</option>
                <option value = "2">FUNDADO - 1RA INSTANCIA</option>
                <option value = "3">INFUNDADO - 1RA INSTANCIA</option>
                <option value = "4">IMPROCEDENTE - 1RA INSTANCIA</option>
                <option value = "5">FUNDADO EN PARTE - 1RA INSTANCIA</option>
                <option value = "6">INADMISIBLE - 1RA INSTANCIA</option>
                <option value = "7">DECLARACION DE NULIDAD - 1RA INSTANCIA</option>
                <option value = "8">RECURSO IMPUGNATORIO - 2DA INSTANCIA</option>
                <option value = "9">PROCESO DE CALIFICACION</option>
            </select>
        </td>
    </tr>


    <tr><td>
            FECHA DE ENVIO DE CARTA A <br>FINANZAS POR RECUPERO BAJA
        </td>
        <TD>
            <input type = "date" name = "FEnvioCFinanzasBRegistro" id="FEnvioCFinanzasBRegistro"
                   min="0001-01-01"><br></TD>
    </tr>
    <tr><td>
            FECHA DE ENVIO DE CARTA A <br>PRESTACIONES ECONOMICAS POR RECUPERO BAJA
        </td>
        <TD>
            <input type = "date" name = "FEnvioCPrestEconBOficio" id="FEnvioCPrestEconBOficio"
                   min="0001-01-01"><br></TD>
    </tr>                  


    <tr align = "center">
        <td colspan = "2">
            <input type = "submit" name = "grabarCP" value = "Grabar"></td>
    </tr>
    <tr>                                
</table>


<br><br><br><br><br><br>

<table id="t1" border="1" summary="Rellena Formulario"> 
    <tr>
        <th id="th1" scope="row" class="especial" colspan="4">
            DATOS DE LA RESOLUCION DE INHABILITACIÓN
        </th>
    </tr> 

    <tr><td>
            FECHA DE EMISION DE CARTA INICIO PROCESO <br> SANCIONADOR INHABILITACION
        </td>
        <TD>
            <input type = "date" name = "FEmisionCInicioProcSanInh" min="0001-01-01" id="FEmisionCInicioProcSanInh"><br></TD>
    </tr>

    <tr><td>
            FECHA NOTIFICACION PERSONAL CARTA INICIO PROCESO <br> SANCIONADOR INHABILITACION
        </td>
        <TD>
            <input type = "date" name = "FNotCInicioProcSanInh" min="0001-01-01" id="FNotCInicioProcSanInh"><br></TD>
    </tr>


    <tr><td>
            FECHA DE EMISION DE RESOLUCION DE INHABILITACION
        </td>
        <TD>
            <input type = "date" name = "FEmisionRInhb" min="0001-01-01" id="FFEmisionRInhb"><br></TD>
    </tr>
    <tr>
        <td>Nº RESOLUCION DE INHABILITACION</td>
        <td><input type = "number" name = "numResolucionRegistro" id="numResolucionRegistro"></td>
    </tr>
    <tr><td>
            FECHA NOTIFICACION RESOLUCION INHABILITACION
        </td>
        <TD>
            <input type = "date" name = "FNotResInhab" id="FNotResInhab"
                   min="0001-01-01"><br></TD>
    </tr>

    <tr align = "center">
        <td colspan = "2">
            <input type = "submit" name = "grabarCP" value = "Grabar"></td>
    </tr>
    <tr>                                
</table>

<br><br><br><br><br><br>

<table id="t1" border="1" summary="Rellena Formulario"> 
    <tr>
        <th id="th1" scope="row" class="especial" colspan="4">
            DATOS DE LA RESOLUCION DE MULTA
        </th>
    </tr> 

    <tr><td>
            FECHA DE EMISION DE CARTA INICIO PROCESO <br> SANCIONADOR MULTA
        </td>
        <TD>
            <input type = "date" name = "FEmisionCInicioProcSanMulta" min="0001-01-01" id="FEmisionCInicioProcSanMulta"><br></TD>
    </tr>

    <tr><td>
            FECHA NOTIFICACION PERSONAL CARTA INICIO PROCESO <br> SANCIONADOR MULTA
        </td>
        <TD>
            <input type = "date" name = "FNotCInicioProcSanMulta" min="0001-01-01" id="FNotCInicioProcSanMulta"><br></TD>
    </tr>


    <tr><td>
            FECHA DE EMISION DE RESOLUCION DE MULTA
        </td>
        <TD>
            <input type = "date" name = "FEmisionRMulta" min="0001-01-01" id="FEmisionRMulta"><br></TD>
    </tr>
    <tr>
        <td>Nº RESOLUCION DE MULTA</td>
        <td><input type = "number" name = "numResolucionMulta" id="numResolucionMulta"></td>
    </tr>
    <tr><td>
            FECHA NOTIFICACION RESOLUCION MULTA
        </td>
        <TD>
            <input type = "date" name = "FNotResMulta" id="FNotResMulta"
                   min="0001-01-01"><br></TD>
    </tr>
    <tr><td>
            FECHA DE ENVIO DE CARTA A FINANZAS <BR> POR RECUPERO DE MULTA
        </td>
        <TD>
            <input type = "date" name = "FEnvioCartaFinanzasMulta" id="FEnvioCartaFinanzasMulta"
                   min="0001-01-01"><br></TD>
    </tr>


    <tr align = "center">
        <td colspan = "2">
            <input type = "submit" name = "grabarCP" value = "Grabar"></td>
    </tr>
    <tr>                                
</table>