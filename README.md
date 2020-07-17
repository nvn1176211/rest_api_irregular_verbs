

## What is this?

Use the API to create, read, update, delete the list of irregular verbs.


## Where is database?

I use php file in source code as a database.


## Api doc

#### Get all list
    GET /api/irregualr_verb
    Example response:
    {
        "awake": {
            "v2": "awoke",
            "v3": "awoken"
        },
        "be": {
            "v2": "was, were",
            "v3": "been"
        },
        ...
    }
    
#### Get a specified
    GET /api/irregualr_verb/SPECIFIED_V1
    Example:
        Request: /api/irregualr_verb/go
        Response:
        {
            "go": {
                "v2": "went",
                "v3": "gone"
            }
        }

