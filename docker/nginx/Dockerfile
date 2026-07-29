FROM nginx:alpine

COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

# ============================================
# COPY MANUAL public/build dari host
# ============================================
COPY ./public /var/www/public

WORKDIR /var/www/public
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
