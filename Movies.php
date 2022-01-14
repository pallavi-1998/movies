<?php

function Insert()
{
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'media';
    $conn = mysqli_connect($server,$user,$password,$db);
    if($conn){
        print("Connection Successful\n\n");
    }else {
        print("No Connection\n");
    }
    $title= readline('enter title of the movie: ');
    $actor=readline('Enter actor name: ');
    $actress=readline('Enter actress name: ');
    $year=readline('Enter year: ');
    $director=readline('Enter Director name: ');
    $sql = "insert into movies(name,year,actor,actress,director) values('$title',$year,'$actor','$actress','$director')";
//    $query = mysqli_query($conn,$sql);
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . $conn->error;
    }
    $conn->close();
}

function show(){
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'media';
    $conn = mysqli_connect($server,$user,$password,$db);
    if($conn){
        print("Connection Successful\n\n");
    }else {
        print("No Connection\n");
    }

    $sql = "select * from movies";
    $ret = mysqli_query($conn,$sql);
    print("ID\tName\tYear\t\tActor\t\tActress\t\tDirector\n- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -\n");
    if ($ret){
        while ($row = mysqli_fetch_row($ret)) {
            printf ("%s\t%s\t%s\t%s\t\t%s\t\t%s\n", $row[0], $row[1],$row[2],$row[3],$row[4],$row[5]);
        }
        mysqli_free_result($ret);
    }

}

function update()
{
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'media';
    $conn = mysqli_connect($server,$user,$password,$db);
    if($conn){
        print("Connection Successful\n\n");
    }else {
        print("No Connection\n");
    }

    $id = readline('Enter the movie ID corresponding record you want to update: ');
    $new_name = readline('enter new name of the movie: ');
    $sql = "update movies SET name='$new_name' where id=$id";
    $query = mysqli_query($conn,$sql);
    if($query){
        print('Record Updated!\n');
    }
    else{
        print('Record not Updated!\n');
    }

    $conn->close();
}

function delete()
{
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'media';
    $conn = mysqli_connect($server,$user,$password,$db);
    if($conn){
        print("Connection Successful\n\n");
    }else {
        print("No Connection\n");
    }

    $ID = readline('enter ID to delete the record: ');

    $sql = "delete from movies where id='$ID'";

    if($conn->query($sql)===true)
        print ("record deleted");
    else
        print ("record not deleted");
}


print('movies record database!');
while(1){
    print("\n1. Add record\n2. delete record\n3. update record\n4. view record\n5.exit\n");
    $in =readline('enter the operation: ');
    if($in == 1)
        Insert();
    if($in == 2)
        delete();
    if($in == 3)
        update();
    if($in == 4)
        show();
    if($in==5)
        break;
}
print ("Exited");
?>