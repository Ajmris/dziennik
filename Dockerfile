# Użyj oficjalnego obrazu PHP jako podstawy
FROM php:latest

# Skopiuj kod aplikacji do kontenera
COPY ./src /var/www/html

# Zainstaluj zależności aplikacji
RUN docker-php-ext-install pdo pdo_mysql

# Skonfiguruj port, na którym działa aplikacja (jeśli jest inny niż domyślny port 80)
EXPOSE 80

# Uruchom serwer PHP wbudowany w kontener
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]