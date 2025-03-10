function tabuada() {
    const v1 = parseInt(document.getElementById("valor1").value.trim());
    const v2 = parseInt(document.getElementById("valor2").value.trim());

    if (isNaN(v1) || isNaN(v2)) {
        document.getElementById('resultado').innerText = "Por favor, insira valores numéricos válidos.";
        return;
    }

    if (v1 > v2) {
        document.getElementById('resultado').innerText = "O segundo valor deve ser maior que o primeiro!";
        return;
    }

    let resultado = "";
    for (let i = 1; i <= v2; i++) {
        resultado += `${v1} x ${i} = ${v1 * i}<br>`;
    }

    document.getElementById("resultado").innerHTML = resultado;
}