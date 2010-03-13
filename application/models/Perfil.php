<?php
// Perfil.php
/**
 * Model de Perfil
 * @filesource  07/03/2010
 * @package     <<application>>
 * @subpackage  <<application>>.application.models
 * @version     $Id$
 */
class Perfil extends Zend_Db_Table {
    
	const PERFIL_ID_PALESTRANTE 	= 1;
	const PERFIL_ID_PARTICIPANTE 	= 2;
	
	protected $_name = 'perfil';
    protected $_dependentTables  = array( 'Usuario' );
    protected $_primary = array('id');
    

}
