<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {

    /**
     * Comprueba que el saldo de una tarjeta nueva sea cero.
     */
    public function testSaldoCero() {
        $tarjeta = new Tarjeta( 1234, "comun" );
        $this->assertEquals( $tarjeta->saldo(), 0 );
    }
    public function testSaldoCincuenta() {
        $tarjeta = new Tarjeta( 1234, "comun");
        $tarjeta->cargarSaldo( 50 );
        $this->assertEquals( $tarjeta->saldo(), 50 );
    }
    public function testSaldoTrescientos() {
        $tarjeta = new Tarjeta ( 1234, "comun");
        $tarjeta->cargarSaldo( 332 );
        $this->assertEquals( $tarjeta->saldo(), 388 );
    }
	public function testSaldoSeiscientos() {
        $tarjeta = new Tarjeta ( 1234, "comun");
        $tarjeta->cargarSaldo( 624 );
        $this->assertEquals( $tarjeta->saldo(), 776 );
    }
    public function testUnViaje() {
	    $tarjeta = new Tarjeta ( 1234, "comun");
	    $tarjeta->cargarSaldo( 50 );
	    $colectivo144 = new Colectivo ( 144 );
	    $tarjeta->pagar($colectivo144);
	    $this->assertEquals( $tarjeta->saldo(), (40.3) );
    }
	 public function testDosViajes() {
		$tarjeta = new Tarjeta ( 1234, "comun");
		$tarjeta->cargarSaldo( 50 );
		$colectivo144 = new Colectivo ( 144 );
	    	$tarjeta->pagar($colectivo144);
		$tarjeta->pagar($colectivo144);
	    	$this->assertEquals( $tarjeta->saldo(), 30.6 );
    }
	public function testViajeTransbordo() {
		$tarjeta = new Tarjeta ( 1234, "comun");
		$colectivo144 = new Colectivo ( 144 );
		$tarjeta->cargarSaldo( 50 );
	    	$tarjeta->pagar($colectivo144);
		$colectivo103 = new Colectivo ( 103 );
		$tarjeta->pagar($colectivo103);
	    	$this->assertEquals( $tarjeta->saldo(), 37.1 );
    }
	public function testDosViajesTransbordo() {
		$tarjeta = new Tarjeta ( 1234, "comun");
		$colectivo103 = new Colectivo ( 103 );
		$colectivo144 = new Colectivo ( 144 );
		$tarjeta->cargarSaldo( 50 );
		$tarjeta->pagar($colectivo144);
		$tarjeta->pagar($colectivo103);
		$tarjeta->pagar($colectivo103);
		$this->assertEquals( $tarjeta->saldo(), 27.4 );
    }
	
	public function testAlquilarBici() {
		$tarjeta = new Tarjeta ( 1234, "comun");
		$tarjeta->cargarSaldo( 50 );
		$bici = new Bici (1234);
		$tarjeta->pagar($bici);
		$this->assertEquals( $tarjeta->saldo(), 37.55 );
	}
	
	public function testAlquilarBicis() {
		$tarjeta = new Tarjeta ( 1234, "comun");
		$tarjeta->cargarSaldo( 50 );
		$bici = new Bici (1234);
		$tarjeta->pagar($bici);
		$bici2 = new Bici (2534);
		$tarjeta->pagar($bici2);
		$this->assertEquals( $tarjeta->saldo(), 37.55 );
	}
	
}
