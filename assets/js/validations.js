function soloLetras(e) {
    var t = e.key.toLowerCase();
    return /^[a-zñáéíóúü\s]$/i.test(t);
}
function soloNumeros(e) {
    var t = e.key.toLowerCase();
    return /^[0-9.]$/.test(t);
}
function soloLetrasYnumeros(e) {
    var t = e.key.toLowerCase();
    return /^[a-zñáéíóúü\s0-9.]+$/.test(t);
}
