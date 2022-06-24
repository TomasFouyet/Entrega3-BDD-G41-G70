CREATE OR REPLACE FUNCTION

crear_compania_usuario (usuario_id INT, username VARCHAR)

RETURN BOOLEAN AS $$

BEGIN

    IF usuario_id NOT IN (SELECT usuario_id FROM Usuarios) THEN
        INSERT INTO Usuarios values(usuario_id, username, '123456', 'Compania aerea');

        RETURN TRUE;

    ELSE

        RETURN FALSE;
    
    END IF;

END

$$ language plpgsql