const CACHE_NAME = "registro-discapacidad-v1";

const urlsToCache = [
  "./",
  "./index.html",
  "./manifest.json",
  "./img/escudo.jpg",
  "./img/gt.jpg",
  "./img/portada-3.jpg",
  "./img/registro.png",
  "./video/video1.mp4"
];

// INSTALACIÓN
self.addEventListener("install", event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => cache.addAll(urlsToCache))
  );
});

// ACTIVACIÓN
self.addEventListener("activate", event => {
  event.waitUntil(
    caches.keys().then(keys =>
      Promise.all(
        keys.map(key => {
          if (key !== CACHE_NAME) {
            return caches.delete(key);
          }
        })
      )
    )
  );
});

// FETCH (OFFLINE)
self.addEventListener("fetch", event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => response || fetch(event.request))
  );
});
