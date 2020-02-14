<?php

$mysqli=new mysqli("localhost","chatMan","sevendigits","gochatty");

//put sql code in here
$result=$mysqli->query("
SELECT chat_messages.message, user_names.name AS 'user name', 
	chat_rooms.name_of_room AS 'room'
FROM chat_messages
       INNER JOIN user_names ON
       chat_messages.sender = user_names.ID
      INNER JOIN chat_rooms ON
      chat_messages.room = chat_rooms.ID
");

$result_count = $mysqli->field_count;

//the begining of the html page source
$html="
<html>
	<head>
	</head>
	<body>
	<table>
		<tr>
			<td><b>Message</b></td>
			<td><b>User</b></td>
			<td><b>Room</b></td>
		</tr>
";
//a little break to do some loopy loops in php, it'll make the rest of the rows
while($row=$result->fetch_array()){
	$html.="<tr>"; //add html inline with php code! behold the magics!
	for($i=0; $i<$result_count; $i++){
		$html.="<td>".$row[$i]."</td>"    ; //i missed a closing quote, see line 36
		//i'm just guessing here but it seems like the "." appends the string
	}
	$html.="</tr>"; //this is oddly bold? the odd bold was a missing close quote from line 33.
}

//done with the php code stuff, time to end the html file
$html.="
		</table>	
	</body>
</html>
";

//and the line that sends the html to the page:
echo $html;

?>