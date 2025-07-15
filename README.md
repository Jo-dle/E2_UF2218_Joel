# E2_UF2218

Dentro de este proyecto se presentará:

- Explicación Al Usuario

- Explicación Técnica

	- La estructura ordenada del sistema y la lógica (carpetas y archivos)

	- Como se realiza cada operación (Comentarios dentro del código)

	- Validaciones aplicadas (Comentarios dentro del código)



## Explicación Al Usuario

En esta web podemos:

	* Ver los coches que tenemos en una tabla
	* Crear nuevos coches
	* Cambiar los coches que ya tenemos
	* Eliminar los coche que no queremos


## Explicación Técnica

En este proyecto se podrá ver reflejado en una tabla todos los coches con los siguientes campos:

        - Matrícula
        - Marca
        - Modelo
        - Puertas
        - Color
        - Precio (mostrado en €)
        - Tipo De Venta

Además de tres funcionalidades:

* Inserción de nuevos coches

* Edición De coches existentes

* Eliminación de coches


## Estructura Del Proyecto

El proyecto está todo englosado dentro de la carpeta homónima a este repositorio (E2_UF2218_Joel)

Y dentro de esta se encuentran tres carpetas:


### Controladores

Todo el código -backend- mayormente php

	c.editar.php

	c.insertar.php

	c.eliminar.php


### Vistas

Todas las páginas a las que se redirige y muestran algo en pantalla con un estilo aplicado

	editar.php

	index.php

	insertar.php

### xml

El núcleo del proyecto donde se guardan los archivos esenciales xml

	coches.xml

	coches.xsd

	coches.xsl
