
var emailValid = false; //indicates if the email is valid
var passwordValid = false; //indicates if the password is valid

// get a list of names from the server and display them
function showAddressBook()
{ 
   // hide the "addEntry" form and show the address book
   document.getElementById( "addEntry" ).style.display = "none";
   document.getElementById( "addressBook" ).style.display = "block";
   
   getAddressBook("");
} // end function showAddressBook

function callServer(first, last, email, password)
{
   var jsonObj = {
       "fname" : first,
       "lname" : last,
       "email" : email,
       "password" : password,
       
   };
   var info = JSON.stringify(jsonObj); 
    
   try
   {
      var asyncRequest = new XMLHttpRequest(); // create request
   
      // set up callback function and store it
      asyncRequest.addEventListener("readystatechange",
         function() { 
            if (asyncRequest.readyState === 4 && asyncRequest.status === 200) 
              console.log(asyncRequest.responseText); //alert(asyncRequest.responseText);
            }, false);

      // send the asynchronous request
      asyncRequest.open( "POST", "http://localhost/phpmongodb/Student-Services-Helper-main/php/backend/AdminBackend/saveJSON.php", true ); 
      asyncRequest.setRequestHeader("Content-Type", "application/json" ); 
      asyncRequest.send(info); // send request        
   } // end try
   catch ( exception ) 
   {
      alert ( "Request Failed" );
   } // end catch 
}

function getAddressBook(searchString) 
{
   var requestUrl = "http://localhost/phpmongodb/Student-Services-Helper-main/php/backend/AdminBackend/address.json";
       
   try
   {
      var asyncRequest = new XMLHttpRequest(); // create request
   
      // set up callback function and store it
      asyncRequest.addEventListener("readystatechange",
         function() { receiveAddresses( asyncRequest, searchString ); }, false);

      // send the asynchronous request
      asyncRequest.open( "GET", requestUrl, true ); 
      asyncRequest.setRequestHeader("Accept", 
         "application/json; charset=utf-8" ); 
      asyncRequest.send(); // send request        
   } // end try
   catch ( exception ) 
   {
      alert ( "Request Failed" );
   } // end catch
}

function receiveAddresses(asyncRequest, searchString) 
{
   // if request has completed successfully process the response
   if ( asyncRequest.readyState == 4 && asyncRequest.status == 200 )
   {
      // convert the JSON string to an Object
      var info = JSON.parse(asyncRequest.responseText);
      // console.log(info);
       displayNames( info, searchString ); // display info on the page
   } // end if
}

// use the DOM to display the retrieved address book entries
function displayNames( info, searchString )
{
   // get the placeholder element from the page
   var listBox = document.getElementById( "Names" );
   listBox.innerHTML = "<br"; // clear the names on the page 

   if(searchString == "")
       // iterate over retrieved entries and display them on the page
       for ( var i = 0; i < info.length; ++i )
       {
          // dynamically create a div element for each entry
          // and a fieldset element to place it in
          var entry = document.createElement( "div" );
          var field = document.createElement( "fieldset" );
          entry.id = i; // set the id
          entry.innerHTML = info[i].fname + " " + info[i].lname + "<br>" + "Email: " + info[i].email + 
                    "<br>";
          field.appendChild( entry ); 
          listBox.appendChild( field ); 
        } 
    else
        
       for ( var i = 0; i < info.length; ++i )
       {
           if(info[i].lname == searchString)
           {
              // dynamically create a div element for each entry
              // and a fieldset element to place it in
              var entry = document.createElement( "div" );
              var field = document.createElement( "fieldset" );
              entry.id = i; // set the id
              entry.innerHTML = "Name: " + info[i].fname + "  Family:" + info[i].lname + "<br>" + 
                        "Email: " + info[i].email 
              field.appendChild( entry ); // insert entry into the field
              listBox.appendChild( field ); // display the field
           }
        } // end for
} // end function displayNames

// search the address book for input
// and display the results on the page
function search( input )
{
   // get the placeholder element and delete its content
   var listBox = document.getElementById( "Names" );
   listBox.innerHTML = ""; // clear the display box

   // if no search string is specified all the names are displayed
   if ( input == "" ) // if no search value specified
   {   
       getAddressBook("");
   } 
   else
   {
       getAddressBook(input);
   } 
} 

function addEntry()
{
   document.getElementById( "addressBook" ).style.display = "none";
   document.getElementById( "addEntry" ).style.display = "block";
} // end function addEntry

// send the email code to check format
function validateEmail(email)
{
   emailValid =  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email);
   if (emailValid)
       document.getElementById( "validateEmail" ).innerHTML = "Valid email";
    else
       document.getElementById( "validateEmail" ).innerHTML = "Invalid email";
} 

function validatePassword(password)
{
   passwordValid =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password);
   if (passwordValid)
       document.getElementById( "validatePassword" ).innerHTML = "Valid password";
    else
       document.getElementById( "validatePassword" ).innerHTML = "Invalid password: at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number, 1 special character:";
} 


// enter the user's info into the database
function saveForm()
{  
   // retrieve the info from the form
   var first = document.getElementById( "first" ).value;
   var last = document.getElementById( "last" ).value;

   var email = document.getElementById( "email" ).value;
   var password = document.getElementById( "password" ).value;

   
   
   if ( !emailValid)
   {
      // display error message
      document.getElementById( "success" ).innerHTML = 
         "Invalid info entered. Check form for more information";
   } 
   if ( !passwordValid)
   {
      // display error message
      document.getElementById( "success" ).innerHTML = 
         "Invalid info entered. Check form for more information";
   }
   else if ( ( first == "" ) || ( last == "" ) )
   {
      document.getElementById( "success").innerHTML = 
         "First Name and Last Name must have a value.";
   } 

   else
   {
      document.getElementById( "addEntry" ).style.display = "none";
      document.getElementById( "addressBook" ).style.display = "block";

      callServer(first, last, email, password);
      alert("Admin successfully added!");     
   } // end else
} // end function saveForm

// register event listeners
function start()
{
   document.getElementById( "addressBookButton" ).addEventListener(
      "click", showAddressBook, false );
   document.getElementById( "addEntryButton" ).addEventListener(
      "click", addEntry, false );
   document.getElementById( "searchInput" ).addEventListener(
      "keyup", function() { search( this.value ); } , false );
   document.getElementById( "email" ).addEventListener(
      "blur", function() { validateEmail( this.value ); } , false );
      document.getElementById( "password" ).addEventListener(
         "blur", function() { validatePassword( this.value ); } , false );
   document.getElementById( "submitButton" ).addEventListener(
      "click", saveForm , false );

   showAddressBook("");
}

window.addEventListener( "load", start, false );      



