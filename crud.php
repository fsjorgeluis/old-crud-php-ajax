<?php
include "./config.php";
include_once "./operations.php";



$crudObj = new CrudOperations();
if ($_POST['operation'] == "saveData") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $image = $_POST['image'];
    
    $targetFolder = "/uploads/".$image;
    // TODO: get file and save to fileSystem
    // $image = $_FILES["image"]["name"];

    $dataId = $_POST['dataId'];

    $save = $crudObj->saveData($connection, $name, $address, $targetFolder, $dataId);
    if ($save){
        echo "saved";
    }
}

if ($_POST['operation'] == "getData") {
    $id = 1;
    $tableData = '';
    $allData = $crudObj->getAllData($connection);
    if ($allData->num_rows > 0) {
        while ($row = $allData->fetch_object()) {
            $tableData .= ' <tr>
                <td>'.$id.'</td>
                <td>'.$row->name.'</td>
                <td>'.$row->address.'</td>
                <td>'.$row->image.'</td>
                <td><a href="javaScript:void(0)" onclick="updateData(\''.$row->id.'\',\''.$row->name.'\',\''.$row->address.'\',\''.$row->image.'\');" class="btn btn-success btn-sm">Edit <i class="fa fa-pencil-square-o"></i></a>
                <a href="javaScript:void(0)" onclick="deleteData(\''.$row->id.'\');" class="btn btn-danger btn-sm">Delete <i class="fa fa-trash-o"></i></a>
                <i class="fa fa-spinner fa-spin" id="deleteSpinner'.$row->id.'" style="color: #ff195a;display: none"></i></td>
            </tr>';
            $id++;
        }
    }
    echo $tableData;
}

if ($_POST['operation'] == "deleteData") {
    $deleteId = $_POST['dataId'];
    $delete = $crudObj->deleteData($connection, $deleteId);
    if ($delete) {
        echo "deleted";
    }
}
