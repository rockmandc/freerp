<?php
/*
 * Created on 25/06/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<div id="nogenera">
<?php echo submit_to_remote('Submit2', 'Generar Comprobantes', array(
         'update'   => 'comp',
         'url'      => 'tesrecchqban/comprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
</div>
<div id="comp"></div>
<script language="JavaScript" type="text/javascript">
  function comprobante(formulario)
  {
      window.open('/tesoreria_dev.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
  
var aplico='<?php echo $sf_user->getAttribute('retencion','','tesrecchqban')?>';
if (aplico=='S')
{
  if(confirm("¿Desea realizar la Órden de Pago de Retenciones?"))
  {
    toAjax(4,getUrlModuloAjax(),aplico,'','');
    window.open('/tesoreria'+getEnv()+'.php/pagemiret/edit','...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
}
</script>
