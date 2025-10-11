// firebase-messaging-sw.js
importScripts('https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging-compat.js');

// ✅ Cấu hình Firebase
firebase.initializeApp({
  apiKey: "AIzaSyDjlbWhhbc4k6GSiUipA0cNP_iweb8bMI8",
  authDomain: "guitinnhan-fa6f8.firebaseapp.com",
  projectId: "guitinnhan-fa6f8",
  messagingSenderId: "144568563845",
  appId: "1:144568563845:web:e7f5e235c81a46afab11ec"
});

const messaging = firebase.messaging();

// ✅ Lắng nghe tin nhắn khi web bị tắt (background)
messaging.onBackgroundMessage(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);

  const notificationTitle = payload.notification?.title || "Thông báo mới";
  const notificationOptions = {
    body: payload.notification?.body || "Bạn có thông báo mới.",
    icon: '/favicon.ico',
    data: {
      url: payload.notification?.click_action || '/' // lưu đường dẫn để mở khi click
    }
  };

  self.registration.showNotification(notificationTitle, notificationOptions);
});

// ✅ Xử lý khi người dùng bấm vào thông báo
self.addEventListener('notificationclick', function(event) {
  console.log('Notification click Received:', event.notification.data.url);
  event.notification.close();

  // Mở trang tương ứng
  event.waitUntil(
    clients.matchAll({ type: 'window' }).then(function(clientList) {
      for (const client of clientList) {
        if (client.url === event.notification.data.url && 'focus' in client)
          return client.focus();
      }
      if (clients.openWindow)
        return clients.openWindow(event.notification.data.url);
    })
  );
});
