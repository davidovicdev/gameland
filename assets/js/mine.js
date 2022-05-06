const REGEX_NAME = /^[A-Z][a-z]{2,20}$/; 
const REGEX_PASSWORD = /^(?=.*[A-Z])(?=.*[0-9])[A-z0-9$%^&*]{8,}$/;
const REGEX_EMAIL = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
const REGEX_ADDRESS = /^([a-zA-z0-9/\\''(),-\s]{2,255})$/;
const REGEX_PHONE = /^[0][6]\d{7,8}$/;
const FIRSTNAME_ERROR = "First name needs to start with first capital letter and length of minimum 3";
const NAME_ERROR = "Name needs to start with first capital letter and length of minimum 3";
const LASTNAME_ERROR = "Last name needs to start with first capital letter and length of minimum 3";
const ADDRESS_ERROR = "Address is not valid";
const PHONE_ERROR = "Phone is not valid, valid format is 061123456(7)";
const PASSWORD_ERROR = "Password needs to have at least one big letter, one number and length of minimum 8";
const EMAIL_ERROR = "Email is not in valid format.  Example: something@gmail.com";
const ERROR_SURVEY = "Please vote to see results";

$("#loginButton").click(function (e) { 
    var errorSpan = document.getElementById("login-error");
    e.preventDefault();
    var email = document.getElementById("loginEmail").value;
    var password = document.getElementById("loginPassword").value;
    if(email == "" || password == ""){
        errorSpan.innerHTML = "Incorrect email or password";
    }
    else{
        $.ajax({
            type: "POST",
            url: "backend/login.php",
            data: {
                email : email,
                password : password,
            },
            dataType: "json",
            success: function (response) {
                if(response == 0){
                    errorSpan.innerHTML = "Incorrect email or password";
                }
                else if (response == 1){
                    window.location.replace("index.php");
                }
            }
        });
    }
});
$("#registerButton").on('click',  function(e){
    e.preventDefault();
    errors=[];
    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var passwordConfirm = $('#passwordConfirm').val();
    var address = $("#address").val();
    var phone = $("#phone").val();
    var passwordError = $("#passwordError");
    var firstNameError = $("#firstNameError");
    var lastNameError = $("#lastNameError");
    var emailError = $("#emailError");
    var addressError = $("#addressError");
    var phoneError = $("#phoneError");
    passwordError.text("");
    firstNameError.text("");
    lastNameError.text("");
    emailError.text("");
    addressError.text("");
    phoneError.text("");
    check(password,REGEX_PASSWORD,PASSWORD_ERROR,passwordError);
    check(firstName,REGEX_NAME,FIRSTNAME_ERROR,firstNameError);
    check(lastName,REGEX_NAME,LASTNAME_ERROR,lastNameError);
    check(email,REGEX_EMAIL,EMAIL_ERROR,emailError);
    check(address,REGEX_ADDRESS,ADDRESS_ERROR,addressError);
    check(phone,REGEX_PHONE,PHONE_ERROR,phoneError);
    if(password!=passwordConfirm){
        errors.push("Passwords do not match");
        $("#passwordConfirmError").html("Passwords do not match");
    }
         if(errors.length == 0){
            $.ajax({
                type: "POST",
                url: "backend/register.php",
                data: {
                    firstName : firstName,
                    lastName : lastName,
                    email: email,
                    password: password,
                    address : address,
                    phone:phone
                },
                dataType: "json",
                success: function (response) {
                    response == 1 ? window.location.replace("index.php") : emailError.html("Email already exist");
                }
            });
        } 
    
    
})
$(".quantity").on("change", function (e) {
    e.preventDefault();
    var price = $(this).parent().prev().children(':first-child').val();
    var quantity = +$(this).val();
    $(this).parent().next().html(`${price*quantity}$`)
    setNewTotal();
});
$(".quantityPerProduct").on("click", function (e) {
    e.preventDefault();
    var price = +$(this).attr("data-price");
    var quantity = +$(this).val();
    $(this).parent().parent().parent().children(":nth-child(2)").text(`${price*quantity}$`);
});
$(".addToCart").click(function (e) { 
    e.preventDefault();
    var productId = +$(this).attr("data-id");
    var quantity = +$(this).prev().val();
    $.ajax({
        type: "POST",
        url: "backend/addToCart.php",
        data: {
            productId :productId,
            quantity : quantity
        },
        dataType: "json",
        success: function (response) {
            if(response == 1){
               alert("Successfully added product to cart")
               window.location.replace("products.php");
            }
        }
    });
});
$("#makeOrder").on("click", function (e) {
    e.preventDefault();
    var ids = Array.from(document.getElementsByClassName("id"));
    var quantity = Array.from(document.getElementsByClassName("quantity"));
    var price = Array.from(document.getElementsByClassName("price"));
    ids = ids.map(x=>+x.value);
    quantity = quantity.map(x=>+x.value);
    price = price.map(x=>+x.value);
    $.ajax({
        type: "POST",
        url: "backend/makeOrder.php",
        data: {
            ids:ids,
            quantity : quantity,
            price:price
        },
        dataType: "json",
        success: function (response) {
            if(response == 1)
            window.location.replace("myorders.php");
        }
    });
    
});
$("#contactButton").on("click", function (e) {
    e.preventDefault();
    var errors=[];
    var email = $("#email").val();
    var name = $("#name").val();
    var message = $("#message").val();
    var emailError = $("#contactEmailError");
    var nameError= $("#contactNameError");
    var messageError= $("#contactMessageError");
    emailError.text("");
    nameError.text("");
    messageError.text("");
    if(message.length < 5 || message.length > 100){
        errors.push("Message needs to have at least 6 and maximum 99 characters");
        messageError.text("Message needs to have at least 6 and maximum 99 characters")
    }else{
        if(!REGEX_EMAIL.test(email)){
            errors.push(EMAIL_ERROR);
            emailError.text(EMAIL_ERROR);
        }
        if(!REGEX_NAME.test(name)){
            errors.push(NAME_ERROR);
            nameError.text(NAME_ERROR);
        }
         if(errors.length == 0){
            $.ajax({
                type: "POST",
                url: "backend/contact.php",
                data: {
                    message:message,
                    name:name,
                    email:email
                },
                dataType: "json",
                success: function (response) {
                    if(response == 1){
                        window.location.replace("contact.php?message=Successfully+contacted+us");
                    }
                }
            });
        } 
    }

});
var errors=[];
function check(input, regex, error, div) {
    if (!regex.test(input)) {
      errors.push(error);
      div.text(error);
    }
}
function setNewTotal(){
    var totalDiv = document.getElementsByClassName("total-data")[0];
    var totals = Array.from(document.getElementsByClassName("product-total"));
    totals.shift();
    var total = 0;
    totals.forEach(t => {
        t = t.innerText;
        t = t.slice(0,-1)
        total += +t;
    });
    totalDiv.innerHTML = `<td>${total}$</td>`;
}