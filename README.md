* Clonar el repositorio con:
    - git clone

* Visualizar las ramas con:
    - git branch -av

* Cambiar a la rama Ej2 con: 
    - git checkout Ej2

Desde la carpeta raiz de la rama Ej2 efectuar las siguientes operaciones:

* Regenerar la carpeta vendor con el comando:
    - docker run --rm --interactive --tty -v $(pwd):/app composer install

* Añadir el archivo .env

* Crear un alias para el comando sail con:
    - alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

* Levantar los contenedores con:
    - sail up -d

* Instalar las dependencias del front-end con:
    - sail npm install

* Generar la carpeta public con:
    - sail npm run dev

* Efectuar las migraciones y el sembrado de las tablas con:
    -sail artisan migrate --seed

* Compilación de los assets en desarrollo con:
    -sail npm run watch-poll

* Visualización en el navegador en:
    -http://localhost
