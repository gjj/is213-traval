cd ./traval-backend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml down
cd ../traval-frontend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml down
cmd /k