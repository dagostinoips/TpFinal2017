<?php

namespace TpFinal;

class Bici extends Transporte {
	protected $id;
	
	function __construct ( $id ) {
		$this->id = $id;
	}
	public function id () {
		return $this->id;
	}
}

?>
