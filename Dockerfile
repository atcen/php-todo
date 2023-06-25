FROM php:7.4-apache

# Aktualisieren Sie den Paketmanager und installieren Sie zusätzliche Pakete, die Sie benötigen
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libmysqli-dev

# Installieren Sie die MySQLi Erweiterung
RUN docker-php-ext-install mysqli

# Aktivieren Sie mod_rewrite für die Apache-Konfiguration
RUN a2enmod rewrite

# Starten Sie den Apache-Webserver
CMD ["apache2-foreground"]
