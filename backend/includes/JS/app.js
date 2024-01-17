if ('serviceWorker' in navigator && 'PushManager' in window) {
    navigator.serviceWorker.register('service-worker.js')
      .then(function(registration) {
        console.log('Service Worker registered with scope:', registration.scope);
      })
      .catch(function(error) {
        console.error('Service Worker registration failed:', error);
      });
  
    navigator.serviceWorker.ready.then(function(serviceWorkerRegistration) {
      serviceWorkerRegistration.pushManager.subscribe({ userVisibleOnly: true })
        .then(function(subscription) {
          console.log('User subscribed:', subscription);
        })
        .catch(function(error) {
          console.error('Subscription failed:', error);
        });
  
      serviceWorkerRegistration.pushManager.getSubscription()
        .then(function(subscription) {
          if (subscription) {
            console.log('User is currently subscribed:', subscription);
          } else {
            console.log('User is not subscribed.');
          }
        })
        .catch(function(error) {
          console.error('Error getting subscription state:', error);
        });
    });
  }
  // node js server required --> bergthaler-ict.nl