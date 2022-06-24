CREATE OR REPLACE FUNCTION

crear_pasajero_usuario (usuario_id integer, username varchar)

RETURN BOOLEAN AS $$


BEGIN

    IF usuario_id NOT IN (SELECT usuario_id FROM Usuarios) THEN
        INSERT INTO Usuarios values(usuario_id, username, '123456', 'Pasajero');

        RETURN TRUE;

    ELSE

        RETURN FALSE;
    
    END IF;

END

$$ language plpgsql