------------------P. Ponderado, calculo de precio de venta y aumento en las existencias.-------------
delimiter //
DROP TRIGGER IF EXISTS ACTUALIZAR_PRECIOC_AI //
CREATE TRIGGER ACTUALIZAR_PRECIOC_AI
AFTER INSERT ON Entrada FOR EACH ROW

BEGIN
	DECLARE NewCantidad INT;
	DECLARE NewPrecio DOUBLE;
	DECLARE idTemp INT;
	DECLARE OldCantidad INT;
	DECLARE OldPrecio DOUBLE;
	DECLARE Ant DOUBLE;
	DECLARE Nuevo DOUBLE;
	DECLARE Subtotal DOUBLE;
	DECLARE TotalEx INT;
	DECLARE Prcent DOUBLE;
	DECLARE NewPCompra DOUBLE;
	SELECT Entrada.Cantidad INTO NewCantidad FROM Entrada WHERE Entrada.id=NEW.id;
	SELECT Entrada.Precio INTO NewPrecio FROM Entrada WHERE Entrada.id=NEW.id;

	IF NEW.Aro_id IS NOT NULL THEN
	SELECT Entrada.Aro_id INTO idTemp FROM Entrada WHERE Entrada.id=NEW.id;
	SELECT Aro.Existencia INTO OldCantidad FROM Aro WHERE Aro.id = idTemp;
	SELECT Aro.Precio_compra INTO OldPrecio FROM Aro WHERE Aro.id = idTemp;
	SELECT Aro.Porcentaje_ganancia INTO Prcent FROM Aro WHERE Aro.id=idTemp;
	SET Ant=(OldCantidad*OldPrecio);
	SET Nuevo=(NewCantidad*NewPrecio);
	SET Subtotal=Ant+Nuevo;
	SET TotalEx=OldCantidad + NewCantidad;
	UPDATE Aro SET Existencia=TotalEx WHERE Aro.id=idTemp;
	UPDATE Aro SET Precio_compra=(Subtotal/TotalEx) WHERE Aro.id=idTemp;
	SELECT Aro.Precio_compra INTO NewPCompra FROM Aro WHERE Aro.id=idTemp;
	UPDATE Aro SET Precio_venta=(Prcent*NewPCompra) WHERE Aro.id=idTemp;

	END IF;
	IF NEW.Accesorios_id IS NOT NULL THEN
	SELECT Entrada.Accesorios_id INTO idTemp FROM Entrada WHERE Entrada.id=NEW.id;
	SELECT Accesorios.Existencia INTO OldCantidad FROM Accesorios WHERE Accesorios.id = idTemp;
	SELECT Accesorios.Precio_compra INTO OldPrecio FROM Accesorios WHERE Accesorios.id = idTemp;
	SELECT Accesorios.Porcentaje_ganancia INTO Prcent FROM Accesorios WHERE Accesorios.id=idTemp;
	SET Ant=(OldCantidad*OldPrecio);
	SET Nuevo=(NewCantidad*NewPrecio);
	SET Subtotal=Ant+Nuevo;
	SET TotalEx=OldCantidad + NewCantidad;
	UPDATE Accesorios SET Existencia=TotalEx WHERE Accesorios.id=idTemp;
	UPDATE Accesorios SET Precio_compra=(Subtotal/TotalEx) WHERE Accesorios.id=idTemp;
	SELECT Accesorios.Precio_compra INTO NewPCompra FROM Accesorios WHERE Accesorios.id=idTemp;
	UPDATE Accesorios SET Precio_venta=(Prcent*NewPCompra) WHERE Accesorios.id=idTemp;
	END IF;
	IF NEW.Lentesterm_id IS NOT NULL THEN
	SELECT Entrada.Lentesterm_id INTO idTemp FROM Entrada WHERE Entrada.id=NEW.id;
	SELECT Lentesterm.Existencia INTO OldCantidad FROM Lentesterm WHERE Lentesterm.id = idTemp;
	SELECT Lentesterm.Precio_compra INTO OldPrecio FROM Lentesterm WHERE Lentesterm.id = idTemp;
	SELECT Lentesterm.Porcentaje_ganancia INTO Prcent FROM Lentesterm WHERE Lentesterm.id=idTemp;
	SET Ant=(OldCantidad*OldPrecio);
	SET Nuevo=(NewCantidad*NewPrecio);
	SET Subtotal=Ant+Nuevo;
	SET TotalEx=OldCantidad + NewCantidad;
	UPDATE Lentesterm SET Existencia=TotalEx WHERE Lentesterm.id=idTemp;
	UPDATE Lentesterm SET Precio_compra=(Subtotal/TotalEx) WHERE Lentesterm.id=idTemp;
	SELECT Lentesterm.Precio_compra INTO NewPCompra FROM Lentesterm WHERE Lentesterm.id=idTemp;
	UPDATE Lentesterm SET Precio_venta=(Prcent*NewPCompra) WHERE Lentesterm.id=idTemp;
	END IF;
	IF NEW.Lenteterm_id IS NOT NULL THEN
	SELECT Entrada.Lenteterm_id INTO idTemp FROM Entrada WHERE Entrada.id=NEW.id;
	SELECT Lenteterm.Existencia INTO OldCantidad FROM Lenteterm WHERE Lenteterm.id = idTemp;
	SELECT Lenteterm.Precio_compra INTO OldPrecio FROM Lenteterm WHERE Lenteterm.id = idTemp;
	SELECT Lenteterm.Porcentaje_ganancia INTO Prcent FROM Lenteterm WHERE Lenteterm.id=idTemp;
	SET Ant=(OldCantidad*OldPrecio);
	SET Nuevo=(NewCantidad*NewPrecio);
	SET Subtotal=Ant+Nuevo;
	SET TotalEx=OldCantidad + NewCantidad;
	UPDATE Lenteterm SET Existencia=TotalEx WHERE Lenteterm.id=idTemp;
	UPDATE Lenteterm SET Precio_compra=(Subtotal/TotalEx) WHERE Lenteterm.id=idTemp;
	SELECT Lenteterm.Precio_compra INTO NewPCompra FROM Lenteterm WHERE Lenteterm.id=idTemp;
	UPDATE Lenteterm SET Precio_venta=(Prcent*NewPCompra) WHERE Lenteterm.id=idTemp;
	END IF;

