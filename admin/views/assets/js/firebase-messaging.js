// Firebase initialization
const firebaseConfig = {
    // Replace with your Firebase config from Firebase Console
    apiKey: "AIzaSyDjlbWhhbc4k6GSiUipA0cNP_iweb8bMI8",
    authDomain: "guitinnhan-fa6f8.firebaseapp.com",
    projectId: "guitinnhan-fa6f8",
    messagingSenderId: "144568563845",
    appId: "1:144568563845:web:e7f5e235c81a46afab11ec"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

// Register service worker and get token
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('../firebase-messaging-sw.js')
    .then(function(registration) {
        console.log('Service worker registered:', registration);

        // Request permission and get token (VAPID key required for WebPush)
        Notification.requestPermission().then(function(permission) {
            if (permission === 'granted') {
                // Replace with your public VAPID key from Firebase console
                const vapidKey = 'BMAv2MQcF_WPYjGrSS7WzpBcVT__kyO62DknsF7sLWc_lJjx6Cjvhf0F9oEp5_8MkbYrQjkSlcal-6ByeH8axrc';
                messaging.getToken({vapidKey: vapidKey, serviceWorkerRegistration: registration})
                .then((currentToken) => {
                    if (currentToken) {
             
                        fetch('?ctrl=TokenApi&act=save', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({ fcm_token: currentToken })
                        }).then(r=>r.json()).then(console.log).catch(console.error);
                    } else {
                        console.log('No registration token available. Request permission to generate one.');
                    }
                }).catch((err) => {
                    console.log('An error occurred while retrieving token. ', err);
                });
            } else {
                console.log('Notification permission not granted');
            }
        });

        // Handle foreground messages
        messaging.onMessage((payload) => {
            console.log('Message received. ', payload);
            const { title, body } = payload.notification || {};
            if (title) {
                const notification = new Notification(title, {
                    body: body || '',
                    icon: '/favicon.ico'
                });
                notification.onclick = function(event) {
                    event.preventDefault();
                    window.open('?ctrl=order', '_blank');
                };
            }
        });

    }).catch(function(err) {
        console.error('Service worker registration failed:', err);
    });
} else {
    console.warn('Service workers are not supported in this browser.');
}