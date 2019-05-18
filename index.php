<?php
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'swarovski';
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM swarovski"); 
    $stmt->execute();
    
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result = $stmt->fetchAll();
    shuffle($result);
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>抽奖</title>
    <style>
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height:100vh;
            width:100%;
            margin-bottom:3rem!important
            text-align:center!important
        }
        img{
            width:15rem;
            margin-bottom:1rem;
        }
        h1{
            margin-bottom:1rem;
            text-align:center;
        }
        button{
            background-color:green;
            border:none;
            color:white;
            padding:15px 32px;
            text-align:center;
            text-decoration:none;
            display:inline-block;
            font-size:72px;
            border-radius:8px;
            box-shadow:0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }
        #luckyguy{
            display:none;
        }
    </style>
</head>
<body>
    <div class="container">
        <button id="show">抽奖</button>
        <div id="luckyguy" class="mb-5 text-center">
        <?php
            echo "<img src=\"./avatar/".$result[0]["qq"].".jpg\" alt=\"avatar\" />";
            echo "<h1>".$result[0]["qqst"]."</h1>";
            echo "<h1>".$result[0]["nickname"]."</h1>";
        ?>
        </div>
    </div>
    <script>
    window.onload = function(){
        document.getElementById("show").onclick = function(){
            document.getElementById("show").style.display = "none";
            document.getElementById("luckyguy").style.display = "block";
        }
    }
    </script>
</body>
</html>