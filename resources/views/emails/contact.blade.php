<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contato</title>
</head>
<body>
    <h2>Novo Contato</h2>

    <p><strong>Nome:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Telefone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Mensagem:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
