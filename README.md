# The Palatable Pizza

This is the backend code for a pizza ordering website (see the React frontend source code [here](https://github.com/schedutron/palatable-pizza-front)). Used the Laravel framework and Postgres as the relational database to store pizzas, users and their orders. Authentication is managed by Firebase, so no need to store password hashes in the DB.

## Database Schema
![Database Schema](/PizzaERD.png)

I had to use a synthetic primary key for the `choices` table because Laravel has weak support for composite primary keys (otherwise they key would have been `(user_id, pizza_id, order_id)`.
