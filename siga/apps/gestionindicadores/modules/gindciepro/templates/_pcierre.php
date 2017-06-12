<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>

<ul  class="sf_admin_actions" >
<?php echo submit_tag_click( 'Cerrar Programacion', array(
			   'name' => 'save',
			   'class' => 'sf_admin_action_save',
               'onClick'=> remote_function(array(
				  'url'      => 'gindciepro/ajax',
				  'script'   => true,
				  'condition'=> "  confirm('¿Seguro Desea Cerrar la Programacion?')",
			   'complete' => 'AjaxJSON(request, json)',
			   'with'     => "'ajax=2&trimestre='+$('giproanu_numtrim').value+'&ano='+$('giproanu_anoindg').value+'&revision='+$('giproanu_revanoindg').value",
				        )),  		   
			   
));

 ?>
</ul>

