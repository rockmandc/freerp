<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 05:45:12
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoNomdefespban 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _filters.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('nomdefespban/list', array('method' => 'get','name'=>'sf_admin_filters_form')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_codban"><?php echo __('Código:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codban]', isset($filters['codban']) ? $filters['codban'] : null, array (
  'size' => 2,
  'maxlength' => 2,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nomban"><?php echo __('Descripcion:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomban]', isset($filters['nomban']) ? $filters['nomban'] : null, array (
  'size' => 20,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'nomdefespban/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codban)
	    {
	    	obj = document.sf_admin_filters_form.filters_codban;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_nomban)
	    {
	    	obj = document.sf_admin_filters_form.filters_nomban;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codbanele)
	    {
	    	obj = document.sf_admin_filters_form.filters_codbanele;
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
