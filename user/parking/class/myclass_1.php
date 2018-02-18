<?php
function connection_open()
{
    mysql_connect("localhost", "root","")or die(mysql_error());
    mysql_select_db("parking")or die(mysql_error());
}

