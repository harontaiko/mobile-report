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

//verify mail and token
function verifyTokenAndmail($table, $email, $db)
{
  $query = "SELECT * FROM " . $table . " WHERE email=?";

  $stmt = $db->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();

  return $stmt;
}