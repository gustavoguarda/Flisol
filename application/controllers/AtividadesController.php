<?php
/**
 * Controle de Atividade
 * @filesource  07/03/2010
 * @author      PHPDF <http://www.phpdf.org.br>
 * @package     <<application>>
 * @subpackage  <<application>>.application.controllers
 * @version     $Id$
 */
class AtividadesController extends Zend_Controller_Action
{
	

	public function indexAction()
	{
		$oAtividade = new Atividade();
		$rowSetAtividades = $oAtividade->fetchAll();
		$this->view->atividades = $rowSetAtividades;
	}
	
	public function formularioAction()
	{
	    $id = $this->_getParam('id', null);
	    $oAtividade = new Atividade();
	    if($id) {
	        $rowAtividade = $oAtividade->find($id)->current();
	    } else {
    	    $rowAtividade = $oAtividade->createRow();
	    }
	    
	    /*$oPalestrante = new Usuario();
	    $rowPalestrante = $oPalestrante->fetchAll( 'perfil_id = ' . Perfil::PERFIL_ID_PALESTRANTE )->toArray();
	    $aPalestrante = array();
	    $aPalestrante[''] = 'Selecione';
        foreach($rowPalestrante as $oPalestrante) {
            $aPalestrante[$oPalestrante['id']] = $oPalestrante['nome'];
        }
        $aDados['id_palestrante'] = $aPalestrante;
        */
	    
        $oPalestrante = new Usuario();
        $aDados['id_palestrante'] = $oPalestrante->getArrayAssociative('id', 'nome');
        
        $oSala = new Sala();
        $aDados['id_sala'] = $oSala->getArrayAssociative('id', 'nome');
        
        
       /* $oSala = new Sala();
        $aReferencias['id'] = $oSala->getArrayAssociative();
	    */
	    $this->view->atividade = $rowAtividade;
	    $this->view->aDados = $aDados;
	}
	
	public function gravarAction()
	{
	    $id = $this->_getParam('id', null);
	    $oAtividade = new Atividade();
	    
	    $dados = $this->_getAllParams(); 
	    if($id) {
	        $rowAtividade = $oAtividade->find($id)->current();
	    } else {
	    	unset($dados['id']);
    	    $rowAtividade = $oAtividade->createRow();
	    }
	    
	    $rowAtividade->setFromArray($dados);
	    $rowAtividade->save();
	    $this->_redirect('atividades/index');
	}
}
