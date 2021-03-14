# AutoCarApp

Autocar App es una aplicacion de ejemplo para Geor.pe, con la finalidad de demostrar las habilidades y conocimientos en el desarrollo web con Laravel y VueJS

# Ejecucion

Para su ejecucion se debe correr el comando 

```bash
docker-compose up
```

NOTA: esta configuracion es solo valida para ambiente local y pruebas

# Configuracion

Una vez corrido el ambiente de docker compose se ejecutan los siguientes comandos en orden

```bash
cp ./autocar-api/.env.example ./autocar-api/.env
docker exec -it autocar-api composer install
docker exec -it autocar-api php artisan key:generate
```

Una vez instalados los paquetes composer y generado la llave para laravel, se configura el .env con las variables de entorno, para este ejemplo se utilizaron
las siguientes variables

```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY={Tu Llave de aplicacion}
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=autocar-db
DB_PORT=3306
DB_DATABASE=autocar
DB_USERNAME=autocar
DB_PASSWORD=autocar

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

JWT_SECRET=JhbGciOiJIUzI1N0eXAiOiJKV1QiLC
JWT_TIME_EXPIRED=36000

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
# Base de datos

Una vez configurado el archivo .env se procede a configurar el usuario de base de datos para la aplicacion

```bash
docker exec -it autocar-db sh
# mysql -u root -p
Enter password: autocar-dev
MariaDB [(none)]> CREATE USER 'autocar'@'autocar-api.autocarapp_app-network' IDENTIFIED BY 'autocar';
MariaDB [(none)]> GRANT ALL PRIVILEGES ON autocar.* TO 'autocar'@'autocar-api.autocarapp_app-network';
MariaDB [(none)]> FLUSH PRIVILEGES;
MariaDB [(none)]> exit
# exit
```

Al haber creado el usuario y salido de la consola del contenedor de docker autocar-db se procede a ejecutar la migracion y los seeds de la base de datos.

```bash
docker exec -it autocar-api php artisan migrate
docker exec -it autocar-api php artisan db:seed
```

# Datos de Acceso

Hecha la migracion y el seed de la base de datos los datos del usuario seran los siguientes

```bash
Usuario: prueba@prueba.com
Contrasena: prueba123*
```

# Rutas BackEnd

Las rutas para el backend estan listadas de la siguiente manera para el ambiente de prueba

```bash

AUTENTICACION
INICIAR SESION / POST http://localhost:8000/api/login
CERRAR SESION / POST http://localhost:8000/api/logout

REGION
OBTENER UNA REGION / GET http://localhost:8000/api/region/1
OBTENER TODAS LAS REGIONES / GET http://localhost:8000/api/region
CREAR REGION / POST http://localhost:8000/api/region
ACTUALIZAR REGION / PUT http://localhost:8000/api/region
ELIMINAR REGION / DELETE http://localhost:8000/api/region

CONCESIONARIO
OBTENER UN CONCESIONARIO / GET http://localhost:8000/api/concessionaire/1
OBTENER TODOS LOS CONCESIONARIOS / GET http://localhost:8000/api/concessionaire
CREAR CONCESIONARIO / POST http://localhost:8000/api/concessionaire
ACTUALIZAR CONCESIONARIO / PUT http://localhost:8000/api/concessionaire
ELIMINAR CONCESIONARIO / DELETE http://localhost:8000/api/concessionaire

CLIENTES
OBTENER UN CLIENTE / GET http://localhost:8000/api/client/1
OBTENER TODOS LOS CLIENTES / GET http://localhost:8000/api/client
CREAR CLIENTE / POST http://localhost:8000/api/client
ACTUALIZAR CLIENTE / PUT http://localhost:8000/api/client
ELIMINAR CLIENTE / DELETE http://localhost:8000/api/client

REPORTES
REPORTE CLIENTE / DELETE http://localhost:8000/api/report/client

TABLAS
OBTENER TABLA DE CONCESIONARIOS / GET http://localhost:8000/api/table/concessionaire?per_page=10,page=1
OBTENER TABLA DE CLIENTES / GET http://localhost:8000/api/table/client?per_page=10,page=1
OBTENER TABLA DE REGIONES / GET http://localhost:8000/api/table/region?per_page=10,page=1
```

NOTA: TODAS LAS RUTAS SON PROTEGIDAS EXEPTUANDO LA RUTA /api/login, PARA LAS RUTAS PROTEGIDAS SE DEBE AGREGAR UN HEADER AuthorizationToken CON EL TOKEN OBTENIDO DEL LOGIN

# Ruta FrontEnd

La ruta para el sitio frontend es el siguiente

```bash
http::/localhost:3000
```
# Faltantes 

Falta por completar los siguientes elementos

```bash
FrontEnd
ACTUALIZAR ELEMENTOS
CREAR ELEMENTOS
ELIMINAR ELEMENTOS
MANEJO DE ERRORES
TRADUCCIONES

BackEnd
TRADUCCIONES
```

