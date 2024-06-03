SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `treasure`;
CREATE TABLE `treasure` (
  `id_treasure` int NOT NULL,
  `id_user` int NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_es_0900_ai_ci NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_es_0900_ai_ci;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_es_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_es_0900_ai_ci;

ALTER TABLE `treasure`
  ADD PRIMARY KEY (`id_treasure`),
  ADD KEY `code` (`code`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);


ALTER TABLE `treasure`
  MODIFY `id_treasure` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
