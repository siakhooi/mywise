FROM php:apache
LABEL maintainer="siakhooi@gmail.com"
LABEL name="MyWISE Framework"
LABEL objective="My Wiki Inside Site Engine, a wiki oriented web framework."
LABEL version="1.0.5"
LABEL description="My Wiki Inside Site Engine, a wiki oriented web framework."

COPY www/ /var/www/html/
RUN a2enmod rewrite \
 && chown www-data:www-data -R /var/www/html \
 && mkdir /site-files \
 && mv /var/www/html/site /site-files \
 && mv /var/www/html/site.files /site-files \
 && ln -s /site-files/site /var/www/html/site \
 && ln -s /site-files/site.files /var/www/html/site.files
COPY templates/Dockerfile /site-files/Dockerfile
