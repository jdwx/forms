<?php


declare( strict_types = 1 );


namespace JDWX\Forms;


class ValueElement extends AbstractElement {


	/** @var bool */
	protected $bAllowMissing = false;

	/** @var string */
	protected $stValueDefault;

	/** @var ?string */
	protected $nstValueCurrent = null;


	public function __construct( IParent $i_par, string $i_stName,
								 string $i_stValueDefault = "" ) {
		parent::__construct( $i_par, $i_stName );
		$this->stValueDefault = $i_stValueDefault;
	}


	public function getAllowMissing() : bool {
		return $this->bAllowMissing;
	}


	public function getValueCurrent() : string {
		return $this->nstValueCurrent ?? $this->getValueDefault();
	}


	public function getValueDefault() : string {
		return $this->stValueDefault;
	}


	public function getValueDebug() : string {
		return $this->getValueCurrent();
	}


	public function setAllowMissing( bool $i_bAllowMissing = true ) : void {
		$this->bAllowMissing = $i_bAllowMissing;
	}


}


