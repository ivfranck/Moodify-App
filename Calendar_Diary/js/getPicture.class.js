class Pictures {
    constructor(alreadySelectedPics){
        this.numItemsToGenerate = 6; //how many gallery items you want on the screen
        this.numImagesAvailable = 10; //how many total images are in the collection you are pulling from
        this.imageWidth = 280; //image width in pixels
        this.imageHeight = 280; //image height in pixels
        this.collectionID = 167880; //the collection ID from the original url
        this.DOMelements = {
            galleryContainer : '.gallery-container',
        }
        this.pageNumPicNum = alreadySelectedPics; //prevent it from showing already shown pictures
    }

    async renderGalleryItem(randomNumber, randomPageNumber){
        let galleryItem;
        const url = 'https://api.unsplash.com/search/photos?page=' + randomPageNumber + '&orientation=portrait&per_page=30&query=mood&client_id=88-uXhpei7qqdv7lfwieCE1c3t-Bm79CvF4IGzyd86o&count=1';
        return fetch(url)
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
            let pageNumber = Math.floor(Math.random() * 30);

            const imageIndexPageNum = randomImageIndex.toString() + pageNumber.toString();

            if (!this.pageNumPicNum.includes(imageIndexPageNum)){
                this.pageNumPicNum.push(imageIndexPageNum);
                await this.renderGalleryItem(randomImageIndex, pageNumber);
            }
            else {
                i--;
            }
          }
    }
}

var num = 0;
alreadySelectedPics = [];
let images = new Pictures(alreadySelectedPics);
var gallery = document.querySelector('.gallery-container');

if (num == 0) {
    num = 1;
    images.getRandom();
}
var alreadyShownPictures = images.pageNumPicNum;
document.querySelector('#refreshBtn').addEventListener('click', function(){
    /* Deleting the images that are there */
    gallery.textContent = '';
    /* Getting new images with for loop */
    let images = new Pictures(alreadyShownPictures);
    images.getRandom();
    
})
/*
function reply_click(clicked_id)
{
    document.getElementById("picSelect").setAttribute("value", clicked_id);
}

 */
function reply_click(clicked_id)
{
    var selected_image = "";
    if(selected_image !== clicked_id){
        selected_image = clicked_id
    }
    document.getElementById("picSelect").value = selected_image;
}

