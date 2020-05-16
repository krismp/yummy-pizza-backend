# Yummy Pizza Backend

Yummy pizza backend, written in Laravel, available endpoints:

Deployed at: https://krismp-yummy-pizza-backend.herokuapp.com/api/products

## Available endpoints:

```shell
+--------+----------+---------------------+------+------------------------------------------------------+--------------+
| Domain | Method   | URI                 | Name | Action                                               | Middleware   |
+--------+----------+---------------------+------+------------------------------------------------------+--------------+
|        | GET|HEAD | /                   |      | Closure                                              | web          |
|        | POST     | api/cart_items      |      | App\Http\Controllers\API\CartItemController@store    | api          |
|        | DELETE   | api/cart_items/{id} |      | App\Http\Controllers\API\CartItemController@destroy  | api          |
|        | POST     | api/carts           |      | App\Http\Controllers\API\CartController@store        | api          |
|        | GET|HEAD | api/carts/{id}      |      | App\Http\Controllers\API\CartController@show         | api          |
|        | POST     | api/login           |      | App\Http\Controllers\API\RegisterController@login    | api          |
|        | GET|HEAD | api/orders          |      | App\Http\Controllers\API\OrderController@index       | api,auth:api |
|        | POST     | api/orders          |      | App\Http\Controllers\API\OrderController@store       | api          |
|        | GET|HEAD | api/products        |      | App\Http\Controllers\API\ProductController@index     | api          |
|        | GET|HEAD | api/products/{id}   |      | App\Http\Controllers\API\ProductController@show      | api          |
|        | POST     | api/register        |      | App\Http\Controllers\API\RegisterController@register | api          |
+--------+----------+---------------------+------+------------------------------------------------------+--------------+
```

### Authentication

#### Register

**POST** *http://localhost:8000/api/login*

**Request body:**
```json
{
	"name": "John Doe",
	"email": "johndoe@gmail.com",
	"password": "password",
	"c_password": "password"
}
```

**Response:**
```json
{
    "success": true,
    "data": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMDYxNWQ1OTJiNTlhMDFkNzViY2Y2MzI4YTA2NDdmZWViMTIwYTdmYTk2ODFjODY2Mzc5OTZkNWY4ZDY4NGIzOTg5YWJjNDZkNTA0N2JlYTUiLCJpYXQiOjE1ODk2NDAxNzcsIm5iZiI6MTU4OTY0MDE3NywiZXhwIjoxNjIxMTc2MTc3LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.RA29-XXmeMEKYUpqkoD0I_vqx3-91XBI7HG11tlYSWvcbYJ7apn-899defjr86XZV3M-UBc9UAO_5QpNsLB9mwzdVu-wKCClSogEQDp5tutsNJRnGakWpZDDbpiki7tuks380ejfmEn1U1EHwF1MkeQkk6BY7JFcwK9ZurBdhnaE0_0ln14vUA_9m71cqemYXfStD0W9siJIHcpUc3EvBjcVWGMYdx6fS1bKk_uxvNnGLYSB2uk2D451DdTE3RCMGTCkyPj7cUrMQHqrm7UuVp_0Wfp38cPuz7aoT9w3ooZmjUPwkfB_UKaiWuLpVeSewEXDV_HbeAjlQubUtqMPTgwX9Kfqv7U8G6s9FdxM6qor92p9Ns4SeM4_iLA1160EgWyEFgycBXcYfRd_fgRJ5Bg7xtOt6u5OLD9guZdqiKYti19pak40nghnx1l64y5XkXI3HP_NczswuVZvIbmCwRb3nR8p5YsP8KBYFwjniwCK2eDTzaAtLWyFK08K9PAhVFFOA31yP29qYCq-Lazw3eL5_7pK9HO06i_6nVLpX883YzIdFLxwcUI8nAFc1MKOdaElxIYEDSxiJJsUfjG1TeSws4dpiKC3UzFw52oThDGsIF_D16fiNv00FgekAEkRuodj2pfxOFDmBCy-00RxWbKBI79foTlsVjgcS5Tu0h8",
        "name": "John Doe",
        "id": 2
    },
    "message": "User register successfully."
}
```

#### Login

**POST** `localhost:8000/api/login`

**Request Body:**
```json
{
	"email": "johndoe@gmail.com",
	"password": "password"
}
```

