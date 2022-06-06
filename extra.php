<form action="" enctype="multipart/form-data" method="post">
        <input type="file" name="txtFile" id="eskal"  /></br>
        <input type="submit" name="Import" value="Update Database" /> </b>
</form>
<?php
if(isset($_POST["Import"]))
{
$host="localhost"; // Host name.
$db_user="root";
$db_password="";
$db='test'; // Database name.
$conn=mysql_connect($host,$db_user,$db_password) or die (mysql_error());
mysql_select_db($db) or die (mysql_error());

echo $filename=$_FILES["file"]["tmp_name"];
echo $ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));


 if($_FILES["file"]["size"] > 0)
 {

  $file = fopen($filename, "r");
  while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
  {
   // You can compare your data inside this while loop as well as above the while loop.
   print_r($emapData);
   $sql = "INSERT into import(name,address,email,password) values('$emapData[0]','$emapData[1]')";
   mysql_query($sql);
 }
         fclose($file);
         echo "CSV File has been successfully Imported";
 }
 else
 echo "Invalid File:Please Upload CSV File";

}
?>