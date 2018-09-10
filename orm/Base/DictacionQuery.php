<?php

namespace Base;

use \Dictacion as ChildDictacion;
use \DictacionQuery as ChildDictacionQuery;
use \Exception;
use \PDO;
use Map\DictacionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'dictacion' table.
 *
 *
 *
 * @method     ChildDictacionQuery orderByDictCActividad($order = Criteria::ASC) Order by the dict_c_actividad column
 * @method     ChildDictacionQuery orderByDictNumero($order = Criteria::ASC) Order by the dict_numero column
 * @method     ChildDictacionQuery orderByDictFechaInicio($order = Criteria::ASC) Order by the dict_fecha_inicio column
 * @method     ChildDictacionQuery orderByDictFechaTermino($order = Criteria::ASC) Order by the dict_fecha_termino column
 * @method     ChildDictacionQuery orderByDictEDictacion($order = Criteria::ASC) Order by the dict_e_dictacion column
 * @method     ChildDictacionQuery orderByDictCResolucion($order = Criteria::ASC) Order by the dict_c_resolucion column
 * @method     ChildDictacionQuery orderByDictTCertificado($order = Criteria::ASC) Order by the dict_t_certificado column
 * @method     ChildDictacionQuery orderByDictCertificadoParticipacion($order = Criteria::ASC) Order by the dict_certificado_participacion column
 * @method     ChildDictacionQuery orderByDictTCalificacion($order = Criteria::ASC) Order by the dict_t_calificacion column
 * @method     ChildDictacionQuery orderByDictAsistenciaMinima($order = Criteria::ASC) Order by the dict_asistencia_minima column
 * @method     ChildDictacionQuery orderByDictNotaMinima($order = Criteria::ASC) Order by the dict_nota_minima column
 * @method     ChildDictacionQuery orderByDictCobertura($order = Criteria::ASC) Order by the dict_cobertura column
 * @method     ChildDictacionQuery orderByDictValor($order = Criteria::ASC) Order by the dict_valor column
 * @method     ChildDictacionQuery orderByDictTMoneda($order = Criteria::ASC) Order by the dict_t_moneda column
 * @method     ChildDictacionQuery orderByDictCComuna($order = Criteria::ASC) Order by the dict_c_comuna column
 * @method     ChildDictacionQuery orderByDictDireccion($order = Criteria::ASC) Order by the dict_direccion column
 * @method     ChildDictacionQuery orderByDictTelefono($order = Criteria::ASC) Order by the dict_telefono column
 * @method     ChildDictacionQuery orderByDictFax($order = Criteria::ASC) Order by the dict_fax column
 * @method     ChildDictacionQuery orderByDictEmail($order = Criteria::ASC) Order by the dict_email column
 * @method     ChildDictacionQuery orderByDictCupo($order = Criteria::ASC) Order by the dict_cupo column
 * @method     ChildDictacionQuery orderByDictTEvaluacion($order = Criteria::ASC) Order by the dict_t_evaluacion column
 * @method     ChildDictacionQuery orderByDictTCapacitacion($order = Criteria::ASC) Order by the dict_t_capacitacion column
 * @method     ChildDictacionQuery orderByDictObservacion($order = Criteria::ASC) Order by the dict_observacion column
 * @method     ChildDictacionQuery orderByDictVigente($order = Criteria::ASC) Order by the dict_vigente column
 * @method     ChildDictacionQuery orderByDictRFechaCreacion($order = Criteria::ASC) Order by the dict_r_fecha_creacion column
 * @method     ChildDictacionQuery orderByDictRFechaModificacion($order = Criteria::ASC) Order by the dict_r_fecha_modificacion column
 * @method     ChildDictacionQuery orderByDictRUsuario($order = Criteria::ASC) Order by the dict_r_usuario column
 *
 * @method     ChildDictacionQuery groupByDictCActividad() Group by the dict_c_actividad column
 * @method     ChildDictacionQuery groupByDictNumero() Group by the dict_numero column
 * @method     ChildDictacionQuery groupByDictFechaInicio() Group by the dict_fecha_inicio column
 * @method     ChildDictacionQuery groupByDictFechaTermino() Group by the dict_fecha_termino column
 * @method     ChildDictacionQuery groupByDictEDictacion() Group by the dict_e_dictacion column
 * @method     ChildDictacionQuery groupByDictCResolucion() Group by the dict_c_resolucion column
 * @method     ChildDictacionQuery groupByDictTCertificado() Group by the dict_t_certificado column
 * @method     ChildDictacionQuery groupByDictCertificadoParticipacion() Group by the dict_certificado_participacion column
 * @method     ChildDictacionQuery groupByDictTCalificacion() Group by the dict_t_calificacion column
 * @method     ChildDictacionQuery groupByDictAsistenciaMinima() Group by the dict_asistencia_minima column
 * @method     ChildDictacionQuery groupByDictNotaMinima() Group by the dict_nota_minima column
 * @method     ChildDictacionQuery groupByDictCobertura() Group by the dict_cobertura column
 * @method     ChildDictacionQuery groupByDictValor() Group by the dict_valor column
 * @method     ChildDictacionQuery groupByDictTMoneda() Group by the dict_t_moneda column
 * @method     ChildDictacionQuery groupByDictCComuna() Group by the dict_c_comuna column
 * @method     ChildDictacionQuery groupByDictDireccion() Group by the dict_direccion column
 * @method     ChildDictacionQuery groupByDictTelefono() Group by the dict_telefono column
 * @method     ChildDictacionQuery groupByDictFax() Group by the dict_fax column
 * @method     ChildDictacionQuery groupByDictEmail() Group by the dict_email column
 * @method     ChildDictacionQuery groupByDictCupo() Group by the dict_cupo column
 * @method     ChildDictacionQuery groupByDictTEvaluacion() Group by the dict_t_evaluacion column
 * @method     ChildDictacionQuery groupByDictTCapacitacion() Group by the dict_t_capacitacion column
 * @method     ChildDictacionQuery groupByDictObservacion() Group by the dict_observacion column
 * @method     ChildDictacionQuery groupByDictVigente() Group by the dict_vigente column
 * @method     ChildDictacionQuery groupByDictRFechaCreacion() Group by the dict_r_fecha_creacion column
 * @method     ChildDictacionQuery groupByDictRFechaModificacion() Group by the dict_r_fecha_modificacion column
 * @method     ChildDictacionQuery groupByDictRUsuario() Group by the dict_r_usuario column
 *
 * @method     ChildDictacionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDictacionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDictacionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDictacionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDictacionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDictacionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDictacionQuery leftJoinActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actividad relation
 * @method     ChildDictacionQuery rightJoinActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actividad relation
 * @method     ChildDictacionQuery innerJoinActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the Actividad relation
 *
 * @method     ChildDictacionQuery joinWithActividad($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Actividad relation
 *
 * @method     ChildDictacionQuery leftJoinWithActividad() Adds a LEFT JOIN clause and with to the query using the Actividad relation
 * @method     ChildDictacionQuery rightJoinWithActividad() Adds a RIGHT JOIN clause and with to the query using the Actividad relation
 * @method     ChildDictacionQuery innerJoinWithActividad() Adds a INNER JOIN clause and with to the query using the Actividad relation
 *
 * @method     ChildDictacionQuery leftJoinComuna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comuna relation
 * @method     ChildDictacionQuery rightJoinComuna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comuna relation
 * @method     ChildDictacionQuery innerJoinComuna($relationAlias = null) Adds a INNER JOIN clause to the query using the Comuna relation
 *
 * @method     ChildDictacionQuery joinWithComuna($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Comuna relation
 *
 * @method     ChildDictacionQuery leftJoinWithComuna() Adds a LEFT JOIN clause and with to the query using the Comuna relation
 * @method     ChildDictacionQuery rightJoinWithComuna() Adds a RIGHT JOIN clause and with to the query using the Comuna relation
 * @method     ChildDictacionQuery innerJoinWithComuna() Adds a INNER JOIN clause and with to the query using the Comuna relation
 *
 * @method     ChildDictacionQuery leftJoinEDictacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the EDictacion relation
 * @method     ChildDictacionQuery rightJoinEDictacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EDictacion relation
 * @method     ChildDictacionQuery innerJoinEDictacion($relationAlias = null) Adds a INNER JOIN clause to the query using the EDictacion relation
 *
 * @method     ChildDictacionQuery joinWithEDictacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EDictacion relation
 *
 * @method     ChildDictacionQuery leftJoinWithEDictacion() Adds a LEFT JOIN clause and with to the query using the EDictacion relation
 * @method     ChildDictacionQuery rightJoinWithEDictacion() Adds a RIGHT JOIN clause and with to the query using the EDictacion relation
 * @method     ChildDictacionQuery innerJoinWithEDictacion() Adds a INNER JOIN clause and with to the query using the EDictacion relation
 *
 * @method     ChildDictacionQuery leftJoinTCalificacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the TCalificacion relation
 * @method     ChildDictacionQuery rightJoinTCalificacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TCalificacion relation
 * @method     ChildDictacionQuery innerJoinTCalificacion($relationAlias = null) Adds a INNER JOIN clause to the query using the TCalificacion relation
 *
 * @method     ChildDictacionQuery joinWithTCalificacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TCalificacion relation
 *
 * @method     ChildDictacionQuery leftJoinWithTCalificacion() Adds a LEFT JOIN clause and with to the query using the TCalificacion relation
 * @method     ChildDictacionQuery rightJoinWithTCalificacion() Adds a RIGHT JOIN clause and with to the query using the TCalificacion relation
 * @method     ChildDictacionQuery innerJoinWithTCalificacion() Adds a INNER JOIN clause and with to the query using the TCalificacion relation
 *
 * @method     ChildDictacionQuery leftJoinTCertificado($relationAlias = null) Adds a LEFT JOIN clause to the query using the TCertificado relation
 * @method     ChildDictacionQuery rightJoinTCertificado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TCertificado relation
 * @method     ChildDictacionQuery innerJoinTCertificado($relationAlias = null) Adds a INNER JOIN clause to the query using the TCertificado relation
 *
 * @method     ChildDictacionQuery joinWithTCertificado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TCertificado relation
 *
 * @method     ChildDictacionQuery leftJoinWithTCertificado() Adds a LEFT JOIN clause and with to the query using the TCertificado relation
 * @method     ChildDictacionQuery rightJoinWithTCertificado() Adds a RIGHT JOIN clause and with to the query using the TCertificado relation
 * @method     ChildDictacionQuery innerJoinWithTCertificado() Adds a INNER JOIN clause and with to the query using the TCertificado relation
 *
 * @method     ChildDictacionQuery leftJoinTEvaluacion($relationAlias = null) Adds a LEFT JOIN clause to the query using the TEvaluacion relation
 * @method     ChildDictacionQuery rightJoinTEvaluacion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TEvaluacion relation
 * @method     ChildDictacionQuery innerJoinTEvaluacion($relationAlias = null) Adds a INNER JOIN clause to the query using the TEvaluacion relation
 *
 * @method     ChildDictacionQuery joinWithTEvaluacion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TEvaluacion relation
 *
 * @method     ChildDictacionQuery leftJoinWithTEvaluacion() Adds a LEFT JOIN clause and with to the query using the TEvaluacion relation
 * @method     ChildDictacionQuery rightJoinWithTEvaluacion() Adds a RIGHT JOIN clause and with to the query using the TEvaluacion relation
 * @method     ChildDictacionQuery innerJoinWithTEvaluacion() Adds a INNER JOIN clause and with to the query using the TEvaluacion relation
 *
 * @method     ChildDictacionQuery leftJoinTMoneda($relationAlias = null) Adds a LEFT JOIN clause to the query using the TMoneda relation
 * @method     ChildDictacionQuery rightJoinTMoneda($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TMoneda relation
 * @method     ChildDictacionQuery innerJoinTMoneda($relationAlias = null) Adds a INNER JOIN clause to the query using the TMoneda relation
 *
 * @method     ChildDictacionQuery joinWithTMoneda($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TMoneda relation
 *
 * @method     ChildDictacionQuery leftJoinWithTMoneda() Adds a LEFT JOIN clause and with to the query using the TMoneda relation
 * @method     ChildDictacionQuery rightJoinWithTMoneda() Adds a RIGHT JOIN clause and with to the query using the TMoneda relation
 * @method     ChildDictacionQuery innerJoinWithTMoneda() Adds a INNER JOIN clause and with to the query using the TMoneda relation
 *
 * @method     ChildDictacionQuery leftJoinEvaluacionAplicada($relationAlias = null) Adds a LEFT JOIN clause to the query using the EvaluacionAplicada relation
 * @method     ChildDictacionQuery rightJoinEvaluacionAplicada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EvaluacionAplicada relation
 * @method     ChildDictacionQuery innerJoinEvaluacionAplicada($relationAlias = null) Adds a INNER JOIN clause to the query using the EvaluacionAplicada relation
 *
 * @method     ChildDictacionQuery joinWithEvaluacionAplicada($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EvaluacionAplicada relation
 *
 * @method     ChildDictacionQuery leftJoinWithEvaluacionAplicada() Adds a LEFT JOIN clause and with to the query using the EvaluacionAplicada relation
 * @method     ChildDictacionQuery rightJoinWithEvaluacionAplicada() Adds a RIGHT JOIN clause and with to the query using the EvaluacionAplicada relation
 * @method     ChildDictacionQuery innerJoinWithEvaluacionAplicada() Adds a INNER JOIN clause and with to the query using the EvaluacionAplicada relation
 *
 * @method     ChildDictacionQuery leftJoinFacilitador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Facilitador relation
 * @method     ChildDictacionQuery rightJoinFacilitador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Facilitador relation
 * @method     ChildDictacionQuery innerJoinFacilitador($relationAlias = null) Adds a INNER JOIN clause to the query using the Facilitador relation
 *
 * @method     ChildDictacionQuery joinWithFacilitador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Facilitador relation
 *
 * @method     ChildDictacionQuery leftJoinWithFacilitador() Adds a LEFT JOIN clause and with to the query using the Facilitador relation
 * @method     ChildDictacionQuery rightJoinWithFacilitador() Adds a RIGHT JOIN clause and with to the query using the Facilitador relation
 * @method     ChildDictacionQuery innerJoinWithFacilitador() Adds a INNER JOIN clause and with to the query using the Facilitador relation
 *
 * @method     ChildDictacionQuery leftJoinInscripcion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inscripcion relation
 * @method     ChildDictacionQuery rightJoinInscripcion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inscripcion relation
 * @method     ChildDictacionQuery innerJoinInscripcion($relationAlias = null) Adds a INNER JOIN clause to the query using the Inscripcion relation
 *
 * @method     ChildDictacionQuery joinWithInscripcion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Inscripcion relation
 *
 * @method     ChildDictacionQuery leftJoinWithInscripcion() Adds a LEFT JOIN clause and with to the query using the Inscripcion relation
 * @method     ChildDictacionQuery rightJoinWithInscripcion() Adds a RIGHT JOIN clause and with to the query using the Inscripcion relation
 * @method     ChildDictacionQuery innerJoinWithInscripcion() Adds a INNER JOIN clause and with to the query using the Inscripcion relation
 *
 * @method     \ActividadQuery|\ComunaQuery|\EDictacionQuery|\TCalificacionQuery|\TCertificadoQuery|\TEvaluacionQuery|\TMonedaQuery|\EvaluacionAplicadaQuery|\FacilitadorQuery|\InscripcionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDictacion findOne(ConnectionInterface $con = null) Return the first ChildDictacion matching the query
 * @method     ChildDictacion findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDictacion matching the query, or a new ChildDictacion object populated from the query conditions when no match is found
 *
 * @method     ChildDictacion findOneByDictCActividad(int $dict_c_actividad) Return the first ChildDictacion filtered by the dict_c_actividad column
 * @method     ChildDictacion findOneByDictNumero(int $dict_numero) Return the first ChildDictacion filtered by the dict_numero column
 * @method     ChildDictacion findOneByDictFechaInicio(string $dict_fecha_inicio) Return the first ChildDictacion filtered by the dict_fecha_inicio column
 * @method     ChildDictacion findOneByDictFechaTermino(string $dict_fecha_termino) Return the first ChildDictacion filtered by the dict_fecha_termino column
 * @method     ChildDictacion findOneByDictEDictacion(int $dict_e_dictacion) Return the first ChildDictacion filtered by the dict_e_dictacion column
 * @method     ChildDictacion findOneByDictCResolucion(int $dict_c_resolucion) Return the first ChildDictacion filtered by the dict_c_resolucion column
 * @method     ChildDictacion findOneByDictTCertificado(int $dict_t_certificado) Return the first ChildDictacion filtered by the dict_t_certificado column
 * @method     ChildDictacion findOneByDictCertificadoParticipacion(int $dict_certificado_participacion) Return the first ChildDictacion filtered by the dict_certificado_participacion column
 * @method     ChildDictacion findOneByDictTCalificacion(int $dict_t_calificacion) Return the first ChildDictacion filtered by the dict_t_calificacion column
 * @method     ChildDictacion findOneByDictAsistenciaMinima(int $dict_asistencia_minima) Return the first ChildDictacion filtered by the dict_asistencia_minima column
 * @method     ChildDictacion findOneByDictNotaMinima(int $dict_nota_minima) Return the first ChildDictacion filtered by the dict_nota_minima column
 * @method     ChildDictacion findOneByDictCobertura(string $dict_cobertura) Return the first ChildDictacion filtered by the dict_cobertura column
 * @method     ChildDictacion findOneByDictValor(string $dict_valor) Return the first ChildDictacion filtered by the dict_valor column
 * @method     ChildDictacion findOneByDictTMoneda(int $dict_t_moneda) Return the first ChildDictacion filtered by the dict_t_moneda column
 * @method     ChildDictacion findOneByDictCComuna(int $dict_c_comuna) Return the first ChildDictacion filtered by the dict_c_comuna column
 * @method     ChildDictacion findOneByDictDireccion(string $dict_direccion) Return the first ChildDictacion filtered by the dict_direccion column
 * @method     ChildDictacion findOneByDictTelefono(string $dict_telefono) Return the first ChildDictacion filtered by the dict_telefono column
 * @method     ChildDictacion findOneByDictFax(string $dict_fax) Return the first ChildDictacion filtered by the dict_fax column
 * @method     ChildDictacion findOneByDictEmail(string $dict_email) Return the first ChildDictacion filtered by the dict_email column
 * @method     ChildDictacion findOneByDictCupo(int $dict_cupo) Return the first ChildDictacion filtered by the dict_cupo column
 * @method     ChildDictacion findOneByDictTEvaluacion(int $dict_t_evaluacion) Return the first ChildDictacion filtered by the dict_t_evaluacion column
 * @method     ChildDictacion findOneByDictTCapacitacion(int $dict_t_capacitacion) Return the first ChildDictacion filtered by the dict_t_capacitacion column
 * @method     ChildDictacion findOneByDictObservacion(string $dict_observacion) Return the first ChildDictacion filtered by the dict_observacion column
 * @method     ChildDictacion findOneByDictVigente(int $dict_vigente) Return the first ChildDictacion filtered by the dict_vigente column
 * @method     ChildDictacion findOneByDictRFechaCreacion(string $dict_r_fecha_creacion) Return the first ChildDictacion filtered by the dict_r_fecha_creacion column
 * @method     ChildDictacion findOneByDictRFechaModificacion(string $dict_r_fecha_modificacion) Return the first ChildDictacion filtered by the dict_r_fecha_modificacion column
 * @method     ChildDictacion findOneByDictRUsuario(int $dict_r_usuario) Return the first ChildDictacion filtered by the dict_r_usuario column *

 * @method     ChildDictacion requirePk($key, ConnectionInterface $con = null) Return the ChildDictacion by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOne(ConnectionInterface $con = null) Return the first ChildDictacion matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDictacion requireOneByDictCActividad(int $dict_c_actividad) Return the first ChildDictacion filtered by the dict_c_actividad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictNumero(int $dict_numero) Return the first ChildDictacion filtered by the dict_numero column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictFechaInicio(string $dict_fecha_inicio) Return the first ChildDictacion filtered by the dict_fecha_inicio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictFechaTermino(string $dict_fecha_termino) Return the first ChildDictacion filtered by the dict_fecha_termino column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictEDictacion(int $dict_e_dictacion) Return the first ChildDictacion filtered by the dict_e_dictacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictCResolucion(int $dict_c_resolucion) Return the first ChildDictacion filtered by the dict_c_resolucion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictTCertificado(int $dict_t_certificado) Return the first ChildDictacion filtered by the dict_t_certificado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictCertificadoParticipacion(int $dict_certificado_participacion) Return the first ChildDictacion filtered by the dict_certificado_participacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictTCalificacion(int $dict_t_calificacion) Return the first ChildDictacion filtered by the dict_t_calificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictAsistenciaMinima(int $dict_asistencia_minima) Return the first ChildDictacion filtered by the dict_asistencia_minima column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictNotaMinima(int $dict_nota_minima) Return the first ChildDictacion filtered by the dict_nota_minima column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictCobertura(string $dict_cobertura) Return the first ChildDictacion filtered by the dict_cobertura column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictValor(string $dict_valor) Return the first ChildDictacion filtered by the dict_valor column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictTMoneda(int $dict_t_moneda) Return the first ChildDictacion filtered by the dict_t_moneda column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictCComuna(int $dict_c_comuna) Return the first ChildDictacion filtered by the dict_c_comuna column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictDireccion(string $dict_direccion) Return the first ChildDictacion filtered by the dict_direccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictTelefono(string $dict_telefono) Return the first ChildDictacion filtered by the dict_telefono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictFax(string $dict_fax) Return the first ChildDictacion filtered by the dict_fax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictEmail(string $dict_email) Return the first ChildDictacion filtered by the dict_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictCupo(int $dict_cupo) Return the first ChildDictacion filtered by the dict_cupo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictTEvaluacion(int $dict_t_evaluacion) Return the first ChildDictacion filtered by the dict_t_evaluacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictTCapacitacion(int $dict_t_capacitacion) Return the first ChildDictacion filtered by the dict_t_capacitacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictObservacion(string $dict_observacion) Return the first ChildDictacion filtered by the dict_observacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictVigente(int $dict_vigente) Return the first ChildDictacion filtered by the dict_vigente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictRFechaCreacion(string $dict_r_fecha_creacion) Return the first ChildDictacion filtered by the dict_r_fecha_creacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictRFechaModificacion(string $dict_r_fecha_modificacion) Return the first ChildDictacion filtered by the dict_r_fecha_modificacion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDictacion requireOneByDictRUsuario(int $dict_r_usuario) Return the first ChildDictacion filtered by the dict_r_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDictacion[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDictacion objects based on current ModelCriteria
 * @method     ChildDictacion[]|ObjectCollection findByDictCActividad(int $dict_c_actividad) Return ChildDictacion objects filtered by the dict_c_actividad column
 * @method     ChildDictacion[]|ObjectCollection findByDictNumero(int $dict_numero) Return ChildDictacion objects filtered by the dict_numero column
 * @method     ChildDictacion[]|ObjectCollection findByDictFechaInicio(string $dict_fecha_inicio) Return ChildDictacion objects filtered by the dict_fecha_inicio column
 * @method     ChildDictacion[]|ObjectCollection findByDictFechaTermino(string $dict_fecha_termino) Return ChildDictacion objects filtered by the dict_fecha_termino column
 * @method     ChildDictacion[]|ObjectCollection findByDictEDictacion(int $dict_e_dictacion) Return ChildDictacion objects filtered by the dict_e_dictacion column
 * @method     ChildDictacion[]|ObjectCollection findByDictCResolucion(int $dict_c_resolucion) Return ChildDictacion objects filtered by the dict_c_resolucion column
 * @method     ChildDictacion[]|ObjectCollection findByDictTCertificado(int $dict_t_certificado) Return ChildDictacion objects filtered by the dict_t_certificado column
 * @method     ChildDictacion[]|ObjectCollection findByDictCertificadoParticipacion(int $dict_certificado_participacion) Return ChildDictacion objects filtered by the dict_certificado_participacion column
 * @method     ChildDictacion[]|ObjectCollection findByDictTCalificacion(int $dict_t_calificacion) Return ChildDictacion objects filtered by the dict_t_calificacion column
 * @method     ChildDictacion[]|ObjectCollection findByDictAsistenciaMinima(int $dict_asistencia_minima) Return ChildDictacion objects filtered by the dict_asistencia_minima column
 * @method     ChildDictacion[]|ObjectCollection findByDictNotaMinima(int $dict_nota_minima) Return ChildDictacion objects filtered by the dict_nota_minima column
 * @method     ChildDictacion[]|ObjectCollection findByDictCobertura(string $dict_cobertura) Return ChildDictacion objects filtered by the dict_cobertura column
 * @method     ChildDictacion[]|ObjectCollection findByDictValor(string $dict_valor) Return ChildDictacion objects filtered by the dict_valor column
 * @method     ChildDictacion[]|ObjectCollection findByDictTMoneda(int $dict_t_moneda) Return ChildDictacion objects filtered by the dict_t_moneda column
 * @method     ChildDictacion[]|ObjectCollection findByDictCComuna(int $dict_c_comuna) Return ChildDictacion objects filtered by the dict_c_comuna column
 * @method     ChildDictacion[]|ObjectCollection findByDictDireccion(string $dict_direccion) Return ChildDictacion objects filtered by the dict_direccion column
 * @method     ChildDictacion[]|ObjectCollection findByDictTelefono(string $dict_telefono) Return ChildDictacion objects filtered by the dict_telefono column
 * @method     ChildDictacion[]|ObjectCollection findByDictFax(string $dict_fax) Return ChildDictacion objects filtered by the dict_fax column
 * @method     ChildDictacion[]|ObjectCollection findByDictEmail(string $dict_email) Return ChildDictacion objects filtered by the dict_email column
 * @method     ChildDictacion[]|ObjectCollection findByDictCupo(int $dict_cupo) Return ChildDictacion objects filtered by the dict_cupo column
 * @method     ChildDictacion[]|ObjectCollection findByDictTEvaluacion(int $dict_t_evaluacion) Return ChildDictacion objects filtered by the dict_t_evaluacion column
 * @method     ChildDictacion[]|ObjectCollection findByDictTCapacitacion(int $dict_t_capacitacion) Return ChildDictacion objects filtered by the dict_t_capacitacion column
 * @method     ChildDictacion[]|ObjectCollection findByDictObservacion(string $dict_observacion) Return ChildDictacion objects filtered by the dict_observacion column
 * @method     ChildDictacion[]|ObjectCollection findByDictVigente(int $dict_vigente) Return ChildDictacion objects filtered by the dict_vigente column
 * @method     ChildDictacion[]|ObjectCollection findByDictRFechaCreacion(string $dict_r_fecha_creacion) Return ChildDictacion objects filtered by the dict_r_fecha_creacion column
 * @method     ChildDictacion[]|ObjectCollection findByDictRFechaModificacion(string $dict_r_fecha_modificacion) Return ChildDictacion objects filtered by the dict_r_fecha_modificacion column
 * @method     ChildDictacion[]|ObjectCollection findByDictRUsuario(int $dict_r_usuario) Return ChildDictacion objects filtered by the dict_r_usuario column
 * @method     ChildDictacion[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DictacionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DictacionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Dictacion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDictacionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDictacionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDictacionQuery) {
            return $criteria;
        }
        $query = new ChildDictacionQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$dict_c_actividad, $dict_numero] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDictacion|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DictacionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DictacionTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDictacion A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT dict_c_actividad, dict_numero, dict_fecha_inicio, dict_fecha_termino, dict_e_dictacion, dict_c_resolucion, dict_t_certificado, dict_certificado_participacion, dict_t_calificacion, dict_asistencia_minima, dict_nota_minima, dict_cobertura, dict_valor, dict_t_moneda, dict_c_comuna, dict_direccion, dict_telefono, dict_fax, dict_email, dict_cupo, dict_t_evaluacion, dict_t_capacitacion, dict_observacion, dict_vigente, dict_r_fecha_creacion, dict_r_fecha_modificacion, dict_r_usuario FROM dictacion WHERE dict_c_actividad = :p0 AND dict_numero = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDictacion $obj */
            $obj = new ChildDictacion();
            $obj->hydrate($row);
            DictacionTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildDictacion|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(DictacionTableMap::COL_DICT_NUMERO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(DictacionTableMap::COL_DICT_NUMERO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the dict_c_actividad column
     *
     * Example usage:
     * <code>
     * $query->filterByDictCActividad(1234); // WHERE dict_c_actividad = 1234
     * $query->filterByDictCActividad(array(12, 34)); // WHERE dict_c_actividad IN (12, 34)
     * $query->filterByDictCActividad(array('min' => 12)); // WHERE dict_c_actividad > 12
     * </code>
     *
     * @see       filterByActividad()
     *
     * @param     mixed $dictCActividad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictCActividad($dictCActividad = null, $comparison = null)
    {
        if (is_array($dictCActividad)) {
            $useMinMax = false;
            if (isset($dictCActividad['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $dictCActividad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictCActividad['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $dictCActividad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $dictCActividad, $comparison);
    }

    /**
     * Filter the query on the dict_numero column
     *
     * Example usage:
     * <code>
     * $query->filterByDictNumero(1234); // WHERE dict_numero = 1234
     * $query->filterByDictNumero(array(12, 34)); // WHERE dict_numero IN (12, 34)
     * $query->filterByDictNumero(array('min' => 12)); // WHERE dict_numero > 12
     * </code>
     *
     * @param     mixed $dictNumero The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictNumero($dictNumero = null, $comparison = null)
    {
        if (is_array($dictNumero)) {
            $useMinMax = false;
            if (isset($dictNumero['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_NUMERO, $dictNumero['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictNumero['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_NUMERO, $dictNumero['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_NUMERO, $dictNumero, $comparison);
    }

    /**
     * Filter the query on the dict_fecha_inicio column
     *
     * Example usage:
     * <code>
     * $query->filterByDictFechaInicio('fooValue');   // WHERE dict_fecha_inicio = 'fooValue'
     * $query->filterByDictFechaInicio('%fooValue%', Criteria::LIKE); // WHERE dict_fecha_inicio LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dictFechaInicio The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictFechaInicio($dictFechaInicio = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dictFechaInicio)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_FECHA_INICIO, $dictFechaInicio, $comparison);
    }

    /**
     * Filter the query on the dict_fecha_termino column
     *
     * Example usage:
     * <code>
     * $query->filterByDictFechaTermino('fooValue');   // WHERE dict_fecha_termino = 'fooValue'
     * $query->filterByDictFechaTermino('%fooValue%', Criteria::LIKE); // WHERE dict_fecha_termino LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dictFechaTermino The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictFechaTermino($dictFechaTermino = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dictFechaTermino)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_FECHA_TERMINO, $dictFechaTermino, $comparison);
    }

    /**
     * Filter the query on the dict_e_dictacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDictEDictacion(1234); // WHERE dict_e_dictacion = 1234
     * $query->filterByDictEDictacion(array(12, 34)); // WHERE dict_e_dictacion IN (12, 34)
     * $query->filterByDictEDictacion(array('min' => 12)); // WHERE dict_e_dictacion > 12
     * </code>
     *
     * @see       filterByEDictacion()
     *
     * @param     mixed $dictEDictacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictEDictacion($dictEDictacion = null, $comparison = null)
    {
        if (is_array($dictEDictacion)) {
            $useMinMax = false;
            if (isset($dictEDictacion['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_E_DICTACION, $dictEDictacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictEDictacion['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_E_DICTACION, $dictEDictacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_E_DICTACION, $dictEDictacion, $comparison);
    }

    /**
     * Filter the query on the dict_c_resolucion column
     *
     * Example usage:
     * <code>
     * $query->filterByDictCResolucion(1234); // WHERE dict_c_resolucion = 1234
     * $query->filterByDictCResolucion(array(12, 34)); // WHERE dict_c_resolucion IN (12, 34)
     * $query->filterByDictCResolucion(array('min' => 12)); // WHERE dict_c_resolucion > 12
     * </code>
     *
     * @param     mixed $dictCResolucion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictCResolucion($dictCResolucion = null, $comparison = null)
    {
        if (is_array($dictCResolucion)) {
            $useMinMax = false;
            if (isset($dictCResolucion['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_C_RESOLUCION, $dictCResolucion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictCResolucion['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_C_RESOLUCION, $dictCResolucion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_C_RESOLUCION, $dictCResolucion, $comparison);
    }

    /**
     * Filter the query on the dict_t_certificado column
     *
     * Example usage:
     * <code>
     * $query->filterByDictTCertificado(1234); // WHERE dict_t_certificado = 1234
     * $query->filterByDictTCertificado(array(12, 34)); // WHERE dict_t_certificado IN (12, 34)
     * $query->filterByDictTCertificado(array('min' => 12)); // WHERE dict_t_certificado > 12
     * </code>
     *
     * @see       filterByTCertificado()
     *
     * @param     mixed $dictTCertificado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictTCertificado($dictTCertificado = null, $comparison = null)
    {
        if (is_array($dictTCertificado)) {
            $useMinMax = false;
            if (isset($dictTCertificado['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_T_CERTIFICADO, $dictTCertificado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictTCertificado['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_T_CERTIFICADO, $dictTCertificado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_T_CERTIFICADO, $dictTCertificado, $comparison);
    }

    /**
     * Filter the query on the dict_certificado_participacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDictCertificadoParticipacion(1234); // WHERE dict_certificado_participacion = 1234
     * $query->filterByDictCertificadoParticipacion(array(12, 34)); // WHERE dict_certificado_participacion IN (12, 34)
     * $query->filterByDictCertificadoParticipacion(array('min' => 12)); // WHERE dict_certificado_participacion > 12
     * </code>
     *
     * @param     mixed $dictCertificadoParticipacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictCertificadoParticipacion($dictCertificadoParticipacion = null, $comparison = null)
    {
        if (is_array($dictCertificadoParticipacion)) {
            $useMinMax = false;
            if (isset($dictCertificadoParticipacion['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_CERTIFICADO_PARTICIPACION, $dictCertificadoParticipacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictCertificadoParticipacion['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_CERTIFICADO_PARTICIPACION, $dictCertificadoParticipacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_CERTIFICADO_PARTICIPACION, $dictCertificadoParticipacion, $comparison);
    }

    /**
     * Filter the query on the dict_t_calificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDictTCalificacion(1234); // WHERE dict_t_calificacion = 1234
     * $query->filterByDictTCalificacion(array(12, 34)); // WHERE dict_t_calificacion IN (12, 34)
     * $query->filterByDictTCalificacion(array('min' => 12)); // WHERE dict_t_calificacion > 12
     * </code>
     *
     * @see       filterByTCalificacion()
     *
     * @param     mixed $dictTCalificacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictTCalificacion($dictTCalificacion = null, $comparison = null)
    {
        if (is_array($dictTCalificacion)) {
            $useMinMax = false;
            if (isset($dictTCalificacion['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_T_CALIFICACION, $dictTCalificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictTCalificacion['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_T_CALIFICACION, $dictTCalificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_T_CALIFICACION, $dictTCalificacion, $comparison);
    }

    /**
     * Filter the query on the dict_asistencia_minima column
     *
     * Example usage:
     * <code>
     * $query->filterByDictAsistenciaMinima(1234); // WHERE dict_asistencia_minima = 1234
     * $query->filterByDictAsistenciaMinima(array(12, 34)); // WHERE dict_asistencia_minima IN (12, 34)
     * $query->filterByDictAsistenciaMinima(array('min' => 12)); // WHERE dict_asistencia_minima > 12
     * </code>
     *
     * @param     mixed $dictAsistenciaMinima The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictAsistenciaMinima($dictAsistenciaMinima = null, $comparison = null)
    {
        if (is_array($dictAsistenciaMinima)) {
            $useMinMax = false;
            if (isset($dictAsistenciaMinima['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_ASISTENCIA_MINIMA, $dictAsistenciaMinima['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictAsistenciaMinima['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_ASISTENCIA_MINIMA, $dictAsistenciaMinima['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_ASISTENCIA_MINIMA, $dictAsistenciaMinima, $comparison);
    }

    /**
     * Filter the query on the dict_nota_minima column
     *
     * Example usage:
     * <code>
     * $query->filterByDictNotaMinima(1234); // WHERE dict_nota_minima = 1234
     * $query->filterByDictNotaMinima(array(12, 34)); // WHERE dict_nota_minima IN (12, 34)
     * $query->filterByDictNotaMinima(array('min' => 12)); // WHERE dict_nota_minima > 12
     * </code>
     *
     * @param     mixed $dictNotaMinima The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictNotaMinima($dictNotaMinima = null, $comparison = null)
    {
        if (is_array($dictNotaMinima)) {
            $useMinMax = false;
            if (isset($dictNotaMinima['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_NOTA_MINIMA, $dictNotaMinima['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictNotaMinima['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_NOTA_MINIMA, $dictNotaMinima['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_NOTA_MINIMA, $dictNotaMinima, $comparison);
    }

    /**
     * Filter the query on the dict_cobertura column
     *
     * Example usage:
     * <code>
     * $query->filterByDictCobertura('fooValue');   // WHERE dict_cobertura = 'fooValue'
     * $query->filterByDictCobertura('%fooValue%', Criteria::LIKE); // WHERE dict_cobertura LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dictCobertura The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictCobertura($dictCobertura = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dictCobertura)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_COBERTURA, $dictCobertura, $comparison);
    }

    /**
     * Filter the query on the dict_valor column
     *
     * Example usage:
     * <code>
     * $query->filterByDictValor('fooValue');   // WHERE dict_valor = 'fooValue'
     * $query->filterByDictValor('%fooValue%', Criteria::LIKE); // WHERE dict_valor LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dictValor The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictValor($dictValor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dictValor)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_VALOR, $dictValor, $comparison);
    }

    /**
     * Filter the query on the dict_t_moneda column
     *
     * Example usage:
     * <code>
     * $query->filterByDictTMoneda(1234); // WHERE dict_t_moneda = 1234
     * $query->filterByDictTMoneda(array(12, 34)); // WHERE dict_t_moneda IN (12, 34)
     * $query->filterByDictTMoneda(array('min' => 12)); // WHERE dict_t_moneda > 12
     * </code>
     *
     * @see       filterByTMoneda()
     *
     * @param     mixed $dictTMoneda The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictTMoneda($dictTMoneda = null, $comparison = null)
    {
        if (is_array($dictTMoneda)) {
            $useMinMax = false;
            if (isset($dictTMoneda['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_T_MONEDA, $dictTMoneda['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictTMoneda['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_T_MONEDA, $dictTMoneda['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_T_MONEDA, $dictTMoneda, $comparison);
    }

    /**
     * Filter the query on the dict_c_comuna column
     *
     * Example usage:
     * <code>
     * $query->filterByDictCComuna(1234); // WHERE dict_c_comuna = 1234
     * $query->filterByDictCComuna(array(12, 34)); // WHERE dict_c_comuna IN (12, 34)
     * $query->filterByDictCComuna(array('min' => 12)); // WHERE dict_c_comuna > 12
     * </code>
     *
     * @see       filterByComuna()
     *
     * @param     mixed $dictCComuna The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictCComuna($dictCComuna = null, $comparison = null)
    {
        if (is_array($dictCComuna)) {
            $useMinMax = false;
            if (isset($dictCComuna['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_C_COMUNA, $dictCComuna['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictCComuna['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_C_COMUNA, $dictCComuna['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_C_COMUNA, $dictCComuna, $comparison);
    }

    /**
     * Filter the query on the dict_direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDictDireccion('fooValue');   // WHERE dict_direccion = 'fooValue'
     * $query->filterByDictDireccion('%fooValue%', Criteria::LIKE); // WHERE dict_direccion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dictDireccion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictDireccion($dictDireccion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dictDireccion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_DIRECCION, $dictDireccion, $comparison);
    }

    /**
     * Filter the query on the dict_telefono column
     *
     * Example usage:
     * <code>
     * $query->filterByDictTelefono('fooValue');   // WHERE dict_telefono = 'fooValue'
     * $query->filterByDictTelefono('%fooValue%', Criteria::LIKE); // WHERE dict_telefono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dictTelefono The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictTelefono($dictTelefono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dictTelefono)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_TELEFONO, $dictTelefono, $comparison);
    }

    /**
     * Filter the query on the dict_fax column
     *
     * Example usage:
     * <code>
     * $query->filterByDictFax('fooValue');   // WHERE dict_fax = 'fooValue'
     * $query->filterByDictFax('%fooValue%', Criteria::LIKE); // WHERE dict_fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dictFax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictFax($dictFax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dictFax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_FAX, $dictFax, $comparison);
    }

    /**
     * Filter the query on the dict_email column
     *
     * Example usage:
     * <code>
     * $query->filterByDictEmail('fooValue');   // WHERE dict_email = 'fooValue'
     * $query->filterByDictEmail('%fooValue%', Criteria::LIKE); // WHERE dict_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dictEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictEmail($dictEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dictEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_EMAIL, $dictEmail, $comparison);
    }

    /**
     * Filter the query on the dict_cupo column
     *
     * Example usage:
     * <code>
     * $query->filterByDictCupo(1234); // WHERE dict_cupo = 1234
     * $query->filterByDictCupo(array(12, 34)); // WHERE dict_cupo IN (12, 34)
     * $query->filterByDictCupo(array('min' => 12)); // WHERE dict_cupo > 12
     * </code>
     *
     * @param     mixed $dictCupo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictCupo($dictCupo = null, $comparison = null)
    {
        if (is_array($dictCupo)) {
            $useMinMax = false;
            if (isset($dictCupo['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_CUPO, $dictCupo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictCupo['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_CUPO, $dictCupo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_CUPO, $dictCupo, $comparison);
    }

    /**
     * Filter the query on the dict_t_evaluacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDictTEvaluacion(1234); // WHERE dict_t_evaluacion = 1234
     * $query->filterByDictTEvaluacion(array(12, 34)); // WHERE dict_t_evaluacion IN (12, 34)
     * $query->filterByDictTEvaluacion(array('min' => 12)); // WHERE dict_t_evaluacion > 12
     * </code>
     *
     * @see       filterByTEvaluacion()
     *
     * @param     mixed $dictTEvaluacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictTEvaluacion($dictTEvaluacion = null, $comparison = null)
    {
        if (is_array($dictTEvaluacion)) {
            $useMinMax = false;
            if (isset($dictTEvaluacion['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_T_EVALUACION, $dictTEvaluacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictTEvaluacion['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_T_EVALUACION, $dictTEvaluacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_T_EVALUACION, $dictTEvaluacion, $comparison);
    }

    /**
     * Filter the query on the dict_t_capacitacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDictTCapacitacion(1234); // WHERE dict_t_capacitacion = 1234
     * $query->filterByDictTCapacitacion(array(12, 34)); // WHERE dict_t_capacitacion IN (12, 34)
     * $query->filterByDictTCapacitacion(array('min' => 12)); // WHERE dict_t_capacitacion > 12
     * </code>
     *
     * @param     mixed $dictTCapacitacion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictTCapacitacion($dictTCapacitacion = null, $comparison = null)
    {
        if (is_array($dictTCapacitacion)) {
            $useMinMax = false;
            if (isset($dictTCapacitacion['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_T_CAPACITACION, $dictTCapacitacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictTCapacitacion['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_T_CAPACITACION, $dictTCapacitacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_T_CAPACITACION, $dictTCapacitacion, $comparison);
    }

    /**
     * Filter the query on the dict_observacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDictObservacion('fooValue');   // WHERE dict_observacion = 'fooValue'
     * $query->filterByDictObservacion('%fooValue%', Criteria::LIKE); // WHERE dict_observacion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dictObservacion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictObservacion($dictObservacion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dictObservacion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_OBSERVACION, $dictObservacion, $comparison);
    }

    /**
     * Filter the query on the dict_vigente column
     *
     * Example usage:
     * <code>
     * $query->filterByDictVigente(1234); // WHERE dict_vigente = 1234
     * $query->filterByDictVigente(array(12, 34)); // WHERE dict_vigente IN (12, 34)
     * $query->filterByDictVigente(array('min' => 12)); // WHERE dict_vigente > 12
     * </code>
     *
     * @param     mixed $dictVigente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictVigente($dictVigente = null, $comparison = null)
    {
        if (is_array($dictVigente)) {
            $useMinMax = false;
            if (isset($dictVigente['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_VIGENTE, $dictVigente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictVigente['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_VIGENTE, $dictVigente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_VIGENTE, $dictVigente, $comparison);
    }

    /**
     * Filter the query on the dict_r_fecha_creacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDictRFechaCreacion('2011-03-14'); // WHERE dict_r_fecha_creacion = '2011-03-14'
     * $query->filterByDictRFechaCreacion('now'); // WHERE dict_r_fecha_creacion = '2011-03-14'
     * $query->filterByDictRFechaCreacion(array('max' => 'yesterday')); // WHERE dict_r_fecha_creacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $dictRFechaCreacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictRFechaCreacion($dictRFechaCreacion = null, $comparison = null)
    {
        if (is_array($dictRFechaCreacion)) {
            $useMinMax = false;
            if (isset($dictRFechaCreacion['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_R_FECHA_CREACION, $dictRFechaCreacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictRFechaCreacion['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_R_FECHA_CREACION, $dictRFechaCreacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_R_FECHA_CREACION, $dictRFechaCreacion, $comparison);
    }

    /**
     * Filter the query on the dict_r_fecha_modificacion column
     *
     * Example usage:
     * <code>
     * $query->filterByDictRFechaModificacion('2011-03-14'); // WHERE dict_r_fecha_modificacion = '2011-03-14'
     * $query->filterByDictRFechaModificacion('now'); // WHERE dict_r_fecha_modificacion = '2011-03-14'
     * $query->filterByDictRFechaModificacion(array('max' => 'yesterday')); // WHERE dict_r_fecha_modificacion > '2011-03-13'
     * </code>
     *
     * @param     mixed $dictRFechaModificacion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictRFechaModificacion($dictRFechaModificacion = null, $comparison = null)
    {
        if (is_array($dictRFechaModificacion)) {
            $useMinMax = false;
            if (isset($dictRFechaModificacion['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_R_FECHA_MODIFICACION, $dictRFechaModificacion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictRFechaModificacion['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_R_FECHA_MODIFICACION, $dictRFechaModificacion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_R_FECHA_MODIFICACION, $dictRFechaModificacion, $comparison);
    }

    /**
     * Filter the query on the dict_r_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByDictRUsuario(1234); // WHERE dict_r_usuario = 1234
     * $query->filterByDictRUsuario(array(12, 34)); // WHERE dict_r_usuario IN (12, 34)
     * $query->filterByDictRUsuario(array('min' => 12)); // WHERE dict_r_usuario > 12
     * </code>
     *
     * @param     mixed $dictRUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByDictRUsuario($dictRUsuario = null, $comparison = null)
    {
        if (is_array($dictRUsuario)) {
            $useMinMax = false;
            if (isset($dictRUsuario['min'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_R_USUARIO, $dictRUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dictRUsuario['max'])) {
                $this->addUsingAlias(DictacionTableMap::COL_DICT_R_USUARIO, $dictRUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DictacionTableMap::COL_DICT_R_USUARIO, $dictRUsuario, $comparison);
    }

    /**
     * Filter the query by a related \Actividad object
     *
     * @param \Actividad|ObjectCollection $actividad The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByActividad($actividad, $comparison = null)
    {
        if ($actividad instanceof \Actividad) {
            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $actividad->getActiCodigo(), $comparison);
        } elseif ($actividad instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $actividad->toKeyValue('PrimaryKey', 'ActiCodigo'), $comparison);
        } else {
            throw new PropelException('filterByActividad() only accepts arguments of type \Actividad or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Actividad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function joinActividad($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Actividad');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Actividad');
        }

        return $this;
    }

    /**
     * Use the Actividad relation Actividad object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ActividadQuery A secondary query class using the current class as primary query
     */
    public function useActividadQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActividad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Actividad', '\ActividadQuery');
    }

    /**
     * Filter the query by a related \Comuna object
     *
     * @param \Comuna|ObjectCollection $comuna The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByComuna($comuna, $comparison = null)
    {
        if ($comuna instanceof \Comuna) {
            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_C_COMUNA, $comuna->getComuCodigo(), $comparison);
        } elseif ($comuna instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_C_COMUNA, $comuna->toKeyValue('PrimaryKey', 'ComuCodigo'), $comparison);
        } else {
            throw new PropelException('filterByComuna() only accepts arguments of type \Comuna or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Comuna relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function joinComuna($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Comuna');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Comuna');
        }

        return $this;
    }

    /**
     * Use the Comuna relation Comuna object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ComunaQuery A secondary query class using the current class as primary query
     */
    public function useComunaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinComuna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Comuna', '\ComunaQuery');
    }

    /**
     * Filter the query by a related \EDictacion object
     *
     * @param \EDictacion|ObjectCollection $eDictacion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByEDictacion($eDictacion, $comparison = null)
    {
        if ($eDictacion instanceof \EDictacion) {
            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_E_DICTACION, $eDictacion->getEdiEstado(), $comparison);
        } elseif ($eDictacion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_E_DICTACION, $eDictacion->toKeyValue('PrimaryKey', 'EdiEstado'), $comparison);
        } else {
            throw new PropelException('filterByEDictacion() only accepts arguments of type \EDictacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EDictacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function joinEDictacion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EDictacion');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'EDictacion');
        }

        return $this;
    }

    /**
     * Use the EDictacion relation EDictacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EDictacionQuery A secondary query class using the current class as primary query
     */
    public function useEDictacionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEDictacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EDictacion', '\EDictacionQuery');
    }

    /**
     * Filter the query by a related \TCalificacion object
     *
     * @param \TCalificacion|ObjectCollection $tCalificacion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByTCalificacion($tCalificacion, $comparison = null)
    {
        if ($tCalificacion instanceof \TCalificacion) {
            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_T_CALIFICACION, $tCalificacion->getTcalTipo(), $comparison);
        } elseif ($tCalificacion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_T_CALIFICACION, $tCalificacion->toKeyValue('PrimaryKey', 'TcalTipo'), $comparison);
        } else {
            throw new PropelException('filterByTCalificacion() only accepts arguments of type \TCalificacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TCalificacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function joinTCalificacion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TCalificacion');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'TCalificacion');
        }

        return $this;
    }

    /**
     * Use the TCalificacion relation TCalificacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TCalificacionQuery A secondary query class using the current class as primary query
     */
    public function useTCalificacionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTCalificacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TCalificacion', '\TCalificacionQuery');
    }

    /**
     * Filter the query by a related \TCertificado object
     *
     * @param \TCertificado|ObjectCollection $tCertificado The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByTCertificado($tCertificado, $comparison = null)
    {
        if ($tCertificado instanceof \TCertificado) {
            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_T_CERTIFICADO, $tCertificado->getTceTipo(), $comparison);
        } elseif ($tCertificado instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_T_CERTIFICADO, $tCertificado->toKeyValue('PrimaryKey', 'TceTipo'), $comparison);
        } else {
            throw new PropelException('filterByTCertificado() only accepts arguments of type \TCertificado or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TCertificado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function joinTCertificado($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TCertificado');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'TCertificado');
        }

        return $this;
    }

    /**
     * Use the TCertificado relation TCertificado object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TCertificadoQuery A secondary query class using the current class as primary query
     */
    public function useTCertificadoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTCertificado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TCertificado', '\TCertificadoQuery');
    }

    /**
     * Filter the query by a related \TEvaluacion object
     *
     * @param \TEvaluacion|ObjectCollection $tEvaluacion The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByTEvaluacion($tEvaluacion, $comparison = null)
    {
        if ($tEvaluacion instanceof \TEvaluacion) {
            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_T_EVALUACION, $tEvaluacion->getTevTipo(), $comparison);
        } elseif ($tEvaluacion instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_T_EVALUACION, $tEvaluacion->toKeyValue('PrimaryKey', 'TevTipo'), $comparison);
        } else {
            throw new PropelException('filterByTEvaluacion() only accepts arguments of type \TEvaluacion or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TEvaluacion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function joinTEvaluacion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TEvaluacion');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'TEvaluacion');
        }

        return $this;
    }

    /**
     * Use the TEvaluacion relation TEvaluacion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TEvaluacionQuery A secondary query class using the current class as primary query
     */
    public function useTEvaluacionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTEvaluacion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TEvaluacion', '\TEvaluacionQuery');
    }

    /**
     * Filter the query by a related \TMoneda object
     *
     * @param \TMoneda|ObjectCollection $tMoneda The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByTMoneda($tMoneda, $comparison = null)
    {
        if ($tMoneda instanceof \TMoneda) {
            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_T_MONEDA, $tMoneda->getTmonTipo(), $comparison);
        } elseif ($tMoneda instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_T_MONEDA, $tMoneda->toKeyValue('PrimaryKey', 'TmonTipo'), $comparison);
        } else {
            throw new PropelException('filterByTMoneda() only accepts arguments of type \TMoneda or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TMoneda relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function joinTMoneda($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TMoneda');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'TMoneda');
        }

        return $this;
    }

    /**
     * Use the TMoneda relation TMoneda object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TMonedaQuery A secondary query class using the current class as primary query
     */
    public function useTMonedaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTMoneda($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TMoneda', '\TMonedaQuery');
    }

    /**
     * Filter the query by a related \EvaluacionAplicada object
     *
     * @param \EvaluacionAplicada|ObjectCollection $evaluacionAplicada the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByEvaluacionAplicada($evaluacionAplicada, $comparison = null)
    {
        if ($evaluacionAplicada instanceof \EvaluacionAplicada) {
            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $evaluacionAplicada->getEvapCActividad(), $comparison)
                ->addUsingAlias(DictacionTableMap::COL_DICT_NUMERO, $evaluacionAplicada->getEvapNumeroDictacion(), $comparison);
        } else {
            throw new PropelException('filterByEvaluacionAplicada() only accepts arguments of type \EvaluacionAplicada');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EvaluacionAplicada relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function joinEvaluacionAplicada($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EvaluacionAplicada');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'EvaluacionAplicada');
        }

        return $this;
    }

    /**
     * Use the EvaluacionAplicada relation EvaluacionAplicada object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EvaluacionAplicadaQuery A secondary query class using the current class as primary query
     */
    public function useEvaluacionAplicadaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvaluacionAplicada($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EvaluacionAplicada', '\EvaluacionAplicadaQuery');
    }

    /**
     * Filter the query by a related \Facilitador object
     *
     * @param \Facilitador|ObjectCollection $facilitador the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByFacilitador($facilitador, $comparison = null)
    {
        if ($facilitador instanceof \Facilitador) {
            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $facilitador->getFaciCActividad(), $comparison)
                ->addUsingAlias(DictacionTableMap::COL_DICT_NUMERO, $facilitador->getFaciNumeroDictacion(), $comparison);
        } else {
            throw new PropelException('filterByFacilitador() only accepts arguments of type \Facilitador');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Facilitador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function joinFacilitador($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Facilitador');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Facilitador');
        }

        return $this;
    }

    /**
     * Use the Facilitador relation Facilitador object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FacilitadorQuery A secondary query class using the current class as primary query
     */
    public function useFacilitadorQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFacilitador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Facilitador', '\FacilitadorQuery');
    }

    /**
     * Filter the query by a related \Inscripcion object
     *
     * @param \Inscripcion|ObjectCollection $inscripcion the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDictacionQuery The current query, for fluid interface
     */
    public function filterByInscripcion($inscripcion, $comparison = null)
    {
        if ($inscripcion instanceof \Inscripcion) {
            return $this
                ->addUsingAlias(DictacionTableMap::COL_DICT_C_ACTIVIDAD, $inscripcion->getInscCActividad(), $comparison)
                ->addUsingAlias(DictacionTableMap::COL_DICT_NUMERO, $inscripcion->getInscNumeroDictacion(), $comparison);
        } else {
            throw new PropelException('filterByInscripcion() only accepts arguments of type \Inscripcion');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Inscripcion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function joinInscripcion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Inscripcion');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Inscripcion');
        }

        return $this;
    }

    /**
     * Use the Inscripcion relation Inscripcion object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \InscripcionQuery A secondary query class using the current class as primary query
     */
    public function useInscripcionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInscripcion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Inscripcion', '\InscripcionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDictacion $dictacion Object to remove from the list of results
     *
     * @return $this|ChildDictacionQuery The current query, for fluid interface
     */
    public function prune($dictacion = null)
    {
        if ($dictacion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(DictacionTableMap::COL_DICT_C_ACTIVIDAD), $dictacion->getDictCActividad(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(DictacionTableMap::COL_DICT_NUMERO), $dictacion->getDictNumero(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the dictacion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DictacionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DictacionTableMap::clearInstancePool();
            DictacionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DictacionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DictacionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DictacionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DictacionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DictacionQuery