**Response:**
```json
{
    "success": true,
    "data": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMDYxNWQ1OTJiNTlhMDFkNzViY2Y2MzI4YTA2NDdmZWViMTIwYTdmYTk2ODFjODY2Mzc5OTZkNWY4ZDY4NGIzOTg5YWJjNDZkNTA0N2JlYTUiLCJpYXQiOjE1ODk2NDAxNzcsIm5iZiI6MTU4OTY0MDE3NywiZXhwIjoxNjIxMTc2MTc3LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.RA29-XXmeMEKYUpqkoD0I_vqx3-91XBI7HG11tlYSWvcbYJ7apn-899defjr86XZV3M-UBc9UAO_5QpNsLB9mwzdVu-wKCClSogEQDp5tutsNJRnGakWpZDDbpiki7tuks380ejfmEn1U1EHwF1MkeQkk6BY7JFcwK9ZurBdhnaE0_0ln14vUA_9m71cqemYXfStD0W9siJIHcpUc3EvBjcVWGMYdx6fS1bKk_uxvNnGLYSB2uk2D451DdTE3RCMGTCkyPj7cUrMQHqrm7UuVp_0Wfp38cPuz7aoT9w3ooZmjUPwkfB_UKaiWuLpVeSewEXDV_HbeAjlQubUtqMPTgwX9Kfqv7U8G6s9FdxM6qor92p9Ns4SeM4_iLA1160EgWyEFgycBXcYfRd_fgRJ5Bg7xtOt6u5OLD9guZdqiKYti19pak40nghnx1l64y5XkXI3HP_NczswuVZvIbmCwRb3nR8p5YsP8KBYFwjniwCK2eDTzaAtLWyFK08K9PAhVFFOA31yP29qYCq-Lazw3eL5_7pK9HO06i_6nVLpX883YzIdFLxwcUI8nAFc1MKOdaElxIYEDSxiJJsUfjG1TeSws4dpiKC3UzFw52oThDGsIF_D16fiNv00FgekAEkRuodj2pfxOFDmBCy-00RxWbKBI79foTlsVjgcS5Tu0h8",
        "name": "John Doe",
        "id": 2
    },
    "message": "User login successfully."
}
```

### Products

#### Product list

**GET** *http://localhost:8000/api/products*

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Pizza A0LhV",
            "detail": "Ex ad nisi aliqua qui ea sunt aliqua eu velit adipisicing. Voluptate minim duis Lorem cupidatat elit. Magna aliquip sunt tempor ea in consectetur nostrud occaecat sit duis aliqua est commodo. Occaecat occaecat esse nulla voluptate sit. Dolore minim in culpa culpa. Deserunt qui pariatur Lorem consectetur magna tempor tempor dolor. Exercitation commodo velit velit non tempor.",
            "price_in_usd": "32.48",
            "stock": null,
            "image": "https://images.pexels.com/photos/803290/pexels-photo-803290.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260",
            "created_at": "16/05/2020",
            "updated_at": "16/05/2020"
        },
        {
            "id": 2,
            "name": "Pizza VvUwr",
            "detail": "Ex ad nisi aliqua qui ea sunt aliqua eu velit adipisicing. Voluptate minim duis Lorem cupidatat elit. Magna aliquip sunt tempor ea in consectetur nostrud occaecat sit duis aliqua est commodo. Occaecat occaecat esse nulla voluptate sit. Dolore minim in culpa culpa. Deserunt qui pariatur Lorem consectetur magna tempor tempor dolor. Exercitation commodo velit velit non tempor.",
            "price_in_usd": "25.14",
            "stock": null,
            "image": "https://images.pexels.com/photos/803290/pexels-photo-803290.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260",
            "created_at": "16/05/2020",
            "updated_at": "16/05/2020"
        },
        ...
    ],
    "message": "Products retrieved successfully."
}
```

#### Product detail

**GET** *http://localhost:8000/api/products/{id}*

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "Pizza A0LhV",
        "detail": "Ex ad nisi aliqua qui ea sunt aliqua eu velit adipisicing. Voluptate minim duis Lorem cupidatat elit. Magna aliquip sunt tempor ea in consectetur nostrud occaecat sit duis aliqua est commodo. Occaecat occaecat esse nulla voluptate sit. Dolore minim in culpa culpa. Deserunt qui pariatur Lorem consectetur magna tempor tempor dolor. Exercitation commodo velit velit non tempor.",
        "price_in_usd": "32.48",
        "stock": null,
        "image": "https://images.pexels.com/photos/803290/pexels-photo-803290.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260",
        "created_at": "16/05/2020",
        "updated_at": "16/05/2020"
    },
    "message": "Product retrieved successfully."
}
```

### Carts

#### Cart detail

