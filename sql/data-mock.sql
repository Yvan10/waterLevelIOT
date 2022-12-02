SET search_path TO public, backpack;

-- Add any needed session variable to process mock data triggers if applicable (example) ...
-- set session "zephyrus.user_id" = 6; -- dtucker
-- set session "zephyrus.encryption_key" = 'A5PsBTYMlqvdaEcFYGwv0yu63Ry5Ckfd'; -- Developer value only
-- set session "zephyrus.encryption_settings" = 'cipher-algo=aes256, s2k-mode=1';

-- ##################################################################################################################
-- SPECIFIC MOCK DATA
-- ##################################################################################################################
\ir sql/mocks/products.sql;
