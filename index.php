<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4b0082, #8a2be2);
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h2 {
            animation: fadeIn 2s;
        }
        .container {
            width: 80%;
            margin: auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .btn-add {
            display: inline-block;
            padding: 10px 20px;
            background: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-add:hover {
            background: darkgreen;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid white;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background: rgba(255, 255, 255, 0.3);
        }
        td a {
            color: yellow;
            text-decoration: none;
        }
        td a:hover {
            text-decoration: underline;
        }
        .zidanYB {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 20px;
            font-weight: bold;
            animation: slideIn 2s;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translateX(50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="zidanYB">zidanYB</div>
    <h2>data yang tersimpan</h2>
    <div class="container">
        <p>
            <a href="add.php" class="btn-add">Add New Data</a>
        </p>
        <table>
            <tr>
                <th>Nama</th>
                <th>Umur</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            <?php
            require_once("dbConnection.php");
            $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
            while ($res = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$res['name']."</td>";
                echo "<td>".$res['age']."</td>";
                echo "<td>".$res['email']."</td>";    
                echo "<td><a href='edit.php?id=$res[id]'>Edit</a> | ";
                echo "<a href='delete.php?id=$res[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
