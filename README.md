# intranet
Este proyecto es para crear tu propia intranet en una red local. Este nació como un proyecto personal para escuchar mi música y ver videos desde un servidor mediante un navegador y por culpa de un desperfecto técnico.
Como dije nació como un proyecto personal que no pensaba compartir pero visto y considerando todo lo q sucede (o sucederá) con lo físico y luego la eliminación de las peliculas por Sony. También situaciones como la desaparición de peliculas de sitios de streaming, todo eso me llevó a completarlo en un 100% y compartirlo.

Esta es una intranet básica donde mostraremos frases, novedades, ver videos mediante streaming, escuchar música y herramientas para administrar todo esto. Los videos por el momento les recomiendo codificarlos mediane Handbrake para no solo convertirlo en MP4 sino agregar la opción de Optimización Web para mejorar la reproducción. En cambio, vas a poder subir cualquier formato de audio y el sitio lo convierte a formato mp3 de 160 kbps; decidí hacerlo así para una mayor compatibilidad con los navegadores y otro proyecto que comentaré en otro momento. En breve, armaré un instructivo en mi blog no solo para instalarlo correctamente sino que explicaré el código y las distintas decisiones que he tomado.

Este código se puede implementar en cualquier ordenador pero esta pensado para un Linux, aunque con muy pocas modificaciones se puede adaptar a Windows, basado en Debian pero se puede usar cualquier distro. Se deben crear unos directorios, establecer unos permisos, instalar unas herramientas básicas y configurarlas. La idea de este archivo es comentarte todos los pasos necesarios para impplementalo de una manera sencilla, sin más comencemos.

Lo primero que haremos es instalar laa herramientas necesarias, para ello debemos ejecutar lo siguiente:
```
$ sudo apt-get install mariadb-server mariadb-client mariadb-common -y
$ sudo apt-get install apache2 -y
$ sudo apt-get install php php-pear php-mysql -y
$ sudo apt-get install ffmpeg -y
```
Aqui instalaremos la basse de datos, el servidor web, el lenguaje en el servidor y la conversora de audio. Lo siguiente es crear los directorios donde almacenaremos todo; para ello en el raíz deben crear un directorio llamado www, otro musica y otro videos. El primero será para el servidor en si, los siguientes son para contener los archivos de música y videos respectivamente. En el directorio www deben copiar a webs e index.html tal comoo esta en el repositorio, todo esto deben hacerlo con su o sudo, y con esto tener el servidor ya copiado. En musica deben crear dos sub-directorios llamados pics y temporal, el primero es para almacenar imagenes de los discos o canciones y el segundo es el encargado de recodificar los archivos que suban; en videos solo deben crear un sub-directorio llamado pics para las imagenes. Lo siguiente es modificar los permisos en estos directorios, les paso un ejemplo:
```
$ sudo chown -R www-data:www-data /www
$ sudo chown -R u=rwx,g=rx,o=rx /www
```
La primer línea es para establecer al usuario del daemon del apache, si es otro usuario modifiquen al que correspoonda, y una sugerencia es cambiar el grupo a uno para poder modificar los archivos. En la segunda línea establecemos los permisos; si usan a otro grupo deben conceder control total como al usuario. Con todo esto ya tenemos todo establecido lo básico para poder utilizar al servidor Web pero nos faltan unas configuraciones.

Nuestro siguiente paso es crear la base de datos, para ello deben ejecutar a mariadb, una vez dentro generen una base de datos con el siguiente comando:
```
create database intranet;
```
Con nuestra base creada, lo siguiente es crear al usuario para conectarse. Pueden crear uno o simpleente conceder los permisos y usarlo, tomen este como ejemplo:
```
grant all on *.* to 'user_id'@'localhost' identified by 'password' with grant option;
```
Con estas tareas realizadas, solo nos resta generar las tablas y agregar el archivo de conexión. Para agregar las tablas desde el backup deben usar al archivo tablas.sql del repositorio. Para ello, pueden usar una herramienta, o puedes hacerlo de la siguiente manera:
```
$ sudo mariadb intranet < tablas.sql
```
Ahora deben tomar el archivo intranet.inc, agregar el usuario y contraseña para conectar a la base de datos. Este archivo deben copiarlo dentro de /usr/share/php, recuerden que esto es para debian si usan otra distro pueden necesitar modificarlo. Esto hará que podamos usarlo en todos nuestros códigos de manera simple sin necesidad de escribirlo en ellos. Nuestro siguiente paso es modificar la configuraciónn en el apache para que apunte al nuevo sitio. Para ello, vayan al archivo apache2.conf en /etc/apache2; comenten o borren el siguiente bloque:

