<?php

namespace Cosanpa\PortalGlpi;

class Controller
{
    public function view(String $view = null, array $dados = [])
    {
        extract($dados);
        require __DIR__ . "/../app/views/" . $view . ".tpl.php";
    }
    
}
