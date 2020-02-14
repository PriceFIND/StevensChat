<html>
<body>

<?php

$mysqli=new mysqli("localhost","chatMan","sevendigits","gochatty"); 

//get username first
$user = $_POST["uName"];

$result=$mysqli->query("
SELECT `ID` FROM `user_names` WHERE `name` = '$user' 
");
$fetch_result = mysqli_fetch_assoc($result);

//then post to database

$sql = "
INSERT INTO `chat_messages` 
(`time_date`, `message`, `sender`, `room`, `emojis`, `ID`) 
VALUES (current_timestamp(), ?, ?, ?, ?, ?);
"; //the ?'s are sorts of variable places, and we want the database to do the timestamp by it's self. 

//the bind_param needs variable names
$emoji = '';
$nada = NULL;
$stmt = $mysqli->prepare($sql,); 

$stmt->bind_param("sssss", $_POST["message"], $fetch_result["ID"], $_POST["chatNum"], $emoji, $nada);

$stmt->execute();

//okay now let's get the names of the users and the rooms

?>

Welcome <?php echo $user; ?><br>
the ChatROOM is: <?php echo $_POST["chatNum"]; ?><br>
Your message is: <?php echo $_POST["message"]; ?><br>

</body>
</html>