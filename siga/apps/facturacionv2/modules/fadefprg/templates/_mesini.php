<?php
    echo select_tag('fadefprg[mesini]', options_for_select(Array('01' => '01', '02' => '02', '03' => '03',
'04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10',
'11' => '11', '12' => '12',), $fadefprg->getMesini()))
?>