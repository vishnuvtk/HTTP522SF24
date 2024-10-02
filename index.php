<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colors</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        .color-box {
            width: 50px;
            height: 20px;
        }
    </style>
</head>
<body>
    <?php
        $connect = mysqli_connect(
            'localhost', 
            'root',
            'root',
            'http5225f24');        

        if(!$connect){
            echo 'Error Code: ' . mysqli_connect_errno();
            echo 'Error Message: ' . mysqli_connect_error();
            exit;
        }    

        $query = 'SELECT `Name`, `Hex` FROM colors';

        $results = mysqli_query($connect, $query);

        if(!$results){
            echo 'Error Message: '. mysqli_error($connect);
        } else {
            echo '<table>';
            echo '<tr><th>Color Name</th><th>Hex Code</th><th>Color</th></tr>';
            
            foreach ($results as $result) {
                echo '<tr>';
                echo '<td>' . $result['Name'] . '</td>';
                echo '<td>' . $result['Hex'] . '</td>';
                echo '<td><div class="color-box" style="background-color:' . $result['Hex'] . ';"></div></td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    ?>
</body>
</html>
