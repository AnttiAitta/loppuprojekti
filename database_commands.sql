DROP DATABASE IF EXISTS loppuprojekti;

CREATE DATABASE loppuprojekti;

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    passwd VARCHAR(255) NOT NULL
) DEFAULT CHARSET UTF8 COMMENT '';

CREATE TABLE category(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE products (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  price DOUBLE (10,2) NOT NULL,
  description VARCHAR(255),
  category_id INT NOT NULL,
  FOREIGN KEY (category_id) REFERENCES category(id)
  ON DELETE RESTRICT
);

CREATE TABLE orders(
  id INT PRIMARY KEY AUTO_INCREMENT,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  user_id INT NOT NULL,
  index user_id(user_id),
  FOREIGN KEY (user_id) REFERENCES users(id)
  ON DELETE RESTRICT
);

CREATE TABLE order_row (
  order_id INT NOT NULL,
  index order_id(order_id),
  FOREIGN KEY (order_id) REFERENCES orders(id)
  ON DELETE RESTRICT,
  product_id INT NOT NULL,
  index product_id(product_id),
  FOREIGN KEY (product_id) REFERENCES products(id)
  ON DELETE RESTRICT,
  amount INT NOT NULL
);

INSERT INTO category (id, name) VALUES (1, "Ruoka");
INSERT INTO category (id, name) VALUES (2, "Juoma");
INSERT INTO category (id, name) VALUES (3, "Muut");
INSERT INTO products (id, name, price, description, category_id) VALUES (1, "Nakki", 1, "Pikaista helpotusta pieneen nälkään!", 1);
INSERT INTO products (id, name, price, description, category_id) VALUES (2, "Peruna", 0.5, "Suomalainen klassikko!", 1);
INSERT INTO products (id, name, price, description, category_id) VALUES (3, "Makkarasämpylä", 3, "Evästä isompaan nälkään!", 1);
INSERT INTO products (id, name, price, description, category_id) VALUES (4, "Maito", 2, "Perintinen työmiehen valinta!", 2);
INSERT INTO products (id, name, price, description, category_id) VALUES (5, "Piimä", 2, "Se happamampi vaihtoehto!", 2);
INSERT INTO products (id, name, price, description, category_id) VALUES (6, "Olut", 4, "Paras janonsammuttaja!", 2);
INSERT INTO products (id, name, price, description, category_id) VALUES (7, "Puukko", 15, "Moinikäyttöinen työkalu!", 3);
INSERT INTO products (id, name, price, description, category_id) VALUES (8, "Vasara", 10, "Suomalainen klassikko!", 3);
INSERT INTO products (id, name, price, description, category_id) VALUES (9, "Heijastin", 5, "Hämäriin iltoihin!", 3);