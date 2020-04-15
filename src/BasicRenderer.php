<?php


declare( strict_types = 1 );


namespace JDWX\Forms;


use \JDWX\HTML5\Elements as Elements;


class BasicRenderer implements IRenderer {


	/** @var Form */
	protected $form;


	public function __construct( Form $i_form ) {
		$this->form = $i_form;
	}


	public function __toString() : string {
		$st = "<form>";
		$st .= $this->form->renderChildren( $this );
		$st .= "</form>";
		return $st;
	}


	public function render( IChild $i_child ) : string {
		if ( $i_child instanceof ValueElement ) {
			$nst = $this->renderValue( $i_child );
			if ( is_string( $nst ) )
				return $nst;
		}
		return "unknown element type {$i_child->getName()} "
			. get_class( $i_child );
	}


	public function renderBoolean( BooleanElement $i_boo ) : ?string {
		if ( $i_boo instanceOf Checkbox )
			return $this->renderCheckbox( $i_boo );
		return null;
	}


	public function renderCheckbox( Checkbox $i_chk ) : string {
		$frag = new \JDWX\HTML5\Fragment;
		$inp = new Elements\Input(
			$frag,
			$i_chk->getName(),
			"checkbox",
			$i_chk->getValueIfTrue()
		);
		$inp->setID( $i_chk->getID() );
		if ( $i_chk->isTrue() )
			$inp->setChecked( true );

		$nstLabel = $i_chk->getLabel();
		if ( is_string( $nstLabel ) ) { 
			$lab = new Elements\Label( $frag, $nstLabel );
			$lab->setFor( $i_chk->getID() );
		}

		return strval( $frag );

	}


	public function renderValue( ValueElement $i_value ) : string {
		$st = "<form-row>";
		$nstHeading = $i_value->getHeading();
		if ( is_string( $nstHeading ) )
			$st .= "<form-heading>{$nstHeading}</form-heading>";
		if ( $i_value instanceof BooleanElement ) {
			$nst = $this->renderBoolean( $i_value );
			if ( is_string( $nst ) )
				return $st . $nst . "</form-row>";
		}
		$stID = $i_value->getID();
		$stName = $i_value->getID();
		$st .= $i_value->getID();
		$st .= " = ";
		$st .= $i_value->getValueDebug();
		$st .= "</form-row>";
		return $st;
	}


}


