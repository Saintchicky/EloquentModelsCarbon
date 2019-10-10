insert Into Début;
insert into `users_settings` (`us_created_at`, `us_profil_id`, `us_updated_at`, `us_user_id`) values ('2019-10-10 10:23:39', '1', '2019-10-10 10:23:39', '1');
insert into `users_settings` (`us_created_at`, `us_profil_id`, `us_updated_at`, `us_user_id`) values ('2019-10-10 12:55:06', '1', '2019-10-10 12:55:06', '1');
insert into `users_settings` (`us_created_at`, `us_profil_id`, `us_updated_at`, `us_user_id`) values ('2019-10-10 13:08:45', '1', '2019-10-10 13:08:45', '4');
update `users_settings` set `us_profil_id` = '3', `us_updated_at` = '2019-10-10 13:09:11' where `us_user_id` = '1' and `us_profil_id` in ('1');
insert Into Fin;
