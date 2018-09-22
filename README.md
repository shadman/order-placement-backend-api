# Order Management Backend API

## Requirements

- PHP >= 7.0
- MySQL >= 5.7
- Composer
- Docker & Docker Compose 3


## Features

- APIs: place order, take order and order lists with pagination
- Google Map API for `GoogleDistanceMatrix`
- Proper Validations
- Tests with `phpunits`
- Migrations and auto execution
- Composer
- Docker Containers for Setting up application
- start.sh bash script for deployment


## Setup Application

- Setup Docker and Docker Compose (Prerequisite)
- Execute bash script

> ./start.sh

or 

> bash start.sh


## Run Unit Tests from Container

> docker exec -i workspace ./vendor/bin/phpunit tests/


## Configuration Files:

- Google Map API Key: `config/app.php` param `google_map_api_key`
- Database Config: `.env` file contains all database information and environment variables

> Note: I have added google map api, after sometime will remove that from account.


## APIs

### Place Order

Route: http://localhost:8080/order
Method: POST

Request:
```
{
    "origin": ["START_LATITUDE", "START_LONGTITUDE"],
    "destination": ["END_LATITUDE", "END_LONGTITUDE"]
}
```

Response:
```
{
    "id": <order_id>,
    "distance": <total_distance>,
    "status": "UNASSIGN"
}
```

### Take Order

Route: http://localhost:8080/order/:id
Method: PUT

Request:
```
{
    "status":"taken"
}
```

Response:
```
{
    "status": "SUCCESS"
}
```

### List Orders	

Route: http://localhost:8080/order?page=:page&limit=:limit
Method: GET

Response:
```
[
    {
        "id": <order_id>,
        "distance": <total_distance>,
        "status": <ORDER_STATUS>
    },
    ...
]
```


Cheers !