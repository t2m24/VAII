CREATE TABLE IF NOT EXISTS `albums` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `artist` VARCHAR(255) NOT NULL,
    `release_year` INT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `songs` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `artist` VARCHAR(255) NOT NULL,
    `genre` VARCHAR(100) NULL,
    `release_year` INT NULL,
    `album_id` INT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT `fk_song_album`
        FOREIGN KEY (`album_id`) REFERENCES `albums`(`id`)
        ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `albums` (`title`, `artist`, `release_year`) VALUES
    ('Midnight Sessions', 'Artist Name', 2024),
    ('After Hours', 'The Weeknd', 2020);

INSERT INTO `songs` (`title`, `artist`, `genre`, `release_year`, `album_id`) VALUES
    ('Song Title', 'Artist Name', 'Indie / Alternative', 2024, 1),
    ('Blinding Lights', 'The Weeknd', 'Pop / Synthwave', 2020, 2);
