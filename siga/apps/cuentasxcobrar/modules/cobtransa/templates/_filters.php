<?php
// auto-generated by PropelCidesa
// date: 2012/07/16 11:11:06
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _filters.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>
 
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('cobtransa/list', array('method' => 'get','name'=>'sf_admin_filters_form')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_numtra"><?php echo __('Nro. Transacción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[numtra]', isset($filters['numtra']) ? $filters['numtra'] : null, array (
  'size' => 12,
  'maxlength' => 10,
  'onBlur' => 'this.value=this.value.pad(10, \'0\',0);',
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_fectra"><?php echo __('Fecha Emisión:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fectra]', isset($filters['fectra']) ? $filters['fectra'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yyyy',
)) ?>
    </div>
    </div>

            <div class="form-row" id="divfiltersfecreg" style="display:none">
    <label for="filters_fecreg"><?php echo __('Fecha de Registro:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fecreg]', isset($filters['fecreg']) ? $filters['fecreg'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'size' => 10,
  'maxlength' => 10,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codcli"><?php echo __('Código Cliente:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codcli]', isset($filters['codcli']) ? $filters['codcli'] : null, array (
  'size' => 10,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nompro"><?php echo __('Nombre Cliente:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nompro]', isset($filters['nompro']) ? $filters['nompro'] : null, array (
  'size' => 20,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codedo"><?php echo __('Código Estado:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codedo]', isset($filters['codedo']) ? $filters['codedo'] : null, array (
  'size' => 10,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nomedo"><?php echo __('Nombre Estado:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomedo]', isset($filters['nomedo']) ? $filters['nomedo'] : null, array (
  'size' => 20,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_destra"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[destra]', isset($filters['destra']) ? $filters['destra'] : null, array (
  'size' => 20,
  'maxlength' => 1000,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'cobtransa/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_numtra)
	    {
	    	obj = document.sf_admin_filters_form.filters_numtra;
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
	    if(document.sf_admin_filters_form.filters_codcli)
	    {
	    	obj = document.sf_admin_filters_form.filters_codcli;
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
	    if(document.sf_admin_filters_form.filters_montra)
	    {
	    	obj = document.sf_admin_filters_form.filters_montra;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_totdsc)
	    {
	    	obj = document.sf_admin_filters_form.filters_totdsc;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_totrec)
	    {
	    	obj = document.sf_admin_filters_form.filters_totrec;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_tottra)
	    {
	    	obj = document.sf_admin_filters_form.filters_tottra;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_status)
	    {
	    	obj = document.sf_admin_filters_form.filters_status;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_numcom)
	    {
	    	obj = document.sf_admin_filters_form.filters_numcom;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_feccom)
	    {
	    	obj = document.sf_admin_filters_form.filters_feccom;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fatipmov_id)
	    {
	    	obj = document.sf_admin_filters_form.filters_fatipmov_id;
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