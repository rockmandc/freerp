<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 06:09:07
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoNomdefespcar 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _filters.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('nomdefespcar/list', array('method' => 'get','name'=>'sf_admin_filters_form')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_codcar"><?php echo __('Código:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codcar]', isset($filters['codcar']) ? $filters['codcar'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nomcar"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomcar]', isset($filters['nomcar']) ? $filters['nomcar'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'nomdefespcar/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codcar)
	    {
	    	obj = document.sf_admin_filters_form.filters_codcar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_nomcar)
	    {
	    	obj = document.sf_admin_filters_form.filters_nomcar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_suecar)
	    {
	    	obj = document.sf_admin_filters_form.filters_suecar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_stacar)
	    {
	    	obj = document.sf_admin_filters_form.filters_stacar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codocp)
	    {
	    	obj = document.sf_admin_filters_form.filters_codocp;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_punmin)
	    {
	    	obj = document.sf_admin_filters_form.filters_punmin;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_graocp)
	    {
	    	obj = document.sf_admin_filters_form.filters_graocp;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_comcar)
	    {
	    	obj = document.sf_admin_filters_form.filters_comcar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_pasocp)
	    {
	    	obj = document.sf_admin_filters_form.filters_pasocp;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codtip)
	    {
	    	obj = document.sf_admin_filters_form.filters_codtip;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_pricar)
	    {
	    	obj = document.sf_admin_filters_form.filters_pricar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_canhom)
	    {
	    	obj = document.sf_admin_filters_form.filters_canhom;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_canmuj)
	    {
	    	obj = document.sf_admin_filters_form.filters_canmuj;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_carvan)
	    {
	    	obj = document.sf_admin_filters_form.filters_carvan;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_canmix)
	    {
	    	obj = document.sf_admin_filters_form.filters_canmix;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_canphom)
	    {
	    	obj = document.sf_admin_filters_form.filters_canphom;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_canpmuj)
	    {
	    	obj = document.sf_admin_filters_form.filters_canpmuj;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_canvhom)
	    {
	    	obj = document.sf_admin_filters_form.filters_canvhom;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_canvmuj)
	    {
	    	obj = document.sf_admin_filters_form.filters_canvmuj;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codniv)
	    {
	    	obj = document.sf_admin_filters_form.filters_codniv;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_retcar)
	    {
	    	obj = document.sf_admin_filters_form.filters_retcar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_canpmix)
	    {
	    	obj = document.sf_admin_filters_form.filters_canpmix;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_id)
	    {
	    	obj = document.sf_admin_filters_form.filters_id;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
