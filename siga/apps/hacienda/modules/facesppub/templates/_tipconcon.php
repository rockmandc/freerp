<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcesplic->getTipconcon()=="N")    { ?>
<?php
      echo radiobutton_tag('fcesplic[tipconcon]', 'N', true, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcesplic[tipconcon]', 'J', false, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcesplic->getTipconcon()=="J")
{
      echo radiobutton_tag('fcesplic[tipconcon]', 'N', false, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcesplic[tipconcon]', 'J', true, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcesplic[tipconcon]', 'N', true, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcesplic[tipconcon]', 'J', false, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>