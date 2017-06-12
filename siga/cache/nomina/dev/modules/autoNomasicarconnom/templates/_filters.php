<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 06:10:26
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoNomasicarconnom 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _filters.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('nomasicarconnom/list', array('method' => 'get','name'=>'sf_admin_filters_form')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_codemp"><?php echo __('Empleado:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codemp]', isset($filters['codemp']) ? $filters['codemp'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codnom"><?php echo __('Nómina:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codnom]', isset($filters['codnom']) ? $filters['codnom'] : null, array (
  'size' => 3,
  'maxlength' => 3,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nomemp"><?php echo __('Nombre:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomemp]', isset($filters['nomemp']) ? $filters['nomemp'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codcar"><?php echo __('Cargo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codcar]', isset($filters['codcar']) ? $filters['codcar'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codcen"><?php echo __('Centro de Costo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codcen]', isset($filters['codcen']) ? $filters['codcen'] : null, array (
  'size' => 4,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codniv2"><?php echo __('Ubicación Administrativa:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codniv2]', isset($filters['codniv2']) ? $filters['codniv2'] : null, array (
  'disabled' => true,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_desniv"><?php echo __('Descripción Ubi. Adm:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desniv]', isset($filters['desniv']) ? $filters['desniv'] : null, array (
  'disabled' => true,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'nomasicarconnom/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
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
	    if(document.sf_admin_filters_form.filters_codcar)
	    {
	    	obj = document.sf_admin_filters_form.filters_codcar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codnom)
	    {
	    	obj = document.sf_admin_filters_form.filters_codnom;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codcat)
	    {
	    	obj = document.sf_admin_filters_form.filters_codcat;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fecasi)
	    {
	    	obj = document.sf_admin_filters_form.filters_fecasi;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_nomemp)
	    {
	    	obj = document.sf_admin_filters_form.filters_nomemp;
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
	    if(document.sf_admin_filters_form.filters_nomnom)
	    {
	    	obj = document.sf_admin_filters_form.filters_nomnom;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_nomcat)
	    {
	    	obj = document.sf_admin_filters_form.filters_nomcat;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_unieje)
	    {
	    	obj = document.sf_admin_filters_form.filters_unieje;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_sueldo)
	    {
	    	obj = document.sf_admin_filters_form.filters_sueldo;
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
	    if(document.sf_admin_filters_form.filters_nronom)
	    {
	    	obj = document.sf_admin_filters_form.filters_nronom;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_montonomina)
	    {
	    	obj = document.sf_admin_filters_form.filters_montonomina;
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
	    if(document.sf_admin_filters_form.filters_codtipgas)
	    {
	    	obj = document.sf_admin_filters_form.filters_codtipgas;
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
	    if(document.sf_admin_filters_form.filters_grado)
	    {
	    	obj = document.sf_admin_filters_form.filters_grado;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_paso)
	    {
	    	obj = document.sf_admin_filters_form.filters_paso;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codtipded)
	    {
	    	obj = document.sf_admin_filters_form.filters_codtipded;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codtipcat)
	    {
	    	obj = document.sf_admin_filters_form.filters_codtipcat;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codmotcamcar)
	    {
	    	obj = document.sf_admin_filters_form.filters_codmotcamcar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codtie)
	    {
	    	obj = document.sf_admin_filters_form.filters_codtie;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_juscam)
	    {
	    	obj = document.sf_admin_filters_form.filters_juscam;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codcen)
	    {
	    	obj = document.sf_admin_filters_form.filters_codcen;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codttrab)
	    {
	    	obj = document.sf_admin_filters_form.filters_codttrab;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codnivc)
	    {
	    	obj = document.sf_admin_filters_form.filters_codnivc;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_carlibnom)
	    {
	    	obj = document.sf_admin_filters_form.filters_carlibnom;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codeve)
	    {
	    	obj = document.sf_admin_filters_form.filters_codeve;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codtipemp)
	    {
	    	obj = document.sf_admin_filters_form.filters_codtipemp;
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