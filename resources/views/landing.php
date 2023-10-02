<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing page</title>
</head>
<body>
    <h1> Welcome to ITI landing page </h1>

        <?php  echo '<h2> Hello world  </h2>'?>
    <table>
        <tr><th>Id</th> <th>Name</th> </tr>


    <?php

        var_dump($students);

        foreach ($students as $student){

            echo "<tr> <td>{$student['id']}</td> <td> {$student['name']}</td> </tr>";
        }
    ?>
    </table>
    <footer> copyrights@iti2023</footer>
</body>
</html>
