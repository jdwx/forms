<?php


declare( strict_types = 1 );


namespace JDWX\Forms;


class Radio extends BooleanElement {


	function getInputType() : string {
		return 'radio';
	}


}


