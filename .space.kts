/**
* JetBrains Space Automation
* This Kotlin-script file lets you automate build activities
* For more info, see https://www.jetbrains.com/help/space/automation.html
*/

job("Run shell script") {
   container(displayName = "Run Test", image = "justinhartman/cakephp3.5-php7-mysql-apache2") {
      shellScript {
         interpreter = "/bin/bash"
         content = """
            export TZ=Europe/Paris
            apt-get update -yqq
            DEBIAN_FRONTEND=noninteractive apt-get install git libcurl4-gnutls-dev libicu-dev libmcrypt-dev libvpx-dev libjpeg-dev libpng-dev libxpm-dev zlib1g-dev libfreetype6-dev libxml2-dev libexpat1-dev libbz2-dev libgmp3-dev libldap2-dev unixodbc-dev libpq-dev libsqlite3-dev libaspell-dev libsnmp-dev libpcre3-dev libtidy-dev -yqq
            docker-php-ext-install mbstring mcrypt pdo_mysql curl json intl gd xml zip bz2 opcache
            
            apt-get install curl -yqq
            curl -sS https://getcomposer.org/installer | php
            php composer.phar install -n

            mkdir logs/ && chmod 777 logs/
            ./vendor/bin/phpunit
         """
      }
   }
}
