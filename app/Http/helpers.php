<?php

    function setActiveRoute($name)
    {
        // el método routeIs averigua si estamos en la ruta que se le pasa como argumento
        return request()->routeIs($name) ? 'active' : '';
    }
