<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Failed</title>
</head>
<style>
    #failed {
        color: red
    }
    #passed {
        color: black
    }
</style>

<body>
<h1 class="text-center">Student Scores: Those who failed</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $database = "student";
            $username = "root";
            $password = "root";
            $con = mysqli_connect($servername, $username, $password, $database);

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT id, name, score FROM score";
            $result = $con->query($sql);

            ?>
            <?php foreach ($result as $res) :  ?>
                <tr>
                    <td><?php echo "{$res['id']} " ?></td>
                    <td><?php
                        if ($res['score'] < 60) {
                            echo " <div id=\"failed\"> {$res['name']} </div>";
                        } else  echo " <div id=\"passed\"> {$res['name']} </div>"

                        ?></td>
                    <td><?php echo "{$res['score']} " ?></td>
                </tr>
            <?php endforeach; ?>

            </tr>
        </tbody>
    </table>
</body>

</html>