# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Base de datos: OPADMIN
# Tiempo de Generación: 2020-01-16 17:09:24 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla audits
# ------------------------------------------------------------

DROP TABLE IF EXISTS `audits`;

CREATE TABLE `audits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) unsigned NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci,
  `new_values` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  KEY `audits_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `audits` WRITE;
/*!40000 ALTER TABLE `audits` DISABLE KEYS */;

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`)
VALUES
	(1,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'[]','[]','http://localhost:8000/login','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36',NULL,'2020-01-16 12:29:31','2020-01-16 12:29:31'),
	(2,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"timezone\":null,\"last_login_at\":null,\"last_login_ip\":null}','{\"timezone\":\"America\\/New_York\",\"last_login_at\":\"2020-01-16 12:29:31\",\"last_login_ip\":\"127.0.0.1\"}','http://localhost:8000/login','127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36',NULL,'2020-01-16 12:29:31','2020-01-16 12:29:31');

/*!40000 ALTER TABLE `audits` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla cache
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Volcado de tabla class_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `class_groups`;

CREATE TABLE `class_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_image_id` int(10) unsigned DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image_id` int(10) unsigned DEFAULT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_image_id` int(10) unsigned DEFAULT NULL,
  `teacher_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `playlist_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_groups_logo_image_id_foreign` (`logo_image_id`),
  KEY `class_groups_cover_image_id_foreign` (`cover_image_id`),
  KEY `class_groups_teacher_image_id_foreign` (`teacher_image_id`),
  CONSTRAINT `class_groups_cover_image_id_foreign` FOREIGN KEY (`cover_image_id`) REFERENCES `images` (`id`),
  CONSTRAINT `class_groups_logo_image_id_foreign` FOREIGN KEY (`logo_image_id`) REFERENCES `images` (`id`),
  CONSTRAINT `class_groups_teacher_image_id_foreign` FOREIGN KEY (`teacher_image_id`) REFERENCES `images` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `class_groups` WRITE;
/*!40000 ALTER TABLE `class_groups` DISABLE KEYS */;

INSERT INTO `class_groups` (`id`, `name`, `logo_image_id`, `description`, `cover_image_id`, `video_url`, `classes`, `teacher_image_id`, `teacher_name`, `teacher_title`, `teacher_text`, `playlist_url`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'HIIT',21,'Entrenamiento funcional de alta intensidad para mejorar fuerza, potencia, velocidad y coordinación. Los ejercicios incluyen burpees, push-ups, pull-ups y sit-ups con elementos como kettlebells, sogas de salto, barras, aros y medicine balls.',28,'https://opvideosweb.s3-sa-east-1.amazonaws.com/4.+Hiit_CC_WEB.mp4','OPEN CROSS  •  HIIT  •  FUNCTIONAL EXPRESS  •  FUNCTIONAL TRAINING  •  JAULA  •  HIIT ABS  •  CORE 30  •  FUNCTIONAL 45',36,'MARIANA PEREZ','Master Trainer','Desafiate a vos mismo para superar las repeticiones y cuando sientas que quema, recién empieza.','https://open.spotify.com/playlist/0onga6H9CBFIMbnPfwo7HT',NULL,'2020-01-16 13:11:40','2020-01-16 13:11:40'),
	(2,'ATHLETICS',21,'Un entrenamiento ideal para aumentar tu resistencia física, muscular y coordinación. Tonificá tu cuerpo y bajá de peso. Nunca dos clases iguales, siempre un profesor de Open Park para guiarte.',24,'https://opvideosweb.s3-sa-east-1.amazonaws.com/6.+Athletic_CC_WEB.mp4','INDOOR RUNNING  •  PIERNAS PERFECTAS  •  GAP  •  KILLER ABS  •  ABS ATTACK  •  BODY LOCAL  •  BODY PUMP  •  POWER JUMP  •  LOCALIZADA  •  RUNNING TEAM  •  CIRCUIT 45  •  GAP 30',32,'ILEANA AGÜERO','Master Trainer','Encontrá la forma más efectiva de definir y esculpir tu cuerpo. Tu resultado es mi objetivo.','https://open.spotify.com/playlist/7i9YG1WxqNyPTK8iWMUOYk',NULL,'2020-01-16 13:12:45','2020-01-16 13:12:45'),
	(3,'RELAX',21,'Conectá con tu cuerpo. Respirá. Reiniciate. Equilibrate. Hacelo en distintas posturas de yoga o en la tranquilidad de la meditación. Mejorá tu postura, bajá tus niveles de estrés. Una hora solo para vos.',30,'https://opvideosweb.s3-sa-east-1.amazonaws.com/2.+Bodymind_CC_WEB.mp4','HATHA VINYASA YOGA  •  HATHA YOGA  •  PILATES MAT  •  RELAX 30  •  STRETCHING  •  TAI CHI CHUAN  •  YOGA  •  VOGA VINYASA FLOW  •  MEDITACION  •  CAMINATA ROSEDAL  •  YOGA KUNDALINI',37,'NATALIA OLIVE','Master Trainer','Abandoná las expectativas y conectate con tu propio equilibrio lejos del estrés diario.','https://open.spotify.com/playlist/63vglX7iU1uQKqe0SeKpPX',NULL,'2020-01-16 13:13:35','2020-01-16 13:13:35'),
	(4,'FIGHT',21,'Ponerse en forma se vuelve adictivo con nuestras clases que combinan la intensidad, la fuerza y la pasión del entrenamiento de boxeo, kick boxing o artes marciales. Espacios únicos de fit box aptos para todo público.',1,'https://opvideosweb.s3-sa-east-1.amazonaws.com/5.+Fight_CC_WEB.mp4','MUAY THAI  •  BODY COMBAT  •  MMA TRAINING  •  GYMBOXING  •  BOX & CARDIO  •  TAE KWON DO  •  BOX TECH  •  FIGHT 360  •  HIIT BOX',35,'ANALIA BENITEZ','Master Trainer','No vengas a hacer ejercicio, vení a superarte en cada golpe.','https://open.spotify.com/playlist/15u92NXJJFSk6DjLTp0bSb',NULL,'2020-01-16 13:14:24','2020-01-16 13:14:24'),
	(5,'CYCLE',21,'Pedaleá a todo ritmo en este entrenamiento cardio de alta intensidad. El entrenamiento con peso variado e intervalos de velocidad extrema genera una quema de calorías extraordinaria. Dejá todo en 60 o 90 minutos de potencia absoluta.',25,'https://opvideosweb.s3-sa-east-1.amazonaws.com/3.+Cycle_CC_WEB.mp4','OPEN CYCLE  •  CYCLE + ABS  •  SOUL BIKE  •  STUDIO CYCLE  •  GROUP CYCLING  •  HIIT BIKE',33,'SANTIAGO GRANDE','Master Trainer','¿Sos nuevo pedaleando? Probá una clase y quedate con la sensación de haber multiplicado tu resistencia desde el primer día.','https://open.spotify.com/playlist/15LAWCVqe2o8dAvBLvYWrB',NULL,'2020-01-16 13:15:30','2020-01-16 13:15:30'),
	(6,'DANCE',21,'Bailá, hacé ejercicio y sentite feliz. Fusión motivadora de música latina e internacional con movimientos únicos y combinaciones dinámicas que te permiten alejarte de tus preocupaciones.',1,'https://opvideosweb.s3-sa-east-1.amazonaws.com/1.+Dance_CC_WEB.mp4','SALSA & BACHATA  •  ZUMBA  •  DANCE!  •  LATINO  •  SALSA SHINE  •  KANGOO DANCE',34,'JOSE COGLITORE','Master Trainer','¿No sabés bailar? Te reto a que vengas a dos clases, y después hablamos.','https://open.spotify.com/playlist/6FPHWJT8Ruj7jZDJYQ5HGB',NULL,'2020-01-16 13:16:23','2020-01-16 13:16:23'),
	(7,'AQUA',21,'Tirate a la pileta. Aprendé los distintos estilos de natación para fortalecer tu cuerpo o para ganar confianza. También usá el agua para aumentar tu resistencia. Bailá, pedaleá y saltá en las distintas clases de fitness grupales únicas en Open Park.',22,'https://opvideosweb.s3-sa-east-1.amazonaws.com/7.+Aqua_CC_WEB.mp4','AQUA CYCLE  •  AQUA FUNCTIONAL  •  AQUA YOGA  •  AQUAGYM  •  NADO LIBRE  •  NATACION  •  EQUIPO DE NATACIÓN  •  AQUA RELAX  •  AQUA HIIT  •  AQUA BOXTRAINING  •  AQUA YOGA  •  AQUA ZUMBA',31,'DARIO PEREDA','Master Trainer','Nadar es confiar en vos mismo. Sumergite y ganá seguridad en cada brazada.','https://open.spotify.com/playlist/0mg1q4j0tjqeNcoDHUqEIp',NULL,'2020-01-16 13:17:54','2020-01-16 13:17:54');

