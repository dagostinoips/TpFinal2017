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
	
	function __construct ( ){
		$this->saldo = 0;
		$this->viajeplus = 0;
		$this->viajes = [];
		$this->nextID += 1;
	}
	
    public function saldo () {
        return $this->saldo;
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
			cargarSaldo ( $monto - 332 );
		}
		elseif ( $monto >= 624 ) {
			$this->saldo += 776;
			cargarSaldo ( $monto - 624 );
		}
    }
	
	public function pagar ( Transporte $transporte ) {
		$fh=new DateTime();
		$nViaje = $fh->format('Y-m-d-H-i-s');
		$$nViaje = new Viaje ( $this , $transporte );	// El nombre del objeto tarjeta es la fecha y la hora del viaje
		array_push ( $this->viajes , $$nViaje );
	}
	public function viajesRealizados() {
		print_r( $this->viajes );
	}
}
