/** 
JavaScript/jQuery function used in a web page to handle user interactions. It's associated with an HTML document and executes when the HTML document is fully loaded and ready for manipulation. Let's break down the code line by line:

1 $(document).ready(function () {

 -This line begins a jQuery document ready function. It ensures that the enclosed code only runs after the HTML document has been fully loaded.

2 $(document).on('click', 'a[data-role=update]', function () {

 -This line sets up an event listener for click events on anchor (<a>) elements with a data-role attribute set to "update." When a user clicks on such an anchor, the function inside the parentheses will be executed.
 
3 let id = $(this).data('id');

 -This line retrieves the value of the data-id attribute from the clicked anchor element and assigns it to the variable   id.

4 let f_name = $('#row_' + id).children('td[data-target=f_name]').text();

 -This line selects an element with an id attribute composed of 'row_' and the id variable. It then looks for a child <td> element with a data-target attribute set to "f_name" and retrieves the text content from that <td> element. The result is stored in the f_name variable.

5 let m_name = $('#row_' + id).children('td[data-target=m_name]').text();

 -Similar to the previous line, this one retrieves the text content of a <td> element with a data-target attribute set to "m_name" within the element identified by the id. to gender as same

6 $('#f_name').val(f_name);

 -This line sets the value of an input element with the id attribute "f_name" to the value stored in the f_name variable.
 and same as gender.

7 $('#modal2').modal('show');

Finally, this line triggers the display of a modal with the id attribute "modal2." It shows the modal to the user.
The purpose of this code is to respond to a user's click on an anchor element with the attribute data-role set to "update." When clicked, it retrieves information from the clicked element and related elements, populates input fields in a modal dialog, and displays the modal to the user. This is often used in web applications to enable users to update or edit data in a user-friendly manner. */


$(document).ready(function () {//append this values in input fields 
  $(document).on('click', 'a[data-role=update]', function () {
      let id = $(this).data('id');
      let f_name = $('#row_' + id).children('td[data-target=f_name]').text();
      let m_name = $('#row_' + id).children('td[data-target=m_name]').text();
      let l_name = $('#row_' + id).children('td[data-target=l_name]').text();
      let age = $('#row_' + id).children('td[data-target=age]').text();
      let gender = $('#row_' + id).children('td[data-target=gender]').text();

      $('#f_name').val(f_name);
      $('#m_name').val(m_name);
      $('#l_name').val(l_name);
      $('#age').val(age);
      $('#gender').val(gender);
      $('#userId').val(id);
      
      $('#modal2Label').text('Update Student Record of ID: ' + id);
  
      $('#modal2').modal('show');
  });
  
  //Now i create an event to get data from fields and update in the database
  $('#save').click(()=>{
    let id = $('#userId').val();
    let f_name = $('#f_name').val();
    let m_name = $('#m_name').val();
    let l_name = $('#l_name').val();
    let age = $('#age').val();
    let gender = $('#gender').val();

    $.ajax({
      url     : 'update_page_1.php',
      method  : 'post',
      data    : {f_name : f_name , m_name : m_name , l_name : l_name , age : age , gender : gender, id : id},
      success : (response) => {
                  //now update user record in table and asign text value as variable asigned value
                  $('#row_' + id).children('td[data-target=f_name]').text(f_name);
                  $('#row_' + id).children('td[data-target=m_name]').text(m_name);
                  $('#row_' + id).children('td[data-target=l_name]').text(l_name);
                  $('#row_' + id).children('td[data-target=age]').text(age);
                  $('#row_' + id).children('td[data-target=gender]').text(gender);
                 
                  $('#modal2').modal('toggle');
                }
              });
    });

});


    //optional test
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
    });
    



   
    
