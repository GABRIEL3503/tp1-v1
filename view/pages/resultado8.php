<?php
include_once '../layouts/header_cine.php';

// Capturamos los datos de la URL
$precio       = isset($_GET['precio'])  ? (int) $_GET['precio']  : null;
$edad         = isset($_GET['edad'])    ? (int) $_GET['edad']    : null;
$esEstudiante = isset($_GET['est'])     ? (bool)(int) $_GET['est'] : false;

// Si no llegaron datos válidos, redirigimos
if ($precio === null || $edad === null) {
    header("Location: ejercicio8.php");
    exit;
}

// Determinamos el color y badge según precio
if ($precio == 160) {
    $colorPrecio = "text-green-400";
    $badge       = "Tarifa reducida";
    $badgeColor  = "bg-green-900 text-green-300";
} elseif ($precio == 180) {
    $colorPrecio = "text-yellow-400";
    $badge       = "Tarifa estudiante";
    $badgeColor  = "bg-yellow-900 text-yellow-300";
} else {
    $colorPrecio = "text-red-400";
    $badge       = "Tarifa general";
    $badgeColor  = "bg-red-900 text-red-300";
}
?>

<div class="min-h-screen bg-gray-950 flex items-start justify-center pt-16 px-4">
    <div class="w-full max-w-md">

        <!-- Encabezado -->
        <div class="mb-8 text-center">
            <span class="text-4xl">🎬</span>
            <h1 class="mt-3 text-3xl font-bold text-white tracking-tight">Cine<span class="text-red-500">+</span> Unco</h1>
            <p class="mt-1 text-gray-400 text-sm">Resultado de tu consulta</p>
        </div>

        <!-- Card resultado -->
        <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-2xl p-8 text-center">

            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold mb-6 <?php echo $badgeColor; ?>">
                <?php echo htmlspecialchars($badge); ?>
            </span>

            <p class="text-gray-400 text-sm mb-2">El precio de tu entrada es</p>

            <p class="text-6xl font-bold <?php echo $colorPrecio; ?> mb-6">
                $<?php echo htmlspecialchars($precio); ?>
            </p>

            <!-- Detalle -->
            <div class="bg-gray-800 rounded-xl p-4 text-left space-y-2 mb-8">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-400">Edad</span>
                    <span class="text-white font-medium"><?php echo htmlspecialchars($edad); ?> años</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-400">Condición</span>
                    <span class="text-white font-medium">
                        <?php echo $esEstudiante ? '🎓 Estudiante' : 'Público general'; ?>
                    </span>
                </div>
            </div>

            <!-- Botón volver -->
            <a
                href="ejercicio8.php"
                class="block w-full bg-red-600 hover:bg-red-500 text-white font-semibold
                       py-3 rounded-lg text-sm transition text-center"
            >
                Nueva consulta
            </a>

        </div>
    </div>
</div>

<?php
include_once '../layouts/footer_cine.php';
?>
