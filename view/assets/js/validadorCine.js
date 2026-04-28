// validadorCine.js
// Validación del lado del cliente para el formulario de Cinem@s

// --- FUNCIONES AUXILIARES

function marcarInvalido(input, mensaje) {
    input.classList.remove("ring-2", "ring-red-500");
    input.classList.add("ring-2", "ring-red-500", "border-red-500");

    const errorId = "error-" + input.id;
    // Si input.id es "edad" → errorId = "error-edad"

    let errorEl = document.getElementById(errorId);

    if (errorEl) {
        errorEl.textContent = mensaje;
        errorEl.classList.remove("hidden");
    }
}

function marcarValido(input) {
    input.classList.remove("border-red-500");
    input.classList.add("ring-2", "ring-green-500");

    const errorId = "error-" + input.id;
    let errorEl = document.getElementById(errorId);

    if (errorEl) {
        errorEl.textContent = "";
        errorEl.classList.add("hidden");
    }
}

function limpiarEstado(input) {
    input.classList.remove("ring-2", "ring-red-500", "ring-green-500", "border-red-500");

    const errorId = "error-" + input.id;
    let errorEl = document.getElementById(errorId);
    if (errorEl) {
        errorEl.textContent = "";
        errorEl.classList.add("hidden");
    }
}

// --- LÓGICA PRINCIPAL ---

document.addEventListener("DOMContentLoaded", () => {
    const formulario = document.getElementById("formCine");
    const inputEdad  = document.getElementById("edad");

    // Limpiar estado visual al resetear el formulario
    formulario.addEventListener("reset", () => {
        setTimeout(() => limpiarEstado(inputEdad), 0);
    });

    // Validación al enviar
    formulario.addEventListener("submit", (evento) => {
        evento.preventDefault();

        let formularioValido = true;

        // --- Validar Edad ---
        const valorEdad = inputEdad.value.trim();

        if (valorEdad === "") {
            marcarInvalido(inputEdad, "La edad es obligatoria.");
            formularioValido = false;
        } else if (!/^\d+$/.test(valorEdad)) {
            marcarInvalido(inputEdad, "La edad debe ser un número entero.");
            formularioValido = false;
        } else {
            const edadNum = parseInt(valorEdad, 10);
            if (edadNum < 1 || edadNum > 120) {
                marcarInvalido(inputEdad, "La edad debe estar entre 1 y 120 años.");
                formularioValido = false;
            } else {
                marcarValido(inputEdad);
            }
        }

        // --- Envío final ---
        if (formularioValido) {
            formulario.submit();
        }
    });
});
