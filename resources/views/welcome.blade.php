<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body>
    <form action="/cadastar-carro" method="POST" >
        @csrf
        <div class="m-2">
            <label for="modelo">modelo carro</label>
            <input type="text"  class= "form-control" name="modelo_carro">
        </div>
        <div class="m-2">
            <label for="data_aquisicao">data de aquisicao</label>
            <input type="date" class= "form-control" name="data_aquisicao">
        </div>
        <div class="m-2">
            <label for="placa">placa</label>
            <input type="text" class= "form-control" name="placa">
        </div>
    
        <div class="m-2">
            <button type="submit" class=" btn btn-success">Cadastrar</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>modelo</th>
                <th>data de aquisicao</th>
                <th>placa</th>
                <th>op</th>
            </tr>
        </thead>
        <tbody id="carro-detalhes"></tbody>
    </table>
    <script>
        $(document).ready(function () {
            function corpoTabela(carro){
                let row = $("<tr></tr>")
                row.append($("<td>" + carro.id + "</td>"))
                row.append($("<td>" + carro.modelo + "</td>"))
                row.append($("<td>" + carro.data_aquisicao + "</td>"))
                row.append($("<td>" + carro.placa + "</td>"))
                row.append($("<td> <a href ='/mostrar-carro/" + carro.id +"'>Mostrar detalhes</a></td>"))

                $("#carro-detalhes").append(row);
            }

            function carregarTabela () { 
                $.get("/listar-carros").done(function(carros){
                    for (let index = 0; index < carros.length; index++) {
                        corpoTabela( carros[index]);
                        
                    }
                })
             }

             carregarTabela();
        });
    </script>
</body>
</html>