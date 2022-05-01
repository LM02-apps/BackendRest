# BackendRest
Istruzioni all’uso:
1.	Utilizzare Docker per avviare il Back-end (https://docs.docker.com/desktop/ )
2.	Avviare i container per Mysql e Apache tramite i seguenti comandi da eseguire nel cmd:
3.	Mysql: docker run --name my-mysql-server --rm -v C:/path/Locale:/var/lib/mysql -v C:/path/Locale:/dump -e MYSQL_ROOT_PASSWORD=my-secret-pw -p 3306:3306 -d mysql:latest
4.	Apache: docker run -d -p 8080:80 --name my-apache-php-app --rm  -v C:/path/Locale:/var/www/html zener79/php:7.4-apache
5.	Inserire il file create_employee.sql nella directory C:\path\Locale
6.	Comando per utilizzare una bash sul container di Mysql per l’importazione del database: docker exec -it my-mysql-server bash
7.	Dentro la bash: mysql -u root -p < /dump/create_employee.sql; exit;
8.	I successivi tentativi di eseguire il container docker mysql possono essere eseguiti senza il volume dump: docker run --name my-mysql-server --rm -v C:/path/Locale:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=my-secret-pw -p 3306:3306 -d mysql:latest

