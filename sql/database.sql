SET search_path TO public;

-- ##################################################################################################################
-- PRODUCTS (EXAMPLE TABLE)
-- ##################################################################################################################
CREATE TABLE product
(
    product_id SERIAL PRIMARY KEY,
    provider VARCHAR(2048) NOT NULL,
    brand VARCHAR(1024) NOT NULL,
    name VARCHAR(1024) NOT NULL,
    price DECIMAL(20, 8) NOT NULL,
    created_at TIMESTAMP DEFAULT now(),
    updated_at TIMESTAMP DEFAULT NULL
);
