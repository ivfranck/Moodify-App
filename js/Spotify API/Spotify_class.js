class SpotifyAPI {
    constructor() {
        this.clientId = '2b4f0820988f4612840cb95cd602e966';
        this.clientSecret = 'ba50df53907a43c0a144b32c1aa3c435';
        this.DOMElements = {
            userSessionId: '#userId',
            buttonSubmit: '#btn_submit',
            divSongDetail: '#song-detail',
            htmlToken: '#hidden_token',
            divSonglist: '.song-list'
        };
        this.playlistName;
        this.playlistId;
        this.trackImage;
        this.trackName;
        this.trackArtist;
        this.trackId;

    }

    // request token to access spotify data
    async getToken(){
        const url = 'https://accounts.spotify.com/api/token';
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/x-www-form-urlencoded',
                'Authorization' : 'Basic ' + btoa(this.clientId + ':' + this.clientSecret)
            },
            body: 'grant_type=client_credentials'
        });

        const jsonData = await response.json();

        return jsonData.access_token;
    }

    // get playlist from spotify
    async getPlaylist(token){
        let limit = '50';
        const url = 'https://api.spotify.com/v1/browse/categories/mood/playlists?country=BE&limit=' + limit;
        const response = await fetch(url, {
            method: 'GET',
            headers: { 'Authorization' : 'Bearer ' + token}
        });

        // use keywords to get relevant playlists
        const keywords = ["happy", "positive", "good"];
        const jsonData = await response.json();
        const playlists = {};
        const playlistsJson = jsonData.playlists.items;

        for (let i = 0; i < keywords.length; i++){
            for (let j = 0; j < playlistsJson.length; j++){
                if (playlistsJson[j].name.toLowerCase().includes(keywords[i])){
                    playlists[playlistsJson[j].name] = playlistsJson[j].id;
                }
            }
        }
        // return object with playlist names and their respective ids
        return playlists;
    }


    async getTracks(token, playlistIDs){
        // get random playlist with it's id
        const playlistNames = [];
        let element;
        for (element in playlistIDs){playlistNames.push(element);}
        const randomIndex = Math.floor((Math.random() * playlistNames.length));
        const playlistNameSelector = playlistNames[randomIndex];
        const playlistID = playlistIDs[playlistNameSelector];

        // save selected playlist name and id
        this.playlistName = playlistNameSelector;
        this.playlistId = playlistID;

        // get the first 10 tracks from playlist
        let limit = '10';
        const url = 'https://api.spotify.com/v1/playlists/' + playlistID + '/tracks?limit=' + limit;
        const response = await fetch(url, {
            method: 'GET',
            headers: { 'Authorization' : 'Bearer ' + token}
        });

        // return json object of tracks
        return await response.json();
    }

    // get tracks from return object from getTracks()
    async getTrackList(data){
        // get and return track name and id
        const tracks2 = {};
        const tracksJson = data.items;
        tracksJson.forEach(element => tracks2[element.track.name] = element.track.id);

        return tracks2;
    }

    // get relevant track details
    async getTrackInfo(data){
        // select a random track
        const tracksJson = data.items;
        const trackSelector = Math.floor((Math.random() * 10));
        const track = tracksJson[trackSelector];

        // get and return the track's details
        this.trackImage = track.track.album.images[0].url;
        this.trackName = track.track.name;
        this.trackArtist = track.track.artists[0].name;
        this.trackId = track.track.id;
        return [this.trackImage, this.trackName, this.trackArtist, this.trackId];
    }

    // display all tracks on html page
    createTrack(name, id) {
        const html = `<a href="https://play.spotify.com/track/${id}" target="_blank" rel="noopener noreferrer" class="list-group-item list-group-item-action list-group-item-light" id="${id}">${name}</a>`;
        document.querySelector(this.DOMElements.divSonglist).insertAdjacentHTML('beforeend' ,html);
    }

    // create track card with it's details
    createTrackDetail(img, title, artist, id) {

        const detailDiv = document.querySelector(this.DOMElements.divSongDetail);
        detailDiv.innerHTML = '';

        const html =
            `
            <div class="row col-sm-12 px-0">
                <h2>Recommended track:</h2>
                <img onclick="window.open('https://play.spotify.com/track/${id}', '_blank')" src="${img}" id="${id}" style="cursor:pointer;" alt="Track card">        
            </div>
            <div class="row col-sm-12 px-0">
                <label class="form-label col-sm-12">${title}</label>
            </div>
            <div class="row col-sm-12 px-0">
                <label class="form-label col-sm-12">By ${artist}</label>
            </div> 
            `;

        detailDiv.insertAdjacentHTML('beforeend', html)
    }

    // store token in a hidden html field to reuse when needed
    storeToken(value) {
        document.querySelector(this.DOMElements.htmlToken).value = value;
    }

    // get the hidden stored token
    getStoredToken() {
        return {
            token: document.querySelector(this.DOMElements.htmlToken).value
        }
    }

    // transfer track name to php using ajax
    transferTrackName(){
        const userid = document.querySelector(this.DOMElements.userSessionId).value;
        const trackDetails = this.trackName + " - " + this.trackArtist + "," + this.trackId + "," + userid;
        $.ajax({
            url: "/../includes/dataStorage.php",
            method: "post",
            data: {track : JSON.stringify(trackDetails)},
            success: function(res2){
                console.log(res2);
            }
        })
    }

    // to run all functions in order
    async loadApp(){
        // get token
        const token = await this.getToken();

        // store the token in hidden html field
        this.storeToken(token);

        // use stored token to run the functions that require a token
        const playlists = await this.getPlaylist(this.getStoredToken().token);
        const tracks = await this.getTracks(this.getStoredToken().token, playlists);
        const trackNames = await this.getTrackList(tracks);

        // header showing the playlist's name
        const htmlHeader = `<h2>Top 10 from: <a href="https://open.spotify.com/playlist/${this.playlistId}" target="_blank" rel="noopener noreferrer">${this.playlistName}</a></h2>`;
        document.querySelector(this.DOMElements.divSonglist).insertAdjacentHTML('afterbegin' ,htmlHeader);

        for (const track in trackNames){
            this.createTrack(track, trackNames[track]);
        }
        const trackDetails = await this.getTrackInfo(tracks);
        this.createTrackDetail(trackDetails[0], trackDetails[1], trackDetails[2], trackDetails[3]);
        this.transferTrackName();

    }

}

let run = new SpotifyAPI();

var runButton = document.getElementById("btn_submit");
runButton.addEventListener('click', function(){
    run.loadApp();
})