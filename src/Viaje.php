<?php

namespace TpFinal;
class Viaje {
	protected $fecha;
	protected $hora;
	protected $tipo;
	protected $monto;
	protected $transporte;
	protected $precioC = 9.70;
	protected $precioB = 12.45;
	protected $horaActual = time ( ); // no se si funcionara esto pero spongo que si
	protected $seisam = date ( "06:00:00am" );
	protected $dospm = date ( "02:00:00pm" );
	protected $diezpm = date ( "10:00:00pm" );
	protected $cantTrasb = 0;
	protected $tarjeta;
	
	function __construct ( Tarjeta $tarjeta, Transporte $transporte ) {
		$this->tarjeta = $tarjeta;
		$this->fecha = date( "Y/m/d" );
		$this->diaSemana = date( "D" );
		$this->hora = date( "h:i:sa" , $horaActual );
		$this->transporte = $transporte;
		$this->tipo = $tarjeta->franquicia;
		$this->tarjeta = $tarjeta;
		
		$anterior = end( $tarjeta->viajesRealizados() ); 
		
		if ( is_a ( $this->transporte , Colectivo ) ) {
			if ( ( $this->hora > $seisam && $this->hora < $diezpm && ( $this->diaSemana == "Mon" || $this->diaSemana == "Tue" || $this->diaSemana == "Wed" || $this->diaSemana == "Thu" || $this->diaSemana == "Fri") ) || ( $this->hora > $seisam && $this->hora < $dospm && $this->diaSemana == "Sat" ) ) {
				if ( ( ( $this->horaActual - $anterior->horaActual ) / 60 ) < 60  && $this->cantTrasb != 1 ) {
					if ( $this->tipo == "comun" ) {
						if ( $tarjeta->saldo >= round( ( $this->precioC / 3 ) , 2 ) ) {
							$this->monto = round( ( $this->precioC / 3 ) , 2 );
						}
						else {
							echo "No tiene saldo suficiente<br>";
						}
					}
					elseif ( $this->tipo == "estudiantil" ) {
						if ( $tarjeta->saldo >= round( ( $this->precioC / 6 ) , 2 ) ) {
							$this->monto = round( ( $this->precioC / 6 ) , 2 );
						}
						else {
							echo "No tiene saldo suficiente<br>";
						}
					}
				}
			}
			elseif ( ( ( $this->horaActual - $anterior->horaActual ) / 60 ) < 90 && $this->cantTrasb != 1 )
				if ( $this->tipo == "comun" ) {
					if ( $tarjeta->saldo >= round( ( $this->precioC / 3 ) , 2 ) ) {
						$this->monto = round( ( $this->precioC / 3 ) , 2 );
						$this->cantTrasb += 1;
					}
					else {
						echo "No tiene saldo suficiente<br>";
						$this->cantTrasb = 0;
					}
				}
				elseif ( $this->tipo == "estudiantil" ) {
					if ( $tarjeta->saldo >= round( ( $this->precioC / 6 ) , 2 ) ) {
						$this->monto = round( ( $this->precioC / 6 ) , 2 );
					}
					else {
						echo "No tiene saldo suficiente<br>";
						$this->cantTrasb = 0;
					}
				}
			}
		}
			
		
		if ( is_a ( $this->transporte , Bici ) ) {
			$diaSiguiente = strtotime ( '+1 day' , strtotime ( $anterior->fecha ) );
			$diaSiguiente = date ( 'Y/m/j' , $diaSiguiente );
			if($this->fecha <= $diaSiguiente && $this->horaActual <= $anterior->horaActual) {
				$this->monto = 0;
			}
			else {
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
					if ( $tarjeta->saldo >= round( ( $this->precioB / 2 ) , 2 ) )  {
						$this->monto = round( ( $this->precioB / 2 ) , 2 ) ;
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
		}
		
		$tarjeta->saldo -= $this->monto;
	}
}
