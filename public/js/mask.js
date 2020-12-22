function maskCpf() {
    var cpf = document.getElementById('cpf');
    if (cpf.value.length == 3 || cpf.value.length == 7) {
        cpf.value += "."
    } else if (cpf.value.length == 11) {
        cpf.value += "-"
    }
}

function removeMaskCpf() {
    let newcpf = cpf.value.replaceAll(".", "").replace("-", "");
    document.getElementById('cpf').value = newcpf
    
}

function maskDate() {
    var birth_date = document.getElementById('birth_date');
    if (birth_date.value.length == 2 || birth_date.value.length == 5) {
        birth_date.value += "/"
    }
}

function removeMaskDate() {
    let newbirth_date = birth_date.value.split("/");
    
    function changePosition(newbirth_date, from, to) {
        newbirth_date.splice(to, 0, newbirth_date.splice(from, 1)[0])
        return newbirth_date;
    }
    
    changePosition(newbirth_date, 2, 0)
    changePosition(newbirth_date, 1, 2)
    editedbirth_date = newbirth_date.join('-');
    
    document.getElementById('birth_date').value = editedbirth_date
}

function maskPhone() {
    var phone = document.getElementById('phone');
    if (phone.value.length == 1) {
        phone.value = '(' + phone.value;
    } else if (phone.value.length == 3) {
        phone.value += ') ';
    } else if (phone.value.length == 10) {
        phone.value += "-";
    }
}

function removeMaskPhone() {
    let newphone = phone.value.replace(/[^0-9]/g, '')
    document.getElementById('phone').value = newphone;
}