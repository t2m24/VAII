CREATE TABLE IF NOT EXISTS `songs` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `artist` VARCHAR(255) NOT NULL,
    `album` VARCHAR(255) NULL,
    `genre` VARCHAR(100) NULL,
    `release_year` INT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `songs` (`title`, `artist`, `album`, `genre`, `release_year`)
VALUES
    ('Song Title', 'Artist Name', 'Midnight Sessions', 'Indie / Alternative', 2024),
    ('Blinding Lights', 'The Weeknd', 'After Hours', 'Pop / Synthwave', 2020);