/*!40000 ALTER TABLE `class_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla class_names
# ------------------------------------------------------------

DROP TABLE IF EXISTS `class_names`;

CREATE TABLE `class_names` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exposed` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `class_names_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `class_names` WRITE;
/*!40000 ALTER TABLE `class_names` DISABLE KEYS */;

INSERT INTO `class_names` (`id`, `key`, `value`, `exposed`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'Open Cross','Entrenamiento funcional de alta intensidad para mejora fuerza, potencia, velocidad y coordinación. Los ejercicios del día incluyen burpees, push-ups, pull-ups y sit-ups con elementos como ket',1,NULL,'2020-01-16 13:19:35','2020-01-16 13:19:35'),
	(2,'Open Cross (Principiantes)','Introducción a Open Cross. Ejercicios de adaptación física y aprendizaje de dinámica de entrenamiento.',1,NULL,'2020-01-16 13:19:47','2020-01-16 13:19:47'),
	(3,'HIIT','Entrenamiento en alta intensidad en intervalos. Nunca dos clases iguales. Ritmo cardiaco a toda máquina para quemar calorías.',1,NULL,'2020-01-16 13:19:55','2020-01-16 13:19:55'),
	(4,'Functional Express','Versión de 30 minutos de functional training.',1,NULL,'2020-01-16 13:20:03','2020-01-16 13:20:03'),
	(5,'Functional Training','Ejercicios que imitan los movimientos y trabajos físicos de la vida cotidiana, utilizando el peso corporal y accesorios libres.',1,NULL,'2020-01-16 13:20:14','2020-01-16 13:20:14'),
	(6,'Circuit Challenge','Circuito de functional training.',0,NULL,'2020-01-16 13:20:28','2020-01-16 13:20:28'),
	(7,'Jaula','Soltá tu lado animal. Colgate, empujá, tirá, levantá. En 30 minutos vas a pasar por calistenia, levantamiento olimpico y HIIT. Cada clase es un safari distinto.',1,NULL,'2020-01-16 13:20:37','2020-01-16 13:20:37'),
	(8,'HIIT Abs','Abdominales furiosos en formato de intervalos de alta intensidad.',1,NULL,'2020-01-16 13:20:46','2020-01-16 13:20:46'),
	(9,'Bikini Fit','Tu figura para el verano se define en esta clase de alta intensidad con movimientos diseñados para quemar y tonificar.',0,NULL,'2020-01-16 13:20:55','2020-01-16 13:20:55'),
	(10,'Breakletics','Fusión de Hip-Hop + entrenamiento HIIT. Desarrollada por Adidas en Alemania, Breakletics hace su debut en Argentina en Open Park. (Rosedal)',0,NULL,'2020-01-16 13:21:04','2020-01-16 13:21:04'),
	(11,'Core 30','-',1,NULL,'2020-01-16 13:21:15','2020-01-16 13:21:15'),
	(12,'Wake Up','Empeza tu dia con más energia! Es una clase que combina el Functional Training + Interval Training + Stretching',1,NULL,'2020-01-16 13:21:29','2020-01-16 13:21:29'),
	(13,'Functional 30','-',0,NULL,'2020-01-16 13:21:41','2020-01-16 13:21:41'),
	(14,'Entrenamiento Deportivo','Es una clase de Entrenamiento para quienes practican o quieren iniciarse con algún deporte.',1,NULL,'2020-01-16 13:21:49','2020-01-16 13:21:49'),
	(15,'Muay Thai','Dominá lo esencial de la versión Tailandesa de kickboxing. Patadas, puños y codos entrán en acción. Hoy te convertís en luchador.',1,NULL,'2020-01-16 13:22:00','2020-01-16 13:22:00'),
	(16,'Body Combat','Coreografías furiosas inspiradas en artes marciales como tae-kwon do, capoeira y tai-chi. Quemás hasta 750 calorías por clase mientras se mejora la coordinación y la resistencia.',1,NULL,'2020-01-16 13:22:07','2020-01-16 13:22:07'),
	(17,'MMA Training','Sos Conor McGregor. Maximizá tu fuerza, velocidad y resistencia con un mix de ejercicios pensados para luchadores de elite pero aptos para cualquiera con un espíritu de combate.',1,NULL,'2020-01-16 13:22:16','2020-01-16 13:22:16'),
	(18,'Gymboxing','Intensa clase de cardio inspirada en metodos de kickboxing.',1,NULL,'2020-01-16 13:22:25','2020-01-16 13:22:25'),
	(19,'Box & Cardio','Entrenamiento de Box cargado de adrenalina. Velocidad de manos, reflejos defensivos, juego de pies y destreza en combate.',1,NULL,'2020-01-16 13:22:35','2020-01-16 13:22:35'),
	(20,'Boxeo','Entrená como un boxeador profesional. Clase técnica con énfasis en defensa personal.',0,NULL,'2020-01-16 13:22:47','2020-01-16 13:22:47'),
	(21,'Tae Kwon Do','Mucho más que un arte marcial, Taekwondo es una actividad de aprendizaje para los niños. Mientras entrenan técnicas de defensa personal legendarias, van a aprender disciplina, respeto y conce',1,NULL,'2020-01-16 13:22:55','2020-01-16 13:22:55'),
	(22,'Box Tech','Técnicas de boxeo arriba del ring. Diez rounds de tres minutos a pura adrenalina.',1,NULL,'2020-01-16 13:23:03','2020-01-16 13:23:03'),
	(23,'Fight 360','60 minutos de kickboxing sin contacto con ejercicios de entrenamiento funcional al ritmo de la música. Puños y patadas en una clase con mucha energía. ',1,NULL,'2020-01-16 13:23:12','2020-01-16 13:23:12'),
	(24,'HIIT Box','60 minutos de alta intensidad, con entrenamiento dividido en intervalos de boxeo y functional.',1,NULL,'2020-01-16 13:23:22','2020-01-16 13:23:22'),
	(25,'Salsa & Bachata','Imposible dejar de moverte! Baile en parejas con ritmos centroamericanos y caribeños.',1,NULL,'2020-01-16 13:23:31','2020-01-16 13:23:31'),
	(26,'Salsa & Bachata (Principiantes)','Primeros pasos para conectarte con la música  y el estilo de baile centroamericano.',1,NULL,'2020-01-16 13:23:40','2020-01-16 13:23:40'),
	(27,'Step Latino','Mix de aeróbica con ritmos bailables. Usando el step como pieza principal vas a tonificar piernas, glúteos, abdominales y espinales.',0,NULL,'2020-01-16 13:23:49','2020-01-16 13:23:49'),
	(28,'Zumba','Una autentica fiesta! Mix de bailes enérgicos que incluye merengue , salsa, mambo y hip-hop.',1,NULL,'2020-01-16 13:23:57','2020-01-16 13:23:57'),
	(29,'Dance!','Coreografías enfocadas en quemar calorías a través de intervalos aeróbicos.',0,NULL,'2020-01-16 13:24:05','2020-01-16 13:24:05'),
	(30,'Latino','Merengue, reggaeton y rumba y muchos más estilos. Remixes y coreografías diseñadas por nuestros bailarines para que siempre seas el alma de la fiesta.',1,NULL,'2020-01-16 13:24:14','2020-01-16 13:24:14'),
	(31,'Salsa Shine','Taller de introducción a los pasos sueltos de baile. La antesala ideal para clases de Zumba, Salsa & Bachata y Latino.',1,NULL,'2020-01-16 13:24:21','2020-01-16 13:24:21'),
	(32,'Kangoo Dance','Bailá! Saltá! Quemá! Divertidas coreos con botas de Kangoo. Saltos y movimientos coordinados que hacen que quemes hasta 800 calorías por clase.',1,NULL,'2020-01-16 13:24:30','2020-01-16 13:24:30'),
	(33,'Urban Dance','Estilos inspirados en hip-hop, reggaeton, latino y funk. Aprendé nuevos movimientos de baile en una clase vibrante.',0,NULL,'2020-01-16 13:24:38','2020-01-16 13:24:38'),
	(34,'Experiencia Tangona','-',1,NULL,'2020-01-16 13:24:48','2020-01-16 13:24:48'),
	(35,'Ritmos','-',1,NULL,'2020-01-16 13:24:56','2020-01-16 13:24:56'),
	(36,'Free Dance','-',1,NULL,'2020-01-16 13:25:06','2020-01-16 13:25:06'),
	(37,'Indoor Running','Nunca vuelvas a correr solo! Combinación de running en cinta con ejercicios de entrenamiento funcional.',1,NULL,'2020-01-16 13:25:36','2020-01-16 13:25:36'),
	(38,'Strong by Zumba','STRONG by Zumba® es un entrenamiento revolucionario de alta intensidad guiado por música especialmente pensada para cada movimiento.',0,NULL,'2020-01-16 13:25:47','2020-01-16 13:25:47'),
	(39,'Kangoo Jumps','Divertido entrenamiento con botas especiales para rebotar hasta 40.000 veces por clase. Movimientos fáciles de seguir con alta quema de calorías!',1,NULL,'2020-01-16 13:25:55','2020-01-16 13:25:55'),
	(40,'Piernas Perfectas','Cadera, cola y muslos se vuelven una obra de arte después de estos 30 minutos. Dedicación total a modelar y tonificar piernas.',1,NULL,'2020-01-16 13:26:04','2020-01-16 13:26:04'),
	(41,'GAP','Gluteos, Abdominales y Piernas. Diseñada específicamente para darle definición a el contorno de tu cuerpo.',1,NULL,'2020-01-16 13:26:12','2020-01-16 13:26:12'),
	(42,'Killers Abs','Tallá tu zona media con un combo de ejercicios que sacuden tus músculos abdominales. Mejores abs, espalda sólida y perfecto balance.',1,NULL,'2020-01-16 13:26:21','2020-01-16 13:26:21'),
	(43,'Abs Attack','15 minutos de ataque total a la zona media.',1,NULL,'2020-01-16 13:26:29','2020-01-16 13:26:29'),
	(44,'Body Local','Barra, steps y discos de pesos varios. Entrenamiento localizado con enfoque en tonificación total.',1,NULL,'2020-01-16 13:26:39','2020-01-16 13:26:39'),
	(45,'Body Pump','Clase con barra y discos que fortalece y tonifica los principales grupos musculares con ejercicios con squats, presses, elevaciones y curls.',1,NULL,'2020-01-16 13:26:47','2020-01-16 13:26:47'),
	(46,'Power Jump','Coreografías cardio sobre mini-trampolines, combinando quema de calorías y música dance.',1,NULL,'2020-01-16 13:26:54','2020-01-16 13:26:54'),
	(47,'Taller de Gluteos','15 minutos de movimientos específicamente pensados para levantar y darle forma a la zona posterior.',0,NULL,'2020-01-16 13:27:03','2020-01-16 13:27:03'),
	(48,'Localizada','Entrenamiento con mancuernas, bandas elásticas y steps que se enfoca en la resistencia muscular, tonificación de cuerpo completo y postura.',1,NULL,'2020-01-16 13:27:13','2020-01-16 13:27:13'),
	(49,'Running Team','Grupo de corredores para todos los niveles con circuito outdoor. Preparación completa para carreras de calle y aventura.',1,NULL,'2020-01-16 13:27:23','2020-01-16 13:27:23'),
	(50,'Circuit 45','-',1,NULL,'2020-01-16 13:27:33','2020-01-16 13:27:33'),
	(51,'GAP 30','-',0,NULL,'2020-01-16 13:27:39','2020-01-16 13:27:39'),
	(52,'Adidas Runners/Open Park','-',0,NULL,'2020-01-16 13:27:52','2020-01-16 13:27:52'),
	(53,'Cardio Challenge','-',0,NULL,'2020-01-16 13:27:59','2020-01-16 13:27:59'),
	(54,'Circuit \'30','-',1,NULL,'2020-01-16 13:28:10','2020-01-16 13:28:10'),
	(55,'Piernas Perfectas/ABS','En esta clase se trabaja el tren inferior y Gluteos  en forma localizada y se complementa con trabajos de la lines media del cuerpo (abdominales y espinales)',1,NULL,'2020-01-16 13:28:22','2020-01-16 13:28:22'),
	(56,'Hatha Vinyasa Yoga','Sincroniza los movimientos de tu cuerpo con la respiración. Secuencias de movimientos conectados y muy suaves.',1,NULL,'2020-01-16 13:28:36','2020-01-16 13:28:36'),
	(57,'Hatha Yoga','Técnicas fundamentales que estimulan la conexión cuerpo y mente.',1,NULL,'2020-01-16 13:28:45','2020-01-16 13:28:45'),
	(58,'Pilates Mat','Movimientos de danza, yoga y calistenia adaptadas a ejercicios de Pilates. Aumenta la flexibilidad, tonificación y reduce el stress corporal.',1,NULL,'2020-01-16 13:28:52','2020-01-16 13:28:52'),
	(59,'Post & Flex','Técnicas para mejorar tu postura y sumar flexibilidad en todos los grupos musculares.',0,NULL,'2020-01-16 13:29:02','2020-01-16 13:29:02'),
	(60,'Power Yoga','Estilo intenso y fluido con el objetivo de tonificar cada músculo de tu cuerpo. Dirigida a personas con nivel intermedio y avanzado.',1,NULL,'2020-01-16 13:29:12','2020-01-16 13:29:12'),
	(61,'Relax 30','30 minutos de desconexión total a través de técnicas de meditación.',0,NULL,'2020-01-16 13:29:21','2020-01-16 13:29:21'),
	(62,'Stretching','Ejercicios de postura, flexibilidad y relajación para desarrollar elasticidad muscular y lograr una relajación total de tu cuerpo.',1,NULL,'2020-01-16 13:29:31','2020-01-16 13:29:31'),
	(63,'Tai-Chi-Chuan','Arte marcial meditativo caracterizado por sus movimientos lentos, continuos y firmes. El objetivo es fortalecer la concentración, reflejos y coordinación.',1,NULL,'2020-01-16 13:29:40','2020-01-16 13:29:40'),
	(64,'Yoga','Posturas esenciales, ejercicios de respiración, relajación y liberación de energía.',1,NULL,'2020-01-16 13:29:49','2020-01-16 13:29:49'),
	(65,'Yoga Therapy','Ejercicios de yoga correctiva y relajamiento para mejorar la salud, canalizar la energía y la armonía integral.',0,NULL,'2020-01-16 13:29:57','2020-01-16 13:29:57'),
	(66,'Voga Vinyasa Flow','Elementos del Ashtanga (intenso y físico) con posturas desafiantes que estimulan fuerza, elasticidad y equilibrio.',1,NULL,'2020-01-16 13:30:07','2020-01-16 13:30:07'),
	(67,'Meditación','Técnicas de respiración y relajación para reducir el estrés, regular emociones y mejorar la concentración.',1,NULL,'2020-01-16 13:30:16','2020-01-16 13:30:16'),
	(68,'Caminata Rosedal','-',1,NULL,'2020-01-16 13:30:24','2020-01-16 13:30:24'),
	(69,'Yoga Kundalini','-',1,NULL,'2020-01-16 13:30:31','2020-01-16 13:30:31'),
	(70,'Ashtanga Fit','-',1,NULL,'2020-01-16 13:30:39','2020-01-16 13:30:39'),
	(71,'Open Cycle','Pedaleá con ritmo en este entrenamiento cardio de alta intensidad. El entrenamiento con peso variado e intervalos de velocidad genera una quema de calorías extraordinaria.',1,NULL,'2020-01-16 13:30:50','2020-01-16 13:30:50'),
	(72,'Cycle + Abs','Enérgica clase de cycle con ejercicios para detonar la zona media sobre y debajo de la bici.',1,NULL,'2020-01-16 13:30:58','2020-01-16 13:30:58'),
	(73,'Cycle Express','Versión de Open Cycle en 30 minutos.',0,NULL,'2020-01-16 13:31:08','2020-01-16 13:31:08'),
	(74,'Soul Bike','La re-invención del cycle indoor. Pedaleo de alta intensidad, coreografías en bici y movimientos con mancuernas para fortalecer el tren superior. Un viaje revolucionario!',1,NULL,'2020-01-16 13:31:16','2020-01-16 13:31:16'),
	(75,'Studio Cycle','Pedaleá con ritmo en este entrenamiento cardio de alta intensidad. El entrenamiento con peso variado e intervalos de velocidad genera una quema de calorías extraordinaria.',1,NULL,'2020-01-16 13:31:26','2020-01-16 13:31:26'),
	(76,'Tour Cycle 90','90 minutos sin parar. Un laboratorio de preparación para salidas de ciclo-turismo.',0,NULL,'2020-01-16 13:31:35','2020-01-16 13:31:35'),
	(77,'Group Cycling','La evolución del indoor cycle desarrollada en Italia por Technogym es un combinación explosiva de entrenamiento cardio y potencia con una banda de sonido única.',1,NULL,'2020-01-16 13:31:47','2020-01-16 13:31:47'),
	(78,'HIIT Bike','Entrenamiento desafiante arriba de la bici con intervalos de alta intensidad. Excelente para quemar muchas calorias durante y hasta 48hs luego de la clase.',1,NULL,'2020-01-16 13:31:53','2020-01-16 13:31:53'),
	(79,'Aqua Cycle','Clase de cycle con bicicletas especiales sumergidas en la pileta. El pedaleo contra la resistencia del agua hace que sea una actividad desafiante pero libre de impacto muscular.',1,NULL,'2020-01-16 13:32:06','2020-01-16 13:32:06'),
	(80,'Aqua Functional','Ejercicios de Functional Training dentro y fuera de la pileta. Los objetivos incluyen mejorar movilidad, resistencia y fuerza.',1,NULL,'2020-01-16 13:32:13','2020-01-16 13:32:13'),
	(81,'Aqua Yoga','Posturas de yoga y técnicas de relajación realizadas en el agua.',1,NULL,'2020-01-16 13:32:21','2020-01-16 13:32:21'),
	(82,'AquaGym','Zambullite en esta clase aeróbica al ritmo de la música. Movimientos de bajo impacto para lograr un cuerpo perfecto!',1,NULL,'2020-01-16 13:32:35','2020-01-16 13:32:35'),
	(83,'Nado Libre','Espacio para personas que desean nadar por su cuenta sin la supervisión de un instructor.',1,NULL,'2020-01-16 13:32:44','2020-01-16 13:32:44'),
	(84,'Natación Adolescentes','Escuela de Natación de 14 a 18 años.',1,NULL,'2020-01-16 13:32:51','2020-01-16 13:32:51'),
	(85,'Natación Adultos','Escuela de Natación de 18 años en adelante.',1,NULL,'2020-01-16 13:32:58','2020-01-16 13:32:58'),
	(86,'Natación Bebés','La natación para bebés busca la estimulación acuática por medio de juegos que permiten aprender a flotar y moverse en el agua con ayuda de sus padres.',1,NULL,'2020-01-16 13:33:06','2020-01-16 13:33:06'),
	(87,'Natación Niños','Aprender a nadar es fundamental para que los chicos siempre se sientan seguros cerca del agua. Mediante juegos, competencias y desafíos de destreza van a tomar control del ambiente acuático.',1,NULL,'2020-01-16 13:33:14','2020-01-16 13:33:14'),
	(88,'Equipo de Natación','Equipo representativo de Open Park. Para formar parte es necesario realizar una prueba con el entrenador.',1,NULL,'2020-01-16 13:33:24','2020-01-16 13:33:24'),
	(89,'Aqua Relax','-',1,NULL,'2020-01-16 13:33:33','2020-01-16 13:33:33'),
	(90,'Aqua HIIT','Entrenamiento de alta intensidad en internvalos en el agua. Se trabaja potencia de piernas, tonicidad muscular y fuerza. Es de bajo impacto y para niveles avanzados.',1,NULL,'2020-01-16 13:33:42','2020-01-16 13:33:42'),
	(91,'Aqua BoxTraining','Ejercicios de boxeo y artes marciales en forma de circuito. Se entrena la coordinación, fuerza y flexibilidad.',1,NULL,'2020-01-16 13:33:52','2020-01-16 13:33:52'),
	(92,'Aqua Zumba','-',1,NULL,'2020-01-16 13:34:00','2020-01-16 13:34:00');

