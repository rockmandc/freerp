<?php
/**
 * Constantes: Clase estática que contiene las listas constantes de la aplicacion
 *
 * @package    Roraima
 * @subpackage lib
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Constantes.class.php 61387 2015-04-08 18:28:43Z dmartinez $
 *ListaOcupacion
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Constantes
{
  // Variables de nombres de módulos
  // para ser usados en los Logs del sistema
  // Para los Log se colocaria una instruccion como la siguiente:
  // $this->logMessage(Contantes::Autenticacion.' Mi Mensaje','info');
  // ó
  // $this->logMessage(Contantes::Compras.' Mi Mensaje','info');
  const Autenticacion = '{Autenticacion} ';
  const Compras = '{Compras} ';
  const Tesoreria = '{Tesoreria} ';
  const Nomina = '{Nomina} ';
  CONST DECIMALES = 2;

  /**
  * @static
  * @var string REGVACIO Comentario para los registros vacíos.
  */
  CONST REGVACIO = '<!Registro no Encontrado o Vacio!>';

  public static function ListaGeneraOrdenPago()
  {return array('N' => '(No Afecta)', 'C' => 'Causa', 'O' => 'Compromete y Causa');}

  public static function ListaFrecuenciaPago()
  {return array('Q' => 'Quincenal', 'S' => 'Semanal', 'M' => 'Mensual', 'A' => 'Mensual Anticipo');}

  public static function ListaTipoCompra()
  {
     $manordman=H::getConfApp2('manordman', 'compras', 'almsolegr');
     if ($manordman=='S')
      return array('C' => 'Compra', 'S' => 'Servicio', 'M' => 'Mixto', 'T' => 'Contratación', 'G' => 'Servicios Generales', 'A' => 'Mantenimiento');
    else
      return array('C' => 'Compra', 'S' => 'Servicio', 'M' => 'Mixto', 'T' => 'Contratación', 'G' => 'Servicios Generales');
  }

    public static function ListaEstadoCivil()
  {return array('S' => 'Soltero(a)', 'C' => 'Casado(a)', 'D' => 'Divorciado(a)', 'V' => 'Viudo(a)', 'B' => 'Concubino(a)');}

    public static function ListaEstatus()
    {return array('A' => 'Activo', 'P' => 'Permiso Remunerado', 'R' => 'Retirado', 'V' => 'Vacaciones', '-' => 'Permiso No Remunerado');}

    public static function ListaSexo()
    {return array('M' => 'Masculino', 'F' => 'Femenino');}

    public static function ListaFormaPago()
    {return array('01' => 'Deposito', '02' => 'Cheque', '03' => 'Efectivo');}

    public static function ListaTipoCuenta()
    {return array('Cta Corriente' => 'Cta. Corriente', 'Cta de Ahorros' => 'Cta. de Ahorros');}

    public static function ListaTalla()
    {return array('S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL', 'XXL' => 'XXL', 'XXXL' => 'XXXL');}

    public static function ListaGrupoSanguineo()
    {return array('ARH+' => 'ARH+', 'ARH-' => 'ARH-', 'BRH+' => 'BRH+', 'BRH-' => 'BRH-', 'ABRH+' => 'ABRH+', 'ABRH-' => 'ABRH-', 'ORH+' => 'ORH+', 'ORH-' => 'ORH-');}

    public static function ListaGrupoLaboral()
    {return array('0001' => 'Fijo', '0002' => 'Contratado', '0003' => 'Pasantia', '0004' => 'Periodo de Prueba');}

    public static function ListaFormaTraslado()
    {return array('1' => 'Bicicleta', '2' => 'Motocicleta', '3' => 'Carro Propio', '4' => 'A Pie', '5' => 'En Cola', '6' => 'Transporte Publico', '7' => 'Transporte Privado', '8' => 'Transporte Minero');}

    public static function ListaTipoVivienda()
    {return array('1' => 'Rancho', '2' => 'Casa', '3' => 'Apartamento', '4' => 'Otro');}

    public static function ListaFormaTenencia()
    {return array('1' => 'Propia', '2' => 'Alquilada', '3' => 'Prestada', '4' => 'Otra');}

    public static function ListaCategorias()
    {return array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15','16' => '16');}

  public static function ListaTasa()
      {return array('B' => 'Bolivares(Bs.)', 'U' => 'Unidades Tributarias');}

  public static function ListaPeriodos()
        {return array('0' => '1 Porcion', '1' => '2 Porciones', '2' => '3 Porciones', '3' => '4 Porciones', '4' => '6 Porciones', '5' => '12 Porciones', '6' => '24 Porciones');}

  public static function ListaDescripcion()
          {return array('0' => 'Anualidad', '1' => 'Semestre', '2' => 'Cuatrisemestre', '3' => 'Trimestre', '4' => 'Bimestre', '5' => 'Mensualidad', '6' => 'Quincena');}

  public static function ListaNivelesInmueble()
            {return array('0' => '2', '1' => '3', '2' => '3', '3' => '4', '4' => '5', '5' => '6', '6' => '7', '7' => '8');}

  public static function ListaTipoRetencion()
            {return array('C' => 'Crédito', 'F' => 'Fondo');}


  public static function ListaServicios()
  {
   return array('1' => 'Aguas Blancas', '2' => 'Electrificacion', '3' => 'Aseo Urbano', '4' => 'Gas Domestico', '5' => 'Aguas Servidas', '6' => 'Telefono', '7' => 'Parques Recreacionales', '8' => 'Canchas Deportivas', '9' => 'Escuelas primarias', 'A' => 'Liceos', 'B' => 'Telefonos Publicos', 'C' => 'Puestos de Salud', 'D' => 'Abastos o Panaderia', 'E' => 'Vigilancia Policial', 'F' => 'Transporte Publico', 'G' => 'Puestos Periodicos');
  }

 public static function ListaModoCestatick()
  {
   return array('K' => 'Ticket', 'T' => 'Tarjeta');
  }

 public static function ListaConceptos()
  {
   return array('000' => 'Prestaciones Sociales', '001' => 'Intereses Sobre Prestaciones Sociales', '002' => 'Días Adicionas', '003' => 'Vacaciones Fraccionadas', '004' => 'Bono Vacacional Fraccionado', '005' => 'Aguinaldo Fracionados', '006' => 'Anticipo de Prestaciones', '007' => 'Bono Adicional');
  }


public static function PagoDoble()
  {
   return array('S' => 'SI', 'N' => 'NO');
  }


  public static function ListaNumPeriodos()
    {return array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12');}

  public static function ListaProyecto()
    {return array('P' => 'Proyecto', 'A' => 'Acción Centralizada');}

  public static function ListaTipoReporte()
  {return array('001' => 'Comprobante de Retención de I.V.A', '002' => 'Comprobante de Retención de I.S.L.R', '003' => 'Comprobante de Retención de Ley de Timbre Fiscal', '004' => 'Comprobante de Retención de Impuesto Municipal', '005' => 'Comprobante de Retención Social', '006' => 'Comprobante de Retenciones No Tributarias', '007' => 'Comprobante de Garantía de Fiel Cumplimiento', '008' => 'Comprobante de Retención Laboral');}

  public static function DistribMonto()
  {
    return array('V' => 'Variable', 'P' => 'Periódica');
    }

  public static function listaTiporg()
   {
    return array('Publico' => 'Público', 'Privado' => 'Privado');
   }

   public static function comboFrecuencia($tipo='')
   {
      if ($tipo=='Q')
      {
      return array('P' => 'Primera Quincena', 'S' => 'Segunda Quincena', 'D' => 'Las Dos Quincenas');
      }
      elseif ($tipo=='S')
      {
      return array('1' => 'Primera Semana', '2' => 'Segunda Semana', '3' => 'Tercera Semana', '4' => 'Cuarta Semana', 'U' => 'Ultima Semana', 'T' => 'Todas las Semanas');
      }
      elseif ($tipo=='M')
      {
      return array('M' => 'Mensual');
      }else return array();

   }

  public static function Capitalizacion()
  {
    return array('A' => 'Anual', 'M' => 'Mensual', 'N' => 'No Capitalizable');
    }
  public static function Tipo_Categoria()
  {
    return array('C' => 'Categoria', 'P' => 'Partida');
    }

  public static function listaAtencion()
  {
    return array('0' => 'Sin Atender', '1' => 'En Proceso', '2' => 'Culminado');
  }

  public static function listaComportamientoEstadosAyudas()
  {
    return array('0' => 'Edición', '1' => 'Bloqueado', '2' => 'Cerrado');
  }


  public static function listaAtencionCiudadanos()
  {
    return Array('A' => 'Analizado', 'E' => 'En Proceso', 'R' => 'Rechazada');;
  }


  public static function listaEstadoDocumento()
  {
    return array('0' => 'Activo', '1' => 'Anulado');
  }

  public static function listaEstadosChequeras()
  {
    return array('SI' => 'SI', 'NO' => 'NO');
  }

   public static function ListaFrecuenciaPago2()
  {return array('E' => 'Semanal', 'Q' => 'Quincenal', 'M' => 'Mensual', 'B' => 'Bimestral','T' => 'Trimestral','C' => 'Cuatrimestral','S' => 'Semestral', 'A' => 'Anual');}

  public static function ListaFuncionesCalculoConcepto()
  {

    //NOTA PARA DESARROLLO:
    //POR FAVOR MANTENER ESTE ARREGLO IDENTADO. ES MUCHO MAS FACIL DE LEER DE ESTA FORMA
    //GRACIAS

    $f = array('AAP' => 'AAP   Antiguedad en la Administración Pública',
        'AAU' => 'AAU   Antiguedad en el sector Universitario',
        'APUB' => 'APUB   Antiguedad en Años Completos Adm. Pública',
        'DV' => 'DV   Dias de Vacaciones',
        'NL' => 'NL   N° Lunes laborados del trabajador en Mes',
        'NLP' => 'NLP   N° Lunes laborados del trabajador en periodo',
        'NV' => 'NV   N° Viernes laborados del trabajador en Mes',
        'NVP' => 'NVP   N° Viernes laborados del trabajador en periodo',
        'NS' => 'NS   N° Lunes que tiene un mes determinado',
        'SIC' => 'SIC   Salario Integral del Periodo',
        'SARC' => 'SARC   Salario ARC del Periodo',
        'SIM' => 'SIM   Salario Integral por Movimientos',
        'TAF' => 'TAF   Total Asignaciones Final',
        'TDED' => 'TDED   Total Deducciones Final',
        'AC' => 'AC   Años de asignación del Cargo',
        'DC' => 'DC   Dias de asignación del Cargo',
        'ADV' => 'ADV   Ant.  del empleado en dias con Vacaciones',
        'AD' => 'AD   Antiguedad del empleado en dias',
        'AFD' => 'AFD   Antiguedad del empleado fraccion en dias',
        'ADF' => 'ADF   Antiguedad del empleado en dias a fin de año',
        'AM' => 'AM   Antiguedad del empleado en meses',
        'AMC' => 'AMC   Antiguedad del empleado en meses completos',
        'AMF' => 'AMF   Antiguedad del empleado en meses con Redondeo de Fraccion',
        'AA' => 'AA   Antiguedad del empleado en años',
        'AAFM' => 'AAFM   Antiguedad del empleado en años a fin de Mes',
        'AT' => 'AT   Años de Titularidad',
        'ACON' => 'ACON   Años de Contratacion',
        'ED' => 'ED   Edad del empleado en dias',
        'EE' => 'EE   Edad del empleado en meses',
        'CC' => 'CC      Cantidad de Cargos de un Empleado',
        'FFRAC' => 'FFRAC Retorna parte decimal de un número',
        'FINT' => 'FINT    Retorna parte entera de un número',
        'NHGR' => 'NHGR  Nº de Hijos mayores de 5 años',
        'FECN' => 'FECN   Fecha de la Nómina',
        'FECUS' => 'FECUS   Fecha última de Salida',
        'DIAF' => 'DIAF    Retorna el Día de una Fecha',
        'MESF' => 'MESF   Retorna el Mes de una Fecha',
        'ANOF' => 'ANOF   Retorna el Año de una Fecha',
        'CATRAB' => 'CATRAB   Cumpleaños del Trabajador',
        'DIAING' => 'DIAING   Día de Ingreso del TRabajador',
        'ANOING' => 'ANOING   Año de Ingreso del TRabajador',
        'NHIJ' => 'NHIJ   Nº De Hijos',
        'NHIJDIS' => 'NHIJDIS   Nº De Hijos Discapacitados',
        'SC' => 'SC   Sueldo + Compensación',
        'SCAR' => 'SCAR   Sueldo del Cargo',
        'SESC' => 'SESC   Sueldo segun Escala',
        'CCAR' => 'CCAR   Compensación del Cargo',
        'PCAR' => 'PCAR   Prima del Cargo',
        'DBV' => 'DBV   Días de Bono Vacacional',
        'PV' => 'PV   Períodos Vacacionales a Disfrutar(quincenas)',
        'NRETV' => 'NRETV   No esta retornando de Vacaciones',
        'DVACMN' => 'DVACMN Dias de Vacaciones en Mes de la Nómina',
        'DVACMA' => 'DVACMA Dias de Vacaciones en Mes Anterior de la Nómina',
        'PHIJO' => 'PHIJO Monto Prima Hijo',
        'NHIJO' => 'NHIJO Hijos Menores a Edad Suministrada',
        'NHCDG' => 'NHCDG Hijos Menores a Edad Suministrada Con Documentos de Guarderia Consignados',
        'NHMED' => 'NHMED Hijos Mayores a Edad Suministrada Con Discapacidad',
        'NHEST' => 'NHEST Hijos Menores a Edad Suministrada Estudiando',
        'NHFEC' => 'NHFEC Hijos Menores a Edad y Fecha Suministrada',
        'PPROF' => 'PPROF Monto Prima Profesionalizacion',
        'PROFE' => 'PROFE Profesion activa del Empleado',
        'PCARG' => 'PCARG Monto Cargo Colateral', 'CGUAR' =>
        'CGUAR Monto Global de Guarderías por Empleado',
        'GUARD' => 'GUARD Monto por Guardería de Hijos menores a 6 Años',
        'ACUC' => 'ACUC  Acumulador de Conceptos por Empleado',
        'ACUH' => 'ACUH  Acumulador de Conceptos periodo Historico',
        'ACUMA' => 'ACUMA  Acumulador de Conceptos  Mes Anterior',
        'ACUMVA' => 'ACUMVA  Acumulador de Conceptos  Mes Anterior Salida de Vacaciones',
        'ACUMH' => 'ACUMH  Acumulador de Conceptos Mes Historico',
        'STAB' => 'STAB   Sueldo según Escala',
        'CTAB' => 'CTAB   Compensación según Escala',
        'MCES' => 'MCES   Monto de Cesta Tickets',
        'ADIC' => 'ADIC   Dias Adicionales Prestacion Antiguedad',
        'DHAB' => 'DHAB   Días Habiles del Período',
        'DHABM' => 'DHABM   Días Habiles del Mes',
        'UTRI' => 'UTRI   Unidad Tributaria',
        'SMIN' => 'SMIN   Valor Sueldo Minimo',
        'TSSO' => 'TSSO   Tope para el Seguro Social',
        'TRPE' => 'TRPE   Tope para el Regimen Prestacional de Empleo',
        'DRIVSS' => 'DRIVSS  Días Reposo IVSS',
        'CARG' => 'CARG   Cargo Actual del Empleado',
        'NHMENEDA' => 'NHMENEDA   Numero de hijos Menores a una edad',
        'NHMENEDACIE' => 'NHMENEDACIE   Numero de hijos Menores a una edad y Constancia de Inscripción Estudiantil',
        'NHMAYEDA' => 'NHMAYEDA   Numero de hijos Mayores a una edad',
        'SIMESANT' => 'SIMESANT Salario Integral Mes Anterior',
        'SIPERANT' => 'SIPERANT Salario Integral Ultimo Período Historico',
        'SIPERH' => 'SIPERH Salario Integral Período Historico',
        'SIMESDAD' => 'SIMESDAD Salario Integral Mes Dado',
        'SINOMMESDAD' => 'SINOMMESDAD Salario Integral Mes Dado Sin Tomar Nóminas',
        'SIMESH' => 'SIMESH Salario Integral Historico del Mes',
        'SIMA' => 'SIMA Salario Integral Historico del Mes Anterior',
        'SFMESDAD' => 'SFMESDAD Salario Fideicomiso Mes Dado',
        'SFMESH' => 'SFMESH Salario Fideicomiso Historico del Mes',
        'SFMA' => 'SFMA Salario Fideicomiso Historico del Mes Anterior',
        'SFPERH' => 'SFPERH Salario Fideicomiso Período Historico',
        'SIANOANT' => 'SIANOANT   Sum. Conc. Sal. Integral Año Anterior',
        'SQVAC' => 'SQVAC   Segundas Quincenas dentro del lapso de Vacaciones',
        'DNLAB' => 'DNLAB   Días No Laborados',
        'AAPMESES' => 'AAPMESES   Antiguedad en la Administración en Meses',
        'AAPDIAS' => 'AAPDIAS   Antiguedad en la Administración Pública Días',
        'SDIAS' => 'SDIAS   Sueldo en Días',
        'SHORAS' => 'SHORAS   Sueldo en Horas',
        'NHIJEST' => 'NHIJEST   Nº De Hijos Estudiantes',
        'FECDIAS' => 'FECDIAS   Fecha en Días',
        'FECMES' => 'FECMES   Fecha en Meses',
        'FECANNOS' => 'FECANNOS   Fecha en Años',
        'CATRABMES' => 'CATRABMES   Cumpleaños del Trabajador en el Mes de la Nómina',
        'CATRABMESNS' => 'CATRABMESNS   Cumpleaños del Trabajador en el Mes para Nóminas Semanales',
        'CATRABTRI' => 'CATRABTRI   Cumpleaños del Trabajador en el Trimestre Fiscal de la Nómina',
        'ESTRIM' => 'ESTRIM   Fecha de Nomina coincide con ultimo mes del Trimestre',
        'CATRI' => 'CATRI Cumpletrimestre del Trabajador a la Fecha de la Nómina',
        'CATRIP' => 'CATRIP Cumpletrimestre del Trabajador a la Fecha de la Nómina (Antigüedad Pública)',
        'INTPRES' => 'INTPRES Intereses Sobre Prestaciones',
        'DIAADIPRE' => 'DIAADIPRE Monto Dias Adicionales de Prestaciones',
        'DM' => 'DM Dias Calculables en Mes de nomina',
        'DP' => 'DP Dias Calculables en Periodo de nomina',
        'DS' => 'DS Dias Calculables en Semana de nomina',
        'DIAADIFID' => 'DIAADIFID Monto Dias Adicionales Fideicomiso',
        'DIASBONOVAC' => 'DIASBONOVAC Dias de Bono Vacacional',
        'MESFINALANO' => 'MESFINALANO Antiguedad en meses hasta fin de Año',
        'AET' => 'AET   Antiguedad de Entrega de Titulo',
        'D360FA' => 'D360FA Antiguedad en dias a fin de Año en base a 360 dias',
        'DIAVACCON' => 'DIAVACCON Dias de Vacaciones Continuas',
        'DIAVACNOM' => 'DIAVACNOM Dias de Vacaciones en el Lapso de Nomina' ,
        'NSVAC' => 'NSVAC Número de Sábados en Lapso de Vacaciones',
        'NDVAC' => 'NDVAC Número de Domingos en Lapso de Vacaciones',
        'NFVAC' => 'NFVAC Dias Feriados en Lapso de Vacaciones' ,
        'NLVAC' => 'NLVAC Número de Lunes en Lapso de Vacaciones',
        'NLENNOM' => 'NLENNOM Número de Lunes en Periodo de Nómina',
        'PORHCM' => 'PORHCM Porcentaje HCM', 'NOEMP' => 'Nivel Organizacional del Empleado',
        'NLVACNOM' => 'NLVACNOM Número de Lunes de Vacaciones en Nómina',
        'DIFSUECARCOL' => 'DIFSUECARCOL Diferencia del sueldo Cargo Colateral - Cargo Actual',
        'NPARINC' => 'NPARINC Número de Parientes Incluidos en Nomina',
        'MATNOM' => 'MATNOM MATRIMONIO EN NOMINA(S ó N)',
        'DIFDIASAL' => 'DIFDIASAL Diferencia entre Fecha Salida Vacaciones-Fecha Nomina',
        'NLDIFVAC' => 'NLDIFVAC Numero de Lunes adelantados por vacaciones',
        '5FIDE' => '5FIDE 5 Dias de Fideicomiso',
        'AAPE' => 'AAPE Antiguedad Administracion Pública como Empleado',
        'AAPO' => 'AAPO Antiguedad Administracion Pública como Obrero',
        'DJCO' => 'DJCO Dias de Jornada de Concepto',
        'DJF' => 'DJF Días de Jornadas de un Concepto en Días Feriados',
        'TTRAB' => 'TTRAB Tipo del Trabajador',
        'TTRAH' => 'TTRAH Tipo del Trabajador Historico, fecha de  nomina',
        'CHDOC' => 'CHDOC Cantidad de Horas de un Docente',
        'CHDOCT' => 'CHDOCT Cantidad de Horas Totales de un Docente',
        'CHDOCC' => 'CHDOCC Cantidad de Horas de un Concepto',
        'MCUOHCM' => 'MCUOHCM Monto de la Cuota por HCM',
        'MCUOSFN' => 'MCUOSFN Monto de la Cuota por Servicios Funerarios',
        'NTRAB' => 'NTRAB Nivel del Trabajador',
        'DICAR' => 'DICAR Diferencia por Suplencia',
        'DSUP' => 'DSUP Días de Suplencia',
        'CXHOR' => 'CXHOR Costo x Horas según nivel',
        'PTRANS' => 'PTRANS Prima de Trasporte',
        'MNIVF' => 'MNIVF Monto Nivel de Instrucción Familiar',
        'PROREP' => 'PROREP Promedio para Reposo',
        'NHCH' =>  'NHCH Nº de Hijos con Constancia de Inscripción',
        'TRIPS' => 'TRIPS Trimestre Prestaciones Sociales',
        'BNIVF' => 'BNIVF Beca Nivel de Instrucción Familiar');
    asort($f);
    return $f;
  }



  public static function ListaDatosCalculoConcepto()
  {
    $f =  array('E00' => 'E00 Número del Empleado', 'E02' => 'E02 Cédula del Empleado', 'E02' => 'E03 Número de Contrato', 'E04' => 'E04 Estado Civil', 'E05' => 'E05 Nacionalidad', 'E06' => 'E06 Sexo', 'E07' => 'E07 Fecha de Nacimiento', 'E08' => 'E08 Edad en Años', 'E20' => 'E20 Fecha de Ingreso',
    'E21' => 'E21 Fecha de Retiro', 'E22' => 'E22 Fecha de Reingreso', 'E23' => 'E23 Fecha en Adm. Publica', 'E24' => 'E24 Situación del empleado', 'E28' => 'E28 Fecha de Cotización de Seguro Social', 'E29' => 'E29 Años en la administración Pública');
    asort($f);
    return $f;
  }

  public static function ListaOperadores()
  {
    return array('' => ' ', '=' => '=', '<' => '<', '>' => '>', '<>' => '<>', '<=' => '<=', '>=' => '>=');
  }

  public static function ListaGrupo()
            {return array('D' => 'Disponibilidad Operativa', 'C' => 'Convenios', 'F' => 'Fondos Congelados', 'I' => 'Ingresos', 'O' => 'Otros Conceptos');}

  public static function OperacionesBasica()
  {
    return array('' => ' ', 'And' => 'And', 'Or' => 'Or', '-1' => 'Condición');
  }

  public static function Contratos_nomina()
  {
   return array('S' => 'SI', 'N' => 'NO');
  }

  public static function comboOperacion()
  {
    return array('A' => 'Asignación', 'D' => 'Deducción', 'P' => 'Aporte Patronal');
    }

  public static function ListaMeses()
   {return array('01' => '01-Enero', '02' => '02-Febrero', '03' => '03-Marzo', '04' => '04-Abril', '05' => '05-Mayo', '06' => '06-Junio', '07' => '07-Julio', '08' => '08-Agosto', '09' => '09-Septiembre', '10' => '10-Octubre', '11' => '11-Noviembre', '12' => '12-Diciembre');}

  public static function Permisologias()
  {
    return array('15' => 'Salvar-Eliminar-Consultar', '11' => 'Salvar-Consultar', '8' => 'Consultar');
  }

    public static function ListaMes()
   {return array('ENERO' => 'ENERO', 'FEBRERO' => 'FEBRERO', 'MARZO' => 'MARZO', 'ABRIL' => 'ABRIL', 'MAYO' => 'MAYO', 'JUNIO' => 'JUNIO', 'JULIO' => 'JULIO', 'AGOSTO' => 'AGOSTO', 'SEPTIEMBRE' => 'SEPTIEMBRE', 'OCTUBRE' => 'OCTUBRE', 'NOVIEMBRE' => 'NOVIEMBRE', 'DICIEMBRE' => 'DICIEMBRE');}

  public static function comboTiposEjecucion()
  {
    return array('D' => 'Días', 'S' => 'Semanal', 'M' => 'Mensual');
    }

  public static function NominaEspecial()
  {
   return array('S' => 'SI', 'N' => 'NO');
  }

   public static function ListaRefiere()
  {
    return array('PE' => 'Pedido Directo', 'PR'=>'Presupuesto');
    }
     public static function ListaRefiereAgro()
  {
    return array('PE' => 'Pedido Directo','PC' => 'Pedido Directo (Carta Orden)');
    }

   public static function ListaRefiereNotaEntrega()
  {
    return array('P' => 'Pedido', 'F' => 'Factura');
    }

   public static function ListaRefiereAjuste()
  {
    return array('P' => 'Pedido', 'NE' => 'Nota de Entrega', 'F' => 'Factura');
    }

   public static function ListaRefiereDespachos()
  {
    return array('P' => 'Pedido', 'F' => 'Factura');
    }

   public static function ListaRefiereA($despnotent="")
  {
    $cametifor=H::getConfApp2('cametifor', 'facturacion', 'fapresup');
    if ($cametifor=='S'){
      if ($despnotent=="") return array('V' => 'Venta Directa', 'P' => 'Pedido', 'D' => 'Despacho', 'E' => 'Cotización'); //, 'VC' => 'Venta en Consignación');
      else return array('V' => 'Venta Directa', 'P' => 'Pedido', 'D' => 'Nota de Entrega', 'E' => 'Cotización'); //, 'VC' => 'Venta en Consignación');
    }else {
    	if ($despnotent=="") return array('V' => 'Venta Directa', 'P' => 'Pedido', 'D' => 'Despacho', 'E' => 'Presupuesto'); //, 'VC' => 'Venta en Consignación');
      else return array('V' => 'Venta Directa', 'P' => 'Pedido', 'D' => 'Nota de Entrega', 'E' => 'Presupuesto'); //, 'VC' => 'Venta en Consignación');
    }
  }

   public static function ListaTipoPagoTicket()
  {
    return array('F' => 'Dias Fijos', 'V' => 'Dias Variables', 'J' => 'Por Jornadas del Trabajor');
  }


  public static function comboPrioridadAyudas()
  {
    return array(0 => 'Baja', 1 => 'Media', 2 => 'Alta');
  }

  public static function ListaModalidad()   //Nomina
  {
    return array('T' => 'Tarjeta', 'K' => 'Ticket');
  }

  public static function ListaReportesOrdenCompras()   //Nomina
  {
    return array('S' => 'carordser.php', 'C' => 'carordpre.php', 'M' => 'carordpre.php', 'T' => 'carordser.php', 'A' => 'carordman.php');
  }

  public static function ListaMoneda()   //Viaticos
  {
    return array('B' => 'Bs', 'E' => '€', 'D' => '$');
  }

  public static function TipoReportes()
  {
    return array('T' => 'Titulo','C' => 'Contabilidad','P' => 'Presupuesto', 'I' => 'Ingresos', 'S' => 'Sumatoria');
  }

  public static function TipoModo()
  {
    return array('M' => 'Monto','P' => 'Porcentaje');
  }

  public static function Tipo_Fctipsol()
  {
    return array('I' => 'Inmueble','L' => 'Licencia','C' => 'Contribuyente');
  }
  public static function Cuantos_Fctipsol()
  {
    return array('2' => 'Todos','1' => 'El Especificado');
  }
  public static function Propietarios_Fctipsol()
  {
    return array('I' => 'Inmueble','L' => 'Licencia','E' => 'El Especificado');
  }
  public static function Mostrar_Fctipsol()
  {
    return array('S' => 'Si','N' => 'No');
  }

  public static function Modo_Fcdefrecint()
  {
    return array('' => 'Seleccione','T' => 'Tasa','P' => 'Porcentaje','M' => 'Monto');
  }

  public static function Modo_Fcmultas()
  {
    return array('I' => 'Inicio del Ejercicio','E' => 'Cierre de Declaración Estimada','D' => 'Cierre de Declaración');
  }

  public static function Unitas_Facdefespins()
  {
    return array('B' => 'Bolívares (Bs.)','U' => 'Unidades Tributarias');
  }

  public static function Unipic_Facdefespins()
  {
    return array('B' => 'Bolívares (Bs.)','U' => 'Unidades Tributarias');
  }

  public static function Fcusoveh_Facvehcla()
  {
    return array('2006' => '2006','2007' => '2007','2008' => '2008','2009' => '2009','2010' => '2010','2011' => '2011','2012' => '2012','2013' => '2013','2014' => '2014','2015' => '2015','2016' => '2016','2017' => '2017');
  }

  public static function Frecob_Facfueing()
  {
    return array('1' => 'Anualidad','2' => 'Semestral','3' => 'Cuatrimestre','4' => 'Trimestre','6' => 'Bimestre','12' => 'Mensualidad','24' => 'Quincenal','52' => 'Semanal','365' => 'Diario');
  }

  public static function Tipven_Facfueing()
  {
    return array('I' => 'Después del Inicio del Período de la Deuda','F' => 'Después del Final del Período de la Deuda');
  }

  public static function TipoMovimiento()
  {
    return array('P' => 'Precompromiso','C' => 'Compromiso','CA' => 'Causado','PA' => 'Pagado','A' => 'Adicion/Disminucion', 'T' => 'Traslado');//,'ST' => 'Solicitud de Traslado','AJ' => 'Ajuste');
  }

  public static function Numper_Faccodcatfis()
  {
    return array('1' => '1 Porción','2' => '2 Porciónes','3' => '3 Porciónes','4' => '4 Porciónes','6' => '6 Porciónes','12' => '12 Porciónes','24' => '24 Porciónes','52' => '52 Porciónes','365' => '365 Porciónes');
  }

  public static function ListaSituacionEmpleados()
  {
    return array('E' => 'Empleado', 'F' => 'Fijo', 'C' => 'Contratado', 'O' => 'Obrero', 'P' => 'Pasante', 'T' => 'Temporal');
  }

  public static function Denumper_Faccodcatfis()
  {
    return array('Anualidad' => 'Anualidad','Semestre' => 'Semestre','Cuatrimestre' => 'Cuatrimestre','Trimestre' => 'Trimestre','Bimestre' => 'Bimestre','Mensualidad' => 'Mensualidad','Quincena' => 'Quincena','Semanal' => 'Semanal','Diario' => 'Diario');
  }

  public static function Numniv_Faccodcatfis()
  {
    return array('2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10');
  }

  public static function Nivinm_Faccodcatfis()
  {
    return array('2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10');
  }

  public static function Tamano_N_Faccodcatfis()
  {
    return array('' => '', '1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9');
  }

  public static function Frepar_Facaputip()
  {
    return array('0' => 'Pago Unico','1' => 'Anualidad','2' => 'Mensualidad','3' => 'Semanal','4' => 'Diario');
  }

  public static function Tipinm_Facpicsollic()
  {
    return array('U' => 'Un Inmueble','M' => 'Mas de un Inmueble','P' => 'Parte de Inmueble');
  }

  public static function Tipest_Facpicsollic()
  {
    return array('I' => 'Industrial','C' => 'Comercial','S' => 'Indole Similar');
  }

  public static function ListaNumPeriodos2()
    {return array('00' => '00', '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06','07' => '07','08' => '08','09' => '09','10' => '10','11' => '11','12' => '12');}

  public static function ListaFormatoComprobante()
  {
    return array('####' => '####','AAMM####' => 'AAMM####','MMAA####' => 'MMAA####');
  }

  public static function ListaRelaInst()
  {
    return array('C' => 'Constribuyente', 'CC' => 'Consejo Comunales', 'P' => 'Proveedor');
  }

  public static function ListaCondOcupac()
  {
    return array('AR' => 'Arrendatario', 'A' => 'Administrador', 'P' => 'Propietario');
  }

  public static function ListaCaractConst()
  {
    return array('PA' => 'Paredes', 'T' => 'Techos', 'P' => 'Piso', 'A' => 'Acabado', 'E' => 'Edad', 'S' => 'Sanitarios');
  }

  public static function ListaCaractTierra()
  {
    return array('T' => 'Tipo', 'F' => 'Forma', 'D' => 'Dimensiones', 'S' => 'Servicios');
  }

  public static function ListaFcsollic()
  {
    return array('S' => 'Si', 'N' => 'No');
  }

  public static function TipoBono()
  {
   return array('N' => 'NINGUNO', 'V' => 'VACACIONAL', 'F' => 'FIN DE AÑO', 'P' => 'PRIMA ANTIGUEDAD');
  }

  public static function TipoPrestamo()
  {
   return array('CORTO' => 'CORTO', 'VIVIENDA' => 'VIVIENDA', 'HIPOTECARIO' => 'HIPOTECARIO', 'MEDIANO' => 'MEDIANO', 'COMERCIAL' => 'COMERCIAL', 'OTRO' => 'OTRO');
  }

  public static function Tipo_Intereses()
  {
   return array('P' => 'Promedio', 'A' => 'Activas', 'S' => 'Pasivas');
  }

  public static function Contacto_Proveedor()
  {
   return array('R' => 'Representante Legal', 'A' => 'Apoderado', 'C' => 'Contacto');
  }

    //Cooperativa, Particular, Consejo Comunal, Empresa, Organismo del Estado, Otros
  public static function TipoOrganizaciones()
  {
    return Array('O' => 'Cooperativa', 'P' => 'Particular', 'C' => 'Consejo Comunal', 'E' => 'Empresa', 'G' => 'Organismo del Estado', 'O' => 'Otros');
  }

  public static function Parentescos()
  {
   return array(0 => 'Hijo', 2 => 'Hija', 3 => 'Padre', 4 => 'Madre', 5 => 'Hermano(a)', 6 => 'Conyuge', 7 => 'Titular Masculino', 8 => 'Titular Femenino');
  }

  public static function Tipo_Asignaciones()
  {
   return array('S' => 'Sueldo', 'V' => 'Bono Vacacional', 'F' => 'Bono Fin de Año', 'O' => 'Otros');
  }

  public static function ListaEstados()
  {
    return array('A' => 'Activo', 'I' => 'Inactivo');
  }

  public static function ListaOcupacion()
  {
    return array('E' => 'Estudiante', 'T' => 'Trabajador', 'D' => 'Desempleado', 'P' => 'Pensionado');
  }

  public static function ListadeTipo() //Catastral
  {
    //return array('P' => 'Pais', 'E' => 'Estado', 'M' => 'Municipios', 'C' => 'Ciudad', 'P' => 'Parroquias', 'S' => 'Sector', 'B' => 'Barrio/Urb', 'T' => 'Tramo', 'MA' => 'Manzana', 'Z' => 'Cod.Catastral');
     return array('P' => 'Pais', 'E' => 'Estado', 'M' => 'Municipios', 'C' => 'Ciudad', 'P' => 'Parroquias', 'S' => 'Sector', 'B' => 'Barrio/Urb', 'Z' => 'Cod.Catastral');
  }

  public static function ListaCaract() //Caracteristica
  {
    return array('T' => 'Terreno', 'C' => 'Construcción');
  }

  public static function ListaTipoAjuste()
  {
    return array('CREDITO' => 'CREDITO', 'DEBITO' => 'DEBITO');
  }

  public static function ListaCatpar()
  {
    return array('C' => 'Categoría', 'P' => 'Partida');
  }

  public static function ListaStatuscat() //Estatus de Avalúos
  {
    return array('I' => 'Inscripción', 'A' => 'Actualización');
  }

  public static function ListaEstReq()
  {
  	return array('L' => 'Levantado', 'A' => 'Analizado', 'P' => 'Planificado', 'D' => 'Desarrollado');
  }

  public static function ListaEstDetReq()
  {
  	return array('A' => 'Aceptado', 'R' => 'Rechazado');
  }

  public static function ListaEstPlanReq()
  {
  	return array('G' => 'Asignado', 'C' => 'Comenzado', 'T' => 'Terminado');
  }

  public static function ListadeCriterioConstribuyente()
  {
  	return array('I' => 'Industria y Comercio', 'V' => 'Vehiculo', 'U' => 'Inmuebles Urbanos', 'P' => 'Propaganda Comercial', 'O' => 'Otros Ingresos', 'E' => 'Espectaculo Público','G' => 'General');
  }

  public static function ListaTrimestre()
  {
  	return array('Primer' => 'Primer', 'Segundo' => 'Segundo', 'Tercer' => 'Tercer', 'Cuarto' => 'Cuarto');
  }

  public static function Empresa_Ano()
  {
    return array('2009' => '2009','2010' => '2010','2011' => '2011','2012' => '2012','2013' => '2013','2014' => '2014','2015' => '2015','2016' => '2016','2017' => '2017','2018' => '2018','2019' => '2019','2020' => '2020','2021' => '2021','2022' => '2022','2023' => '2023','2024' => '2024','2025' => '2025','2026' => '2026','2027' => '2027','2028' => '2028','2029' => '2029');
  }

  public static function ListaModulos()
  {
    return array('cont' => 'Contabilidad','cp' => 'Presupuesto','ci' => 'Presupuesto Ingresos','op' => 'Tesoreria','ts' => 'Bancos','ca' => 'Compras y Almacén', 'for' => 'Formulacion de Presupuesto', 'cob' => 'Cuentas X Cobrar', 'fa' => 'Facturación', 'via' => 'Viáticos', 'hc' => 'HCM', 'np' => 'Nómina');
  }

  public static function TipoDocumento()   //Hacienda
  {
    return array('SR' => 'Sin Referencia','IC' => 'Industria y Comercio','V' => 'Vehiculos','I' => 'Inmuebles','PC' => 'Propaganda Comercial','EP' => 'Espectaculos Publicos','AL' => 'Apuestas Licitas');
  }

  public static function Porciones()   //Hacienda
  {
  	return array('1' => '1 Anualidad','2' => '2 Semestral','4' => '4 Trimestre','6' => '6 Bimestre','12' => '12 Mensualidad','24' => '24 Quincenal','52' => '52 Semanal','365' => '365 Diario');
//    return "1 Anualidad,2 Semestral,3 Cuatrimestre,4 Trimestre,6 Bimestre,12 Mensualidad,24 Quincenal,52 Semanal,365 Diario";
  }

    public static function ListaEstatusOTS()
  {
    return array('A' => 'Activo', 'N' => 'Inactivo');
  }

    public static function ListatipoFianza()
  {
    return array('Fiel Cumplimiento' => 'Fiel Cumplimiento', 'Anticipo' => 'Anticipo', 'Laboral' => 'Laboral', 'Garantía' => 'Garantía', 'Sostenimiento de Oferta' => 'Sostenimiento de Oferta');
  }

   public static function listaStatusEmp()
   {
    return array('E' => 'Empleado', 'O' => 'Obrero', 'A' => 'Otros');
   }

   public static function ListaDocTablas()
   {
    return array('liprebas' => 'Presupuesto Base', 'limemoran' => 'Memorando Solicitud Aprobación de Egreso',
                 'liptocue'=>'Punto de Cuenta Solicitud Aprobación de Egreso','lisolegr'=>'Requisición/Solicitud de Egresos',
                 'licomint'=>'Adquisición/Compra Integral','liplieesp'=>'Pliego de Condiciones',
                 'liregofe'=>'Registro de Ofertas','lianaofe'=>'Analisis de Ofertas','lirecomen'=>'Recomendacion',
                 'liptocuecon'=>'Punto de Cuenta/Aprobación Contratación','linotific'=>'Notificación de Adjudicación',
                 'licontrat'=>'Contrato de Bienes y Servicios','liordcom'=>'Orden de Compra o Servicio');
   }

   public static function listaBeneficios()
   {
    return array('M' => 'Ayuda por Matrimonio', 'N' => 'Ayuda por Nacimiento de Hijo', 'D' => 'Ayuda por Muerte de Familiar');
   }

   public static function listaSanciones()
   {
    return array('A' => 'Llamado de Atención', 'V' => 'Amonestación Verbal', 'E' => 'Amonestación Escrita', 'D' => 'Destitución');
   }

   public static function listaContrataciones()
   {
    return array('A' => '1: Concurso Abierto', 'C' => '2: Concurso Cerrado', 'P' => '3: Consulta de Precios', 'D' => '4: Contratación Directa - Con Acto Motivado', 'S' => '5: Contratación Directa - Sin Acto Motivado');
   }

  public static function ListaTipoCompraSerGen()
  {return array('C' => 'Compra', 'S' => 'Servicio', 'G' => 'Servicios Generales', 'M' => 'Mixto', 'T' => 'Contratación');}

  public static function ListaTipoMovAdicDism(){
     return array('O' => 'Origen', 'D'=> 'Destino');
}
  public static function ListaEstCapApor(){
     return array('' => 'Seleccione','A' => 'A', 'B'=> 'B', 'C'=> 'C');
  }

  public static function ListaEstrategia(){
    return array('V' => 'Visita Telefónica', 'N'=> 'Nueva Visita','D' => 'Envió de Documentación','C' => 'Envió de Correo');
  }

  public static function ListaTipAnticipo()
  {
    $cametifor=H::getConfApp2('cametifor', 'facturacion', 'fapresup');
    if ($cametifor=='S'){
      return array('P' => 'Pedido', 'E' => 'Cotización');
    }else {
      return array('P' => 'Pedido', 'E' => 'Presupuesto');
    }
  }

  public static function ListaTipoMaterial(){
     return array('R' => 'RESPUESTOS', 'S'=> 'SUMINISTROS', 'C'=> 'CONSUMIBLES');
  }

  public static function ListaClaseMaterial(){
     return array('A' => 'REP. AUTOMÁTICA', 'S'=> 'MATERIAL A SOLICITUD', 'E'=> 'MATERIAL ESTRATÉGICO', 'R' => 'MATERIAL REPARADO', 'O' => 'MATERIAL OBSOLETO');
  }
}
