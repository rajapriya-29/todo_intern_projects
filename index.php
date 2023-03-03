<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
</head>
<style>
	
html,
body {
	background: #B4E4FF;
	width: 100%;
	height: 100%;
}
h1{
	font-weight:900;
	color: #95BDFF;
	font-family: 'georgia';
	font-size: 3vw;
	text-decoration: underline;
}
	
</style>
<body>
    <div class="container">
        <div class="col-md-12">
            <h1 class="text-center">To-Do List</h1>
			<!-- <h1 contenteditable data-heading="Dimensions">Dimensions</h1> -->
 <br />
            <hr style="border-top:2px dotted #fff;" />
			<br /><br />
            <div class="col-md-2 "></div>
            <div class="col-md-8">
                <center>
                    <form method="POST" class="form-inline" action="add_query.php">
                        <input type="text" class="form-control" name="task" required />
                        <button class="btn btn-info form-control" name="add">Add Task</button>
                    </form>
                </center>
            </div>
            <br /><br /><br />
            <table class="table table-striped">
                <thead class="">
                    <tr>
                        <th>Sno</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					require 'conn.php';
					$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
					$count = 1;
					while($fetch = $query->fetch_array()){
				?>
                    <tr>
                        <td><?php echo $count++?></td>
                        <td><?php echo $fetch['task']?></td>
                        <td><?php  if($fetch['status'] == "Completed"){
						echo
						  '<mark class="">'.$fetch['status'].'</mark>';
						}
					 else {
						echo
						'<span>'.$fetch['status']. '</span>';
					 }
					 ?></td>
                        <td colspan="2">
                            
                                <?php
								if($fetch['status'] != "Completed"){
									echo 
									'<a href="update_task.php?task_id='.$fetch['task_id'].'" class="btn btn-success" data-toggle="complete" title="Complete"><span class="fas fa-check-double"></span></a> ';
								}
							?>
                                <a href="delete_query.php?task_id=<?php echo $fetch['task_id']?>" class="btn btn-primary"
                                    data-toggle="delete" title="Delete"><span
                                        class="glyphicon glyphicon-remove"></span></a>
                            
                        </td>
                    </tr>
                    <?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
		var h3 = document.querySelector("h1");
h3.addEventListener("input", function() {
    this.setAttribute("data-heading", this.innerText);
});
    $(document).ready(function() {
        $('[data-toggle="complete"]').tooltip();
        $('[data-toggle="delete"]').tooltip();
    });
	
    </script>
</body>

</html>