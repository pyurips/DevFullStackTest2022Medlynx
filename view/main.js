document.querySelector('#loginContainer button').addEventListener('click', (e) => {
    e.target.disabled = true;
    e.target.parentNode.parentNode.style.animationName = 'fadeOut';
    e.target.parentNode.parentNode.style.animationDuration = '0.2s';
    setInterval(() => {
        e.target.parentNode.parentNode.style.display = 'none';
        document.getElementById('tablesContainer').style.display = 'flex';
    }, 200);
});

for (let index = 1; index <= 6; index++) {
    document.getElementById(`requisite0${index}`).addEventListener('click', () => {
        document.getElementById(`info0${index}`).style.display = 'block';
        document.querySelectorAll('#tablesInfos > div').forEach((element) => {
            if(element.id !== `info0${index}`) {
                element.style.display = 'none';
            }
        })
    });
}

document.getElementById('newItem06').addEventListener('click', (e) => {
    let newElement = document.createElement('div');
    let newItemName = document.createElement("input");
    newItemName.type = "number";
    newItemName.name = `itemID06${document.querySelectorAll('#info06 div').length - 1}`;
    newItemName.placeholder = 'Digite o ID do item';
    newItemName.required = true;
    newElement.appendChild(newItemName);

    let newItemQuantity = document.createElement("input");
    newItemQuantity.type = "number";
    newItemQuantity.name = `itemQuantity06${document.querySelectorAll('#info06 div').length - 1}`;
    newItemQuantity.placeholder = 'Digite a quantidade';
    newItemQuantity.required = true;
    newElement.appendChild(newItemQuantity);
    
    e.target.parentNode.insertBefore(newElement, e.target);
});

document.getElementById('deleteLastItem06').addEventListener('click', (e) => {
    if (!(e.target.previousSibling.previousSibling.previousSibling.id)) {
        e.target.previousSibling.previousSibling.previousSibling.remove();
    }
});