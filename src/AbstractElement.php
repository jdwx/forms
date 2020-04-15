<?php


declare( strict_types = 1 );


namespace JDWX\Forms;


class AbstractElement implements IChild {


	/** @var IParent */
	protected $par;

	/** @var ?string */
	protected $nstHeading = null;

	/** @var ?string */
	protected $nstLabel = null;

	/** @var string */
	protected $stName;


	public function __construct( IParent $i_par, string $i_stName ) {
		$this->par = $i_par;
		$this->stName = $i_stName;
		$i_par->add( $this );
	}


	public function getHeading() : ?string {
		return $this->nstHeading;
	}


	public function getID() : string {
		return $this->stName;
	}


	public function getLabel() : ?string {
		return $this->nstLabel;
	}


	public function getName() : string {
		return $this->stName;
	}


	public function setHeading( ?string $i_nstHeading ) : void {
		$this->nstHeading = $i_nstHeading;
	}


	public function setLabel( ?string $i_nstLabel ) : void {
		$this->nstLabel = $i_nstLabel;
	}


	public function setName( ?string $i_nstName ) : void {
		$this->nstName = $i_nstName;
	}



}


