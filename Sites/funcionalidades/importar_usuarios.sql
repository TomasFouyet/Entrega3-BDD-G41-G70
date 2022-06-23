
CREATE OR REPLACE FUNCTION
importar_usuario (usuario_id int, username varchar, contraseña varchar, tipo varchar)
RETURN void AS $$
BEGIN
insert into Usuarios values (usuario_id, username, contraseña, tipo);
END
$$ language plpgsql