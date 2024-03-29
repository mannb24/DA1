<?php

function Get_Bank()
{
    $sql = "SELECT * From bank";
    return pdo_query_one($sql);
}

?>