END;// 
DELIMITER ;
---------------------------------------------------------------------------------------------------------
----------------------------------------------Salida-----------------------------------------------------
DELIMITER //
DROP TRIGGER IF EXISTS `INGRESO_SALIDA_AI`//
CREATE TRIGGER `INGRESO_SALIDA_AI`
AFTER INSERT ON `Salida` FOR EACH ROW
BEGIN

	DECLARE Descontar INT;
	DECLARE idTemp INT;
	SELECT Salida.Cantidad INTO Descontar FROM Salida WHERE Salida.id=NEW.id;

	IF NEW.Aro_id IS NOT NULL THEN
	SELECT Salida.Aro_id INTO idTemp FROM Salida WHERE Salida.id=NEW.id;
	UPDATE Aro SET Existencia=Existencia-Descontar WHERE Aro.id=idTemp;
	END IF;
	IF NEW.Accesorios_id IS NOT NULL THEN
	SELECT Salida.Accesorios_id INTO idTemp FROM Salida WHERE Salida.id=NEW.id;
	UPDATE Accesorios SET Existencia=Existencia-Descontar WHERE Accesorios.id=idTemp;
	END IF;
	IF NEW.Lentesterm_id IS NOT NULL THEN
	SELECT Salida.Lentesterm_id INTO idTemp FROM Salida WHERE Salida.id=NEW.id;
	UPDATE Lentesterm SET Existencia=Existencia-Descontar WHERE Lentesterm.id=idTemp;
	END IF;
	IF NEW.Lenteterm_id IS NOT NULL THEN
	SELECT Salida.Lenteterm_id INTO idTemp FROM Salida WHERE Salida.id=NEW.id;
	UPDATE Lenteterm SET Existencia=Existencia-Descontar WHERE Lenteterm.id=idTemp;
	END IF;
END;// 
DELIMITER ;

