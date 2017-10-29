<?php

namespace TpFinal;
class Viaje {
	protected $fecha;
	protected $hora;
	protected $tipo;
	protected $monto;
	protected $transporte;
	protected $precioC = 9,70;
	protected $precioB = 12,45;
	
	function __construct ( Tarjeta $tarjeta, Transporte $transporte ) {
		$this->fecha = date( "Y/m/d" );
		$this->hora = date( "h:i:sa" );
		$this->transporte = $transporte;
		$this->tipo = $tarjeta->franquicia;
		
		if ( is_a ( $this->transporte , Bici ) ) {
			switch ( $this->tipo ) {
			case "comun":
				if ( $tarjeta->saldo >= $this->precioB {
					$this->monto = $this->precioB;
				}
				elseif ($tarjeta->viajeplus <= 1) {
					$tarjeta->viajeplus += 1;		
				}
				else {
					echo "No tiene saldo suficiente y ya utilizo los dos viajes plus<br>";
					// aca habria que meter algo de que no se puede hacer el viaje
				}
				break;
					
			case "estudiantil":
				if ( $tarjeta->saldo >= round( ( $this->precioB / 2 ) , 2 ) ) ) {
					$this->monto = round( ( $this->precioB / 2 ) , 2 ) ) );
				}
				elseif ($tarjeta->viajeplus <= 1) {
					$tarjeta->viajeplus += 1;		
				}
				else {
					echo "No tiene saldo suficiente y ya utilizo los dos viajes plus<br>";
					// aca habria que meter algo de que no se puede hacer el viaje
				}
				break;
			case "total":
					$this->monto = 0;
				break;
			}
		}
		elseif ( is_a ( $this->transporte , Colectivo ) {
			switch ( $this->tipo ) {
			case "comun":
				if ( $tarjeta->saldo >= $this->precioC ) {
					$this->monto = $this->precioC;
				}
				elseif ($tarjeta->viajeplus <= 1) {
					$tarjeta->viajeplus += 1;		
				}
				else {
					echo "No tiene saldo suficiente y ya utilizo los dos viajes plus<br>";
					// aca habria que meter algo de que no se puede hacer el viaje
				}
				break;
					
			case "estudiantil":
				if ( $tarjeta->saldo >= round( ( $this->precioC / 2 ) , 2 ) ) ) ) {
					$this->monto = round( ( $this->precioC / 2 ) , 2 ) ) ) );
				}
				elseif ($tarjeta->viajeplus <= 1) {
					$tarjeta->viajeplus += 1;		
				}
				else {
					echo "No tiene saldo suficiente y ya utilizo los dos viajes plus<br>";
					// aca habria que meter algo de que no se puede hacer el viaje
				}
				break;
			case "total":
					$this->monto = 0;
				break;
		}
		$tarjeta->saldo -= $this->monto;
	}
}
