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