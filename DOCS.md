Autósmozi API:

Laravel/sanctum token-el védett végpontok:

    // Filmek API routes
- /v1/movies
  metódus: GET
  listázza az összes felvitt filemet
  
- /v1/movies/{id}
  metódus: GET
  visszaad egy filmet ID alapján
  lehetséges hibák:
  hibás ID formátum -> error 500
  nem létezik film a megadott ID-val -> error 404

  id kötelező, pozitv egész szám
  
- /v1/movies/create
  metódus: POST
  lehetséges hibák:
  hiányos vagy nem megfelelő adat formátum -> error 500
  
  'data' nevű tömböt vár, aminek az elemei a következők:
  title -> string, kötelező
  description -> string, nem kötelező
  age -> integer, nem kötelező
  language -> string, nem kötelező
  
- /v1/movies/delete/{id}
  metódus: GET
  töröl egy filmet ID alapján
  sikeres törlés esetén visszatérési értéke true, egyéb esetben false


    // Vetítések API routes
- /v1/screenings
  metódus: GET
  listázza az összes felvitt vetítést
  
- /v1/screenings/{id}
  metódus: GET
  visszaad egy vetítést ID alapján
  lehetséges hibák:
  hibás ID formátum -> error 500
  nem létezik vetítés a megadott ID-val -> error 404

  id kötelező, pozitv egész szám
  
- /v1/screenings/create
  metódus: POST
  lehetséges hibák:
  hiányos vagy nem megfelelő adat formátum -> error 500

  'data' nevű tömböt vár, aminek az elemei a következők:
  movie_id -> integer, kötelező
  vacant_seats -> integer, kötelező
  date -> string, nem kötelező (Y-m-d H:i:s) formátum
  
- /v1/screenings/delete/{id}
  metódus: GET
  töröl egy vetítést ID alapján
  sikeres törlés esetén visszatérési értéke true, egyéb esetben false