**GET** *http://localhost:8000/api/carts/{id}*

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 6,
        "user_id": 1,
        "cart_items": [
            {
                "id": 1,
                "cart_id": 6,
                "product": {
                    "id": 2,
                    "name": "Pizza VvUwr",
                    "price_in_usd": "25.14",
                    "detail": "Ex ad nisi aliqua qui ea sunt aliqua eu velit adipisicing. Voluptate minim duis Lorem cupidatat elit. Magna aliquip sunt tempor ea in consectetur nostrud occaecat sit duis aliqua est commodo. Occaecat occaecat esse nulla voluptate sit. Dolore minim in culpa culpa. Deserunt qui pariatur Lorem consectetur magna tempor tempor dolor. Exercitation commodo velit velit non tempor.",
                    "created_at": "2020-05-16 02:26:17",
                    "updated_at": "2020-05-16 02:26:17",
                    "image": "https://images.pexels.com/photos/803290/pexels-photo-803290.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
                },
                "total": 1,
                "total_price_in_usd": "25.14",
                "created_at": "16/05/2020",
                "updated_at": "16/05/2020"
            }
        ],
        "total_price": 25.14,
        "total_items": "1",
        "created_at": "16/05/2020",
        "updated_at": "16/05/2020"
    },
    "message": "Cart retrieved successfully."
}
```

### Cart Item

#### Add to cart

**POST** `http://localhost:8000/api/cart_items`

**Request Body:**
```json
{
    "user_id": 2,
    "cart_id": null, // this can be cart_id if user previously has been add to cart before
    "product_id": 1,
    "total": 1,
    "total_price_in_usd": 10.14
}
```

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 3,
        "cart_id": 8,
        "product": {
            "id": 1,
            "name": "Pizza A0LhV",
            "price_in_usd": "32.48",
            "detail": "Ex ad nisi aliqua qui ea sunt aliqua eu velit adipisicing. Voluptate minim duis Lorem cupidatat elit. Magna aliquip sunt tempor ea in consectetur nostrud occaecat sit duis aliqua est commodo. Occaecat occaecat esse nulla voluptate sit. Dolore minim in culpa culpa. Deserunt qui pariatur Lorem consectetur magna tempor tempor dolor. Exercitation commodo velit velit non tempor.",
            "created_at": "2020-05-16 02:26:17",
            "updated_at": "2020-05-16 02:26:17",
            "image": "https://images.pexels.com/photos/803290/pexels-photo-803290.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
        },
        "total": 1,
        "total_price_in_usd": 10.14,
        "created_at": "16/05/2020",
        "updated_at": "16/05/2020"
    },
    "message": "Successfully added to cart."
}
```

#### Remove item from cart

**DELETE** `http://localhost:8000/api/cart_items/{id`

**Response:**
```json
{
    "success": true,
    "data": [],
    "message": "CartItem deleted successfully."
}
```

### Order

#### Checkout

**POST** `http://localhost:8000/api/orders`

**Request Body:**
```json
{
    "user_id": 2,
    "cart_id": 8,
    "address": "Nisi esse nulla dolore excepteur nisi aute aliquip est officia voluptate.",
    "delivery_cost_in_usd": 10.02,
    "final_price_in_usd": 23.12,
    "status": "completed" // hardcoded for now
}
```

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 2,
        "user_id": 2,
        "items": [],
        "delivery_cost_in_usd": 10.02,
        "final_price_in_usd": 23.12,
        "total_items": 0,
        "status": "completed",
        "created_at": "16/05/2020",
        "updated_at": "16/05/2020"
    },
    "message": "Order created successfully."
}
```

#### Order History

**GET** `http://localhost:8000/api/orders`

**Response:**

```json
{
    "success": true,
    "data": {
        "id": 2,
        "user_id": 2,
        "items": [
            {
                "id": 1,
                "cart_id": 6,
                "product": {
                    "id": 2,
                    "name": "Pizza VvUwr",
                    "price_in_usd": "25.14",
                    "detail": "Ex ad nisi aliqua qui ea sunt aliqua eu velit adipisicing. Voluptate minim duis Lorem cupidatat elit. Magna aliquip sunt tempor ea in consectetur nostrud occaecat sit duis aliqua est commodo. Occaecat occaecat esse nulla voluptate sit. Dolore minim in culpa culpa. Deserunt qui pariatur Lorem consectetur magna tempor tempor dolor. Exercitation commodo velit velit non tempor.",
                    "created_at": "2020-05-16 02:26:17",
                    "updated_at": "2020-05-16 02:26:17",
                    "image": "https://images.pexels.com/photos/803290/pexels-photo-803290.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
                },
                "total": 1,
                "total_price_in_usd": "25.14",
                "created_at": "16/05/2020",
                "updated_at": "16/05/2020"
            }
        ],
        "delivery_cost_in_usd": 10.02,
        "final_price_in_usd": 23.12,
        "total_items": 0,
        "status": "completed",
        "created_at": "16/05/2020",
        "updated_at": "16/05/2020"
    },
    "message": "Order created successfully."
}
```