```
<Directory /var/www/>
       Options Indexes FollowSymLinks
       AllowOverride None
       Require all granted
</Directory>
```
Con esto eliminamos el recurso predeterminado que usa apache para informar que esta correctamente instalado. Procedamos a agregar no solamente el nuevo sitio sino también los directorios donde almacenaremos la música y videos respectivamente. En el mismo lugar agreguen los siguientes bloques:
```
<Directory /www/>
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
</Directory>

<Directory /musica>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride None
        Order allow,deny
        allow from all
        Require all granted
</Directory>

<Directory /videos>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride None
        Order allow,deny
        allow from all
        Require all granted
</Directory>
```
Para finalizar la configuración del apache debemos ir a /etc/apache2/sites-enabled/000-default.conf. En este buscaremos la línea DocumentRoot a /var/www/html para eliminarla o comentarla. Con esto realizado, agregaremos las siguientes líneas:
```
DocumentRoot /www/
LimitRequestBody 0
Alias /musica /musica        
Alias /videos /videos
```
La primer línea es la encargada del sitio, la segunda es para informarle que no utilice la restricción de archivos mayor de 1 GB, esto es fundamental para los videos; ya que es una restricción que incorporó apache en la versión 2.4 (por lo mennos en una versión 2.2 no tuve que usarlo) y las otras son alias para poder acceder via navegador a los directorios contenedores. Con todo esto realizado solo resta reiniciar el servicio de apache para que tome los nuevos cambios y ya pueden probarlo en un navegador.
<pre>
Nota: LimitRequestBody tiene como límite máximo 2147483647 que son 2 GB
</pre>
A continuación, haremos una serie de modificaciones en PHP orientada principalmente a la carga de grandes archivos en el servidor. Para ello, nos dirigiremos a /etc/php/8.4/apache2/php.ini y buscaremos la sección Resource Limits. En esta modificaremos las siguientes líneas:
```
max_execution_time = 3600
max_input_time = 3600
memory_limit = 512M
```
Las primeras dos líneas se encargan de los tiempos de espera del script, tanto para la ejecución como la carga, y el otro es para asignar cuanta memoria puede usar para dichas tareas. Este último no es obligatorio pero si noté una mejora cuando le establecí un poco más. La siguiente opción es totalmente opcional pero es buena si tenes una virtual para el desarrollo y testing. En la sección de Error handling and logging deben cambiar display_errors de Off a On. Esto nos indicará los errores que ocurran con el script de PHP, en el servidor de "produccióo" recomiendo desactivarlo. La siguiente modificación es en la sección de Data Handling. En este solamente debemos modificar la siguiente línea de esta manera:
```
post_max_size = 0
```
Esta simplemente es para evitar dolores de cabeza al momento de subir archivos muy grandes, si necesitan establecer un límite les recomiendo ponerlo como 1G, 800M, 200k. Solo nos resta una modificación más y es en la sección de File Uploads. Modifiquen las siguientes líneas de esta manera:
```
upload_max_filesize = 4G
max_file_uploads = 999
```
Simplemente establecemos el tamaño máximo y la cantidad máxima de archivos a subir. Ahora simplemente deben reiniciar nuevamente al servicio de apache y con esto terminamos todas las configuraciones básicas para no tener inconvenientes.
```
Nota:
Esta configuración que te sugiero es porque me sucedió con un par de pelis y algunos discos que subí al sitio, en File Uploads deben descomentar a la línea upload_tmp_dir y establecer un directorioo de destino. Esto tuve que hacerlo porque sino usa el directorio tmp del sisema y si es más chico que lo recibido lo rechaza y no funciona. Para evitar incovennientes genere un directorio tmp en www ccon los permisos correspondiente y lo asigne en la línea citada.
```
Esta es como la versión 30 o 31 de esta página, ha pasado por muchas revisiones con mucho código innecesario así como también con mucho protagonismo de Flash, antes de la llegada de HTML5, y luego con Ajax. Si les interesa, les puedo subir la versión que mejor funcionó y más usé. Sin embargo, esto no termina acá ya que debo mejorar algunos aspectos:

* Subir videos y que los convierta el sitio, como hace con la música  
* Ingreso al sitio con usuario para una mejor experiencia, como seguimiento en los videos, playlists personalizados, etc
* Mejorar las herramientas para que los invitados puedan cambiar sus datos o resetear su password, actualmente no pueden
* Agregar más herramientas para manejar mejor las bases
* Mejorar la presentación de los videos (actualmente en ello)
* Mejorar el código y algunos temas puntuales que no me estan convenciendo (no cambio más 🤣)

Trataré en lo posible de no abandonarlo tanto y subir todas modificaciones que vaya realizando. A continuación les dejó unos links para ver como funciona actualmente:

