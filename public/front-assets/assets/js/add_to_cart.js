$(document).ready(function(){
    
    
    getData();
    count();


    
    $('.addToCart').click(function(event){
        event.preventDefault();
        // alert("Hello");
        
        let id = $(this).data('id');
        let name = $(this).data('name');
        let image = $(this).data('image');
        let price = $(this).data('price');
        let discount = $(this).data('discount');
        let qty = $('.qty').val();
        let brand = $(this).data('brand');
        let category = $(this).data('category');
        let size = $('#size_option').val();
        // console.log(id,name,price);
        if(!size){
            Swal.fire({
                title: "Size Required!",
                text: "Please select a size before adding to cart.",
                icon: "warning",
                confirmButtonText: "OK",
                confirmButtonColor: "#d33",
                background: "#f8f9fa",
                allowOutsideClick: false, // ✨ User က Click မလုပ်မချင်း မပျောက်စေချင်
            });

            return;
        }


        let items = {
            id : id,
            name : name, 
            image : image,
            price : price,
            discount : discount,
            qty : qty,
            brand : brand,
            category : category,
            size : size,
        }
        let itemsString = localStorage.getItem('shops');
        let itemsArray ;
        if (itemsString == null) {
            itemsArray = [];
        }else{
            itemsArray = JSON.parse(itemsString);
        }
        let status = false;  // သူတို့က true and false နှစ်ခုပဲ ရှိတာ 
        $.each(itemsArray, function(i,v){
            if(v.id == id){ 
                v.qty = Number(v.qty) + Number(qty);
                status = true;
            }
        })

        if(status == false){  // status က false နဲ့ ညီသွားတဲ့အတွက်ကြောင့် အသစ် ထည့်သွားတာ
            itemsArray.push(items);
        }


        let itemsData = JSON.stringify(itemsArray);
        localStorage.setItem('shops', itemsData);

        count();

        setTimeout(() => {
            Swal.fire({
                title: "Success!",
                text: "Your order added to Shopping Cart!",
                icon: "success",
                confirmButtonText: "OK",
                confirmButtonColor: "#28a745",
                background: "#f8f9fa",
                allowOutsideClick: false
            });
        }, 1000); // **Demo: 1 Second Loading Effect**
    })



    function getData(){
        let dataString = localStorage.getItem('shops');
        if (dataString){
            let dataArray = JSON.parse(dataString);
            // console.log(dataArray);
            

            let table = '';
            let j = 1;
            let totalPrice = 0;

            $.each(dataArray,function(i,v){

                table += `<tr>
                            <td>${j++}</td>
                            <td>${v.name}</td>
                            <td><img src="${v.image}" width="50px"></td>
                            <td>${v.brand}</td>
                            <td>${v.category}</td>
                            <td>${v.size}</td>
                            <td>${v.price}</td>
                            <td>${v.discount}</td>
                            <td><button style="margin-right:10px; padding:5px 5px 5px; font-size:20px;" class="btn btn-sm btn-outline-secondary max" data-key="${i}">+</button>${v.qty}<button style="margin-left:10px; padding:5px 5px 5px;font-size:20px;" class="btn btn-sm btn-outline-secondary min" data-key="${i}">-</button></td>
                            <td>${Math.round((v.price - (v.price*(v.discount/100)))*v.qty)} MMK</td>
                          </tr>`
                
                totalPrice += Math.round((v.price - (v.price*(v.discount/100)))*v.qty); //Math.round() က ဒသမ ဖျောက်တာ

            })

            table += `<tr>
                        <th colspan="9">Total</th>
                        <td>${totalPrice} MMK</td>
                      </tr>`

            $('#mytable').html(table);
        }
    }



    function count() {
        let itemString = localStorage.getItem('shops');
        if (itemString) {
            let itemsArray = JSON.parse(itemString);
            if (itemsArray != null){  //index.html မှာ cart noti မှာ 0 ပေးထားတဲ့အတွက်ကြောင့် 
                let count = itemsArray.length;
                $('.count_item').text(count);
            }
        }
    }

    $('#mytable').on('click','.min',function(){
        let key = $(this).data('key');
        // alert(key);

        let itemsString = localStorage.getItem('shops');
        if (itemsString){
            let itemsArray = JSON.parse(itemsString);

            $.each(itemsArray,function(i,v){
                if (i == key){
                    v.qty--;
                if (v.qty == 0){
                    itemsArray.splice(key,1); // splice ( ဖျက်မည့်အခန်း, ဖျက်မည့် အခန်း အရေအတွက်)
                }
                }
            })

            let itemsData = JSON.stringify(itemsArray);
            localStorage.setItem('shops',itemsData);

            getData();
            count();
        }
    })

    $('#mytable').on('click','.max',function(){
        let key = $(this).data('key');
        // alert(key);

        let itemsString = localStorage.getItem('shops');
        if (itemsString){
            let itemsArray =JSON.parse(itemsString);

            $.each(itemsArray,function(i,v){
                if (i == key){
                    v.qty++;
                }
            })

            let itemsData = JSON.stringify(itemsArray);
            localStorage.setItem('shops',itemsData);

            getData();
        }
    })

    $('#order_now').click(function(){
        let ans = confirm('Are you sure order?');
        if(ans){
            localStorage.removeItem('shops');
            window.location.href = "index.html";
        }
    })
})
