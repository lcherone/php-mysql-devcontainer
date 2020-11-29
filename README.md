# PHP & MySQL Devcontainer

Example `.devcontainer` config which boots 3 containers:

  - Debian (buster-slim) which installs PHP 7.3 with Apache2 (VS Code Workspace) and custom entrypoint.sh
  - MariaDB
  - Adminer


Going to http://127.0.0.1:8080 after booting will yield Hello World, which is pulled from the database.

Going to http://127.0.0.1:8888 is Adminer, which you can login with `app`:`123456` (changeable in docker-compose)

Uses version `2.0` as that's what I'm using, feel free to update. 
