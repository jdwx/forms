<?php


declare( strict_types = 1 );


namespace JDWX\Forms;


class BooleanElement extends ValueElement {


	/** @var bool */
	protected $bTrueByDefault;

	/** @var string */
	protected $stValueIfTrue;

	/** @var string */
	protected $stValueIfFalse;


	public function __construct( IParent $i_par, string $i_stName,
								 string $i_stValueIfTrue,
								 bool $i_bTrueByDefault = false,
								 string $i_stValueIfFalse = "" ) {
		$stValueDefault = $i_bTrueByDefault
			? $i_stValueIfTrue
			: $i_stValueIfFalse;
		parent::__construct( $i_par, $i_stName, $stValueDefault );
		$this->bTrueByDefault = $i_bTrueByDefault;
		$this->stValueIfFalse = $i_stValueIfFalse;
		$this->stValueIfTrue = $i_stValueIfTrue;
	}


	public function getID() : string {
		return $this->getName() . '_' . $this->stValueIfTrue;
	}


	public function getTrueByDefault() : bool {
		return $this->bTrueByDefault;
	}


	public function getValueDebug() : string {
		return $this->isTrue() ? "true" : "false";
	}


	public function getValueIfTrue() : string {
		return $this->stValueIfTrue;
	}


	public function isTrue() : bool {
		$stValue = $this->getValueCurrent();
		if ( $stValue === $this->stValueIfTrue ) return true;
		if ( $stValue === $this->stValueIfFalse ) return false;
		throw new \Exception(
			"Invalid boolean value {$stValue} for {$this->getName()}."
		);
	}


	public function render( \JDWX\HTML5\IParent $i_par ) : void {

		$inp = new \JDWX\HTML5\Elements\Input(
			$i_par,
			$this->getName(),
			$this->getInputType(),
			$this->getValueIfTrue()
		);
		$inp->setID( $this->getID() );

		$nstLabel = $this->getLabel();
		if ( is_string( $nstLabel ) ) {
			$lab = new \JDWX\HTML5\Elements\Label( $i_par, $nstLabel );
			$lab->setFor( $this->getID() );
		}

	}


	public function setTrueByDefault( bool $i_bTrueByDefault = true ) : void {
		$this->bTrueByDefault = $i_bTrueByDefault;
	}


}



