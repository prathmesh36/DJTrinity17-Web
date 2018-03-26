<?php
if(@mysql_connect('localhost','','') && @mysql_select_db('quiz'))
{
}
else
{
echo die('<b style="color:red;">Database Error-:The Sever is Not Connected Please Visit Later</b>');
}
?>