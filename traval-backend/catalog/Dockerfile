FROM richarvey/nginx-php-fpm:latest
WORKDIR /usr/src/app
COPY ./ ./
RUN pip install --no-cache-dir -r requirements.txt
CMD [ "python", "./catalog_item.py" ]
