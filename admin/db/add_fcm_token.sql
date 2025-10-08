-- Add FCM token column to admin table
ALTER TABLE admin ADD COLUMN fcm_token VARCHAR(255) DEFAULT NULL;