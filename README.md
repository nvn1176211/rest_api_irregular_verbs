

## What is this?

Use the API to create, read, update, delete the list of irregular verbs.


## Where is database?

I use php file in source code as a database.


## Api doc

#### Get info of all list
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
    
#### Get info of specified verb
    GET /api/irregualr_verb/SPECIFIED_V1
    Example:
        Request: GET /api/irregualr_verb/go
        Response:
            {
                "go": {
                    "v2": "went",
                    "v3": "gone"
                }
            }

#### Create new verb
    POST /api/irregualr_verb
    POST data format & validation:
            'v1' => 'required|alpha|max:20|unique',
            'v2' => 'required|alpha|max:20',
            'v3' => 'required|alpha|max:20',
        
    Example:
        Request: POST /api/irregualr_verb
        Request data:
            'v1' => 'test',
            'v2' => 'test',
            'v3' => 'test',
        Response:
            Create ok
    
#### Update info of specified verb
    POST /api/irregualr_verb/SPECIFIED_V1
    POST data format & validation:
        'SPECIFIED_V1' => 'exist',
        'v2' => 'alpha|max:20',
        'v3' => 'alpha|max:20',
    Example:
        Request: POST /api/irregualr_verb/test
        Request data:
            'v2' => 'testa',
            'v3' => 'testa',
        Response:
            Update ok
                
#### Remove existing verb
    DELETE /api/irregualr_verb/SPECIFIED_V1
    Example:
        Request: DELETE /api/irregualr_verb/test
        Response:
            Delete ok
