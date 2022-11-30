FROM php:8.0-apache
RUN apt-get update
# Install pg-sql php extension
RUN apt-get install -y libpq-dev && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install pgsql

# Copy and initiate database setup files 
COPY app/ app/
COPY setup/ setup/
COPY app/credentials.ini setup/
RUN apt-get -y install python3-pip
# RUN pip install --upgrade pip
RUN pip install --no-cache-dir -r setup/requirements.txt
RUN python3 setup/generate_data.py
RUN python3 setup/setup_database.py
RUN chmod -R 777 .