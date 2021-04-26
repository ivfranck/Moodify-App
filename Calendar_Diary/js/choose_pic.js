const numItemsToGenerate = 6; //how many gallery items you want on the screen
const numImagesAvailable = 10; //how many total images are in the collection you are pulling from
const imageWidth = 280; //image width in pixels
const imageHeight = 280; //image height in pixels
const collectionID = 167880; //the collection ID from the original url
const $galleryContainer = document.querySelector('.gallery-container');

/* num to determine if the browser is refreshed */
num = 0
/* API to fetch data from */
getUrl = 'https://api.unsplash.com/search/photos?query=mood&client_id=88-uXhpei7qqdv7lfwieCE1c3t-Bm79CvF4IGzyd86o&count=1'



function renderGalleryItem(randomNumber){
  return fetch(getUrl) 
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
        $galleryContainer.appendChild(galleryItem);
    })
}

/* Getting more images with the API when the refresh button is clicked */
document.querySelector('#refreshBtn').addEventListener('click', function(){
  /* Setting num to 1 so browser doesn't get images automatically */
    num = 1;
    /* Deleting the images that are there */
    $galleryContainer.textContent = '';
    /* Getting new images with for loop */
    for(let i=0;i<numItemsToGenerate;i++){
        let randomImageIndex = Math.floor(Math.random() * numImagesAvailable);
        renderGalleryItem(randomImageIndex);
      }
})

/* Function to get the images when browser is first loaded */
function getFirstImages(){
    for(let i=0;i<numItemsToGenerate;i++){
        let randomImageIndex = Math.floor(Math.random() * numImagesAvailable);
        console.log(i)
        renderGalleryItem(randomImageIndex);
      }
}

/* Checking to see if browser is loaded */
if (num == 0){
    getFirstImages();
}

/* Getting the image ID from the API */
function reply_click(clicked_id)
{
    document.getElementById(clicked_id).style.border = "solid 2px black";
    document.getElementById("#picSelect").value = clicked_id;
}
    


