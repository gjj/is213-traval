# The Traval App ✈️🗺️
The world 🌎 is yours to explore!

## Setup Instructions

If you are running Windows, double click on the `docker-traval-start.bat` file.

If you are running Mac, you can copy paste the following commands and run it in shell.

```
cd ./traval-backend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d
cd ../traval-frontend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d
```

## Tear Down

If you are running Windows, double click on the `docker-traval-stop.bat` file.

If you are running Mac, you can copy paste the following commands and run it in shell.


```
cd ./traval-backend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml down
cd ../traval-frontend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml down
```