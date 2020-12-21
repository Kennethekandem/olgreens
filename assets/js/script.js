$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.addmore_link'); //Add button selector
    var wrapper = $('.inputs'); //Input field wrapper
    var fieldHTML = '<div class="form-group input-group">\n' +
        '                        <label for="exampleFormControlInput1" class="sr-only">Item</label>\n' +
        '                        <input type="text" class="form-control" name="item[]" id="exampleFormControlInput1">\n' +
        '                        <div class="input-group-append">\n' +
        '                            <input type="number" class="input-group-text" placeholder="₦" id="basic-addon2" />\n' +
        '                        </div>\n' +
        '                    </div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(e){
        e.preventDefault();
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });


    let item_input = $('.item_input');
    let item_price = $('.item_price');
    let complete = $('.confirm_list');
    let tbody = $('#items');

    let array = [];
    let getItems = localStorage.getItem('items');

    if(getItems) {
        array.push(JSON.parse(getItems));
        

        array[0].forEach((item, key) => {
           let tr = document.createElement('tr');

           let td_id = document.createElement('td');
           let td_item = document.createElement('td');
           let td_amount = document.createElement('td');

           let getId = document.createTextNode(key);
           let getItem = document.createTextNode(item.item);
           let getAmout = document.createTextNode(item.amount);
        //    console.log(get);
           td_id.appendChild(get);
           td_item.appendChild(getItem);
           td_amount.appendChild(getAmout);
           tr.appendChild(td_item);
           tr.appendChild(td_amount);

           $(tbody).append(tr);
        });

        // console.log(tr);
        // tbody.appendChild(tr);
    }

    $('.add_item').on('click', (e) => {
        e.preventDefault();
        let item = item_input.val();
        let amount = item_price.val();

        array.push({ item, amount: parseInt(amount) });

        localStorage.setItem('items', JSON.stringify(array));
    })

});