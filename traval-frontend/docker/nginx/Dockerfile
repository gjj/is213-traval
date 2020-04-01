FROM nginx:alpine

# Remove Nginx's default.conf as it uses a different root folder that conflicts with our nginx.conf
RUN rm /etc/nginx/conf.d/default.conf

# Copy over ALL files from host to Docker container
COPY ./ /var/www
COPY ./docker/nginx/conf.d /etc/nginx/conf.d
COPY ./docker/nginx/ssl /etc/nginx/certificates