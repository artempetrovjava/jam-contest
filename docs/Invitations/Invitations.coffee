###
@api {get} /api/v1/invitation/send/{key} Get invitations info
@apiName Get invitations info
@apiDescription Get invitations info. Available keys - send, received
@apiGroup Invitations
@apiVersion 0.1.0

@apiParam {Integer} userId Required.
@apiParam {Integer} offset Default value - 0
@apiParam {Integer} limit Default value - 50

@apiSuccessExample Success
HTTP/1.1 200 OK
{
    "invitations": [
        {
            "id": 3,
            "status": "active",
            "firstName": "test1",
            "lastName": "test1"
        },
        {
            "id": 4,
            "status": "pending",
            "firstName": "Artem",
            "lastName": "Petrov"
        }
    ]
}

@apiErrorExample Wrong type
HTTP/1.1 400 Bad request
{
    "error": "No such type = wrong_type"
}
###
