<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db = "mba_reports";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$dataArr = [];
$displayDataArr = [];
// Perform query
if ($result = $conn -> query("SELECT `id`, `first_name`, `last_name`, `email`, `comment`, `datetime` FROM  enquiries ORDER BY `datetime` DESC")) {
    $tpmChkArr = [];
    while ($row = $result->fetch_assoc())
    {   
        array_push($dataArr, $row);
        foreach($row as $value) {
            if(!in_array(($row['first_name']." ".$row['last_name']), $tpmChkArr)){
                array_push($tpmChkArr, ($row['first_name']." ".$row['last_name']) );
                $displayDataArr[] = (object) [
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'email' => $row['email'],
                    "enquiries"=> []
                ];                 
            }
        }
    }

    foreach($dataArr as $itm) {
        foreach($displayDataArr as $key => $dItm){
            if(($itm['first_name']." ".$itm['last_name'])  == ($dItm->first_name." ".$dItm->last_name) ){
                $displayDataArr[$key]->enquiries[] = (object) [
                    'comment' => $itm['comment'],
                    'datetime' => $itm['datetime']
                ];  
            }

        }
    }
    
    // Free result set
    $result -> free_result();
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBA Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .content-section{
            padding: 30px;
        }
		@media only screen and (max-width: 600px) {
			.content-section{
				padding: 30px 15px;
			}
		}
		.enquiry-table{
			width: 100%;
		}
		.child-row, .collapse {
			-webkit-transition: all .3s linear 0s;
			transition: all .3s linear 0s;	
		}
		body::-webkit-scrollbar {
		  width: 0.3em;
		}
		 
		body::-webkit-scrollbar-track {
		  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
		}
		 
		body::-webkit-scrollbar-thumb {
		  background-color: darkgrey;
		  outline: 1px solid slategrey;
		}

    </style>
</head>

<body>
    <!-- Header section start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">GUS Education</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">MBA Report<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
		
    </nav>
    <!-- Header section ends -->
    <!-- content section start -->
	<section class="container">
		<div class="row">
			<div class="content-section col-sm-12">
				<table class="table table-bordered table-responsive-sm enquiry-table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">First</th>
							<th scope="col">Last</th>
							<th scope="col">Email</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(count($displayDataArr) > 0){
								foreach($displayDataArr as $k=> $v){
									?>
									<tr id="parent_<?php echo $k+1; ?>">
										<th scope="row"><?php echo $k+1; ?></th>
										<td onclick="showChild(<?php echo $k+1; ?>)" style="cursor: pointer;"><?php echo $v->first_name; ?></td>
										<td><?php echo $v->last_name;  ?></td>
										<td><?php echo $v->email;  ?></td>
									</tr>
									<tr class="child-row collapse" id="child_<?php echo $k+1; ?>">
										<td></td>
										<td colspan="3">
											<table class="table table-striped">
												<thead>
													<tr>
														<th scope="col">Comment</th>
														<th scope="col">Time</th>
													</tr>
												</thead>
												<tbody>
													<?php 
														foreach($v->enquiries as $ck=> $cV ){
														?>
														<tr>
															<td><?php echo $cV->comment;  ?></td>
															<td><?php echo $cV->datetime;  ?></td>
														</tr>
														
														<?php 
														}
													?>

											</table>
										</td>
									</tr>
									<?php
								}

							}
						?>
					</tbody>
				</table>
			</div>
			<!-- content section ends -->
		</div>
	</section>
	
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
    
        function showChild(targetID){
            console.log("showChild target :", targetID);		
            $('#child_'+targetID).toggleClass('collapse', 'slow');
        }

    </script>
</body>

</html>