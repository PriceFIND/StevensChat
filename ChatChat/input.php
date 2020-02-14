<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="/get.php" method="get">
  User name:<br>
  <input type="text" name="firstname" value="Mickey">
  <br>
  ChatRoomNumber:<br>
  <input type="text" name="chatNum" value="7">
  <br>
  Message:<br>
  <input type="text" name="Message" value="Hey People">
  <br>
  <br>
  <input type="submit" value="Submit get">
</form> 

<form action="/post.php" method="post">
  User name:<br>
  <input type="text" name="uName" value="Mickey">
  <br>
  ChatRoomNumber:<br>
  <input type="text" name="chatNum" value="7">
  <br>
  Message:<br>
  <input type="text" name="message" value="Hey People">
  <br>
  <br>
  <input type="submit" value="Submit post">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/post.php".</p>

</body>
</html>
