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

With a clearer idea of what this web application's purpose, it should be less troubling to understand the code.
The [authentication](https://github.com/ivfranck/Moodify-App/tree/main/authentication) folder stores all connection related files i.e login system files. The login system takes different error cases into account such as invalid usernames (syntax wise), already taken usernames, and invalid login credentials which are all stored in the [includes](https://github.com/ivfranck/Moodify-App/tree/main/authentication/includes) folder.

**Verifying for correct username format**
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

The use of php prepared statements (_mysqli_stmt_) was used for connecting to the database and running sql queries for the purpose of making the code more efficient.

```
$stmt = mysqli_stmt_init($conn);
```

Instead of using _md5()_ for password hashing, php's password hash was used as it gives a safer password encryption algorithm.

**Hashing the password:**

```
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
```

**Verifying the password**

```
$checkpass = password_verify($password, $passhashed);
```

We used php's _$\_SESSION_ to keep track of which user is online. We added a _session_start()_ on the site's header, which will be used on all pages. This makes it easier to keep track of the user's activity and data.
