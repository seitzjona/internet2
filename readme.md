# Creating a phrase generator
### Wolfgang Gruel

The following file describes how to create a phrase generator. It describes creating the service step-by-step. If you want to build on the state that we discussed during our class, you can download the code on Github: https://github.com/wgruel/i217w_boox

Make sure, you put the files into a subfolder of your document root (see Setup system section). There will an .sql files in that folder - this contains the current database. You can open that file with a normal texteditor (e.g., ATOM or Sublime) and copy the text to the SQL-Tab in PhpMyAdmin AFTER having selected a database (see Setup database section).

### Disclaimer
We want to create PHP-Files that access our database, so we can view, change and delete phrases and users from the browser. In order to learn the concepts, we do this in a simplistic way without considering modern architecture patterns...

## Setup system

Install Xampp on your machine (https://www.apachefriends.org/de/download.html).
The directory that the webserver works with is called "htdocs" (= document root). It is a subdirectory of your Xampp-Installation folder (on Mac "/Applications/XAMPP/htdocs", on Windows ususally something like "C:\xampp\htdocs")


## Create the input interface

The first thing, we want to do, is to create an input site. 

We will need a headline: 

```
<h1>I say YES! to ...</h1>
```

To submit that information, we need a form. As a first step, we will just send the information to the page itself (no action will be set) and will use GET as a method to transmit the data. 

```
<form method="get">
 <!-- form content goes here -->
</form>
```

As input, we will use two select-fields - every phrase-element will be put into an option-tag. Each of the selects needs to get a unique name (e.g. "phrase_01"). 

```
    <select class="custom-select" name="phrase_01">
        <option selected>Open this select menu</option>
        <option value="learning">learning</option>
        <option value="exploring">exploring</option>
        <option value="finding">finding</option>
        <option value="enjoying">enjoying</option>
    </select>
```

If we want to use special characters as values, we need to URL-encode them (e.g., replace spaces with %20). 

Then, we will need a button in order to submit all that stuff: 
```
    <button type="submit" class="btn btn-default" name="btn-save" value="1">Say YES!</button>
```

If we load the page in our browser now (in localhost context), we select several options, now. If we press the button, the address-line of our browser changes - we submit the entered data to the server. Nice. 


## Processing the input

We want to process this input now. Therefore, we put some PHP to the top of the page. This PHP is supposed to check if the button was pressed. To do that, we process the information that was delivered via the $_GET array (the form data should be stored here...). 

```
<?php
  if(isset($_GET['btn-save'])){
    // here, we will put the save-operations... 
  }
?>
```

## Save the input to a file
We can simply store all the information to a file now. 
We define a variable called $filename and a variable called $text - this variable is supposed to contain all the text and contains of the two elements that are delivered via the $_GET parameter.  
```
    $filename = "file.txt"; 
    $text = $_GET['phrase_01'] . " " . $_GET['phrase_02']; 
    file_put_contents($filename, $text);

```

If you submit the form now, you should be able to see a new file that contains the information that you just selected. Check if the file was written and open it with a text editor. It should contain all the submitted information, now. 

In case, you encounter problems, you might want to check the permissions (Right-click the folder and check if the webserver has write-access...). 

Unfortunately, the information that we want to write is URL-encoded (contains strange %20s). We want to store the information in a different style, so we have to perform an URL-decode operation: 

```
$text = urldecode($text);
```

## Reading the phrases from a file

We will create a new file to read all the phrases: phrasesList.php. 

We add the following code to the top of the file in order to read the contents of the file: 

```
<?php 
  $filename = "file.txt"; 
  $text = file_get_contents($filename);
?>
```

In the HTML-Part, we just echo the content of $text in order to put the file content to the right place:

<?php echo $text ?>
