<?php
session_start();
require_once('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["usuario"];
    $password = $_POST["senha"];
    
    $sql = "select * from users where user = '{$user}' and password = SHA2('{$password}', 256);";

    // executa a consulta
    $result = $conexao->query($sql);

    // verifica se há resultados
    if ($result->num_rows > 0) {
        $_SESSION["usuario"] = $result->fetch_assoc();

        // Verifica se o checkbox "Manter Conectado" está marcado
        if (isset($_POST['manter_conectado'])) {
            // Define um cookie que armazena informações da sessão
            $session_data = array(
                'session_id' => session_id(),
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'last_activity' => time()
            );
            setcookie('sessao', serialize(array('session_data' => $session_data)), time() + (86400 * 30), "/"); // expira em 30 dias
            var_dump($_COOKIE['sessao']);
        }

        header("Location: index.php");
    } else {
        // os valores são inválidos
        header("location: page-login.php?erro=invalid");
    }
} else {
    // Verifica se o cookie "sessao" está definido e não está vazio
    if(isset($_COOKIE['sessao']) && !empty($_COOKIE['sessao'])) {
        $row = unserialize($_COOKIE['sessao']);
        $_SESSION["usuario"] = unserialize($row["session_data"]);
    }
}
?>
