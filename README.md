## steps to setup project
-copy .env.example file as .env in root directory
-copy docker folder as .docker in root directory
-copy docker-compose.yml.example as docker-compose.yml in root directory

# for ssl:
-set ssl_cert,ssl_key variables in .env according to your ssl certificate and key files path

# run command in terminal:
-docker-compose up -d

# open following link for runing project on browser
https://localhost:8004