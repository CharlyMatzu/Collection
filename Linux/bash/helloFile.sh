#!/bin/bash  
#se debe hacer el archivo ejecutable usando: chmod +x file.sh
#el siguiente comando agrega al archivo un texto sin reemplazarlo
DATE=`date '+%Y-%m-%d %H:%M:%S'`
echo [$DATE] 'Hola mundo' >> helloLog.log

