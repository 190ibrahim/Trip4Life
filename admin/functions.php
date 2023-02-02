<?php
// This function counts the number of rows in a given table. It takes the name of the table
// as an argument and returns the number of rows in that table.
function count_rows($table)
{
    global $pdo;
    $query = "SELECT * FROM $table";
    $result = $pdo->prepare($query);
    $result->execute();

    return $result->rowCount();
}


// This function executes a given database query and returns the number of rows returned by the query.
// It can be used to count the number of rows that match a certain criteria.
function getRowCount($query)
{
    global $pdo;
    $result = $pdo->prepare($query);
    $result->execute();
    return $result->rowCount();
}
