<?php

require_once("../../lib/modelo/baseClases.class.php");

class Repdoc extends baseClases {

  function sqlp($tipo, $fechades, $fechahas, $codigodes, $codigohas, $estado, $anulado, $fechadocdes, $fechadochas, $fechaatedes, $fechaatehas)
  {
    //0=>Nuevo, 1=>Atendido, 2=>Anulado, 3=>Culminado, 4=>Todos
    if($tipo!='0') $tipo = " a.id like ('".$tipo."') and ";
    else  $tipo = '  ';

    if($estado!='99') $estado = " and b.staate >= ('".$estado."') ";
    else  $estado = ' ';

    if($anulado!='99') $anulado = " and b.anuate <= ('".$anulado."') and ";
    else  $anulado = ' ';

    $sql="select a.tipdoc, b.coddoc,
            (case when b.staate= 0 then 'Nuevo' else (case when b.staate= 1 then 'Atendido' else (case when b.staate= 2 then 'Anulado' else (case when b.staate= 3 then 'Culminado' end) end) end) end) as estado,
            b.fecdoc, min(c.fecrec) as fecrec, c.id_acunidad_ori as origen, c.id_acunidad_des as destino,
            c.fecate
            from
            dftabtip a, dfatendoc b, dfatendocdet c
            where
            ".$tipo."
             c.fecrec >= to_date('".$fechades."','YYYY-MM-DD')
            and c.fecrec <= to_date('".$fechahas."','YYYY-MM-DD')
            and b.fecdoc >= '".$fechadocdes."'
            and c.fecate >= to_date('".$fechaatedes."','YYYY-MM-DD')
            and c.fecate <= to_date('".$fechaatehas."','YYYY-MM-DD')
            and b.fecdoc <= '".$fechadochas."'
            and b.coddoc >= '".$codigodes."'
            and b.coddoc <= '".$codigohas."'
            ".$estado."
            ".$anulado."
            and a.id = b.id_dftabtip
            and b.id = c.id_dfatendoc
            group BY
            a.tipdoc, b.coddoc, b.staate, b.fecdoc, c.id_acunidad_ori, c.id_acunidad_des,c.fecate order by a.tipdoc asc, c.fecate asc";
//print $sql; exit();
    return $this->select($sql);
  }
}
?>