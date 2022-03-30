<?php

// TODO: change operations to a more complex a secure methods
class CrudOperations
{
    public function saveData($connection,$name,$address,$image,$dataId)
    {
        if ($dataId == "") {
            $query = "INSERT INTO users SET name='$name',address='$address',image='$image'";
        }else{
            $query = "UPDATE users SET name='$name',address='$address',image='$image' WHERE id='$dataId'";
        }
        $result = $connection->query($query) or die("Error in saving data".$connection->error);
        return $result;
    }

    public function getAllData($connection)
    {
        $query = "SELECT * FROM users";
        $result = $connection->query($query) or die("Error in getting data".$connection->error);
        return $result;
    }

    public function deleteData($connection,$deleteId){
        $query = "DELETE FROM users WHERE id='$deleteId'";
        $result = $connection->query($query) or die("Error in deleting data".$connection->error);
        return $result;
    }
}
