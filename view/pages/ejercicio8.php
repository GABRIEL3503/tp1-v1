<?php
include_once __DIR__ . '/../layouts/header_cine.php';

// Capturamos si el backend mandó un error
$error = isset($_GET['error']) ? $_GET['error'] : null;
?>

<div class="min-h-screen bg-gray-950 flex items-start justify-center pt-16 px-4">
    <div class="w-full max-w-md">

        <!-- Encabezado -->
        <div class="mb-8 text-center">
            <span class="text-4xl">🎬</span>
            <h1 class="mt-3 text-3xl font-bold text-white tracking-tight">Cine<span class="text-red-500">+</span> Unco</h1>
            <p class="mt-1 text-gray-400 text-sm">Calculá el precio de tu entrada</p>
        </div>

        <!-- MENSAJE DE ERROR BACKEND (solo aparece si JS está desactivado y los datos son inválidos) -->
        <?php if ($error) { ?>
            <div class="bg-red-900 border border-red-700 text-red-300 rounded-xl px-4 py-3 mb-6 text-sm text-center">
                ⚠️ Datos inválidos. Ingresá una edad entre 1 y 120.
            </div>
        <?php } ?>

        <!-- Card formulario -->
    
        <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-2xl p-8">
            <form
                id="formCine"
                action="../action/ejercicio8_action.php"
                method="POST"
                novalidate
            >
                <!-- Edad -->
                <div class="mb-6">
                    <label for="edad" class="block text-sm font-medium text-gray-300 mb-2">
                        Edad
                    </label>
                    <input
                        type="number"
                        id="edad"
                        name="edad"
                        min="1"
                        max="120"
                        placeholder="Ej: 25"
                        class="w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-500
                               rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2
                               focus:ring-red-500 focus:border-transparent transition"
                    >
                    <!-- Mensaje de error JS -->
                    <p id="error-edad" class="mt-2 text-red-400 text-xs hidden"></p>
                </div>

                <!-- Checkbox estudiante -->
                <div class="mb-8">
                    <label class="flex items-center gap-3 cursor-pointer select-none group">
                        <input
                            type="checkbox"
                            id="estudiante"
                            name="estudiante"
                            class="w-5 h-5 rounded border-gray-600 bg-gray-800 text-red-500
                                   focus:ring-red-500 focus:ring-offset-gray-900 cursor-pointer"
                        >
                        <span class="text-sm text-gray-300 group-hover:text-white transition">
                            Soy estudiante
                        </span>
                    </label>
                </div>

                <!-- Botones -->
                <div class="flex gap-3">
                    <button
                        type="submit"
                        class="flex-1 bg-red-600 hover:bg-red-500 text-white font-semibold
                               py-3 rounded-lg text-sm transition focus:outline-none
                               focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-900"
                    >
                        Calcular precio
                    </button>
                    <button
                        type="reset"
                        class="flex-1 bg-gray-800 hover:bg-gray-700 text-gray-300 font-semibold
                               py-3 rounded-lg text-sm transition focus:outline-none
                               focus:ring-2 focus:ring-gray-600 focus:ring-offset-2 focus:ring-offset-gray-900"
                    >
                        Limpiar
                    </button>
                </div>

            </form>
        </div>

        <!-- Referencia de precios -->
        <div class="mt-6 bg-gray-900 border border-gray-800 rounded-xl p-5">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Tarifas vigentes</p>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between text-gray-400">
                    <span>Menor de 12 años o estudiante</span>
                    <span class="text-green-400 font-semibold">$160</span>
                </div>
                <div class="flex justify-between text-gray-400">
                    <span>Estudiante ≥ 12 años</span>
                    <span class="text-yellow-400 font-semibold">$180</span>
                </div>
                <div class="flex justify-between text-gray-400">
                    <span>Público general</span>
                    <span class="text-red-400 font-semibold">$300</span>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Validador JS del ejercicio 8 -->
<script src="../assets/js/validadorCine.js"></script>

<?php
include_once __DIR__ . '/../layouts/footer_cine.php';
?>
