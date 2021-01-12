<?php
session_start();
session_destroy();
echo '
    <script>
        window.location.href = "http://localhost/projetos/e-commerce/login.php"
    </script>
';