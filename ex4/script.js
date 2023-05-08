function submition() {
    let flag = 0
    let name = document.getElementsByName('fullName')[0];
    let phone = document.getElementsByName('phone')[0];



    for (i = 0; i < name.value.length; i++) {

        if (!(/^[a-zA-Z" "]/.test(name.value[i]))) {
            if (!name.classList.contains('is-invalid'))
                name.classList.toggle('is-invalid');
            flag = 1;

        }
    }


    if (phone.value.length > 0 && phone.value.length < 9) {
        if (!phone.classList.contains('is-invalid'))
            phone.classList.toggle('is-invalid')
        flag = 1;
    }

    if (phone.length > 10) {
        alert("Phone too long")
        flag = 1;
    }

    for (i = 0; i < phone.length; i++) {
        if (!/^[0-9]/.test(phone[i])) {
            alert("Numbers only")
            flag = 1;
        }
    }


    if (flag == 1) {

        return false;
    }
    return true;


}