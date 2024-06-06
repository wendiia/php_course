function calc() {
    let a = Number(document.getElementById('inputFirstNum').value);
    let b = Number(document.getElementById('inputSecondNum').value);
    let operation = document.getElementById('selectOperation').value;

    switch (operation) {
        case 'plus':
            alert(a + b);
            break;
        case 'minus':
            alert(a - b);
            break;
        case 'division':
            if (b === 0) {
                alert("Деление на 0");
                break;
            }
            alert(a / b);
            break;
        case 'multiplication':
            alert(a * b);
            break;
        default:
            alert("Заполните все поля!");
    }
}