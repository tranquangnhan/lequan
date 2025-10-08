importScripts('https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging-compat.js');

const firebaseConfig = {
    // Replace with your Firebase config from Firebase Console
    apiKey: "AIzaSyDjlbWhhbc4k6GSiUipA0cNP_iweb8bMI8",
    authDomain: "guitinnhan-fa6f8.firebaseapp.com",
    projectId: "guitinnhan-fa6f8",
    messagingSenderId: "144568563845",
    appId: "1:144568563845:web:e7f5e235c81a46afab11ec"
};

firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  const notificationTitle = payload.notification.title;
  const notificationOptions = {
    body: payload.notification.body,
    icon: '/favicon.ico'
  };

  self.registration.showNotification(notificationTitle, notificationOptions);
});