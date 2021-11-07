sudo apt-get -qq update >/dev/null
sudo apt-get install -y software-properties-common >/dev/null
sudo add-apt-repository -y ppa:ondrej/php >/dev/null
sudo apt-get -qq update >/dev/null
sudo apt-get install -y unzip curl php8.0-common php8.0-cli php8.0-curl php-json php8.0-mbstring php8.0-readline php8.0-xml php8.0-zip >/dev/null
curl -sS https://getcomposer.org/installer -o composer-setup.php
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer -V
rm -f composer-setup.php