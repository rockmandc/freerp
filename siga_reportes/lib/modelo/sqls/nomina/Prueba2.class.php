<?php
require_once("../../lib/modelo/baseClases.class.php");
class Prueba2 extends BaseClases {

  public function sqlp($ced1,$ced2,$mes1,$mes2,$dia1,$dia2)
    {
	    $sql= "SELECT CODEMP AS CEDULA, NOMEMP AS NOMBRE, TO_CHAR(FECNAC, 'DD/MM/YYYY') AS FECHA,
	    		Extract(year from age(now(),FECNAC)) AS EDAD, CAST(CODEMP AS INT) AS CEDORD
	    		FROM NPHOJINT
	    		WHERE CEDEMP >= '".$ced1."' AND CEDEMP <= '".$ced2."'
	    		AND STAEMP='A'
				ORDER BY to_char(FECNAC,'MM'),to_char(FECNAC,'DD'),to_char(FECNAC,'YY'),CEDORD";
      //   print '<pre>'; print $sql;exit;
	      return $this->select($sql);

    }


}
?>