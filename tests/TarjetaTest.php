<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {

    /**
     * Comprueba que el saldo de una tarjeta nueva sea cero.
     */
    public function testSaldoCero() {
        $tarjeta = new Tarjeta;
        $this->assertEquals( $tarjeta->saldo(), 0 );
    }
    public function testSaldoCincuenta() {
        $tarjeta1 = new Tarjeta;
        $tarjeta1->cargarSaldo( 50 );
        $this->assertEquals( $tarjeta1->saldo(), 50 );
    }
    public function testSaldoTrescientos() {
        $tarjeta2 = new Tarjeta;
        $tarjeta2->cargarSaldo( 332 );
        $this->assertEquals( $tarjeta2->saldo(), 388 );
    }
}
