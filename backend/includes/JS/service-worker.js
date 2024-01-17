self.addEventListener('push', function(event) {
    const options = {
      body: event.data.text(), // extract the text payload from the push message
      icon: 'test.png', // set the notification icon
    };
  
    event.waitUntil(
      self.registration.showNotification('Push Notification', options)
    );
  });
  
  self.addEventListener('notificationclick', function(event) {
    event.notification.close(); // Close the notification when clicked
    // Add custom logic to handle the click event, e.g., open a new window or navigate to a specific page
  });
  