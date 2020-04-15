<?php


declare( strict_types = 1 );


namespace JDWX\Forms;


class Submit extends BooleanElement {


	function getInputType() : string {
		return 'submit';
	}


}


