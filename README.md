# MultiSelect.js  
JavaScript Plugin to select multiple options from a list  
Written By: Arjun AdhiQari  
Github Repo: https://github.com/arjunQ21/MultiSelect.js  
Live Demo: https://arjunQ21.github.io/MultiSelect.js

Written Date: 3-8-2019  
License: Free for Everyone  
:)  
NOTE: This Plugin requires HTML, css and PHP files too.  
  
  
This plugin can be used when multiple options are to be selected from a list.      
Good Old "select" tag can only select one option at a time. Well, this helps to select multiple options too.    
    
In the server side, this plugin can be implemented by any language, but I have written it only for PHP.  
You can try implementing this plugin for other languages too, it's not that hard, just basic templating stuffs only.  
  
# Documentation  
 Backend (PHP):  
   
 Creating new Instance:  
   
    $ms = new ArjunAdhiQari\MultiSelect( "msd" );  
This string "msd" is the id of the multi-select div element and name of input tag, whose value can be sent to the server, from forms.
  
Adding Title:  

    $ms->title = "Select Districts" ;  
  
Adding Select Data:  
This data must be an associative array, having key and value pairs.   
Comparing with select tag:  
    
   
    <select name = 'n1'>
      <option value = 'v1'> Value1 </option>
      <option value = 'v2'> Value2 </option>
    </select>         
    
Here, n1 is equivalent to "msd".  
The structure of data array is like:  
 
    ['v1' => 'Value1', 'v2'=>'Value2']  
Keys and Values of associative array are mapped as such.  
  
 
    $ms->data = ['1'=>'Acchham', '2'=>'Kaski', '3'=>'Chitwan' ....] ;  
  
You can change the color of options that appear, as such:  
  
 
    $ms->color = ['selected'=>'#f05', 'background'=>'pink'];  
  
If you like some items to be chosen for default, make an array of keys of those items, and set the chosen array's value to that array.  
  
 
    $ms->chosen = [ 2, 5];  
  
If you expect maximum of 'n' selects then you can do like this:  
  
 
    $ms->max = 4 ;  
  
Finally, to display the GUI prepared above, you can use the render() function.  
  
 
    $ms->render() ;  
  
The value of input tag is dynamically changed with javaScript from browser, once user chooses or unchooses some options. 

  
  # FrontEnd Js
  The string "msd" passed above as an argument to the MultiSelect class, becomes a variable in javaScript. \
  This variable is an instance of js class MultiSelect.
  This variable is scoped globally. 
  You can change colors from js too as:
    
    msd.color.background = 'red' ;
    msd.forceColorUpdate() ;
    
  to get the array of chosen items dynamically in js, you can do as such:  
  
   
    var chosenItems = msd.chosen ;
  
  
  
