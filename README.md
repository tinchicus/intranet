# intranet
This project is designed to let you create your own intranet on a local network. It began as a personal project—sparked by a technical issue—to stream my music and videos from a server via a web browser.
As I mentioned, it started as a personal project I hadn't intended to share. However, considering everything happening (or likely to happen) regarding physical media—such as Sony removing movies and titles disappearing from streaming sites—I decided to fully complete it and share it with others.

This is a basic intranet where we will display quotes and news, stream videos, play music, and use tools to manage it all. For now, I recommend encoding videos using Handbrake—not just to convert them to MP4, but also to enable the "Web Optimized" setting for better playback. You can upload audio in any format, and the site will convert it to 160 kbps MP3; I chose this approach to ensure better compatibility with browsers and to support another project I’ll discuss later. Soon, I’ll post a guide on my blog covering the correct installation process, as well as an explanation of the code and the various decisions I made along the way.

This code can be implemented on any computer, though it is designed for Linux—specifically Debian-based systems, although any distribution will work. It can be adapted for Windows with only minor modifications. You will need to create directories, set permissions, and install and configure some basic tools. The purpose of this file is to walk you through all the necessary steps for a simple implementation; without further ado, let's get started.

The first step is to install the necessary tools; to do this, we must execute the following:
```
$ sudo apt-get install mariadb-server mariadb-client mariadb-common -y
$ sudo apt-get install apache2 -y
$ sudo apt-get install php php-pear php-mysql -y
$ sudo apt-get install ffmpeg -y
```
Here, we will install the database, the web server, the server-side language, and the audio converter. Next, we need to create the directories where everything will be stored; to do this, create three directories at the root level: `www`, `musica`, and `videos`. The first is for the server itself, while the others will hold the music and video files, respectively. Inside the `www` directory, copy `webs` and `index.html` exactly as they appear in the repository—make sure to use `su` or `sudo` for this step to ensure the server files are properly copied. Within the `musica` directory, create two subdirectories named `pics` and `temporal`: the first stores album or song artwork, and the second handles the transcoding of uploaded files. For the `videos` directory, simply create a subdirectory named `pics` for images. The next step is to copy `fondo.jpg` into the `pics` subdirectory within `musica`, and `foto01.jpeg` into the `pics` subdirectory within `videos`. Finally, we need to modify the permissions for these directories; here is an example:
```
$ sudo chown -R www-data:www-data /www
$ sudo chown -R u=rwx,g=rx,o=rx /www
```
The first line sets the Apache daemon user; if a different user is used, modify it accordingly. It is also recommended to change the group to one that allows file modification. The second line sets the permissions; if using a different group, you must grant it full control, just as you did for the user. With this, the basic setup for using the web server is complete, though a few additional configurations are still required.

