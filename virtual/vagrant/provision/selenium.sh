#!/bin/bash
export DEBIAN_FRONTEND=noninteractive

# sudo apt-get update -y

# sudo apt-get install libxss1 libappindicator1 libindicator7 gconf2 libnss3-dev xvfb unzip

# wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb -O /tmp/google-chrome-stable_current_amd64.deb

# sudo dpkg -i /tmp/google-chrome*.deb
# sudo apt-get install -f

# wget -N http://chromedriver.storage.googleapis.com/2.26/chromedriver_linux64.zip -O /tmp/chromedriver_linux64.zip
# unzip /tmp/chromedriver_linux64.zip
# chmod +x /tmp/chromedriver

# sudo mv -f /tmp/chromedriver /usr/local/share/chromedriver
# sudo ln -s /usr/local/share/chromedriver /usr/local/bin/chromedriver
# sudo ln -s /usr/local/share/chromedriver /usr/bin/chromedriver


sudo apt-get update -y
# chrome dependencies I think
sudo apt-get -y install libxpm4 libxrender1 libgtk2.0-0 libnss3 libgconf-2-4
# chromium is what I had success with on Codeship, so seemed a good option
sudo apt-get -y install chromium-browser
# XVFB for headless applications
sudo apt-get -y install xvfb gtk2-engines-pixbuf
# fonts for the browser
sudo apt-get -y install xfonts-cyrillic xfonts-100dpi xfonts-75dpi xfonts-base xfonts-scalable
# support for screenshot capturing
sudo apt-get -y install imagemagick x11-apps

# then start Xvfb (Xvfb -ac :0 -screen 0 1280x1024x16 &)
sudo cp /home/vagrant/Code/virtual/templates/xvfb.service /etc/systemd/system/xvfb.service
sudo systemctl enable /etc/systemd/system/xvfb.service
