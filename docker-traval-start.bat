cd ./traval-backend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d
cd ../traval-frontend
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d
cmd /k