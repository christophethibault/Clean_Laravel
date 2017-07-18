#!/bin/bash
export DEBIAN_FRONTEND=noninteractive

# Test si verrou en cours
while [ ! -z "`sudo lsof /var/lib/dpkg/lock`" ]; do
	echo "Verrou en cours sur /var/lib/dpkg/lock"
	sleep 5
done

sudo dpkg --configure -a
sudo apt-get update -y

sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password secret'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password secret'
sudo apt-get install -y apache2 php php-mysql php-curl php-cli curl redis-server php-mbstring php-redis php-xml php-zip git libapache2-mod-php mysql-server mysql-client unzip debconf-utils dos2unix -V

# install UTF-8
sudo locale-gen fr_FR.UTF-8 en_US.UTF-8

sudo service mysql restart

sudo mysql -e "grant all on *.* to 'root'@'%' identified by 'secret'; flush privileges;"
sudo mysql -e "grant all on *.* to 'vagrant'@'%' identified by 'secret'; flush privileges;"
sudo mysql -e "grant all on *.* to 'qbv2'@'localhost' identified by 'secret'; flush privileges;"
sudo mysql -e "set names utf8; create database bdd_app";
sudo sed -i -e "s/bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/mariadb.conf.d/50-server.cnf

sudo cp /home/vagrant/Code/virtual/templates/.my.cnf /home/vagrant/
sudo cp /home/vagrant/Code/virtual/templates/.my.cnf /root/

# composer
sudo curl -Ss https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/
sudo chmod 777 /usr/local/bin/composer.phar

# nodejs
sudo curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
sudo apt-get install -y nodejs
sudo apt-get install -y build-essential

#sudo npm update
#sudo npm install npm@latest -g
#sudo npm cache clean --force

# composer
#sudo npm install bower -g

sudo sed -i -e "s/APACHE_RUN_USER=www-data/APACHE_RUN_USER=vagrant/" /etc/apache2/envvars
sudo sed -i -e "s/APACHE_RUN_GROUP=www-data/APACHE_RUN_GROUP=vagrant/" /etc/apache2/envvars
grep -q qbv2.app /etc/hosts
if [ $? -eq 1 ]; then
	sudo sed -i -e "s/localhost/localhost qbv2.app/" /etc/hosts
fi

sudo cp /home/vagrant/Code/virtual/templates/qbv2.app.conf /etc/apache2/sites-available/

sudo a2ensite qbv2.app
sudo a2dissite 000-default
sudo a2enmod rewrite
sudo service apache2 restart

# disable ipv6
sudo echo "net.ipv6.conf.all.disable_ipv6 = 1" >> /proc/sys/net/ipv6/conf/all/disable_ipv6
sudo echo "net.ipv6.conf.default.disable_ipv6 = 1" >> /proc/sys/net/ipv6/conf/all/disable_ipv6
sudo echo "net.ipv6.conf.lo.disable_ipv6 = 1" >> /proc/sys/net/ipv6/conf/all/disable_ipv6
sudo sysctl -p

# clean & upgrade
sudo apt-get -y autoremove
sudo apt-get -y upgrade

echo  "Initializating.."
cd /home/vagrant/Code/
dos2unix tools/init_env.sh
sudo bash tools/init_env.sh > /dev/null
# sudo bash tools/install_birt.sh > /dev/null
cd -

# right timezone
sudo timedatectl set-timezone 'Europe/Paris'

echo "Finished !"
echo "Please do : vagrant reload !"

exit 0
