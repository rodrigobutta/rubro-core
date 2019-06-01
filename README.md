## 



## **Requisitos técnicos**



*   **PHP 7.1**+
*   **PHP Extensions **(se listan las que pueden no ser default):
    *   php_fileinfo
    *   php_curl
    *   php_mysqli
    *   php_openssl
    *   php_pdo_mysql
    *   php_mbstring
    *   php_gd2 (o superior)
*   **PHP Settings** (se listan las que deberían estar habilitadas y pueden no venir por default)
    *   file uploads
    *   upload_max_filesize=64M
    *   post_max_size=16M
    *   memory_limit=128M
    *   max_input_time=120
*   **Apache Modules**
    *   cache_module
    *   cache_disk_module
    *   file_cache_module
    *   rewrite_module
    *   include_module
    *   dir_module
*   **MySql 5.7**+
*   **Composer **[https://getcomposer.org/](https://getcomposer.org/)
*   **NodeJs 9+ **[https://nodejs.org/en/](https://nodejs.org/en/)
*   **Npm 6+ **[https://www.npmjs.com/](https://www.npmjs.com/)

    

## **Requisitos de compilación**

npm install -g handlebars
npm install -g handlebars-watch

Ver webpack.mix.js y handlebars-config.json para rutas de configuracion




## **Instalación**


*   El sitio necesita un archivo **.env** en el root que va a contener toda la configuración necesaria para ese ambiente. Nosotros vamos a enviarles este archivo con datos de prueba y quien tenga control sobre el entorno va a colocar los datos reales de conexiones, cuentas, url (teniendo en cuenta el protocolo, por ej http en caso de tener SSL).
*   _Es posible que cuando se esté ejecutando el Composer en el command, el mismo pida un **token **de Github para poder acceder a algunas dependencias necesarias. En ese caso, es necesario gestionar ese token en [https://github.com/settings/tokens](https://github.com/settings/tokens). _
*   Permisos de escritura del site sobre las rutas **public** y **storage**.
*   `composer install`
*   `php artisan key:generate`
*   `php artisan storage:link`
*   `npm install`
*   `npm run production`



