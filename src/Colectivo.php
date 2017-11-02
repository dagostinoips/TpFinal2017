<?php
namespace TpFinal;

class Colectivo extends Transporte {
	protected $linea;
	
	function __construct ($linea) {
		$this->linea = $linea;
	}
	
	public function linea () {
		return $this->linea;
	}
    }
