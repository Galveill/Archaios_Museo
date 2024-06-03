# Museo Archaios
Servidor del sistema Archaios, que simula el proceso de excavación de tesoros por parte de un grupo de arqueólogos para su conservación en un museo.
Durante la partida, los distintos usuarios colaborarán extrayendo dichos tesoros usando Archaios y serán enviados a un servidor (Museo) para completar las distintas colecciones entre todos.

Creado con fines educativos para la formación en conocimientos de Java de una forma lúdica.

Este sistema está pensado para ser lanzado por el docente, ya que la implementación del sistema Archaios no necesita de este.

## Base de datos
La información de la base de datos se establece en models/TreasureModel.php.

### Generación base
El archivo SQLDB.sql contiene el SQL que genera las tablas necesarias.

## Constantes
El archivo de constantes (constants.php) contiene la configuración básica del sistema.

## Filtros
Los archivos JSON localizados en data/filter permite bloquear el acceso a usuarios concretos en base a su código unequívoco.

## Register
El archivo register.php permite establer los datos de todas las regiones, sus tesoros y toda su información, generando de nuevo los archivos JSON presentes en assets/info.

Este ha de ser ejecutado en caso de querer modificar, actualizar o restaurar los archivos.