<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 05:36:53
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoApliuser 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _filters.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('apliuser/list', array('method' => 'get','name'=>'sf_admin_filters_form')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_loguse"><?php echo __('Usuario:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[loguse]', isset($filters['loguse']) ? $filters['loguse'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codapl"><?php echo __('Módulo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codapl]', isset($filters['codapl']) ? $filters['codapl'] : null, array (
  'size' => 3,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nomopc"><?php echo __('Módulo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomopc]', isset($filters['nomopc']) ? $filters['nomopc'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_priuse"><?php echo __('Privilegios:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[priuse]', isset($filters['priuse']) ? $filters['priuse'] : null, array (
  'size' => 2,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'apliuser/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codapl)
	    {
	    	obj = document.sf_admin_filters_form.filters_codapl;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_loguse)
	    {
	    	obj = document.sf_admin_filters_form.filters_loguse;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codemp)
	    {
	    	obj = document.sf_admin_filters_form.filters_codemp;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_nomopc)
	    {
	    	obj = document.sf_admin_filters_form.filters_nomopc;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_priuse)
	    {
	    	obj = document.sf_admin_filters_form.filters_priuse;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_desopc)
	    {
	    	obj = document.sf_admin_filters_form.filters_desopc;
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