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
    <form  id="form" >
        @method("PUT")
        @csrf
        <div class="m-2">
            <label for="modelo">modelo carro</label>
            <input type="text"  class= "form-control" name="modelo_carro" value="{{$carro->modelo}}">
        </div>
        <div class="m-2">
            <label for="data_aquisicao">data de aquisicao</label>
            <input type="date" class= "form-control" name="data_aquisicao" value="{{$carro->data_aquisicao}}">
        </div>
        <div class="m-2">
            <label for="placa">placa</label>
            <input type="text" class= "form-control" name="placa"value="{{$carro->placa}}" >
        </div>
    
        <div class="m-2">
            <button  class=" btn btn-primary" id="save" data-id="{{$carro->id}}">atualizar</button>
        </div>
        <div class="m-2">
            <button  class=" btn btn-danger" id="delete" data-id="{{$carro->id}}">deletar</button>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            $("#delete").click(function (e) { 
                e.preventDefault();
                let form = $("#form");
                let url = '/excluir-carro/' + $("#delete").attr("data-id")
                let data = form.serialize();
                
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: data,
                    success: function (response) {
                        alert("excluido com sucesso")
                        window.location.replace('/');
                        

                    },
                    error: function (response) {
                        alert("Erro ao excluir ")

                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#form").submit(function (e) { 
                e.preventDefault();
                let form = $(this);
                let url = '/atualizar-carro/' + $("#save").attr("data-id")
                let data = form.serialize();
                
                $.ajax({
                    type: "PUT",
                    url: url,
                    data: data,
                    success: function (response) {
                        alert("atualizado com sucesso")
                        window.location.replace('/');

                        

                    },
                    error: function (response) {
                        alert("Erro ao atualizar ")

                    }
                });
            });
        });
    </script>

</body>
</html>