<?php
// auto-generated by PropelCidesa
// date: 2017/02/17 10:32:03
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
<?php echo form_tag('fapedido/list', array('method' => 'get','name'=>'sf_admin_filters_form')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_nroped"><?php echo __('Número:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nroped]', isset($filters['nroped']) ? $filters['nroped'] : null, array (
  'size' => 8,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_fecped"><?php echo __('Fecha:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fecped]', isset($filters['fecped']) ? $filters['fecped'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yyyy',
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codcli"><?php echo __('Cod. Cliente:') ?></label>
    <div class="content">
    <?php echo object_select_tag(isset($filters['codcli']) ? $filters['codcli'] : null, null, array (
  'include_blank' => true,
  'related_class' => 'Facliente',
  'text_method' => '__toString',
  'control_name' => 'filters[codcli]',
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nompro"><?php echo __('Nombre:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nompro]', isset($filters['nompro']) ? $filters['nompro'] : null, array (
  'disabled' => true,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_refped"><?php echo __('Referencia:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[refped]', isset($filters['refped']) ? $filters['refped'] : null, array (
  'size' => 8,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codedo"><?php echo __('Estado:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codedo]', isset($filters['codedo']) ? $filters['codedo'] : null, array (
  'size' => 4,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nomedo"><?php echo __('Nomedo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomedo]', isset($filters['nomedo']) ? $filters['nomedo'] : null, array (
  'disabled' => true,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_desped"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desped]', isset($filters['desped']) ? $filters['desped'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'fapedido/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_nroped)
	    {
	    	obj = document.sf_admin_filters_form.filters_nroped;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fecped)
	    {
	    	obj = document.sf_admin_filters_form.filters_fecped;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_refped)
	    {
	    	obj = document.sf_admin_filters_form.filters_refped;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_tipref)
	    {
	    	obj = document.sf_admin_filters_form.filters_tipref;
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
	    if(document.sf_admin_filters_form.filters_desped)
	    {
	    	obj = document.sf_admin_filters_form.filters_desped;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_monped)
	    {
	    	obj = document.sf_admin_filters_form.filters_monped;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_obsped)
	    {
	    	obj = document.sf_admin_filters_form.filters_obsped;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_reapor)
	    {
	    	obj = document.sf_admin_filters_form.filters_reapor;
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
	    if(document.sf_admin_filters_form.filters_fecanu)
	    {
	    	obj = document.sf_admin_filters_form.filters_fecanu;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fecicon)
	    {
	    	obj = document.sf_admin_filters_form.filters_fecicon;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fecfcon)
	    {
	    	obj = document.sf_admin_filters_form.filters_fecfcon;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codprg)
	    {
	    	obj = document.sf_admin_filters_form.filters_codprg;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_conpag_id)
	    {
	    	obj = document.sf_admin_filters_form.filters_conpag_id;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_numcar)
	    {
	    	obj = document.sf_admin_filters_form.filters_numcar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_nrodon)
	    {
	    	obj = document.sf_admin_filters_form.filters_nrodon;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codalmusu)
	    {
	    	obj = document.sf_admin_filters_form.filters_codalmusu;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_created_at)
	    {
	    	obj = document.sf_admin_filters_form.filters_created_at;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_updated_at)
	    {
	    	obj = document.sf_admin_filters_form.filters_updated_at;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_created_by_user)
	    {
	    	obj = document.sf_admin_filters_form.filters_created_by_user;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_updated_by_user)
	    {
	    	obj = document.sf_admin_filters_form.filters_updated_by_user;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fecdes)
	    {
	    	obj = document.sf_admin_filters_form.filters_fecdes;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fechas)
	    {
	    	obj = document.sf_admin_filters_form.filters_fechas;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codedo)
	    {
	    	obj = document.sf_admin_filters_form.filters_codedo;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codciu)
	    {
	    	obj = document.sf_admin_filters_form.filters_codciu;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codmun)
	    {
	    	obj = document.sf_admin_filters_form.filters_codmun;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codpar)
	    {
	    	obj = document.sf_admin_filters_form.filters_codpar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_coddirec)
	    {
	    	obj = document.sf_admin_filters_form.filters_coddirec;
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
