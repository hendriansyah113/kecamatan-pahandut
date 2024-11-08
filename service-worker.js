self.addEventListener('install', (event) => {
    console.log('Service Worker installing.');
    event.waitUntil(
      caches.open('my-cache').then(async (cache) => {
        const urlsToCache = [
          '/kecamatan/',
          '/kecamatan/index.php',
          '/kecamatan/css/style.css',
          '/kecamatan/js/app.js',
          '/kecamatan/images/logo192.jpg',
          '/kecamatan/images/logo512.png',
        ];
        
        for (const url of urlsToCache) {
          try {
            const response = await fetch(url);
            if (response.ok) {
              await cache.put(url, response);
              console.log(`File ${url} berhasil dicache`);
            } else {
              console.error(`Gagal mencache ${url}: HTTP status ${response.status}`);
            }
          } catch (error) {
            console.error(`Gagal mencache ${url}:`, error);
          }
        }
      })
    );
  });
