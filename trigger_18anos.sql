DELIMITER $$

CREATE TRIGGER before_user_insert
BEFORE INSERT ON tb_cliente
FOR EACH ROW
BEGIN
  DECLARE age INT;

  SET age = YEAR(CURRENT_DATE) - YEAR(NEW.DTNascimento);

  IF age < 18 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Usuário menor de 18 anos não permitido';
  END IF;
END;
$$

DELIMITER ;