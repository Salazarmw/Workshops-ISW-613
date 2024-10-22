<?php include('./Functions/arrays.php') ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Selecciona una función</h1>

        <!-- Formulario para seleccionar la función -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="function" class="form-label">Selecciona una función:</label>
                        <select class="form-select" name="function" id="function">
                            <option value="capitals">Mostrar Capitales y Países</option>
                            <option value="temperatures">Calcular Temperatura</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Mostrar Resultado</button>
                    </div>
                </form>
            </div>
        </div>

        <hr class="my-5">

        <!-- Sección de resultado -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $selected_function = $_POST["function"];

                    if ($selected_function == "capitals") {
                        echo '<h3 class="text-center">Capitales y Países</h3>';
                        echo '<div class="bg-white p-4 border rounded">';
                        mostrarCapitales();
                        echo '</div>';
                    } elseif ($selected_function == "temperatures") {
                        echo '<h3 class="text-center">Resultados de Temperaturas</h3>';
                        echo '<div class="bg-white p-4 border rounded">';
                        calcularTemperatura();
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>