# INSTALASI APLIKASI

## Presequites Install
1. LAMPP / XAMPP Server (Easy Install)
2. Dedicated Server / Virtual Machine
3. VMWare Player (Only for VM)
4. git client
5. Internet Connection
6. Operator
7. Preheated VM ( Touch and Go Module )

## Instalasi
### A. Using Preheated VM
  1.  Open VMware Player
  2. Import `osismpksmaniwa-webserver.ovf` to the VMWare Player
  3. Configure the VM  as below :
```
-- NETWORKING --
Adapter 1 : Bridge Automatic | Manual set to the Client PC ( You will access the web from this IP)
Adapter 2 : NAT ( Automatic )
Adapter 3 - ~ : Disabled

-- SYSTEM --
RAM : Atleast 4 GB of RAM
CPU : Atleast 6 Core
Sound : Disabled
Floppy : Disabled
CD : Disabled
```
  4. Connect to the server using SSH or Local Terminal
  5. Check MySQL and Apache are running, if not, start it!
  6. Open your client PC browser and acccess the IP of you server `Adapter 1 IP Address`.
  7. It will like dis `http://10.x.x.x/pilketos-smaniwa` 

### B. Using new Virtual Machine
  1. Download and Install `ubuntu server 18.04` using minimal configuration.
  2. Configure the VM properties just like `preheated vm`.
  3. Install `apache2`,`php7.2`,`libapache-php7.2`,`mysql-8.0`, and `phpmyadmin`. I will not get interested to explain this thingy_-
  4. Fix you `/var/www/html` permission!
  5. clone the repos! `git clone https://github.com/osismpksmaniwa/pilketos-smaniwa.git` or use sourcode release instead. Place it on the `/var/www/html/`
  6. Fireup `mysql apache` and access the phpmyadmin.
  7. Import the `full-setup.sql` to the phpmyadmin.
  8. Edit you `./include/connection.php` using your confguration.
  9. Bring up the `pilketos site` using `preheated vm` procedure.

### C. Using XAMPP/LAMPP
  1. clone the repos! `git clone https://github.com/osismpksmaniwa/pilketos-smaniwa.git` or use sourcode release instead. Place it on the `xampp htdocs folder`
  2. Fireup `mysql apache` and access the phpmyadmin.
  3. Import the `full-setup.sql` to the phpmyadmin.
  4. Edit you `./include/connection.php` using your confguration.
  5. Bring up the `pilketos site` using `preheated vm` procedure.


> If you have trouble how to find your IP, you have to write `ifconfig` and search for `enps**` and voila, you know where you should go!
> I would prefer to search an tutorial how to set up lampp :)
