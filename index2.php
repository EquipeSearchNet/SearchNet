<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <title> Pagination </title>
</head>

<body>


    <table id="example" class="display" style="width:100%">
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>

        $(document).ready(function() {
            $('#example').dataTable({
                "ajax": {
                    "url": "teste2.php",
                    "type": "POST"
                }
            });
        });

    </script>
</body>

</html>