(function(){
    // all your code here
    var foo = async function() {



const getPosts = async () => {
    const response = await fetch('https://jsonplaceholder.typicode.com/posts');
    return await response.json();
   }

   const posts = await getPosts();

   console.log(posts);

// Registering Service Worker

if('serviceWorker' in navigator) {
	navigator.serviceWorker.register('sw-3.js');
}; 



var imagesToLoad = document.querySelectorAll('img[data-src]');
var loadImages = function(image) {
	image.setAttribute('src', image.getAttribute('data-src'));
	image.onload = function() {
		image.removeAttribute('data-src');
	};
};


if('IntersectionObserver' in window) {


	var observer = new IntersectionObserver(function(items, observer) {
		items.forEach(function(item) {
			if(item.isIntersecting) {

      
          loadImages(item.target);
          console.log('vista');
          observer.unobserve(item.target);
          // deja de ser obserbado
   
      }
		});
	});
	
	imagesToLoad.forEach(function(img) {
		observer.observe(img);
	});
}
else {
	imagesToLoad.forEach(function(img) {
		loadImages(img);
	});
}


    };
    
    window.onload = foo;
    // ...
  })();
  
  