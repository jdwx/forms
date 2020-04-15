<?php


declare( strict_types = 1 );


namespace JDWX\Forms;


class Form implements IParent {


	/** @var IFormElement */
	protected $rContents = [];


	/** @var string */
	protected $stAction;


	/** @var string */
	protected $stMethod;


	public function __construct( string $i_stAction = "",
								 string $i_stMethod = "POST" ) {
		$this->stAction = $i_stAction;
		$this->stMethod = $i_stMethod;
	}


	public function add( IChild $i_el ) {
		$this->rContents[] = $i_el;
	}


	public function getForm() : Form {
		return $this;
	}


	public function getMethod() : string {
		return $this->stMethod;
	}


	public function render( \JDWX\HTML5\IParent $i_par ) : void {
		$frm = new \JDWX\HTML5\Elements\Form( $i_par, $this->stAction,
											  $this->stMethod );
		foreach( $this->rContents as $child ) {
			$row = new \JDWX\HTML5\Element( $frm, 'form-row' );
			$child->render( $row );
		}
	}


	public function setMethod( string $i_stMethod ) : void {
		$this->stMethod = $i_stMethod;
	}


}


