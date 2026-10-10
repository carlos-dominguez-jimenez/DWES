</head>

<body>

    <?php
        function mostrarCombinacionGenerada (int $combinacion, int $serie) {
            echo "<tr>";
            echo "<td>Generada</td>";
            echo "<td>$combinacion</td>";
            echo "<td>$serie</td>";
            echo "</tr>";
        }

        function mostrasCombinacionIntroducida(int $combinacion, int $serie) {
            echo "<tr>";
            echo "<td>Introducida</td>";
            echo "<td>$combinacion</td>";
            echo "<td>$serie</td>";
            echo "</tr>";
        }
    ?>
    <form action="ej2.php" method="get">
        Combinación:
        <input type="number" name="n1" min="1" max="49" required>
        <input type="number" name="n2" min="1" max="49" required>
        <input type="number" name="n3" min="1" max="49" required>
        <input type="number" name="n4" min="1" max="49" required>
        <input type="number" name="n5" min="1" max="49" required>
        <input type="number" name="n6" min="1" max="49" required><br>
        Serie: <input type="number" name="serie" min="1" max="999" required><br>
        <input type="submit" value="Mostrar">
    </form>

    <?php
    if (isset($_GET["n1"]) && isset($_GET["serie"])) {
        $introducida = "";

        for ($i = 1; $i <= 6; $i++) {
            $introducida = $introducida . $_GET["n" . $i];
            if ($i < 6) {
                $introducida = $introducida . " - ";
            }
        }
        $serie = $_GET["serie"];

        $generada = "";
        for ($i = 1; $i <= 6; $i++) {
            $generada = $generada . rand(1, 49);
            if ($i < 6) {
                $generada = $generada . " - ";
            }
        }
        $serieGenerada = rand(1, 999);
    ?>

        <table border="1">
            <tr>
                <th></th>
                <th>Combinación</th>
                <th>Serie</th>
            </tr>

            <?php
                mostrarCombinacionGenerada($generada, $serieGenerada);
                mostrasCombinacionIntroducida($introducida, $serie);
            ?>
        </table>

    <?php
    }
    ?>
</body>

</html>