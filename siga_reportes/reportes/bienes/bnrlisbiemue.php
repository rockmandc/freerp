<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>FREERP Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");

	require_once("../../lib/general/funciones.php");
	$bd=new basedatosAdo();
?>
<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#0975D1">
    <tr>
      <td width="190" rowspan="2" bgcolor="#0975D1" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></a></td>
      <td colspan="2" class="cell_date" align="right">
		
		</td>
    </tr>
    <tr>
      <td width="313">&nbsp; </td>
      <td width="257" align="right" valign="middle" class="cell_logout">&nbsp;</td>
    </tr>
  </table>
  <table width="760"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="6" align="left" valign="top" class="cell_left_line02"><img src="../../img/center02_tl.gif" width="6" height="6"></td>
      <td rowspan="2" valign="top" class="cell_padding_01"> <p class="breadcrumb">Reportes
        </p>
        <fieldset>

        <div align="left">&nbsp;
          <table width="612"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>LISTADO
                  DE BIENES MUEBLES
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="186" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="174"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly></td>
              <td width="238">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Salida del
                  Reporte:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td> <strong>
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
                IMPRESORA</strong></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>C&oacute;digo del Activo:</strong></td>
              <td>
                <?

			  	$tb=$bd->select("SELECT min(a.codact) as valor FROM bnregmue a, bndefact b where a.codact = b.codact");
			  ?>
                <input type="text" name="codact1" class="breadcrumb" id="codact1" value="<? print $tb->fields["valor"];?>"/>
   				<input type="button" name="Button" value="..." onClick="catalogo1('codact1');" />

                </td>
              <td>
                 <?

			  	$tb=$bd->select("SELECT max(a.codact) as valor FROM bnregmue a, bndefact b where a.codact = b.codact");
			  ?>
                <input type="text" name="codact2" class="breadcrumb" id="codact2" value="<? print $tb->fields["valor"];?>"/>
   				<input type="button" name="Button" value="..." onClick="catalogo1('codact2');" />
   				</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>C&oacute;digo del Bien: </strong></td>
              <td>
                <?

			  	$tb=$bd->select("SELECT min(codmue) as valor FROM bnregmue");
               ?>
                <input type="text" name="codmue1" class="breadcrumb" id="codmue1" value="<? print $tb->fields["valor"];?>"/>
   				<input type="button" name="Button" value="..." onClick="catalogo2('codmue1');" />
               </td>
              <td>
                <?

			  	$tb=$bd->select("SELECT max(codmue) as valor FROM bnregmue");
               ?>
                <input type="text" name="codmue2" class="breadcrumb" id="codmue2" value="<? print $tb->fields["valor"];?>"/>
   				<input type="button" name="Button" value="..." onClick="catalogo2('codmue2');" />
                </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Fecha de Registro:</strong></td>
              <td> <div align="left"> </div>
                <div align="left">
                  <?

			  	$tb=$bd->select("SELECT to_char(MIN(fecreg),'DD/MM/YYYY') as fecha FROM bnregmue");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}

			  	$tb2=$bd->select("SELECT to_char(MAX(fecreg),'DD/MM/YYYY') as fecha FROM bnregmue");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}

				?>
                  <input name="fecreg1" type="text" class="breadcrumb" id="feccom1" datepicker="true" value="<? print $fecini;?>">
                </div></td>
              <td><input name="fecreg2" type="text" class="breadcrumb" id="feccom2" datepicker="true" value="<? print $fecdes;?>"></td>
            </tr>
            <tr>
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>NOMBRE</strong></td>
              <td><strong>CARGO</strong></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Preparado :</strong></div></td>
              <td><div align="left">
                <input  class="breadcrumb" name="prenom" type="text" id="prenom" value= " ">
                </div></td>
              <td><div align="left">
                  <input  class="breadcrumb" name="precar" type="text" id="precar" value= "Registradora de Bienes">
                </div></td >
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Conformado:</strong></div></td>
              <td><div align="left">
                  <input class="breadcrumb" name="confnom" type="text" id="confnom" value= " " >
                </div></td>
              <td><div align="left">
                  <input class="breadcrumb"  name="confcar" type="text" id="confcar" value= "Directora de Finanzas">
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Aprobado:</strong></td>
              <td><div align="left">
                  <input  class="breadcrumb" name="apronom" type="text" id="apronom" value= " ">
                </div></td>
              <td><div align="left">
                  <input  class="breadcrumb" name="aprocar" type="text" id="aprocar" value= "Contralor Municipal ">
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2"><input name="sqls" type="hidden" id="sqls"></td>
            </tr>
          </table>
        </div>
        <div align="left">&nbsp; </div>
        </fieldset>
        <table width="356"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="38" rowspan="3" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="258"><img src="../../img/box01_tl.gif" width="6" height="6"></td>
            <td width="60" align="right"><img src="../../img/box01_tr.gif" width="6" height="6"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input name="Button" type="button" class="form_button01" value="Generar" onClick="enviar()">
              <input name="Button" type="button" class="form_button01" value="   Salir    " onClick="cerrar()"> </td>
          </tr>
          <tr>
            <td><img src="../../img/box01_bl.gif" width="6" height="6"></td>
            <td align="right"><img src="../../img/box01_br.gif" width="6" height="6"></td>
          </tr>
        </table></td>
      <td width="6" align="right" valign="top"><img src="../../img/center01_tr.gif" width="6" height="6"></td>
      <td width="40" rowspan="2" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="bottom" class="cell_left_line02"><img src="../../img/center02_bl.gif" width="6" height="6"></td>
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="8" height="30"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="LISTADO DE BIENES MUEBLES";
	f.action="r.php?m=<?php echo TraerModuloReporte()?>&r=<?php echo TraerNombreReporte()?>";
	f.submit();
}
function cerrar()
{

window.close();
}
function catalogo1(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT DISTINCT a.codact as cod, b.desact as des FROM bnregmue a, bndefact b where a.codact = b.codact ORDER BY a.codact";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT DISTINCT(codmue), desmue FROM bnregmue ORDER BY codmue ASC";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
</script>
<? $bd->closed(); ?>
<?$bd->closed();?>
	</html>

