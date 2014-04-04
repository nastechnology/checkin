## checkin

A small checkin app for mobile devices (laptops). We use this with [puppet](http://puppetlabs.com)
in one of our custom modules we wrote.  We have set puppet to run every 30 minutes
and by using the $::ipaddress fact if it is not part of our network it checks into our servers.

This project can obviously be expanded on quite a bit but this is where we started.

Put an example ``.bat`` and ``.sh`` file that could be used with a service or scheduled task.


### Requirements

Server
* LAMP (Linux, Apache, MySQL, PHP)
* [Composer](http://getcomposer.org)

Clients
* curl
  * *Already a part of most linux distributions
  * Windows - [curl](http://www.rahul.net/dkaufman/curl-7.10.5-DOS.zip) download


### Install

```
$ git clone https://github.com/nastechnology/checkin.git
$ cd checkin
$ php composer.phar install
$ mysqladmin create checkin
$ mysql -u root -p[rootpassword] checkin < checkin.sql
```

Update ``index.php`` and replace:

```
$dbhost="localhost";
$dbuser="user";
$dbpass="password";
$dbname="checkin";
```

###*** Using this we were able to recover a stolen district laptop - 04/04/2014***
