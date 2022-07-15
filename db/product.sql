CREATE TABLE `book` (

`book_sku` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,

`weight` int(11) NOT NULL,

PRIMARY KEY (`book_sku`) 

)

ENGINE = InnoDB

AUTO_INCREMENT = 0

AVG_ROW_LENGTH = 0

DEFAULT CHARACTER SET = utf8mb4

COLLATE = utf8mb4_general_ci

KEY_BLOCK_SIZE = 0

MAX_ROWS = 0

MIN_ROWS = 0

ROW_FORMAT = Dynamic;



CREATE TABLE `dvd` (

`dvd_sku` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,

`size` int(11) NOT NULL,

PRIMARY KEY (`dvd_sku`) 

)

ENGINE = InnoDB

AUTO_INCREMENT = 0

AVG_ROW_LENGTH = 0

DEFAULT CHARACTER SET = utf8mb4

COLLATE = utf8mb4_general_ci

KEY_BLOCK_SIZE = 0

MAX_ROWS = 0

MIN_ROWS = 0

ROW_FORMAT = Dynamic;



CREATE TABLE `furniture` (

`furniture_sku` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,

`height` int(11) NOT NULL,

`width` int(11) NOT NULL,

`length` int(11) NOT NULL,

PRIMARY KEY (`furniture_sku`) 

)

ENGINE = InnoDB

AUTO_INCREMENT = 0

AVG_ROW_LENGTH = 0

DEFAULT CHARACTER SET = utf8mb4

COLLATE = utf8mb4_general_ci

KEY_BLOCK_SIZE = 0

MAX_ROWS = 0

MIN_ROWS = 0

ROW_FORMAT = Dynamic;



CREATE TABLE `product` (

`product_sku` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,

`product_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,

`product_price` decimal(10,2) NOT NULL,

`product_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,

PRIMARY KEY (`product_sku`) 

)

ENGINE = InnoDB

AUTO_INCREMENT = 0

AVG_ROW_LENGTH = 0

DEFAULT CHARACTER SET = utf8mb4

COLLATE = utf8mb4_general_ci

KEY_BLOCK_SIZE = 0

MAX_ROWS = 0

MIN_ROWS = 0

ROW_FORMAT = Dynamic;





ALTER TABLE `book` ADD CONSTRAINT `fk_book` FOREIGN KEY (`book_sku`) REFERENCES `product` (`product_sku`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `dvd` ADD CONSTRAINT `fk_dvd` FOREIGN KEY (`dvd_sku`) REFERENCES `product` (`product_sku`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `furniture` ADD CONSTRAINT `fk_furniture` FOREIGN KEY (`furniture_sku`) REFERENCES `product` (`product_sku`) ON DELETE CASCADE ON UPDATE CASCADE;



