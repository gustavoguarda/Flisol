<?php
/**
 * @see Zend_Db_Table_Abstract
 */
require_once 'Zend/Db/Table.php';

/**
 * Classe abstract de controle de acesso ao BD
 * @author Gustavo Guarda <gustavoguarda@gmail.com>
 *
 */
class Phpdf_Db_Table extends Zend_Db_Table
{

	/**
	 * Retornar array de registros da tabela, utlizando a pk como indice
	 * @param $sKey Nome do campo da chave primária
	 * @param $sDescription Nome do campo de descrição que será colocar como value do array
	 * @param $where Filtro de registros
	 * @param $order string|array Campos para ordenar
	 * @param $count
	 * @param $aMerge
	 * @author Cristiano Teles <cristianoteles@estradavirtual.com.br>
	 * @return array
	 */
	public function getArrayAssociative( $sKey, $sDescription, $where = null, $order = null, $count = null, $aMerge = array( '' => 'Selecione') ) {
		$oRowSet = $this->fetchAll( $where, $order, $count );
		$aReturn = $aMerge;
		while( $oRow = $oRowSet->current() ) {
			$aReturn[$oRow->$sKey] = $oRow->$sDescription;
			$oRowSet->next();
		}
		return $aReturn;
	}
}