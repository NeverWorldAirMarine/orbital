<?php



class Staff_Directory 
{

	public function Display_Staff_List()
	{
		

echo"<div class='row'>";
 echo"<div class='col-lg-12'>";
 echo"<div class='panel panel-default'>";
 echo"<div class='panel-heading'>";
 echo"NeverWorld Aviation and Marine Member Directory";
 echo"</div>";
 echo"<!-- /.panel-heading -->";
echo" <div class='panel-body'>";
 echo"<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-course-listing'>";
 echo"<thead>";
 echo"<tr>";
 echo"<th>Rank Insignia</th>";
 echo"<th>Rank</th>";
 echo"<th>Name</th>";
 echo"<th>Title</th>";
 echo"<th>Division</th>";
 echo"</tr>";
 echo"</thead>";
 echo"<tbody>";
$stuff = $this->Query_Staff();
foreach( $stuff as $row )
{
    
    echo "<tr class='gradeC'><td>" . $row['RankLogo'] . "</td><td>" . $row['rname'] . "</td><td>" . $row['name'] . "</td><td>" . $row['tag_name'] . "</td><td>" . $row['dname'] . "</td></tr>";
}



 echo"</tbody>";
 echo"</table>";
 echo"<!-- /.table-responsive -->";
 echo"</div>";
 echo"<!-- /.panel-body -->";
 echo"</div>";
 echo"<!-- /.panel -->";
 echo"</div>";
 echo"<!-- /.col-lg-12 -->";
 echo"</div>";
 echo"<!-- /.row -->";

	}


	private function Query_Staff()
	{
	global $db;
	$result = mysqli_query( $db,"SELECT * FROM RankName" );


	return $result;

	}



}



?>
