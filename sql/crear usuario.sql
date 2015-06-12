CREATE USER 'development'@'localhost' IDENTIFIED BY '12345';
GRANT ALL PRIVILEGES ON * . * TO 'development'@'localhost';
FLUSH PRIVILEGES;