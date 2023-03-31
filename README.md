# I-Track: A Student Progress Tracker

A Student Progress Tracker is an application built for students to track their performance progress using the productivity mobile application. Tracking and monitoring student performance are essential in giving information that can be used to help students make decisions that will improve their progress. This would not only allow students to take more ownership of their learning but would also allow them to track their growth over time.

This repository contains the web application for our `I-Track` school project.

![](docs/demo.gif)

## Prerequisites

- Docker
  - In Windows or Mac, simply install [Docker Desktop](https://www.docker.com/products/docker-desktop/)
  - In Ubuntu, install [docker-engine and docker-compose](https://docs.docker.com/engine/install/ubuntu/)

- PostgreSQL database (local or cloud)

## Setup

- Clone the repository
  - `git clone https://github.com/SchadenKai/I-Track-Web.git`

- Navigate to the folder
  - `cd /path/to/I-Track-Web`

- List out your PostgreSQL database credentials on `app/.env` file 

  ```ini
  POSTGRES_USER=<username with access to db>
  POSTGRES_DB=<database name>
  POSTGRES_PASSWORD=<password of username above>
  ```

  If you really have no PostgreSQL database setup:

  `mv app/sample.env app/.env`

- While in root `I-Track-Web` directory, build and run the image

  - `docker compose build`

  - `docker compose up -d`


  **Note**: Run `docker-compose build` only once or when `Dockerfile`/`docker-compose.yaml` is changed. Only the `docker-compose up -d` is needed for subsequent runs

- Open browser and navigate:

  - `http://localhost:8000`

- Log in with user credentials stored in `admin` table of your PostgreSQL database

  - See `./setup/data/admin.csv` for credentials available

- Shut down the web application

  - `docker-compose down`
