<?php
class Paginas extends Controlador
{
  public function __construct()
  {
    //echo "Controlador de paginas cargando";
  }
  public function index()
  {
    $datos = [
      'titulo' => 'Bienvenidos a MVC renderWEB'
    ];
    $this->vista('paginas/inicio', $datos);
  }
}
