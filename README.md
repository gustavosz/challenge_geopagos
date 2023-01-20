# Challenge - Geopagos
Se desea modelar el comportamiento de un torneo de tenis:
* La modalidad del torneo es por eliminación directa
* Puede asumir por simplicidad que la cantidad de jugadores es potencia de 2.
* El torneo puede ser Femenino o Masculino
* Cada jugador tiene un nombre y un nivel de habilidad (entre 0 y 100)
* En un enfrentamiento entre dos jugadores influyen el nivel de habilidad y la suerte para decidir al ganador del mismo. Es su decisión de diseño de qué forma incide la suerte en este enfrentamiento.
* En el torneo masculino, se deben considerar la fuerza y la velocidad de desplazamiento como parámetros adicionales al momento de calcular al ganador.
* En el torneo femenino, se debe considerar el tiempo de reacción como un parámetro adicional al momento de calcular al ganador.
* No existen los empates
* Se requiere que a partir de una lista de jugadores se simule el torneo y se obtenga como output al ganador del mismo.
* Se recomienda realizar la solución en su IDE preferido.
* Se valorarán las buenas prácticas de Programación Orientada a Objetos.
* Puede definir por su parte cualquier cuestión que considere que no es aclarada. Puede agregar las aclaraciones que considere en la entrega del ejercicio
* Cualquier extra que aporte será bienvenido
* Se prefiere el modelado en capas o arquitecturas limpias (Clean Architecture)
* Se prefiere la entrega de la solución mediante un sistema de versionado(github/bitbucket/etc)
### Project
* Hexagonal architecture
* Prinicpals folders:
    * apps
    * src
    * tests
### Prerequisites
* MySQL 5.7 or higher
* Laravel 9
### Installation
To install this project, follow these steps:
1. Make sure you have all prerequisites installed
2. Clone this repository into your workspace
3. Copy .env.example to .env and fill in the required values.
4. Install the dependencies:
   bash
   composer install

5. Run migrations and seeder:
   bash
   php artisan migrate:fresh --seed
### Endpoint
Simulator: this endpoint simulates a previously created tennis tournament
* Prerequisites: a tennis tournament created and players assign to tournament.
* POST: http://localhost/api/tournaments/{id}/simulate
* Return the winner player.
### Tests
To run tests:
    bash
    php artisan test
