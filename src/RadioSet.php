<?php


declare( strict_types = 1 );


namespace JDWX\Forms;


class RadioSet extends ValueElement implements IParent {


	/** @var IParent */
	protected $par;


	/** @var Radio[] */
	protected $rRadio = [];


	public function __construct( IParent $i_par,
								 string $i_stName, array $i_rOptions = [],
								 string $i_stValueDefault = "" ) {
		parent::__construct( $i_par, $i_stName, $i_stValueDefault );
		$this->par = $i_par;
		foreach ( $i_rOptions as $stTag => $stLabel )
			$this->addOption( $stTag, $stLabel );
	}


	public function add( IChild $i_child ) : void {
		$this->rRadio[] = $i_child;
	}


	public function addOption( string $i_stTag, string $i_stLabel ) : void {
		$rad = new Radio( $this, $this->getName(), $i_stTag );
		$rad->setLabel( $i_stLabel );
	}


	public function getForm() : Form {
		return $this->par->getForm();
	}


	public function render( \JDWX\HTML5\IParent $i_par ) : void {
		$blk = new \JDWX\HTML5\Element( $i_par, "form-block" );
		$bFirst = true;
		foreach ( $this->rRadio as $rad ) {
			if ( $bFirst )
				$bFirst = false;
			else
				$el = new \JDWX\HTML5\Elements\Br( $blk );
			$rad->render( $blk );
		}
	}


}


