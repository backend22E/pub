INSERT INTO pizzas( pizza, price ) VALUES
( "Sajtos", 2800 ),
( "Szalámis", 3200 ),
( "Sonkás", 3100 );

-- szit.hu/oktatas/web/backendframework/Laravel/Laravel jegyzet -> DB osztály, Query builder

--SELECT drink, type FROM drink
--INNER JOIN types ON driks.type_id = types.id

--SQLSTATE[42S02]: Base table or view not found: 1146 Table 'tanar_pub_2_E.drink' doesn't exist (Connection: mysql, SQL:
-- select `drink`, `type`, `package`
-- from `drink`
-- inner join `types` on `drinks`.`type_id` = `types`.`id`
-- inner join `packages` on `drinks`.`package_id` = `package`.`id`
