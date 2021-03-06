<?php
// auto-generated by sfPropelAdmin
// date: 2017/02/13 05:40:56
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage autoNomdefespgen 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _filters.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('nomdefespgen/list', array('method' => 'get','name'=>'sf_admin_filters_form')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="filters_codemp"><?php echo __('Código Empresa:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codemp]', isset($filters['codemp']) ? $filters['codemp'] : null, array (
  'size' => 3,
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'nomdefespgen/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
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
	    if(document.sf_admin_filters_form.filters_loncodcar)
	    {
	    	obj = document.sf_admin_filters_form.filters_loncodcar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_loncodemp)
	    {
	    	obj = document.sf_admin_filters_form.filters_loncodemp;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_loncodorg)
	    {
	    	obj = document.sf_admin_filters_form.filters_loncodorg;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_loncoduni)
	    {
	    	obj = document.sf_admin_filters_form.filters_loncoduni;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_rupcar)
	    {
	    	obj = document.sf_admin_filters_form.filters_rupcar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_rupemp)
	    {
	    	obj = document.sf_admin_filters_form.filters_rupemp;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_ruporg)
	    {
	    	obj = document.sf_admin_filters_form.filters_ruporg;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_rupuni)
	    {
	    	obj = document.sf_admin_filters_form.filters_rupuni;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_forcar)
	    {
	    	obj = document.sf_admin_filters_form.filters_forcar;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_foremp)
	    {
	    	obj = document.sf_admin_filters_form.filters_foremp;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_fororg)
	    {
	    	obj = document.sf_admin_filters_form.filters_fororg;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_foruni)
	    {
	    	obj = document.sf_admin_filters_form.filters_foruni;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_redmon)
	    {
	    	obj = document.sf_admin_filters_form.filters_redmon;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codpre)
	    {
	    	obj = document.sf_admin_filters_form.filters_codpre;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codvac)
	    {
	    	obj = document.sf_admin_filters_form.filters_codvac;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codvacfra)
	    {
	    	obj = document.sf_admin_filters_form.filters_codvacfra;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codvaccol)
	    {
	    	obj = document.sf_admin_filters_form.filters_codvaccol;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codislr)
	    {
	    	obj = document.sf_admin_filters_form.filters_codislr;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codpres)
	    {
	    	obj = document.sf_admin_filters_form.filters_codpres;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codsso)
	    {
	    	obj = document.sf_admin_filters_form.filters_codsso;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_sueint)
	    {
	    	obj = document.sf_admin_filters_form.filters_sueint;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_asiconnom)
	    {
	    	obj = document.sf_admin_filters_form.filters_asiconnom;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_cierac)
	    {
	    	obj = document.sf_admin_filters_form.filters_cierac;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_foresc)
	    {
	    	obj = document.sf_admin_filters_form.filters_foresc;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_numrec)
	    {
	    	obj = document.sf_admin_filters_form.filters_numrec;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_forcarrac)
	    {
	    	obj = document.sf_admin_filters_form.filters_forcarrac;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_forcarocp)
	    {
	    	obj = document.sf_admin_filters_form.filters_forcarocp;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_correl)
	    {
	    	obj = document.sf_admin_filters_form.filters_correl;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_porctick)
	    {
	    	obj = document.sf_admin_filters_form.filters_porctick;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_unitrib)
	    {
	    	obj = document.sf_admin_filters_form.filters_unitrib;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_numtick)
	    {
	    	obj = document.sf_admin_filters_form.filters_numtick;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_diasem)
	    {
	    	obj = document.sf_admin_filters_form.filters_diasem;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_calesppres)
	    {
	    	obj = document.sf_admin_filters_form.filters_calesppres;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_redondeo)
	    {
	    	obj = document.sf_admin_filters_form.filters_redondeo;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_forced)
	    {
	    	obj = document.sf_admin_filters_form.filters_forced;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_corayu)
	    {
	    	obj = document.sf_admin_filters_form.filters_corayu;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_suemin)
	    {
	    	obj = document.sf_admin_filters_form.filters_suemin;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codsitemp)
	    {
	    	obj = document.sf_admin_filters_form.filters_codsitemp;
			opt = obj.getElementsByTagName('optgroup');
			for (i=0;i<opt.length;i++)
		    opt[i].label='';
	    }
	</script>
	<script language="JavaScript" type="text/javascript">
	    if(document.sf_admin_filters_form.filters_codestemp)
	    {
	    	obj = document.sf_admin_filters_form.filters_codestemp;
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
	    if(document.sf_admin_filters_form.filters_corpto)
	    {
	    	obj = document.sf_admin_filters_form.filters_corpto;
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
