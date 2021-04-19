const numItemsToGenerate = 5; //how many gallery items you want on the screen
const numImagesAvailable = 310; //how many total images are in the collection you are pulling from
const imageWidth = 580; //image width in pixels
const imageHeight = 580; //image height in pixels
const collectionID = 167880; //the collection ID from the original url
const $galleryContainer = document.querySelector('.gallery-container');

function renderGalleryItem(randomNumber){
  fetch(`https://source.unsplash.com/collection/${collectionID}/${imageWidth}x${imageHeight}/?sig=${randomNumber}`) 
    .then((response)=> {    
      let galleryItem = document.createElement('div');
      galleryItem.classList.add('gallery-item');
      galleryItem.innerHTML = `
        <img class="gallery-image" src="${response.url}" alt="gallery image"/>
      `
      $galleryContainer.appendChild(galleryItem);
    })
}
for(let i=0;i<numItemsToGenerate;i++){
  let randomImageIndex = Math.floor(Math.random() * numImagesAvailable);
  renderGalleryItem(randomImageIndex);
}