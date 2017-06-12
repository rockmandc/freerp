<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 06:29:04
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoAlmregart 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _filters.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('almregart/list', array('method' => 'get','name'=>'sf_admin_filters_form')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_codart"><?php echo __('Código:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codart]', isset($filters['codart']) ? $filters['codart'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_desart"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desart]', isset($filters['desart']) ? $filters['desart'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_tipo"><?php echo __('(A)rtículo ó (S)ervicio:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[tipo]', isset($filters['tipo']) ? $filters['tipo'] : null, array (
  'size' => 1,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_ramart"><?php echo __('Cod. Ramo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[ramart]', isset($filters['ramart']) ? $filters['ramart'] : null, array (
  'size' => 6,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codalt"><?php echo __('Código Alternativo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codalt]', isset($filters['codalt']) ? $filters['codalt'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_staart"><?php echo __('Estatus:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[staart]', isset($filters['staart']) ? $filters['staart'] : null, array (
  'size' => 1,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'almregart/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codart)
	    {
	    	obj = document.sf_admin_filters_form.filters_codart;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_desart)
	    {
	    	obj = document.sf_admin_filters_form.filters_desart;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codcta)
	    {
	    	obj = document.sf_admin_filters_form.filters_codcta;
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
	    if(document.sf_admin_filters_form.filters_ramart)
	    {
	    	obj = document.sf_admin_filters_form.filters_ramart;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_cosult)
	    {
	    	obj = document.sf_admin_filters_form.filters_cosult;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_cospro)
	    {
	    	obj = document.sf_admin_filters_form.filters_cospro;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_exitot)
	    {
	    	obj = document.sf_admin_filters_form.filters_exitot;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_unimed)
	    {
	    	obj = document.sf_admin_filters_form.filters_unimed;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_unialt)
	    {
	    	obj = document.sf_admin_filters_form.filters_unialt;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_relart)
	    {
	    	obj = document.sf_admin_filters_form.filters_relart;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fecult)
	    {
	    	obj = document.sf_admin_filters_form.filters_fecult;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_invini)
	    {
	    	obj = document.sf_admin_filters_form.filters_invini;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codmar)
	    {
	    	obj = document.sf_admin_filters_form.filters_codmar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codref)
	    {
	    	obj = document.sf_admin_filters_form.filters_codref;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_costot)
	    {
	    	obj = document.sf_admin_filters_form.filters_costot;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_sigecof)
	    {
	    	obj = document.sf_admin_filters_form.filters_sigecof;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codclaart)
	    {
	    	obj = document.sf_admin_filters_form.filters_codclaart;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_lotuni)
	    {
	    	obj = document.sf_admin_filters_form.filters_lotuni;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_ctavta)
	    {
	    	obj = document.sf_admin_filters_form.filters_ctavta;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_ctacos)
	    {
	    	obj = document.sf_admin_filters_form.filters_ctacos;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_ctapro)
	    {
	    	obj = document.sf_admin_filters_form.filters_ctapro;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_preart)
	    {
	    	obj = document.sf_admin_filters_form.filters_preart;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_distot)
	    {
	    	obj = document.sf_admin_filters_form.filters_distot;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_tipo)
	    {
	    	obj = document.sf_admin_filters_form.filters_tipo;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_tip0)
	    {
	    	obj = document.sf_admin_filters_form.filters_tip0;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_coding)
	    {
	    	obj = document.sf_admin_filters_form.filters_coding;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_mercon)
	    {
	    	obj = document.sf_admin_filters_form.filters_mercon;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codartsnc)
	    {
	    	obj = document.sf_admin_filters_form.filters_codartsnc;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_tipreg)
	    {
	    	obj = document.sf_admin_filters_form.filters_tipreg;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_perbienes)
	    {
	    	obj = document.sf_admin_filters_form.filters_perbienes;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_ctatra)
	    {
	    	obj = document.sf_admin_filters_form.filters_ctatra;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_cosunipri)
	    {
	    	obj = document.sf_admin_filters_form.filters_cosunipri;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_ctadef)
	    {
	    	obj = document.sf_admin_filters_form.filters_ctadef;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_tippro)
	    {
	    	obj = document.sf_admin_filters_form.filters_tippro;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codbar)
	    {
	    	obj = document.sf_admin_filters_form.filters_codbar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_nacimp)
	    {
	    	obj = document.sf_admin_filters_form.filters_nacimp;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codalt)
	    {
	    	obj = document.sf_admin_filters_form.filters_codalt;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_staart)
	    {
	    	obj = document.sf_admin_filters_form.filters_staart;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codunimed)
	    {
	    	obj = document.sf_admin_filters_form.filters_codunimed;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_claart)
	    {
	    	obj = document.sf_admin_filters_form.filters_claart;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_nomcom)
	    {
	    	obj = document.sf_admin_filters_form.filters_nomcom;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_cosact)
	    {
	    	obj = document.sf_admin_filters_form.filters_cosact;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_feccac)
	    {
	    	obj = document.sf_admin_filters_form.filters_feccac;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_consbue)
	    {
	    	obj = document.sf_admin_filters_form.filters_consbue;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_tipmat)
	    {
	    	obj = document.sf_admin_filters_form.filters_tipmat;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_clamat)
	    {
	    	obj = document.sf_admin_filters_form.filters_clamat;
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