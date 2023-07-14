-- --------------------------------------------------------
-- Host:                         D:\xampp\htdocs\Proyectos\PHP\DisbatteryApp\bd\disbattery.db
-- Versión del servidor:         3.39.4
-- SO del servidor:              
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES  */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla disbattery.productos
DROP TABLE IF EXISTS "productos";
CREATE TABLE IF NOT EXISTS "productos" (
	"id" INTEGER NOT NULL,
	"id_categoria" INTEGER NOT NULL,
	"id_brand" INTEGER NOT NULL,
	"id_umbral" INTEGER NOT NULL,
	"codigo" TEXT NOT NULL DEFAULT '',
	"referencia" TEXT NOT NULL DEFAULT '',
	"descripcion" TEXT NOT NULL DEFAULT '',
	"stock" INTEGER NOT NULL, "tipo" TEXT NULL DEFAULT '',
	PRIMARY KEY ("id")
);

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
