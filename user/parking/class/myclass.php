<?php
function connection_open()
{
    mysql_connect("localhost", "dcitsol1_dcweb","dc4web@123")or die(mysql_error());
    mysql_select_db("dcitsol1_ecommerce") or die(mysql_error());
}

