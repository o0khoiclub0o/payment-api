# Payment service

## Build image
`docker build -t payment .`

## Run container
``docker run -p 80:80 -v `pwd`/public:/usr/share/nginx/html --name PAYMENT payment``