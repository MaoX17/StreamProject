# StreamProject

Web application che sfrutta ffmpeg per mandare file in streaming su un rtmp pubblico (come youtube live streaming) pianificato tramite cron

Questa applicazione Web è scritta in php e sfrutta le funzionalità di
Propel ORM Necessita di php >= 5.4.* e mysql >= 5.1.*

## Installazione

Questa applicazione necessita di composer (https://getcomposer.org)

Si prega di installarlo:

curl -sS https://getcomposer.org/installer | php mv composer.phar /usr/local/bin/composer

Per prima cosa occorre importare nel proprio db mysql la struttura dati

mysqladmin create risPArmio mysql risPArmio < ./sql/stream-project.sql

occorre poi creare un virtualHost o una directory e uno spazio sul webserver e copiarci tutti i file del progetto.

Le directory in cui copiare il tutto sono specificate nel file propel.yml

L'applicazione prevede che il db sia sullo stesso server della parte applicativa e
che si abbia accesso come root senza password

Per modificare queste impostazioni occorre modificare i seguenti file:

propel.yml

In seguito occorre lanciare i seguenti comandi per aggiornare l'applicazione in modo corretto

cd composer update mkdir -p propel/class rm -rf propel/* ; vendor/bin/propel ; export PATH=$PATH:vendor/bin/ ; propel reverse --output-dir="./propel" ; propel model:build ; composer dump-autoload ; propel config:convert

## Credits

Applicazione realizzata da Maurizio Proietti ( http://blog.maurizio.proietti.name/ )
Per informazioni o suggerimenti inviare una mail al seguente indirizzo maurizio.proietti@gmail.com