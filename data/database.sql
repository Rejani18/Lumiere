-- Database: `lumiere_makeup`

CREATE DATABASE IF NOT EXISTS `lumiere_makeup`;
USE `lumiere_makeup`;

-- Table structure for table `users`
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `users`
-- Default admin password is 'password'
INSERT INTO `users` (`id`, `username`, `password_hash`, `role`, `name`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'Admin User');

-- Table structure for table `products`
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `products`
INSERT INTO `products` (`id`, `name`, `price`, `image`, `category`, `description`) VALUES
(1, 'Velvet Rose Lipstick', 450000, 'assets/images/product-1.jpg', 'Lips', 'A luxurious, matte lipstick in a deep rose shade. Long-lasting and hydrating.'),
(2, 'Gold Dust Highlighter', 520000, 'assets/images/product-2.jpg', 'Face', 'Infused with real gold particles for a radiant, heavenly glow.'),
(3, 'Silk Foundation', 680000, 'assets/images/product-3.jpg', 'Face', 'Full coverage foundation that feels as light as silk. Flawless finish.'),
(4, 'Midnight Eyeshadow Palette', 890000, 'assets/images/product-4.jpg', 'Eyes', 'Deep, mystery shades for the perfect evening look. Highly pigmented.'),
(5, 'Rose Quartz Facial Roller', 350000, 'assets/images/product-5.jpg', 'Tools', 'Authentic Rose Quartz roller to de-puff and soothe your skin.'),
(6, 'Hydrating Primer Serum', 550000, 'assets/images/product-6.jpg', 'Face', 'Prepares your skin for makeup while providing intense hydration.');
