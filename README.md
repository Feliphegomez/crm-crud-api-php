# CRM (MVC) + API REST CRUL - crm-crud-api-php

Seguro que algunos que hayan leído o visto algunos de los tutoriales o ejemplos que pongo sobre programación en PHP con y sin frameworks, pueden no estar de acuerdo conmigo en ciertos detalles, o incluso estar pensando «este chico no está programando verdaderamente orientado a objetos» o «no sigue el paradigma a rajatabla» (todo lo que explico lo hago desde mi punto de vista actual, nunca digo que sea la verdad absoluta o lo más correcto siempre).

Pues bien hoy vamos ver un ejemplo muy bueno de como programar realmente orientado a objetos en PHP puro con MVC. Lo que voy a mostrar hoy perfectamente podría ser la base para construirnos un pequeño framework propio, veremos incluso como hacer un controlador frontal, como crear objetos que representen entidades de la base de datos, etc, por lo tanto lo que voy a enseñar hoy es un ejemplo muy didáctico y muy completo.

## Estructura de directorios

En nuestro «framework» tendremos varios directorios:

- *config*: aquí irán los ficheros de configuración de la base de datos, globales, etc.
- *controller*: como sabemos en la arquitectura MVC los controladores se encargarán de recibir y filtrar datos que le llegan de las vistas, llamar a los modelos y pasar los datos de estos a las vistas. Pues en este directorio colocaremos los controladores
- *core*: aquí colocaremos las clases base de las que heredarán por ejemplo controladores y modelos, y también podríamos colocar más librerías hechas por nosotros o por terceros, esto sería el núcleo del framework.
- *model*: aquí irán los modelos, para ser fieles al paradigma orientado objetos tenemos que tener una clase por cada tabla o entidad de la base de datos(excepto para las tablas pivote) y estas clases servirán para crear objetos de ese tipo de entidad(por ejemplo crear un objeto usuario para crear un usuario en la BD). También tendremos modelos de consulta a la BD que contendrán consultas más complejas que estén relacionadas con una o varias entidades.
- *view*: aquí iran las vistas, es decir, donde se imprimirán los datos y lo que verá el usuario.
- *index.php* será el controlador frontal por el que pasará absolutamente todo en la aplicación.

.
+-- config
|   +-- database.php
|   +-- global.php
+-- controller
|   +-- UsuariosController.php
+-- core
|   +-- AyudaVistas.php
|   +-- Conectar.php
|   +-- ControladorBase.php
|   +-- ControladorFrontal.func.php
|   +-- EntidadBase.php
|   +-- FluentPDO
|   +-- ModeloBase.php
+-- index.php
+-- model
|   +-- Usuario.php
|   +-- UsuariosModel.php
+-- view
|   +-- indexView.php