CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nume VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    varsta INT
);

INSERT INTO users (nume, email, varsta) VALUES
('Alex Popescu', 'alex@student.ro', 21),
('Maria Ionescu', 'maria@student.ro', 22),
('Ionut Radu', 'ionut@student.ro', 20);