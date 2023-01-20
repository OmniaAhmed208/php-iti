async function addNewPhoneBtn(){
    let phone = {};
    phone.name = document.getElementById('phoneName').value;
    phone.phone = document.getElementById('phoneNumber').value;
    await addNewPhone(phone);
    displayAllPhones();
} 

let phones = [];

async function displayAllPhones(){

    phones = await getAllPhones();
    let html = phones.map(x =>`
    <tr>
        <td>${x.name}</td>
        <td>${x.phone}</td>
        <td><button onclick="EditPhoneBtn('${x.id}')">Edit</button></td>
        <td><button onclick="deletePhoneBtn('${x.id}')">Delete</button></td>
    </tr>
    `).join('\n');

    document.getElementById('phonesTable').innerHTML = html;
}

async function EditPhoneBtn(id){
    let phone = phones.find(phone => phone.id == id);
    document.getElementById("phoneNameEdit").value = phone.name;
    document.getElementById("phoneIdEdit").value = phone.id;
    document.getElementById("phoneNumberEdit").value = phone.phone;
}

async function editPhoneBtn(){
    let phoneObj = {};
    phoneObj.name = document.getElementById('phoneNameEdit').value;
    phoneObj.phone = document.getElementById('phoneNumberEdit').value;
    phoneObj.id = document.getElementById('phoneIdEdit').value; 

    await updatePhone(phoneObj);

    displayAllPhones();
}

async function deletePhoneBtn(id){
    await deletePhone(id);
    displayAllPhones();
}

displayAllPhones();