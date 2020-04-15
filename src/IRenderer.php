<?php


declare( strict_types = 1 );


namespace JDWX\Forms;


interface IRenderer {


	public function render( IChild $i_child ) : string;


}


