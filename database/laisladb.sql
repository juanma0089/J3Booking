INSERT INTO `tables` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'escenario', NULL, NULL),
(2, 'escenario', NULL, NULL),
(3, 'escenario', NULL, NULL),
(4, 'escenario', NULL, NULL),
(5, 'escenario', NULL, NULL),
(6, 'mesa', NULL, NULL),
(7, 'mesa', NULL, NULL),
(8, 'mesa', NULL, NULL),
(9, 'mesa', NULL, NULL),
(10, 'mesaalta', NULL, NULL),
(11, 'mesaalta', NULL, NULL),
(12, 'mesaalta', NULL, NULL),
(13, 'mesaalta', NULL, NULL),
(14, 'mesaalta', NULL, NULL);

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `phone`, `eliminado`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', '$2y$10$UfmtaPYNuAi5aOZmQ082neQOsWFmFRZYVvBgASlKqs866JRQqeSTG', NULL, NULL, NULL, 'admin', '666666666', 0, NULL, '2023-04-03 06:36:20', '2023-05-15 14:45:33');
