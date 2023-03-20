<?php

/*mapear la url ingresada en el navegador
1- Controlador
2- Metodos
3- Parametros
 */

class Core
{
  protected $controladorActual = "Paginas";
  protected $metodoActual = "index";
  protected $parametros = [];

  public function __construct()
  {
    $url = $this->getUrl();
    //BUSCAR EN CONTROLADORES SI EL CONTROLADOR EXISTE
    if (isset($url[0])) {
      if (file_exists('../app/controladores/' . ucwords($url[0]) . '.php')) {
        //Si existe se setea como controlador por defecto
        $this->controladorActual = ucwords($url[0]);

        //unset indice
        unset($url[0]);
      }
    }

    // Requerir el Controlador
    require_once '../app/controladores/' . $this->controladorActual . '.php';
    $this->controladorActual = new $this->controladorActual;

    //COMPROBAR LA 2DA PARTE DE LA URL QUE SERIA EL METHODO
    if (isset($url[1])) {
      if (method_exists($this->controladorActual, $url[1])) {
        //chequemos el methodo
        $this->metodoActual = $url[1];
        //unset indice
        unset($url[1]);
      }
    }
    //Para probar traer metodo
    //echo $this->metodoActual;;

    //Obtener los parametros
    $this->parametros = $url ? array_values($url) : [];

    //Llamar callback con parametros array
    call_user_func_array(
      [
        $this->controladorActual,
        $this->metodoActual
      ],
      $this->parametros
    );
  }

  public function getUrl()
  {
    //echo $_GET['url'];
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
