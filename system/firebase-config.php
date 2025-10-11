<?php
// Firebase Cloud Messaging configuration
// Use the legacy FCM HTTP endpoint for server key usage
// The correct endpoint is: https://fcm.googleapis.com/fcm/send
define('FIREBASE_SERVER_KEY', 'lmwN8dbiAsfJpSthTSVFRN5hOKwYwjFLmj_em66pAzk'); // Replace with your Firebase Server Key from Firebase Console
define('FIREBASE_API_URL', 'https://fcm.googleapis.com/fcm/send'); // Firebase legacy API URL
// Service account JSON file (for FCM HTTP v1). Path to your downloaded service account JSON
// define('FIREBASE_SERVICE_ACCOUNT_FILE', __DIR__ . '/../guitinnhan-fa6f8-845ca6fc49fc.json');
?>