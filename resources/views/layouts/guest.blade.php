<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
    <!-- Custom styles-path -->
    <link rel="stylesheet" href="/client/css/main.css">

    <!-- Font Awesome kit script -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <!-- Google Fonts Open Sans-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Favicon -->
      <link rel="shortcut icon" type="image/jpg" href="/fion.png" />
</head>

<body>
    {{ $slot }}
    <script type="text/javascript">
    // Criando uma variável para "pegar" todos os inputs
const inputs = document.querySelectorAll('.input');

// Função para adicionar o label dinâmico nos inputs
function focusFunc() {
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}

// Função para recolher o label dinâmico quando houver um clique do mouse fora do form
function blurFunc() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove('focus');
    }
}

// Função para adicionar os eventos
inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
});

</script>
</body>

</html>