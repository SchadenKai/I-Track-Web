FROM postgres:15

# Python setup
RUN apt-get update
RUN apt-get -y install python3 

# Copy and initiate database setup files 
COPY requirements.txt requirements.txt
RUN apt-get -y install python3-pip
RUN pip install --no-cache-dir -r requirements.txt