Our next step is to create the database; to do this, you must run MariaDB, and once inside, create a database using the following command:
```
create database intranet;
```
With the database created, the next step is to create the user for connecting. You can create a new one or simply grant the necessary permissions and use it; use this one as an example:
```
grant all on *.* to 'user_id'@'localhost' identified by 'password' with grant option;
```
With these tasks completed, all that remains is to generate the tables and add the connection file. To add the tables from the backup, you should use the `tablas.sql` file from the repository. You can do this using a tool, or you can proceed as follows:
```
$ sudo mariadb intranet < tablas.sql
```
Now, take the `intranet.inc` file and add the username and password for connecting to the database. Copy this file to `/usr/share/php` (keep in mind that this applies to Debian; if you are using another distribution, you may need to modify the path). This allows us to use it easily across our code without having to write the details into each file. The next step is to modify the Apache configuration to point to the new site. To do this, go to the `apache2.conf` file in `/etc/apache2` and comment out or delete the following block:
```
<Directory /var/www/>
       Options Indexes FollowSymLinks
       AllowOverride None
       Require all granted
</Directory>
```
This removes the default resource Apache uses to indicate that it is correctly installed. Let's proceed to add not only the new site but also the directories where we will store the music and videos, respectively. Add the following blocks in the same location:
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
To finish configuring Apache, we need to go to `/etc/apache2/sites-enabled/000-default.conf`. There, we will look for the `DocumentRoot /var/www/html` line and either remove or comment it out. Once that is done, we will add the following lines:
```
DocumentRoot /www/
LimitRequestBody 0
Alias /musica /musica        
Alias /videos /videos
```
The first line handles the site configuration, while the second advises against using the file size restriction for files larger than 1 GB—which is crucial for videos, as this restriction was introduced in Apache version 2.4 (unlike version 2.2, where it wasn't necessary). The remaining lines are aliases that allow browser access to the containing directories. Once all this is done, you simply need to restart the Apache service to apply the changes, and then you can test it in a browser.
```
Note: LimitRequestBody has a maximum limit of 2147483647, which is 2 GB.
```
Next, we will make a series of PHP modifications aimed primarily at uploading large files to the server. To do this, we will navigate to `/etc/php/x.x/apache2/php.ini` and locate the "Resource Limits" section. Within this section, we will modify the following lines:
```
max_execution_time = 3600
max_input_time = 3600
memory_limit = 512M
```
The first two lines handle script timeout settings—covering both execution and loading times—while the other assigns the amount of memory available for these tasks. The latter isn't mandatory, though I did notice an improvement after increasing the limit slightly. The next option is entirely optional but useful if you are using a virtual machine for development and testing. In the "Error handling and logging" section, you need to change `display_errors` from "Off" to "On." This will show any errors occurring in the PHP script; however, I recommend disabling this on a production server. The next modification is in the "Data Handling" section. Here, we simply need to modify the following line as shown:
```
post_max_size = 0
```
This is simply to avoid headaches when uploading very large files; if you need to set a limit, I recommend using values ​​like 1G, 800M, or 200k. There is just one more modification left, in the File Uploads section. Modify the following lines as shown:
```
upload_max_filesize = 4G
max_file_uploads = 999
```
We simply set the maximum size and the maximum number of files to be uploaded. Now, you just need to restart the Apache service, and with that, we have completed all the basic configurations to ensure everything runs smoothly.
<pre>
Note:
I suggest this configuration because of an issue I encountered with a couple of movies and some files I uploaded to the site. Under "File Uploads," you need to uncomment the `upload_tmp_dir` line and specify a destination directory. I had to do this because, otherwise, the system uses its default `tmp` directory; if that directory is smaller than the file being uploaded, the upload is rejected and fails. To avoid problems, I created a `tmp` directory within `www` with the appropriate permissions and assigned it to that line.
</pre>
This is something like the 30th or 31st version of this page; it has undergone many revisions involving a lot of unnecessary code and a heavy reliance on Flash—back before the arrival of HTML5—and later on Ajax. If you're interested, I can upload the version that worked best and that I used the most. However, it doesn't end there, as I still need to improve a few aspects:
* Enable video uploads with on-site conversion (similar to the music feature).
* Implement user logins for an enhanced experience (e.g., video tracking, personalized playlists).
* Improve tools allowing users to update their details or reset their passwords (currently not possible).
* Add more tools for better database management.
* Improve video presentation (currently in progress).
* Refine the code and address specific issues I'm not entirely happy with (I'll never change 🤣).

I will try my best not to neglect it too much and to upload any modifications I make. Below are some links to see how it currently works:

Home: [https://youtu.be/vzRKoNdACqA](https://youtu.be/vzRKoNdACqA)

Music:  [https://youtu.be/f7CKV4Wx8QE?si=SqjVRIeXHRQXrfST](https://youtu.be/f7CKV4Wx8QE?si=SqjVRIeXHRQXrfST)

Videos: [https://youtu.be/K_pYjviJ6jo](https://youtu.be/K_pYjviJ6jo)

Before I forget, the username to access the tools is "webmaster" and the password is "admin." Needless to say, you should change it for better security or block access entirely.

If you found this interesting and useful, you can donate via the following links:

buymeacoffe: [https://buymeacoffee.com/tinchicus](https://buymeacoffee.com/tinchicus)

Paypal: [https://paypal.me/tinchicus](https://paypal.me/tinchicus)
