CREATE TABLE cartas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pregunta VARCHAR(255) NOT NULL,
    respuesta_correcta VARCHAR(255) NOT NULL,
    respuesta_opcion1 VARCHAR(255) NOT NULL,
    respuesta_opcion2 VARCHAR(255) NOT NULL,
    respuesta_opcion3 VARCHAR(255) NOT NULL
);

INSERT INTO cartas (pregunta, respuesta_correcta, respuesta_opcion1, respuesta_opcion2, respuesta_opcion3)
VALUES
('¿Cuál es la capital de Francia?', 'París', 'Berlín', 'Londres', 'Madrid'),
('¿En qué año se fundó Google?', '1998', '2000', '1995', '2005'),
('¿Cuál es el océano más grande?', 'Océano Pacífico', 'Océano Atlántico', 'Océano Índico', 'Océano Antártico');