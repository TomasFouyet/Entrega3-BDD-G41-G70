CREATE OR REPLACE FUNCTION

crear_admin_DGAC ()

RETURN BOOLEAN AS $$

BEGIN

    IF 'DGAC' NOT IN (SELECT username FROM Usuarios) THEN
        INSERT INTO Usuarios values(999, 'DGAC', 'admin', 'Admin DGAC');

        RETURN TRUE;

    ELSE

        RETURN FALSE;
    
    END IF;

END

$$ language plpgsql
