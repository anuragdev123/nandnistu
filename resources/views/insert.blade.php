<!DOCTYPE html>
<html>
<head>
	<title>insert</title>
        <script src="./js/app1.js" type="text/javascript"></script>

</head>
<form  action="store" method="post" enctype="multipart/form-data">

    
            <input type="text" name="name" id="name" value="" size="22" placeholder="name" />
            <label for="name"><small>Name </small></label><br><br>
             <input type="text" name="phone_num" id="phone" value="" size="22" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="mobile no"/>
		<label for="phone"><small>phone Number</small></label><br><br>
		     
            <input type="date" name="booking_date" id="bookdate" value="" size="22" placeholder=" booking date" />
            <label for="date"><small>booking date (required)</small></label><br><br>
        
            <input type="date" name="function_date" id=" functiondate" value="" size="22" placeholder="function date" />
            <label for="date"><small>function date (required)</small></label><br><br>
         
			<select name="occation">
                  <option value="">Select occation</option>
			<option value="party">Party</option>
			<option value="marrige">Marrige</option>
			<option value="bday">Birthday</option>
			<option value="ringceremony">Ring Ceremony</option>
			<option value="kuwapujan">Kuwapujan</option>

			</select><br><br>
          
       
            <input type="text" name="size" id="size" value="" size="22" placeholder="size image" />
            <label for="size"><small>size</small></label><br><br>
        
            <input type="text" name="total_rate" id="rate" value="" size="22" placeholder="prize" />
            <label for="rate"><small>total rate </small></label><br><br>
          
            <input type="text" name="advance" id="advance " value="" size="22" placeholder="advance money" />
            <label for="advance rate"><small>advance</small></label><br><br>
          
            <input type="text" name="due" id="due" value="" size="22" placeholder="due money" />
            <label for="due rate"><small>due </small></label><br><br>
         
            <input name="submit" type="submit" id="submit" value="Submit" />

</form>
</html>