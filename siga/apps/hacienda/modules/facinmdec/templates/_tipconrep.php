<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcdeclar->getTipconrep()=="N")    { ?>
<?php
      echo radiobutton_tag('fcdeclar[tipconrep]', 'N', true,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[tipconrep]', 'J', false,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcdeclar->getTipconrep()=="J")
{
      echo radiobutton_tag('fcdeclar[tipconrep]', 'N', false,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[tipconrep]', 'J', true,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcdeclar[tipconrep]', 'N', true,array('disabled' => true)).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[tipconrep]', 'J', false,array('disabled' => true)).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>