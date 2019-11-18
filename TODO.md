# TODO

- [x] CRUD Settings 
- [x] CRUD WebTexts 
- [x] CRUD Clubs 
    - [x] Club has one web text 
        - [x] modify Api Resource
        - [x] modify form VIEW
        - [x] modify formRequest
    - [x] Club belongsToMany Images 
        - [x] modify Api Resource (add array images)
        - [x] modify form VIEW (Add multiple select with images)
        - [x] modify formRequest
    - [x] Club belongsToMany Amenities 
        - [x] modify Api Resource (add array images)
        - [x] modify form VIEW (Add multiple select with images)
        - [x] modify formRequest
- [x] CRUD Gym Classes 
    - [x] GymClass has one club
- [x] CRUD Plans 
- [x] CRUD Club-Plan (RELATION) 
    - [x] Club belongsToMany Amenities 
        - [x] modify Repository
        - [x] modify Api Resource (add array plans)
        - [x] modify form VIEW (Add multiple select with plans)
        - [x] modify formRequest
- [x] CRUD Class Groups 
    - [x] Class Group has one logo Image 
        - [x] modify Api Resource
        - [x] modify form VIEW
        - [x] modify formRequest
    - [x] Class Group has one cover Image 
        - [x] modify Api Resource
        - [x] modify form VIEW
        - [x] modify formRequest
    - [x] Class Group has one teacher Image 
        - [x] modify Api Resource
        - [x] modify form VIEW
        - [x] modify formRequest
- [x] CRUD Images 
- [x] CRUD Club-Image (RELATION) 
- [x] CRUD Amenities 
- [x] CRUD Amenity-Club (RELATION) 
- [ ] LANG: Traducir todos los srings a ES


# Etapa 2

<!-- - [ ] Crear tabla pivot glassGroup-gymClasses
    - [ ] Agregar al formulario de creadicon/edicion de clases un dropdown para seleccionar el grupo al que corresponde la clase (van a se 7 grupos) -->

- [x] en url `/api/gym_classes?club=21`
- [x] en url `/api/gym_classes?club=21&day=domingo`
- [x] en url `/api/gym_classes?by_daytime` Sort by daytime

- [-] armar lista de comandos necesarios para instalacion de laravel y para hacer el pull del repo desde el servidor
    ```
        cd APP_DIRECTORY
        git pull origin master
        composer install
        # EDIT .env file and put AWS S3 data
        php artisan migrate:fresh --seed
    ```
    en caso de tener poblema con permisos de carpetas:  
    ```
        sudo chgrp -R www-data storage bootstrap/cache
        sudo chmod -R ug+rwx storage bootstrap/cache
    ```

- [x] carga de imagenes en s3
    - [x] en url admin/images/create
    - [x] cambiar input de url por un input file


- [x] Eliminar `proportional` Plan y en los tests
- [-] eliminar iconos innecesarios en la barra de menu superior del admin


- [-] al hacer login redirigir al admin siempre
- [-] en footer del admin pedir a Emi los datos para cambiar los links y el texto

- [-] Pedir a Emi excel para armar el seeder de las clases
