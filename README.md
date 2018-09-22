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

- Execute bash script

> bash start.sh


## Run Unit Tests from Container

> docker exec -i workspace ./vendor/bin/phpunit tests/


## APIs

### Place Order

Route: /order
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

Route: /order/:id
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

Route: /order?page=:page&limit=:limit
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