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

   // Get items from localstorage
    let getItems = localStorage.getItem('items');
    let array = getItems ? JSON.parse(getItems) : [];


    // Display items
    if(getItems) {

        array.forEach((item, key) => {
           let tr = document.createElement('tr');

           let td_id = document.createElement('td');
           let td_item = document.createElement('td');
           let td_amount = document.createElement('td');
           let td_action = document.createElement('td');

           let getId = document.createTextNode(key+1);
           let getItem = document.createTextNode(item.item);
           let getAmout = document.createTextNode(item.amount);

           let i_class = document.createElement('i');
           i_class.className = 'fa fa-trash';

           td_id.appendChild(getId);
           td_item.appendChild(getItem);
           td_amount.appendChild(getAmout);
           td_action.appendChild(i_class);

           tr.appendChild(td_id);
           tr.appendChild(td_item);
           tr.appendChild(td_amount);
           tr.appendChild(td_action);

           $(tbody).append(tr);

           // Remove item from order table
           $(i_class).on('click', () => {
               array.splice(key, 1);
               localStorage.setItem('items', JSON.stringify(array));
               location.reload(true);
           });
        });
    }else {
        $('.table').hide();
    }

    // Add item to order list
    $('.add_item').on('click', (e) => {
        e.preventDefault();
        let item = item_input.val();
        let amount = item_price.val();

        if(item == '') {
            swal({
                title: 'The item field is required',
                type: 'warning',
                showCancelButton: true,
                showConfirmButton: false
            });
            return false;
        }

        if(amount == '') {
            swal({
                title: 'The amount field is required',
                type: 'warning',
                showCancelButton: true,
                showConfirmButton: false
            });
            return false;
        }

        array.push({ item, amount: parseInt(amount) });

        localStorage.setItem('items', JSON.stringify(array));
        location.reload(true);
    })

    // Sum the amount from items
    let sum = array.map(item => item.amount).reduce((prev, next) => prev + next);
    $('.total_footer').text('₦' + sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

    // Enable complete order button
    $('.confirm_payment').on('click', () => {

        if($('#imgInp').val() != '') {
            $('.proceed').removeAttr("disabled");
        }
    })

    // Display input image in order payment modal
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#payment_image').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        $('#payment_image').css("display", "block");
        readURL(this);
    });

    // Make order

    $('.proceed').on('click', () => {

        axios.post('views/complete.php', array).then((response) => {
            localStorage.removeItem("items");
            location.reload();
            swal({
                title: 'Order made',
                type: 'success',
                confirmButtonColor: '#4CAF55',
                confirmButtonText: 'Okay'
              });
            
            console.log(response);

        }).catch((error) => {
            console.log(error);
        })
    })

});
