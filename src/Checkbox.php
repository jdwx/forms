<?php


declare( strict_types = 1 );


namespace JDWX\Forms;


class Checkbox extends BooleanElement {


	function errorCannotBeEmpty() : string {
		return "This checkbox must be checked.";
	}


	function getInputType() : string {
		return 'checkbox';
	}


}


