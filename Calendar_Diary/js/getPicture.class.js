class Pictures {
    constructor(){
        this.numItemsToGenerate = 6; //how many gallery items you want on the screen
        this.numImagesAvailable = 10; //how many total images are in the collection you are pulling from
        this.imageWidth = 280; //image width in pixels
        this.imageHeight = 280; //image height in pixels
        this.collectionID = 167880; //the collection ID from the original url
        this.getUrl = 'https://api.unsplash.com/search/photos?query=mood&client_id=88-uXhpei7qqdv7lfwieCE1c3t-Bm79CvF4IGzyd86o&count=1';
        this.DOMelements = {
            galleryContainer : '.gallery-container',
        }
    }

    async renderGalleryItem(randomNumber){
        let galleryItem;
        return fetch(this.getUrl) 
        /* Putting the data in json format */
          .then((response) => response.json())
            .then((data)=> {    
      
              /* using the randomNumber variable to get a random image */
              let moodImage = data.results[randomNumber];
      
              /* Creating the div and class for the image */
              galleryItem = document.createElement('div');
              galleryItem.classList.add('gallery-item');
              
              /* Setting the src to the data's url */
              galleryItem.innerHTML = `
                <img id="${moodImage.id}" onclick="reply_click(this.id)" class="gallery-image" src="${moodImage.urls.regular}" alt="gallery image"/>`
              document.querySelector(this.DOMelements.galleryContainer).appendChild(galleryItem);
          })
      }

    async getRandom(){
        for(let i=0;i<this.numItemsToGenerate;i++){
            let randomImageIndex = Math.floor(Math.random() * this.numImagesAvailable);
            this.renderGalleryItem(randomImageIndex);
          }
    }
}
var num = 0;
let images = new Pictures();
var gallery = document.querySelector('.gallery-container');

if (num == 0) {
    num = 1;
    images.getRandom();
}

document.querySelector('#refreshBtn').addEventListener('click', function(){
    /* Deleting the images that are there */
    gallery.textContent = '';
    /* Getting new images with for loop */
    let images = new Pictures();
    images.getRandom();
    
})

function reply_click(clicked_id)
{
    document.getElementById("picSelect").setAttribute("value", clicked_id);
}