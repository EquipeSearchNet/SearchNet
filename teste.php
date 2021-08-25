<html lang=pt-br>

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <title>Teste</title>

</head>

<body>
    <table id="Comentarios" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Avaliação</th>
                <th>Feedback</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Comentarios').DataTable({
                "pageLength": 2,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "teste2.php",
                    "type": "POST"
                }
            });
        });
    </script>
</body>

</html>