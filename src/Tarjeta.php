<?php
namespace TpFinal;
class Tarjeta implements interfaceTarjeta {
	protected $saldo;
	protected $franquicia;
	protected $viajes;
	protected $viajeplus;
	protected $fh;
	protected $precioC = 9.70;
	protected $nextID = 0;
	protected $boleto;
	
	function __construct ( $franquicia ){
		$this->saldo = 0;
		$this->viajeplus = 0;
		$this->viajes = [];
		$this->nextID += 1;
		$this->franquicia = $franquicia;
	}
	
    public function saldo () {
        return $this->saldo;
    }

	public function franquicia () {
		return $this->franquicia;
	}
    
    public function cargarSaldo ( $monto ) {
		if ( $monto < 332 ) {
			$this->saldo += $monto;
			$this->saldo -= ($this->viajeplus * $this->precioC);
			$this->viajeplus = 0;
			return;
		}
		elseif ( $monto < 624 ) {
			$this->saldo += 388;
			$this->cargarSaldo ( $monto - 332 );
		}
		elseif ( $monto >= 624 ) {
			$this->saldo += 776;
			$this->cargarSaldo ( $monto - 624 );
		}
    }
	
	public function pagar ( Transporte $transporte ) {
		$nViaje = date('Y-m-d-H-i-s');
		$$nViaje = new Viaje ( $this , $transporte );	// El nombre del objeto tarjeta es la fecha y la hora del viaje
		array_push ( $this->viajes , $$nViaje );
		$this->boleto = new Boleto ( $$nViaje );
	}
	public function viajesRealizados() {
		return $this->viajes;
	}
}
