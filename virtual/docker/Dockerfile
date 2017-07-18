FROM ubuntu:16.04
MAINTAINER Damien Manoukian0 <damien@dmn13.com>

ENV DEBIAN_FRONTEND=noninteractive

RUN 	 apt-get update -y \
	&& echo 'mysql-server mysql-server/root_password password secret' | debconf-set-selections \
	&& echo 'mysql-server mysql-server/root_password_again password secret' | debconf-set-selections \
	&& apt-get install -y apache2 php php-mysql php-curl php-cli curl redis-server php-mbstring php-redis php-xml git libapache2-mod-php mysql-server mysql-client unzip debconf-utils \
	&& apt-get install -y build-essential -V \
	&& locale-gen 'fr_FR.UTF-8' 'en_US.UTF-8' \
	&& a2enmod rewrite

RUN curl -Ss https://getcomposer.org/installer | php \
	&& mv /composer.phar /usr/local/bin/

RUN curl -sL https://deb.nodesource.com/setup_6.x | bash - \
	&& apt-get install -y nodejs

# selenium specific
RUN apt-get install -y libxpm4 libxrender1 libgtk2.0-0 libnss3 libgconf-2-4 chromium-browser xvfb gtk2-engines-pixbuf xfonts-cyrillic xfonts-100dpi xfonts-75dpi xfonts-base xfonts-scalable imagemagick x11-apps

# specific Quickbrain v2
RUN apt-get install -y php-zip

##
# RUN.
##

# not used right now
# uncomment to copy the content of the current directory to /var/www/html in container
#ADD . /var/www/html

# uncomment to open port
#EXPOSE 80

CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]


