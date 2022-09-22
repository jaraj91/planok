# Proyecto práctico Plan Ok

## Ejercicio Final

Generar una aplicación web que contenga lo siguiente:
1) Generar un menú que muestre:
- a) Lista de usuarios del sistema con sus perfiles asociados.
- b) Lista de cotizaciones con su id, rut cliente, subtotal, descuento y total.
Además, esta pantalla por cada registro debe mostrar un botón de acción para ver el detalle de la cotización, en este detalle se deben mostrar los datos completos de la cotización en una pantalla, esto incluye los datos propios de la cotización, cliente, productos y usuario que cotizó.

2) Finalmente se requiere generar consultas que permitan obtener cierta información que se detalla a continuación (una consulta por punto):
- i. Listado de clientes que han comprado estacionamientos en Santiago.
- ii. Total, de departamentos Vendidos por el usuario PILAR PINO en Las Condes.
- iii. Listar Productos creados entre el 2018-01-03 y 2018-01-20
- iv. Sumar el total de ventas realizadas en Santiago.

## Solución

La solución se desarrolló bajo el framework PHP Laravel (https://laravel.com/docs). Además para el frontend se utilizo: TailwindCSS y AlpineJS.

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