  <?php $value = object_input_tag($cireging, 'getRefing', array (
  'readonly'  =>  $cireging->getId()!='' ? true : false ,
  'maxlength' => 8,
  'size' => 12,
  'control_name' => 'cireging[refing]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; if(valor!=''){ valor=valor.pad(8,'0',0); }else{ valor=valor.pad(8,'#',0) } $('cireging_refing').value=valor;$('cireging_refing').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
<script language="JavaScript" type="text/javascript">
var ids='<?php echo $cireging->getId()?>';
  var correla='<?php echo $cireging->getMansolcor(); ?>';
  if (correla=='S' && ids=='')
  {
  	$('cireging_refing').value='########';
  	$('cireging_refing').readOnly=true;
  }

</script>