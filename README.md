# Proyecto práctico Plan Ok

## Ejercicio Final

Generar una aplicación web que contenga lo siguiente:
1) Generar un menú que muestre:
- a) Lista de usuarios del sistema con sus perfiles asociados.
- b) Lista de cotizaciones con su id, rut cliente, subtotal, descuento y total.
Además, esta pantalla por cada registro debe mostrar un botón de acción para ver el detalle de la cotización, en este detalle se deben mostrar los datos completos de la cotización en una pantalla, esto incluye los datos propios de la cotización, cliente, productos y usuario que cotizó.

2) Finalmente se requiere generar consultas que permitan obtener cierta información que se detalla a continuación (una consulta por punto):
- i. Listado de clientes que han comprado estacionamientos en Santiago.
    ```SQL
    SELECT `cli`.`rut`, `cli`.`nombre`, `cli`.`telefono`, `cli`.`email`, `cli`.`edad`, `cli`.`sexo`, `cli`.`region`   
    FROM `cliente` AS `cli`   
    INNER JOIN `cotizacion` AS `cot` ON `cli`.`id` = `cot`.`idCliente`   
    INNER JOIN `cotizacion_producto` AS `cp` ON `cot`.`idCotizacion` = `cp`.`idCotizacion`   
    INNER JOIN `producto` AS `prod` ON `cp`.`idProducto` = `prod`.`idProducto`   
    WHERE `prod`.`sector` = 'Santiago'   
        AND `prod`.`estado` = 'VENDIDO'   
        AND `prod`.`idTipoProducto` = '2'
    ```
- ii. Total, de departamentos Vendidos por el usuario PILAR PINO en Las Condes.
    ```SQL
    SELECT COUNT(*) AS total   
    FROM `cotizacion` AS `cot`   
    INNER JOIN `cotizacion_producto` AS `cp` ON `cot`.`idCotizacion` = `cp`.`idCotizacion`   
    INNER JOIN `producto` AS `prod` ON `cp`.`idProducto` = `prod`.`idProducto`   
    WHERE `prod`.`estado` = 'VENDIDO'   
        AND `prod`.`idTipoProducto` = '1'   
        AND `prod`.`sector` = 'Las Condes'   
        AND `cot`.`idUsuario` = '6'
    ```
- iii. Listar Productos creados entre el 2018-01-03 y 2018-01-20
    ```SQL
    SELECT `tp`.`descripcion` AS `nombre`, `prod`.`descripcion`, `prod`.`valorLista`, `prod`.`orientacion`, `prod`.`piso`, `prod`.`superficie`, `prod`.`estado`, `prod`.`fechaCreacion`, `prod`.`fechaEdicion`, `prod`.`sector`   
    FROM `producto` AS `prod`   
    LEFT JOIN `tipo_producto` AS `tp` ON `prod`.`idTipoProducto` = `tp`.`IdTipoProducto`   
    WHERE `prod`.`fechaCreacion` BETWEEN '2018-01-03 00:00:00' AND '2018-01-20 23:59:59'
    ```
- iv. Sumar el total de ventas realizadas en Santiago.
    ```SQL
    SELECT SUM(prod.valorLista) AS sum_total   
    FROM `producto` AS `prod`   
    WHERE `prod`.`estado` = 'VENDIDO'   
        AND `sector` = 'Santiago'
    ```

## Solución

La solución se desarrolló bajo el framework PHP Laravel (https://laravel.com/docs). Además para el frontend se utilizo: TailwindCSS y AlpineJS.
Requiere PHP 8.1

### Instalación

1) Descomprimir carpeta adjunta en correo o clonar repositorio en github   
    ```sh
    git clone git@github.com:jaraj91/planok.git
    ```
2) Crear archivo .env desde plantilla .env.example y configurar las variables de acceso a base de datos.
    ```sh
    cp .env.example .env
    ```
3) Instalar dependencias de composer   
    ```sh
    composer install --no-dev
    ```
4) Installar dependencias de npm   
    ```sh
    npm install
    ```
5) Compilar assets   
    ```sh
    npm run build
    ```