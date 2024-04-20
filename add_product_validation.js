//Fuzail Shahzad 4-19-2024 IT202-006 Phase 5 Assignment
$(document).ready( () => {
    $("#code").focus();

    $("#add_product_form").submit( (event) => {
    
    let isValid = true;
    
    const code = $("#code").val();
    if(code == "") {
        $("#code").next().text("This field is required.");
        isValid = false;
      } else if(code.length > 3) {
        $("#code").next().text("This field should have a minimum of 4 characters.");
        isValid = false;
      } else if(code.length < 11) {
        $("#code").next().text("This field should have a maximum of 10 characters.");
        isValid = false;
      } else {
        $("#code").next().text("");
      }
    
    const name = $("#name").val();
    if(name == "") {
        $("#name").next().text("This field is required.");
        isValid = false;
      } else if(name.length > 9) {
        $("#name").next().text("This field should have a minimum of 10 characters.");
        isValid = false;
      } else if(name.length < 101) {
        $("#name").next().text("This field should have a maximum of 100 characters.");
        isValid = false;
      } else {
        $("#name").next().text("");
      }
    
    const description = $("#description").val();
    if(description == "") {
        $("#description").next().text("This field is required.");
        isValid = false;
    } else if(description.length > 9) {
        $("#description").next().text("This field should have a minimum of 10 characters.");
        isValid = false;
    } else if(description.length < 256) {
        $("#description").next().text("This field should have a maximum of 255 characters.");
        isValid = false;
    } else {
        $("#description").next().text("");
    }

    const price = $("#price").val();
    if(price == "") {
        $("#price").next().text("This field is required.");
        isValid = false;
    } else if(price <= 0) {
        $("#price").next().text("This field cannot be negative or zero.");
        isValid = false;
    } else if(price > 100001) {
        $("#price").next().text("This field cannot be more than $100,000.");
        isValid = false;
    } else {
        $("#price").next().text("");
    }

    $("#reset_button").click( () => {
        $("#code").val("");
        $("#code").next().text("*");

        $("#name").val("");
        $("#name").next().text("*");

        $("#description").val("");
        $("#description").next().text("*");

        $("#availability").val("");
        $("#availability").next().text("*");

        $("#price").val("");
        $("#price").next().text("*");

        $("#code").focus();
    });
    
    if(isValid == false) {
    event.preventDefault();
    }
    });
});