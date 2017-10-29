<?php

namespace TpFinal;

interface interfaceTarjeta {
 public function pagar(Transporte $transporte);
 public function cargarSaldo($monto);
 public function saldo();
 public function viajesRealizados();
}
