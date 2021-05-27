# Moodify App

Inspiration Lab Project

### Features:

Moodify is a mood-tracking web application with features such as:

- Diary entry
- Sleep tracker
- Music recommendation (Spotify)
- Monthly mood overview

---

### Code:

With a clearer idea of this web application's purpose, it should be less troubling to understand the code.
The [authentication](https://github.com/ivfranck/Moodify-App/tree/main/authentication) folder stores all connection related files i.e login system files. The login system takes different error cases into account such as invalid usernames (syntax wise), already taken usernames, and invalid login credentials which are all stored in the [includes](https://github.com/ivfranck/Moodify-App/tree/main/authentication/includes) folder.

**Verifying for correct username format:**

Using _preg_match()_ along with regular expressions was the best option for verifying the inputed username format. If any character other than letters are used in the username, the app will add an error message in the url which is later used to notify the user to re-enter a proper username.

```
function invalidUid($userid){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $userid)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
```

```
if(isset($_GET["error"])){
                    if($_GET["error"] == "invalidUid"){
                        echo "<p>Choose a proper username!</p>";
                    }
```

---

_PHP_ prepared statements (_mysqli_stmt_) was used for connecting to the database and running sql queries for the purpose of making the code more efficient.

```
$stmt = mysqli_stmt_init($conn);
```

Instead of using _md5()_ for password hashing, php's password hash was used as it gives a safer password encryption algorithm.

**Hashing the password:**

```
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
```

**Verifying the password:**

```
$checkpass = password_verify($password, $passhashed);
```

We used php's _$\_SESSION_ to keep track of which user is online. We added a _session_start()_ on the site's header, which will be used on all pages. This makes it easier to keep track of the user's activity and data.

---
### Spotify API
The [Spotify API](js/Spotify API/Spotify_class.js) was used to recommend music to the user daily. For this to be possible, it is critical to have a client id and client secret, which are acquired upon creation of an app on Spotify.
With these credentials, you need to send a POST request to Spotify along with their specified headers and body:
```
const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/x-www-form-urlencoded',
                'Authorization' : 'Basic ' + btoa(this.clientId + ':' + this.clientSecret)
            },
            body: 'grant_type=client_credentials'
        });
```
This then provides the required **access token** which is needed to access data from the Spotify API.
The whole procedure for authorization can be found directly on [Spotify's developer section](https://developer.spotify.com/documentation/general/guides/authorization-guide/).

Once access is granted, you can use the requested access token to find whatever you want. This access token was kept in a hidden html tag.
When kept on the html page, it helps reduce the amounts of requests we send to the Spotify server, so instead of constantly requesting for an access
token, we can just reuse the already requested stored one:
```
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
```
For this project, we needed to extract playlists from the **mood** category.
We specified the type of playlists we need by setting keywords which will check if a particular keyword in the array is contained in the name of a playlist:

```
// use keywords to get relevant playlists
const keywords = ["happy", "positive", "good"];
```

When found, we stored them in an object. This allows easy access to the name and id of that particular playlist later in the code:
```
const playlists = {};
const playlistsJson = jsonData.playlists.items;

for (let i = 0; i < keywords.length; i++){
    for (let j = 0; j < playlistsJson.length; j++){
        if (playlistsJson[j].name.toLowerCase().includes(keywords[i])){
            playlists[playlistsJson[j].name] = playlistsJson[j].id;
        }
    }
}
```

From there, we selected a random playlist from the object and extracted all its contained tracks.

**Saving the track name to the database:**

Once we have the details of the recommended track, we need to store it in the database. To do this we used ajax since the track details are stored in a JS variable. This was sent through a **POST** method to a PHP file where it will be processed and sent
to the database:
```
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
```

The [dataStorage.php ](includes/dataStorage.php) file contains all functions that sends over the user's data (from dairy entries) to the database.


### Calendar Class:
On load the year, month and day are initialized using the date() method to show today’s date or GET method if the user has navigated to another month/year.

#### Functions:
show() : This function uses the month and year either with date() method or GET method to create a navigation bar and the calendar with the days of the month. Then it uses the other private function to get the days in the month and loops over it to create divs for that month.

*** _createNavi() : ***Will create the Prev and Next buttons to change the months.

*** _daysInMonth() : *** Gets the number of days in a given month.

### Db Class:
This class is responsible for the connection when the Diary class needs new entries (for another month). 
 connect(): Using the private attributes it creates the connection using PDO extension and specifies to fetch an association array.

### Query Class:
This extends to the Db class and is responsible for handling the SQL query.
getQuery(): This function takes the month number, year number, and user ID to fetch all diary data of this user for the specified month and year.

### Diary Class:
This class extends to the Query class and handles sending the database query using the Query class and then displaying the data with a loop.
display(): $year and $month are set either with the date() method or with a GET method.
$diaryContent holds the array. A loop is created using a calculation of the days of month using the $month and $year variables. 
$diaryContent has a variable for the day of the month the diary entry was created- this day is compared with $i in the loop- if it exists a page is created for the diary entry. 
If it does not exist, an if statement checks to see if $i = $today ($today being today’s date), if it is a match then the form page is created else a ‘No Entry for this day’ page is created instead.

The HTML is stored in $content and then displayed on the main page using display().

