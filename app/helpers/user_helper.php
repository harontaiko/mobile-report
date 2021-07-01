<?php
/**
* reset token
*/
function ResetToken($table, $id, $newTokenVal, $db)
{
$query = "UPDATE " . $table . " SET reset_link=? WHERE user_id=?";

$stmt = $db->prepare($query);
$stmt->bind_param("ss", $newTokenVal, $id);
$stmt->execute();

return $stmt;
}