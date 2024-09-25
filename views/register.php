<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
</head>
<body>
    <div>
        <h2>Cadastro de Usuario</h2>
        <form action="index.php?action=register" method="post">
            <label for="Nome">Nome</label>
            <input type="text" name="nome" id="nome" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">senha</label>
            <input type="password" name="senha" id="senha" required>

            <label for="Perfil"></label>
            <select name="perfil" id="perfil">
            <option value="admin">Admin</option>
            <option value="gestor">Gestor</option>
            <option value="colaborador">Colaborador</option>
            </select>

            <button type="submit">Cadastrar</button>
        </form>
        <a href="index.php?action=login">Voltar ao login</a>
    </div>
</body>
</html>