/*!40000 ALTER TABLE `class_names` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla club_image
# ------------------------------------------------------------

DROP TABLE IF EXISTS `club_image`;

CREATE TABLE `club_image` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `club_id` int(10) unsigned NOT NULL,
  `image_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `club_image_club_id_foreign` (`club_id`),
  KEY `club_image_image_id_foreign` (`image_id`),
  CONSTRAINT `club_image_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`),
  CONSTRAINT `club_image_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `club_image` WRITE;
/*!40000 ALTER TABLE `club_image` DISABLE KEYS */;

INSERT INTO `club_image` (`id`, `club_id`, `image_id`, `created_at`, `updated_at`)
VALUES
	(1,1,11,'2020-01-16 13:02:19','2020-01-16 13:02:19'),
	(2,1,12,'2020-01-16 13:02:19','2020-01-16 13:02:19'),
	(3,1,13,'2020-01-16 13:02:19','2020-01-16 13:02:19'),
	(4,1,14,'2020-01-16 13:02:19','2020-01-16 13:02:19'),
	(5,1,15,'2020-01-16 13:02:19','2020-01-16 13:02:19'),
	(6,2,7,'2020-01-16 13:03:26','2020-01-16 13:03:26'),
	(7,2,8,'2020-01-16 13:03:26','2020-01-16 13:03:26'),
	(8,2,9,'2020-01-16 13:03:26','2020-01-16 13:03:26'),
	(9,2,10,'2020-01-16 13:03:26','2020-01-16 13:03:26'),
	(10,3,16,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(11,3,17,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(12,3,18,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(13,4,19,'2020-01-16 13:05:14','2020-01-16 13:05:14');

/*!40000 ALTER TABLE `club_image` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla club_plan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `club_plan`;

CREATE TABLE `club_plan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `club_id` int(10) unsigned NOT NULL,
  `plan_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `club_plan_club_id_foreign` (`club_id`),
  KEY `club_plan_plan_id_foreign` (`plan_id`),
  CONSTRAINT `club_plan_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`),
  CONSTRAINT `club_plan_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `club_plan` WRITE;
/*!40000 ALTER TABLE `club_plan` DISABLE KEYS */;

INSERT INTO `club_plan` (`id`, `club_id`, `plan_id`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'2020-01-16 13:02:19','2020-01-16 13:02:19'),
	(2,1,2,'2020-01-16 13:02:19','2020-01-16 13:02:19'),
	(3,2,3,'2020-01-16 13:03:26','2020-01-16 13:03:26'),
	(4,2,4,'2020-01-16 13:03:26','2020-01-16 13:03:26'),
	(5,3,3,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(6,3,4,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(7,3,5,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(8,3,6,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(9,3,7,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(10,3,8,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(11,3,9,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(12,3,10,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(13,3,11,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(14,3,12,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(15,3,13,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(16,4,3,'2020-01-16 13:05:14','2020-01-16 13:05:14'),
	(17,4,4,'2020-01-16 13:05:14','2020-01-16 13:05:14'),
	(18,4,5,'2020-01-16 13:05:14','2020-01-16 13:05:14'),
	(19,4,6,'2020-01-16 13:05:14','2020-01-16 13:05:14'),
	(20,4,7,'2020-01-16 13:05:14','2020-01-16 13:05:14'),
	(21,4,8,'2020-01-16 13:05:14','2020-01-16 13:05:14'),
	(22,4,9,'2020-01-16 13:05:14','2020-01-16 13:05:14');

/*!40000 ALTER TABLE `club_plan` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla clubs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clubs`;

CREATE TABLE `clubs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_text_id` int(10) unsigned DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amenities` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clubs_web_text_id_foreign` (`web_text_id`),
  CONSTRAINT `clubs_web_text_id_foreign` FOREIGN KEY (`web_text_id`) REFERENCES `web_texts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `clubs` WRITE;
/*!40000 ALTER TABLE `clubs` DISABLE KEYS */;

INSERT INTO `clubs` (`id`, `name`, `web_text_id`, `address`, `opening_time`, `latitude`, `longitude`, `amenities`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'ROSEDAL',7,'Godoy Cruz y Av. del Libertador / CABA','Lunes a Viernes de 7 a 23hs / Sábado 9 a 20hs','-34.5732374','-58.4232579','1200 mts2  •  Salón Aero  •  HIIT  •  Gimnasio  •  Yoga Studio  •  Salón Cycle  •  Spa  •  Bar de jugos naturales',NULL,'2020-01-16 13:02:19','2020-01-16 13:02:19'),
	(2,'RAMOS',7,'Av. de Mayo 558 / Ramos Mejía','Lunes a Viernes 7 a 23hs / Sábado 9 a 20hs','-34.645846','-58.566625','3500 mts2  •  2 Piscinas  •  Gimnasio  •  Salón Cycle  •  Salón Aero  •  Yoga Studio  •  Salón Functional Training  •  Performance Zone  •  FightClub  •  Sauna & Hidromasaje',NULL,'2020-01-16 13:03:26','2020-01-16 13:03:26'),
	(3,'SAN JUSTO',7,'Av. Rincón y Av. Villegas / San Justo','Lunes a Viernes 7 a 23hs / Sábados 9 a 19hs','-34.666895','-58.5611562','5000 mts2  •  Salón Cycle  •  Salón Aero  •  Yoga Studio  •  Functional Training  •  Sauna & Hidromasaje  •  5 Piscinas  •  Armonium Spa',NULL,'2020-01-16 13:04:21','2020-01-16 13:04:21'),
	(4,'FIGHT CLUB (SAN JUSTO SHOPPING)',7,'Av. Prov. Unidas y Camino de Cintura / San Justo.','Lunes a Viernes 8 a 22hs / Sábados 9 a 19hs / Domingos y Feriados 10 a 18hs','-34.6851083','-58.5596035','1300 mts2  •  Salón Cycle  •  Salón Fight 360  •  Box Tech Studio  •  Functional Training  •  Salón Aero  •  Sauna',NULL,'2020-01-16 13:05:14','2020-01-16 13:05:14');

/*!40000 ALTER TABLE `clubs` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla flashes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `flashes`;

CREATE TABLE `flashes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zona` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_flash` double(8,2) NOT NULL,
  `label_flash` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_especial` double(8,2) NOT NULL,
  `label_especial` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_onSale` double(8,2) NOT NULL,
  `label_onSale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_regular` double(8,2) NOT NULL,
  `label_regular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `flashes` WRITE;
/*!40000 ALTER TABLE `flashes` DISABLE KEYS */;

INSERT INTO `flashes` (`id`, `zona`, `name_plan`, `precio_flash`, `label_flash`, `precio_especial`, `label_especial`, `precio_onSale`, `label_onSale`, `precio_regular`, `label_regular`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'R','PLATINUM - ANUAL CASH',200.00,'ÚLTIMOS',2100.00,'DISPONIBLE',0.00,'AGOTADO',2200.00,'DISPONIBLE',NULL,'2020-01-16 12:32:04','2020-01-16 12:32:04'),
	(2,'R','PLATINUM - ANUAL AHORA 12',2200.00,'ÚLTIMOS',2310.00,'DISPONIBLE',0.00,'AGOTADO',2420.00,'DISPONIBLE',NULL,'2020-01-16 12:32:39','2020-01-16 12:32:39'),
	(3,'R','PLATINUM - DA MENSUAL',0.00,'ÚLTIMOS',1300.00,'DISPONIBLE',1950.00,'DISPONIBLE',2600.00,'DISPONIBLE',NULL,'2020-01-16 12:33:23','2020-01-16 12:33:23'),
	(4,'ZO','PLATINUM - ANUAL CASH',1650.00,'ÚLTIMOS',1730.00,'DISPONIBLE',0.00,'AGOTADO',1815.00,'DISPONIBLE',NULL,'2020-01-16 12:34:09','2020-01-16 12:34:09'),
	(5,'ZO','PLATINUM - ANUAL AHORA 12',1870.00,'ÚLTIMOS',1960.00,'DISPONIBLE',0.00,'AGOTADO',2057.00,'DISPONIBLE',NULL,'2020-01-16 12:34:50','2020-01-16 12:34:50'),
	(6,'ZO','PLATINUM - DA MENSUAL',0.00,'ÚLTIMOS',1100.00,'DISPONIBLE',1650.00,'DISPONIBLE',2200.00,'DISPONIBLE',NULL,'2020-01-16 12:35:19','2020-01-16 12:35:19'),
	(7,'R','ELITE - ANUAL CASH',1825.00,'ÚLTIMOS',1915.00,'DISPONIBLE',0.00,'AGOTADO',2007.00,'DISPONIBLE',NULL,'2020-01-16 12:35:54','2020-01-16 12:35:54'),
	(8,'ZO','ELITE - ANUAL AHORA 12',2041.00,'ÚLTIMOS',2145.00,'DISPONIBLE',0.00,'AGOTADO',2245.00,'DISPONIBLE',NULL,'2020-01-16 12:36:21','2020-01-16 12:36:21'),
	(9,'ZO','ELITE - DA MENSUAL',0.00,'ÚLTIMOS',1200.00,'DISPONIBLE',1800.00,'DISPONIBLE',2400.00,'DISPONIBLE',NULL,'2020-01-16 12:36:55','2020-01-16 12:36:55');

/*!40000 ALTER TABLE `flashes` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla gym_classes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gym_classes`;

CREATE TABLE `gym_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `club_id` int(10) unsigned DEFAULT NULL,
  `class_group_id` int(10) unsigned DEFAULT NULL,
  `class_name_id` int(10) unsigned DEFAULT NULL,
  `teacher` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `week_days` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` time NOT NULL,
  `finish_at` time NOT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gym_classes_club_id_foreign` (`club_id`),
  KEY `gym_classes_class_group_id_foreign` (`class_group_id`),
  KEY `gym_classes_class_name_id_foreign` (`class_name_id`),
  CONSTRAINT `gym_classes_class_group_id_foreign` FOREIGN KEY (`class_group_id`) REFERENCES `class_groups` (`id`),
  CONSTRAINT `gym_classes_class_name_id_foreign` FOREIGN KEY (`class_name_id`) REFERENCES `class_names` (`id`),
  CONSTRAINT `gym_classes_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `gym_classes` WRITE;
/*!40000 ALTER TABLE `gym_classes` DISABLE KEYS */;

INSERT INTO `gym_classes` (`id`, `club_id`, `class_group_id`, `class_name_id`, `teacher`, `day_time`, `week_days`, `start_at`, `finish_at`, `room`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,1,NULL,12,'ANALIA FRAGA','0','[\"lunes\",\"miercoles\",\"viernes\"]','07:15:00','08:15:00','AERO',NULL,'2020-01-16 13:45:50','2020-01-16 13:45:50'),
	(2,1,NULL,48,'ANALIA FRAGA','0','[\"lunes\",\"miercoles\",\"viernes\"]','08:30:00','09:30:00','AERO',NULL,'2020-01-16 13:49:14','2020-01-16 13:49:14'),
	(3,1,NULL,24,'GABRIELA VERA','0','[\"martes\",\"jueves\"]','08:00:00','09:00:00','HIIT',NULL,'2020-01-16 13:49:51','2020-01-16 13:49:51'),
	(4,1,NULL,75,'GRETA AURA','0','[\"martes\",\"jueves\"]','08:30:00','09:30:00','CYCLE',NULL,'2020-01-16 13:50:33','2020-01-16 13:50:33'),
	(5,1,NULL,62,'ANALIA FRAGA','0','[\"lunes\",\"miercoles\",\"viernes\"]','09:30:00','10:30:00','YOGA STUDIO',NULL,'2020-01-16 13:51:08','2020-01-16 13:51:25'),
	(6,1,NULL,57,'GRETA AURA','0','[\"martes\",\"jueves\"]','09:30:00','10:45:00','AERO',NULL,'2020-01-16 13:52:10','2020-01-16 13:52:10'),
	(7,1,NULL,36,'MICAELA GOMEZ','0','[\"martes\",\"jueves\"]','10:30:00','11:30:00','YOGA STUDIO',NULL,'2020-01-16 13:53:04','2020-01-16 13:53:04'),
	(8,1,NULL,74,'CHRISTIAN BLUM','0','[\"sabado\"]','10:30:00','11:30:00','CYCLE',NULL,'2020-01-16 13:53:32','2020-01-16 13:53:32'),
	(9,1,NULL,3,'ANDRES HERRERA','0','[\"lunes\",\"miercoles\",\"viernes\"]','11:00:00','12:00:00','HIIT',NULL,'2020-01-16 13:54:10','2020-01-16 13:54:10'),
	(10,1,NULL,68,'MICAELA GOMEZ / ANDREA OFMAN','0','[\"martes\",\"jueves\"]','11:00:00','12:00:00','AERO',NULL,'2020-01-16 13:54:43','2020-01-16 13:54:43'),
	(11,1,NULL,5,'CHRISTIAN BLUM','0','[\"sabado\"]','11:30:00','12:30:00','AERO',NULL,'2020-01-16 13:55:14','2020-01-16 13:55:20'),
	(12,1,NULL,1,'CHRISTIAN BLUM','0','[\"sabado\"]','12:30:00','13:30:00','HIIT',NULL,'2020-01-16 13:55:47','2020-01-16 13:55:47'),
	(13,1,NULL,24,'ANDY/CESAR','0','[\"lunes\",\"miercoles\",\"viernes\"]','13:00:00','14:00:00','HIIT',NULL,'2020-01-16 13:56:38','2020-01-16 13:56:38'),
	(14,1,NULL,5,'ANDY/CESAR','0','[\"martes\",\"jueves\"]','13:00:00','14:00:00','HIIT',NULL,'2020-01-16 13:57:12','2020-01-16 13:57:12'),
	(15,1,NULL,48,'ROBERTO MENA','0','[\"lunes\",\"miercoles\"]','13:15:00','14:15:00','AERO',NULL,'2020-01-16 13:57:44','2020-01-16 13:57:44'),
	(16,1,NULL,69,'LAUTARO FERRARI','0','[\"martes\",\"jueves\"]','13:15:00','14:15:00','YOGA STUDIO',NULL,'2020-01-16 13:58:08','2020-01-16 13:58:08'),
	(17,1,NULL,18,'ROBERTO MENA','0','[\"viernes\"]','13:15:00','14:15:00','AERO',NULL,'2020-01-16 13:58:37','2020-01-16 13:58:37'),
	(18,1,NULL,75,'SANTIAGO GRANDE','0','[\"lunes\",\"miercoles\",\"viernes\"]','13:15:00','14:15:00','CYCLE',NULL,'2020-01-16 13:59:33','2020-01-16 13:59:33'),
	(19,1,NULL,18,'ROBERTO MENA','0','[\"martes\"]','13:15:00','14:15:00','AERO',NULL,'2020-01-16 14:00:05','2020-01-16 14:00:05');

/*!40000 ALTER TABLE `gym_classes` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `internal_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `images_internal_key_unique` (`internal_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `internal_key`, `image_type`, `url`, `alt`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'HomeClases','url','https://openpark.com.ar/assets/imagenes/homeClases.jpg','https://openpark.com.ar/assets/imagenes/homeClases.jpg',NULL,'2020-01-16 12:51:32','2020-01-16 12:51:32'),
	(2,'HomeCoach','url','https://openpark.com.ar/assets/imagenes/homeCoach.jpg','https://openpark.com.ar/assets/imagenes/homeCoach.jpg',NULL,'2020-01-16 12:51:42','2020-01-16 12:51:42'),
	(3,'HomeRosedal','url','https://openpark.com.ar/assets/imagenes/sedes/homeRosedal.jpg','https://openpark.com.ar/assets/imagenes/sedes/homeRosedal.jpg',NULL,'2020-01-16 12:53:57','2020-01-16 12:56:10'),
	(4,'HomeRamos','url','https://openpark.com.ar/assets/imagenes/sedes/homeRamos.jpg','https://openpark.com.ar/assets/imagenes/sedes/homeRamos.jpg',NULL,'2020-01-16 12:54:45','2020-01-16 12:56:00'),
	(5,'HomeSJS','url','https://openpark.com.ar/assets/imagenes/sedes/homeSJS.jpg','https://openpark.com.ar/assets/imagenes/sedes/homeSJS.jpg',NULL,'2020-01-16 12:54:57','2020-01-16 12:56:14'),
	(6,'HomeSanJusto','url','https://openpark.com.ar/assets/imagenes/sedes/homeSanJusto.jpg','https://openpark.com.ar/assets/imagenes/sedes/homeSanJusto.jpg',NULL,'2020-01-16 12:55:18','2020-01-16 12:56:21'),
	(7,'SedeRamosG1','url','https://openpark.com.ar/assets/imagenes/sedes/ramos/imagenG1.jpg','https://openpark.com.ar/assets/imagenes/sedes/ramos/imagenG1.jpg',NULL,'2020-01-16 12:56:41','2020-01-16 12:56:41'),
	(8,'SedeRamosG2','url','https://openpark.com.ar/assets/imagenes/sedes/ramos/imagenG2.jpg','https://openpark.com.ar/assets/imagenes/sedes/ramos/imagenG2.jpg',NULL,'2020-01-16 12:56:49','2020-01-16 12:56:49'),
	(9,'SedeRamosG3','url','https://openpark.com.ar/assets/imagenes/sedes/ramos/imagenG3.jpg','https://openpark.com.ar/assets/imagenes/sedes/ramos/imagenG3.jpg',NULL,'2020-01-16 12:56:57','2020-01-16 12:56:57'),
	(10,'SedeRamosG4','url','https://openpark.com.ar/assets/imagenes/sedes/ramos/imagenG4.jpg','https://openpark.com.ar/assets/imagenes/sedes/ramos/imagenG4.jpg',NULL,'2020-01-16 12:57:05','2020-01-16 12:57:05'),
	(11,'SedeRosedalG1','url','https://openpark.com.ar/assets/imagenes/sedes/rosedal/imagenG1.jpg','https://openpark.com.ar/assets/imagenes/sedes/rosedal/imagenG1.jpg',NULL,'2020-01-16 12:57:17','2020-01-16 12:57:17'),
	(12,'SedeRosedalG2','url','https://openpark.com.ar/assets/imagenes/sedes/rosedal/imagenG2.jpg','https://openpark.com.ar/assets/imagenes/sedes/rosedal/imagenG2.jpg',NULL,'2020-01-16 12:57:33','2020-01-16 12:57:33'),
	(13,'SedeRosedalG3','url','https://openpark.com.ar/assets/imagenes/sedes/rosedal/imagenG3.jpg','https://openpark.com.ar/assets/imagenes/sedes/rosedal/imagenG3.jpg',NULL,'2020-01-16 12:57:45','2020-01-16 12:57:45'),
	(14,'SedeRosedalG4','url','https://openpark.com.ar/assets/imagenes/sedes/rosedal/imagenG4.jpg','https://openpark.com.ar/assets/imagenes/sedes/rosedal/imagenG4.jpg',NULL,'2020-01-16 12:57:55','2020-01-16 12:57:55'),
	(15,'SedeRosedalG5','url','https://openpark.com.ar/assets/imagenes/sedes/rosedal/imagenG5.jpg','https://openpark.com.ar/assets/imagenes/sedes/rosedal/imagenG5.jpg',NULL,'2020-01-16 12:58:11','2020-01-16 12:58:11'),
	(16,'SedeSanJustoG1','url','https://openpark.com.ar/assets/imagenes/sedes/sanjusto/imagenG1.jpg','https://openpark.com.ar/assets/imagenes/sedes/sanjusto/imagenG1.jpg',NULL,'2020-01-16 12:58:21','2020-01-16 12:58:21'),
	(17,'SedeSanJustoG2','url','https://openpark.com.ar/assets/imagenes/sedes/sanjusto/imagenG2.jpg','https://openpark.com.ar/assets/imagenes/sedes/sanjusto/imagenG2.jpg',NULL,'2020-01-16 12:58:29','2020-01-16 12:58:29'),
	(18,'SedeSanJustoG3','url','https://openpark.com.ar/assets/imagenes/sedes/sanjusto/imagenG3.jpg','https://openpark.com.ar/assets/imagenes/sedes/sanjusto/imagenG3.jpg',NULL,'2020-01-16 12:58:38','2020-01-16 12:58:38'),
	(19,'sedeSJSG1','url','https://openpark.com.ar/assets/imagenes/sedes/sjs/imagenG1.jpg','https://openpark.com.ar/assets/imagenes/sedes/sjs/imagenG1.jpg',NULL,'2020-01-16 12:58:48','2020-01-16 12:58:48'),
	(20,'CorporativoCover','url','https://openpark.com.ar/assets/imagenes/corporativo/cover.jpg','https://openpark.com.ar/assets/imagenes/corporativo/cover.jpg',NULL,'2020-01-16 12:59:05','2020-01-16 12:59:05'),
	(21,'DUMMY','url','-','-',NULL,'2020-01-16 13:06:42','2020-01-16 13:06:42'),
	(22,'CoverAqua','url','https://openpark.com.ar/assets/imagenes/covers/aqua.jpg','https://openpark.com.ar/assets/imagenes/covers/aqua.jpg',NULL,'2020-01-16 13:07:53','2020-01-16 13:07:53'),
	(23,'CoverAsociate','url','https://openpark.com.ar/assets/imagenes/covers/asociate.jpg','https://openpark.com.ar/assets/imagenes/covers/asociate.jpg',NULL,'2020-01-16 13:08:04','2020-01-16 13:08:04'),
	(24,'CoverAthletic','url','https://openpark.com.ar/assets/imagenes/covers/athletic.jpg','https://openpark.com.ar/assets/imagenes/covers/athletic.jpg',NULL,'2020-01-16 13:08:13','2020-01-16 13:08:13'),
	(25,'CoverCycle','url','https://openpark.com.ar/assets/imagenes/covers/cycle.jpg','https://openpark.com.ar/assets/imagenes/covers/cycle.jpg',NULL,'2020-01-16 13:08:23','2020-01-16 13:08:23'),
	(26,'CoverDance','url','https://openpark.com.ar/assets/imagenes/covers/dance.jpg','https://openpark.com.ar/assets/imagenes/covers/dance.jpg',NULL,'2020-01-16 13:08:34','2020-01-16 13:08:34'),
	(27,'CoverFight','url','https://openpark.com.ar/assets/imagenes/covers/fight.jpg','https://openpark.com.ar/assets/imagenes/covers/fight.jpg',NULL,'2020-01-16 13:08:42','2020-01-16 13:08:42'),
	(28,'CoverHiit','url','https://openpark.com.ar/assets/imagenes/covers/hiit.jpg','https://openpark.com.ar/assets/imagenes/covers/hiit.jpg',NULL,'2020-01-16 13:08:53','2020-01-16 13:08:53'),
	(29,'CoverTrabaja','url','https://openpark.com.ar/assets/imagenes/covers/trabaja.jpg','https://openpark.com.ar/assets/imagenes/covers/trabaja.jpg',NULL,'2020-01-16 13:09:02','2020-01-16 13:09:02'),
	(30,'CoverYoga','url','https://openpark.com.ar/assets/imagenes/covers/yoga.jpg','https://openpark.com.ar/assets/imagenes/covers/yoga.jpg',NULL,'2020-01-16 13:09:10','2020-01-16 13:09:10'),
	(31,'ProfeAqua','url','https://openpark.com.ar/assets/imagenes/retratos/profeAqua.jpg','https://openpark.com.ar/assets/imagenes/retratos/profeAqua.jpg',NULL,'2020-01-16 13:09:27','2020-01-16 13:09:27'),
	(32,'ProfeAthletic','url','https://openpark.com.ar/assets/imagenes/retratos/profeAthletic.jpg','https://openpark.com.ar/assets/imagenes/retratos/profeAthletic.jpg',NULL,'2020-01-16 13:09:39','2020-01-16 13:09:39'),
	(33,'ProfeCycle','url','https://openpark.com.ar/assets/imagenes/retratos/profeCycle.jpg','https://openpark.com.ar/assets/imagenes/retratos/profeCycle.jpg',NULL,'2020-01-16 13:09:49','2020-01-16 13:09:49'),
	(34,'ProfeDance','url','https://openpark.com.ar/assets/imagenes/retratos/profeDance.jpg','https://openpark.com.ar/assets/imagenes/retratos/profeDance.jpg',NULL,'2020-01-16 13:09:59','2020-01-16 13:09:59'),
	(35,'ProfeFight','url','https://openpark.com.ar/assets/imagenes/retratos/profeFight.jpg','https://openpark.com.ar/assets/imagenes/retratos/profeFight.jpg',NULL,'2020-01-16 13:10:08','2020-01-16 13:10:08'),
	(36,'ProfeHiit','url','https://openpark.com.ar/assets/imagenes/retratos/profeHiit.jpg','https://openpark.com.ar/assets/imagenes/retratos/profeHiit.jpg',NULL,'2020-01-16 13:10:18','2020-01-16 13:10:18'),
	(37,'ProfeRelax','url','https://openpark.com.ar/assets/imagenes/retratos/profeRelax.jpg','https://openpark.com.ar/assets/imagenes/retratos/profeRelax.jpg',NULL,'2020-01-16 13:10:29','2020-01-16 13:10:29');

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Volcado de tabla migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2017_09_03_144628_create_permission_tables',1),
	(4,'2017_09_11_174816_create_social_accounts_table',1),
	(5,'2017_09_26_140332_create_cache_table',1),
	(6,'2017_09_26_140528_create_sessions_table',1),
	(7,'2017_09_26_140609_create_jobs_table',1),
	(8,'2018_04_08_033256_create_password_histories_table',1),
	(9,'2019_03_26_000344_create_audits_table',1),
	(10,'2019_09_08_011216_create_settings_table',1),
	(11,'2019_09_08_011703_create_plans_table',1),
	(12,'2019_09_08_012802_create_images_table',1),
	(13,'2019_09_08_012833_create_class_names_table',1),
	(14,'2019_09_08_012833_create_web_texts_table',1),
	(15,'2019_09_08_012845_create_class_groups_table',1),
	(16,'2019_09_08_185352_create_clubs_table',1),
	(17,'2019_09_08_204618_create_club_image_table',1),
	(18,'2019_09_08_212558_create_gym_classes_table',1),
	(19,'2019_09_09_005851_create_club_plan_table',1),
	(20,'2020_01_14_234727_create_flashes_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla model_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Volcado de tabla model_has_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`)
VALUES
	(1,'App\\Models\\Auth\\User',1),
	(2,'App\\Models\\Auth\\User',2),
	(3,'App\\Models\\Auth\\User',3);

/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla password_histories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_histories`;

CREATE TABLE `password_histories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_histories_user_id_foreign` (`user_id`),
  CONSTRAINT `password_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `password_histories` WRITE;
/*!40000 ALTER TABLE `password_histories` DISABLE KEYS */;

INSERT INTO `password_histories` (`id`, `user_id`, `password`, `created_at`, `updated_at`)
VALUES
	(1,1,'$2y$10$UbHdZRS1eEfSbG6j.rQ85.AWN4JDo7FjCxYLiJOB7/uQCYvSa4m0C','2020-01-16 12:26:56','2020-01-16 12:26:56'),
	(2,2,'$2y$10$yK8qOZ/LTJpwMYujN7O10e3/hnRnTTCSNrtCopwDRwX.G1BaT/q5y','2020-01-16 12:26:56','2020-01-16 12:26:56'),
	(3,3,'$2y$10$bysAKh5vBjFcwGCidKroyOmyqfrK/BEyHHERlli7XEQZbNHlIR15S','2020-01-16 12:26:56','2020-01-16 12:26:56');

/*!40000 ALTER TABLE `password_histories` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Volcado de tabla permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'view backend','web','2020-01-16 12:26:56','2020-01-16 12:26:56');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla plans
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plans`;

CREATE TABLE `plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_month` double(8,2) NOT NULL,
  `price_matriculation` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;

INSERT INTO `plans` (`id`, `name`, `description`, `price_month`, `price_matriculation`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'PLATINUM Rosedal','-',2970.00,2300.00,NULL,'2020-01-16 12:38:53','2020-01-16 12:38:53'),
	(2,'PLATINUM Rosedal - Ahora12','total 32000',2858.00,2300.00,NULL,'2020-01-16 12:39:23','2020-01-16 12:39:23'),
	(3,'PLATINUM ZO','-',2570.00,1200.00,NULL,'2020-01-16 12:39:45','2020-01-16 12:39:45'),
	(4,'PLATINUM ZO - Ahora12','total 27600',2400.00,1200.00,NULL,'2020-01-16 12:40:10','2020-01-16 12:40:10'),
	(5,'ELITE ZO','-',2775.00,1200.00,NULL,'2020-01-16 12:40:48','2020-01-16 12:40:48'),
	(6,'ELITE ZO - Ahora12','total 29800',2583.00,1200.00,NULL,'2020-01-16 12:41:04','2020-01-16 12:41:04'),
	(7,'Natación +3','-',1850.00,1200.00,NULL,'2020-01-16 12:41:25','2020-01-16 12:41:25'),
	(8,'Natación +2','-',1750.00,1200.00,NULL,'2020-01-16 12:41:39','2020-01-16 12:41:39'),
	(9,'Natación +1','-',1650.00,1200.00,NULL,'2020-01-16 12:41:52','2020-01-16 12:41:52'),
	(10,'Matro +3','-',1900.00,1200.00,NULL,'2020-01-16 12:42:09','2020-01-16 12:42:09'),
	(11,'Matro +2','-',1800.00,1200.00,NULL,'2020-01-16 12:42:21','2020-01-16 12:42:21'),
	(12,'Matro +1','-',1700.00,1200.00,NULL,'2020-01-16 12:42:38','2020-01-16 12:42:38'),
	(13,'Natación Gold','-',1950.00,1200.00,NULL,'2020-01-16 12:42:59','2020-01-16 12:42:59');

/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla role_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(1,2);

/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'administrator','web','2020-01-16 12:26:56','2020-01-16 12:26:56'),
	(2,'executive','web','2020-01-16 12:26:56','2020-01-16 12:26:56'),
	(3,'user','web','2020-01-16 12:26:56','2020-01-16 12:26:56');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Volcado de tabla settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exposed` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `key`, `value`, `exposed`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'telefono','0810 345 5505',1,NULL,'2020-01-16 12:29:55','2020-01-16 12:29:55'),
	(2,'instagram','https://www.instagram.com/openparkba',1,NULL,'2020-01-16 12:30:07','2020-01-16 12:30:07'),
	(3,'facebook','https://www.facebook.com/openparkba/',1,NULL,'2020-01-16 12:30:28','2020-01-16 12:30:28'),
	(4,'whatsappLink','https://wa.me/541141490188',1,NULL,'2020-01-16 12:30:38','2020-01-16 12:30:38'),
	(5,'gaTrackingCode','UA-XXXXX-X',1,NULL,'2020-01-16 12:30:48','2020-01-16 12:30:48');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla social_accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `social_accounts`;

CREATE TABLE `social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_accounts_user_id_foreign` (`user_id`),
  CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Volcado de tabla users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gravatar',
  `avatar_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_be_logged_out` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `uuid`, `first_name`, `last_name`, `email`, `avatar_type`, `avatar_location`, `password`, `password_changed_at`, `active`, `confirmation_code`, `confirmed`, `timezone`, `last_login_at`, `last_login_ip`, `to_be_logged_out`, `remember_token`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'1d5de954-5a0b-4cdd-b093-1e1b427f2bb2','Admin','Istrator','admin@admin.com','gravatar',NULL,'$2y$10$UbHdZRS1eEfSbG6j.rQ85.AWN4JDo7FjCxYLiJOB7/uQCYvSa4m0C',NULL,1,'b9c3be9fc6b5c6fc2e1e804fb1309dd3',1,'America/New_York','2020-01-16 12:29:31','127.0.0.1',0,'Z1FBcljO6j2MA5e3dD3UbOnd7rgS8dkPDLKvm34RIndZt9BSZ93caMeqKUb9','2020-01-16 12:26:56','2020-01-16 12:29:31',NULL),
	(2,'839794b3-6e4d-42dc-8256-eb890d3384bb','Backend','User','executive@executive.com','gravatar',NULL,'$2y$10$yK8qOZ/LTJpwMYujN7O10e3/hnRnTTCSNrtCopwDRwX.G1BaT/q5y',NULL,1,'c4ec6c842c2d677caf24859b7d05b855',1,NULL,NULL,NULL,0,NULL,'2020-01-16 12:26:56','2020-01-16 12:26:56',NULL),
	(3,'1720bae4-408e-4f93-be39-e79103dda5e2','Default','User','user@user.com','gravatar',NULL,'$2y$10$bysAKh5vBjFcwGCidKroyOmyqfrK/BEyHHERlli7XEQZbNHlIR15S',NULL,1,'baee698fb455787029b4f29025b00c0d',1,NULL,NULL,NULL,0,NULL,'2020-01-16 12:26:56','2020-01-16 12:26:56',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla web_texts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `web_texts`;

CREATE TABLE `web_texts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exposed` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `web_texts_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `web_texts` WRITE;
/*!40000 ALTER TABLE `web_texts` DISABLE KEYS */;

INSERT INTO `web_texts` (`id`, `key`, `value`, `exposed`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'htmlHomeHero','<h1 class=\"title has-text-white is-size-1 is-FontExtraBold\">OPEN PARK.<br> IT\'S A LIFESTYLE.</h1>',1,NULL,'2020-01-16 12:44:05','2020-01-16 12:44:05'),
	(2,'URLHomeVideo','https://opvideosweb.s3-sa-east-1.amazonaws.com/CompiladoHome.mp4',1,NULL,'2020-01-16 12:45:56','2020-01-16 12:46:38'),
	(3,'TextHomeBanner','Sos distinto, nosotros también. Sabemos que un simple detalle hace la diferencia para que tus días sean mejores. Open Park cuenta con cuatro sedes pensadas exclusivamente para cumplir un obje',1,NULL,'2020-01-16 12:46:11','2020-01-16 12:46:52'),
	(4,'TextHomeClubes','Cuatro sedes especialmente diseñadas para mejorar tu rendimiento en cada ejercicio, actividad u objetivo que te propongas.',1,NULL,'2020-01-16 12:47:07','2020-01-16 12:47:07'),
	(5,'TextHomeClases','Nuestras clases de fitness grupales son especializadas para cada parte de tu cuerpo.',1,NULL,'2020-01-16 12:47:30','2020-01-16 12:47:30'),
	(6,'TextHomeCoach','Un programa ÚNICO de Open Park diseñado para ayudarte a mejorar tu calidad de vida y transformarla cuando salgas de tu espacio de entrenamiento.',1,NULL,'2020-01-16 12:47:47','2020-01-16 12:47:47'),
	(7,'HeaderPageClubes','Cuatro sedes especialmente diseñadas para mejorar tu rendimiento en cada ejercicio, actividad u objetivo que te propongas.',1,NULL,'2020-01-16 12:48:24','2020-01-16 12:48:24'),
	(8,'HeaderPageClases','Corré, saltá, baila, estirá, repeti.',1,NULL,'2020-01-16 12:48:43','2020-01-16 12:48:43'),
	(9,'TextAsociatePage','Open Park cuenta con cuatro sedes pensadas exclusivamente para cumplir un objetivo : hacer de tu tiempo de entrenamiento, tu estilo de vida.',1,NULL,'2020-01-16 12:49:22','2020-01-16 12:49:22'),
	(10,'TextCoachPage','El NUEVO programa COACH DE SALUD de Open Park está diseñado para ayudarte a MEJORAR tu calidad de vida, CAMBIAR tus hábitos alimenticios y armar un plan de entrenamiento acorde a tus objetivo',1,NULL,'2020-01-16 12:49:57','2020-01-16 12:49:57');

/*!40000 ALTER TABLE `web_texts` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
