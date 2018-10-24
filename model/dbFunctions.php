<?php
function addUser($username, $password, $role, $name, $surname, $email) {
    global $conn;
    try {
        $conn->beginTransaction(); //SQL transaction
        $newlogin = "INSERT INTO login(username, password, access_level) VALUES (:username, :password, :role)";
        $stmt = $conn->prepare($newlogin);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':role', $role);
        $stmt->execute();
        $lastLoginId = $conn->lastInsertId();

        $newuser = "INSERT INTO user(name, surname, email, login_id) VALUES (:name, :surname, :email, :loginId)";
        $stmt = $conn->prepare($newuser);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':surname', $surname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':loginId', $lastLoginId);
        $stmt->execute();
        $conn->commit();   
    }
    catch(PDOException $ex) { 
        $conn->rollBack();
        throw $ex;
    }
}

function addAuthorBook($name, $surname, $nationality, $yob, $yod, $bt, $ot, $yop, $genre, $sold, $lan, $cip, $actiontype, $userid, $date) {
    global $conn;
    try {
        $conn->beginTransaction(); //SQL transaction
        //step 1: insert into author table
        $newauthor = "INSERT INTO author(Name, Surname, Nationality, BirthYear, DeathYear) VALUES (:name, :surname, :nationality, :yob, :yod)";
        $stmt = $conn->prepare($newauthor);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':surname', $surname);
        $stmt->bindValue(':nationality', $nationality);
        $stmt->bindValue(':yob', $yob);
        $stmt->bindValue(':yod', $yod);
        $stmt->execute();
        $lastAuthorId = $conn->lastInsertId();
        //step 2: insert into book table
        $newbook = "INSERT INTO book(BookTitle, OriginalTitle, YearofPublication, Genre, MillionsSold, LanguageWritten, AuthorID, coverImagePath) VALUES (:bt, :ot, :yop, :genre, :sold, :lan, :authorId, :cip)";
        $stmt = $conn->prepare($newbook);
        $stmt->bindValue(':bt', $bt);
        $stmt->bindValue(':ot', $ot);
        $stmt->bindValue(':yop', $yop);
        $stmt->bindValue(':genre', $genre);
        $stmt->bindValue(':sold', $sold);
        $stmt->bindValue(':lan', $lan);
        $stmt->bindValue(':authorId', $lastAuthorId);
        $stmt->bindValue(':cip', $cip);
        $stmt->execute();
        $lastBookId = $conn->lastInsertId();
        //step 3: insert into edit record (log) table
        $newlog =  "INSERT INTO editrecord(userID, bookID, time, actionType) VALUES (:userid, :bookid, :date, :actiontype)";
        $stmt = $conn->prepare($newlog);
        $stmt->bindValue(':userid', $userid);
        $stmt->bindValue(':bookid', $lastBookId);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':actiontype', $actiontype);
        $stmt->execute();
        //step 4: commit the above 3 steps
        $conn->commit();   
    }
    catch(PDOException $ex) { 
        $conn->rollBack();
        throw $ex;
    }
}

function addBookOnly($bt, $ot, $yop, $genre, $sold, $lan, $authorId, $cip, $actiontype, $userid, $date) {
    global $conn;
    try {
        $conn->beginTransaction(); //SQL transaction
        //step 1: insert into book table
        $newbook = "INSERT INTO book(BookTitle, OriginalTitle, YearofPublication, Genre, MillionsSold, LanguageWritten, AuthorID, coverImagePath) VALUES (:bt, :ot, :yop, :genre, :sold, :lan, :authorId, :cip)";
        $stmt = $conn->prepare($newbook);
        $stmt->bindValue(':bt', $bt);
        $stmt->bindValue(':ot', $ot);
        $stmt->bindValue(':yop', $yop);
        $stmt->bindValue(':genre', $genre);
        $stmt->bindValue(':sold', $sold);
        $stmt->bindValue(':lan', $lan);
        $stmt->bindValue(':authorId', $authorId);
        $stmt->bindValue(':cip', $cip);
        $stmt->execute();
        $lastBookId = $conn->lastInsertId();
        //step 2: insert into edit record (log) table
        $newlog =  "INSERT INTO editrecord(userID, bookID, time, actionType) VALUES (:userid, :bookid, :date, :actiontype)";
        $stmt = $conn->prepare($newlog);
        $stmt->bindValue(':userid', $userid);
        $stmt->bindValue(':bookid', $lastBookId);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':actiontype', $actiontype);
        $stmt->execute();
        //step 3: commit the above 2 steps
        $conn->commit();   
    }
    catch(PDOException $ex) { 
        $conn->rollBack();
        throw $ex;
    }
}

function sanitise($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>