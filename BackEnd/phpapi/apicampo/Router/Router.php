<?php

$router->get('/api/productos', 'Campo@getAllProductos');
$router->get('/api/productos/:id', 'Campo@getProductosbyId');
$router->get('/api/variedades/:producto', 'Campo@getVariedadesbyId');

