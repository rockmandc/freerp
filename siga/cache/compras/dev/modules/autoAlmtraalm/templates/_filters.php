<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/17 10:46:45
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoAlmtraalm 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _filters.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('almtraalm/list', array('method' => 'get','name'=>'sf_admin_filters_form')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_codtra"><?php echo __('Número:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codtra]', isset($filters['codtra']) ? $filters['codtra'] : null, array (
  'size' => 8,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_destra"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[destra]', isset($filters['destra']) ? $filters['destra'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_fectra"><?php echo __('Fecha:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fectra]', isset($filters['fectra']) ? $filters['fectra'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yyyy',
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_almori"><?php echo __('Almacen Origen:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[almori]', isset($filters['almori']) ? $filters['almori'] : null, array (
  'size' => 6,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_almdes"><?php echo __('Almacen Destino:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[almdes]', isset($filters['almdes']) ? $filters['almdes'] : null, array (
  'size' => 6,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'almtraalm/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codtra)
	    {
	    	obj = document.sf_admin_filters_form.filters_codtra;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fectra)
	    {
	    	obj = document.sf_admin_filters_form.filters_fectra;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_destra)
	    {
	    	obj = document.sf_admin_filters_form.filters_destra;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_almori)
	    {
	    	obj = document.sf_admin_filters_form.filters_almori;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codubiori)
	    {
	    	obj = document.sf_admin_filters_form.filters_codubiori;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_almdes)
	    {
	    	obj = document.sf_admin_filters_form.filters_almdes;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codubides)
	    {
	    	obj = document.sf_admin_filters_form.filters_codubides;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_statra)
	    {
	    	obj = document.sf_admin_filters_form.filters_statra;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_obstra)
	    {
	    	obj = document.sf_admin_filters_form.filters_obstra;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codemptra)
	    {
	    	obj = document.sf_admin_filters_form.filters_codemptra;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fadefveh_id)
	    {
	    	obj = document.sf_admin_filters_form.filters_fadefveh_id;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fadefcho_id)
	    {
	    	obj = document.sf_admin_filters_form.filters_fadefcho_id;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fecsal)
	    {
	    	obj = document.sf_admin_filters_form.filters_fecsal;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_feclle)
	    {
	    	obj = document.sf_admin_filters_form.filters_feclle;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fecanu)
	    {
	    	obj = document.sf_admin_filters_form.filters_fecanu;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_desanu)
	    {
	    	obj = document.sf_admin_filters_form.filters_desanu;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_usuanu)
	    {
	    	obj = document.sf_admin_filters_form.filters_usuanu;
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
