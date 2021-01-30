FROM php:apache
LABEL maintainer="siakhooi@gmail.com"
LABEL name="MyWISE Framework"
LABEL objective="My Wiki Inside Site Engine, a wiki oriented web framework."
LABEL version="1.0.4"
LABEL description="My Wiki Inside Site Engine, a wiki oriented web framework."

RUN a2enmod rewrite
COPY www/ /var/www/html/
RUN chown www-data:www-data -R /var/www/html
