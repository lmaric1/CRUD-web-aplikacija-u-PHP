SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;


-- ----------------------------
-- Table structure for administratori
-- ----------------------------
DROP TABLE IF EXISTS `administratori`;
CREATE TABLE `administratori`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `korisnicko_ime` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lozinka` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of administratori
-- ----------------------------
INSERT INTO `administratori` VALUES (5, 'luka', 'luka');
INSERT INTO `administratori` VALUES (12, 'admin', 'admin');

-- ----------------------------
-- Table structure for filmovi
-- ----------------------------
DROP TABLE IF EXISTS `filmovi`;
CREATE TABLE `filmovi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_filma` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `godina` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 90 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of filmovi
-- ----------------------------
INSERT INTO `filmovi` VALUES (1, 'Gone with the Wind', '1939');
INSERT INTO `filmovi` VALUES (2, 'Casablanca', '1942');
INSERT INTO `filmovi` VALUES (3, 'Citizen Kane', '1941');
INSERT INTO `filmovi` VALUES (4, 'The Wizard of Oz', '1939');
INSERT INTO `filmovi` VALUES (5, 'Sunset Boulevard', '1950');
INSERT INTO `filmovi` VALUES (6, 'Its a Wonderful Life', '1946');
INSERT INTO `filmovi` VALUES (7, 'The Maltese Falcon', '1941');
INSERT INTO `filmovi` VALUES (8, 'Singin in the Rain', '1952');
INSERT INTO `filmovi` VALUES (9, 'A Streetcar Named Desire', '1951');
INSERT INTO `filmovi` VALUES (10, 'Rebecca', '1940');

-- ----------------------------
-- Table structure for redatelji
-- ----------------------------
DROP TABLE IF EXISTS `redatelji`;
CREATE TABLE `redatelji`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `film` int NULL DEFAULT NULL,
  `redatelj` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 90 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of redatelji
-- ----------------------------
INSERT INTO `redatelji` VALUES (20, 1, 'Victor Fleming');
INSERT INTO `redatelji` VALUES (21, 2, 'Michael Curtiz');
INSERT INTO `redatelji` VALUES (22, 3, 'Orson Welles');
INSERT INTO `redatelji` VALUES (23, 4, 'Victor Fleming');
INSERT INTO `redatelji` VALUES (24, 5, 'Billy Wilder');
INSERT INTO `redatelji` VALUES (25, 6, 'Frank Capra');
INSERT INTO `redatelji` VALUES (26, 7, 'John Huston');
INSERT INTO `redatelji` VALUES (27, 8, 'Gene Kelly i Stanley Donen');
INSERT INTO `redatelji` VALUES (28, 9, 'Elia Kazan');
INSERT INTO `redatelji` VALUES (29, 10, 'Alfred Hitchcock');

-- ----------------------------
-- Table structure for zanrovi
-- ----------------------------
DROP TABLE IF EXISTS `zanrovi`;
CREATE TABLE `zanrovi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_zanra` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `film` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 90 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of zanrovi
-- ----------------------------
INSERT INTO `zanrovi` VALUES (30, 'Povijesna drama, romansa', 1);
INSERT INTO `zanrovi` VALUES (31, 'Romantična drama, ratni', 2);
INSERT INTO `zanrovi` VALUES (32, 'Drama, misterija', 3);
INSERT INTO `zanrovi` VALUES (33, 'Fantazija, obiteljski', 4);
INSERT INTO `zanrovi` VALUES (34, 'Drama, film noir', 5);
INSERT INTO `zanrovi` VALUES (35, 'Drama, obiteljski', 6);
INSERT INTO `zanrovi` VALUES (36, 'Film noir, misterija', 7);
INSERT INTO `zanrovi` VALUES (37, 'Glazbeni, komedija', 8);
INSERT INTO `zanrovi` VALUES (38, 'Drama', 9);
INSERT INTO `zanrovi` VALUES (39, 'Misterija, drama', 10);

-- ----------------------------
-- Table structure for glumci
-- ----------------------------
DROP TABLE IF EXISTS `glumci`;
CREATE TABLE `glumci`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `glumac` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `film` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 90 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of glumci
-- ----------------------------
INSERT INTO `glumci` VALUES (40, 'Clark Gable', 1);
INSERT INTO `glumci` VALUES (41, 'Humphrey Bogart', 2);
INSERT INTO `glumci` VALUES (42, 'Orson Welles', 3);
INSERT INTO `glumci` VALUES (43, 'Judy Garland', 4);
INSERT INTO `glumci` VALUES (44, 'William Holden', 5);
INSERT INTO `glumci` VALUES (45, 'James Stewart', 6);
INSERT INTO `glumci` VALUES (46, 'Humphrey Bogart', 7);
INSERT INTO `glumci` VALUES (47, 'Gene Kelly ', 8);
INSERT INTO `glumci` VALUES (48, 'Marlon Brando', 9);
INSERT INTO `glumci` VALUES (49, 'Laurence Olivier ', 10);

-- ----------------------------
-- Table structure for nagrade
-- ----------------------------
DROP TABLE IF EXISTS `nagrade`;
CREATE TABLE `nagrade`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `film` int NULL DEFAULT NULL,
  `nagrada` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 90 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nagrade
-- ----------------------------
INSERT INTO `nagrade` VALUES (50, 1, 'Oscar za najbolji film, Vivien Leigh Oscar za najbolju glavnu glumicu');
INSERT INTO `nagrade` VALUES (51, 2, 'Oscar za najbolji film, Michael Curtiz Oscar za najboljeg redatelja');
INSERT INTO `nagrade` VALUES (52, 3, 'Oscar za najbolji originalni scenarij');
INSERT INTO `nagrade` VALUES (53, 4, 'Oscar za najbolju originalnu glazbu, najbolju pjesmu ("Over the Rainbow")');
INSERT INTO `nagrade` VALUES (54, 5, 'Oscar za najbolji originalni scenarij');
INSERT INTO `nagrade` VALUES (55, 6, 'Oscar za tehnička postignuća (zasluge za inovaciju u filmskom procesu)');
INSERT INTO `nagrade` VALUES (56, 9, 'Oscar za najbolju glavnu glumicu (Vivien Leigh), najbolji sporedni glumac (Karl Malden)');
INSERT INTO `nagrade` VALUES (57, 10, 'Oscar za najbolji film, Oscar za najbolju kinematografiju (crno-bijelo)');


SET FOREIGN_KEY_CHECKS = 1;
