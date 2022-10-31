## API Specification
Spesifikasi API untuk Aplikasi Mobile Shooees.

### Login
Request:
- Method: POST
- Endpoint: `/api/login`
- Header:
    - Content-Type: application/json
    - Accept: application/json
- Body:
```json
{
    "email": "example@gmail.com",
    "password": 123456789
}
``` 
- Response:
```json
{      
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Authenticated"
    },
    "data": {

    }
}
```
### Register
### Logout
### Update Profile
### User
### Products
### Product Categories
### Transaction
### Checkout