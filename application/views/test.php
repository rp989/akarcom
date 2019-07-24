<html>
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<div class="ammar"></div>
<script>
    var property = <?= $m?>;

    for (property in obj) {
        output += property + ': ' + obj[property]+'; ';
    }
    console.log(output);


    $(".ammar").html("Hi");
</script>
</body>
</html>