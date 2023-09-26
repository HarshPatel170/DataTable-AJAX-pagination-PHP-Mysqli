    <?php 
    $conn = mysqli_connect("localhost","root","","training_sql") or die(mysqli_connect_error($conn));
    $qurey = "SELECT * FROM user_details";
    $result = mysqli_query($conn, $qurey);

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
        <title>Dynamic Datatable</title>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    </head>
    <body>
        <div class="container" >
            <div class="row" style="padding:50px;">
            <p><h1>DataTable AJAX pagination using PHP and Mysqli</h1></p>
                <div>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>last Name</th>
                                <th>Gender</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <!-- <tbody>
                            <?//php
                            //while($row = mysqli_fetch_array($result)){
                                ?>
                            <tr>
                                <td><?//php echo $row['username'] ?></td>
                                <td><?//php echo $row['first_name'] ?></td>
                                <td><?//php echo $row['last_name'] ?></td>
                                <td><?//php echo $row['gender'] ?></td>
                                <td><?//php echo $row['status'] ?></td>
                            </tr>
                            <?php //}?>
                        </tbody> -->
                        <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>last Name</th>
                                <th>Gender</th>
                                <th>status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function(){
                var empDataTable = $('#example').DataTable({
                    'processing': true,
                    'serverSide': true,
                    'searching': true, 
                    'lengthChange': true, 
                    'serverMethod': 'post',
                    'ajax': {
                        'url':'ajaxfile.php'
                    },
                    
                    pageLength: 5,
                    'columns': [
                        { data: 'username' },
                        { data: 'first_name' },
                        { data: 'last_name' },
                        { data: 'gender' },
                        { data: 'status' },
                    ]
                });
            });
    </script>   
    </body>
    </html>