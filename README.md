# intranet
Este proyecto es para crear tu propia intranet en una red local. Este nació como un proyecto personal para escuchar mi música y ver videos desde un servidor mediante un navegador y por culpa de un desperfecto técnico.
Como dije nació como un proyecto personal que no pensaba compartir pero visto y considerando todo lo q sucede (o sucederá) con lo físico y luego la eliminación de las peliculas por Sony. También situaciones como la desaparición de peliculas de sitios de streaming, todo eso me llevó a completarlo en un 100% y compartirlo.

Esta es una intranet básica donde mostraremos frases, novedades, ver videos mediante streaming, escuchar música y herramientas para administrar todo esto. Los videos por el momento les recomiendo codificarlos mediane Handbrake para no solo convertirlo en MP4 sino agregar la opción de Optimización Web para mejorar la reproducción. En cambio, vas a poder subir cualquier formato de audio y el sitio lo convierte a formato mp3 de 160 kbps; decidí hacerlo así para una mayor compatibilidad con los navegadores y otro proyecto que comentaré en otro momento. En breve, armaré un instructivo en mi blog no solo para instalarlo correctamente sino que explicaré el código y las distintas decisiones que he tomado.

Este código se puede implementar en cualquier ordenador pero esta pensado para un Linux, aunque con muy pocas modificaciones se puede adaptar a Windows, basado en Debian pero se puede usar cualquier distro. Se deben crear unos directorios, establecer unos permisos, instalar unas herramientas básicas y configurarlas. La idea de este archivo es comentarte todos los pasos necesarios para impplementalo de una manera sencilla, sin más comencemos.

Lo primero que haremos es instalar laa herramientas necesarias, para ello debemos ejecutar lo siguiente:

$ sudo apt-get install mariadb-server mariadb-client mariadb-common -y

$ sudo apt-get install apache2 -y

$ sudo apt-get install php php-pear php-mysql -y

$ sudo apt-get install ffmpeg -y

Aqui instalaremos la basse de datos, el servidor web, el lenguaje en el servidor y la conversora de audio. Lo siguiente es crear los directorios donde almacenaremos todo; para ello en el raíz deben crear un directorio llamado www, otro musica y otro videos. El primero será para el servidor en si, los siguientes son para contener los archivos de música y videos respectivamente. En el directorio www deben copiar a webs e index.html tal comoo esta en el repositorio, todo esto deben hacerlo con su o sudo, y con esto tener el servidor ya copiado. En musica deben crear dos sub-directorios llamados pics y temporal, el primero es para almacenar imagenes de los discos o canciones y el segundo es el encargado de recodificar los archivos que suban; en videos solo deben crear un sub-directorio llamado pics para las imagenes. Lo siguiente es modificar los permisos en estos directorios, les paso un ejemplo:

$ sudo chown -R www-data:www-data /www

$ sudo chown -R u=rwx,g=rx,o=rx /www

La primer línea es para establecer al usuario del daemon del apache, si es otro usuario modifiquen al que correspoonda, y una sugerencia es cambiar el grupo a uno para poder modificar los archivos. En la segunda línea establecemos los permisos; si usan a otro grupo deben conceder control total como al usuario. Con todo esto ya tenemos todo establecido lo básico para poder utilizar al servidor Web pero nos faltan unas configuraciones.

Nuestro siguiente paso es crear la base de datos, para ello deben ejecutar a mariadb, una vez dentro generen una base de datos con el siguiente comando:

create database intranet;

Con nuestra base creada, lo siguiente es crear al usuario para conectarse. Pueden crear uno o simpleente conceder los permisos y usarlo, tomen este como ejemplo:

gran all on *.* to 'user_id'@'localhost' identified by 'password' with grant option;

Con estas tareas realizadas, solo nos resta generar las tablas y agregar el archivo de conexión. Para agregar las tablas desde el backup deben usar al archivo tablas.sql del repositorio. Para ello, pueden usar una herramienta, o puedes hacerlo de la siguiente manera:

$ sudo mariadb intranet < tablas.sql

