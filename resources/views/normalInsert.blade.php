<!DOCTYPE html>
<html>
<head>
	<title>insert</title>

</head>
<form  action="storeNormal" method="post" enctype="multipart/form-data" method="post">

            

             <input type="date" name="date" id="bookdate" value="" size="22" placeholder=" booking date" />
            <label for="date"><small>date (required)</small></label><br><br>

            <input type="text" name="name" id="name" value="" size="22" placeholder="name" />
            <label for="name"><small>Name </small></label><br><br>


		<input type="text" name="mobile_num" id="phone" value="" size="22" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="mobile no"/>
		<label for="phone"><small>mobole Number</small></label><br><br>
		     
       
            <input type="text" name="size" id="size" value="" size="22" placeholder="size image" />
            <label for="size"><small>size</small></label><br><br>

            <input type="text" name="other_size" id="size" value="" size="22" placeholder="other size image" />
            <label for="size"><small>other size</small></label><br><br>


             <input type="text" name="total_photos" id="size" value="" size="22" placeholder="other size image" />
            <label for="size"><small>total phots</small></label><br><br>

        
            <input type="text" name="total_prize" id="rate" value="" size="22" placeholder="prize" />
            <label for="rate"><small>total prize </small></label><br><br>
          
            <input type="text" name="advance" id="advance " value="" size="22" placeholder="advance money" />
            <label for="advance rate"><small>advance</small></label><br><br>
          
            <input type="text" name="due" id="due" value="" size="22" placeholder="due money" />
            <label for="due rate"><small>due </small></label><br><br>

             <input type="file" name="image"><br><br>

            <label for="chnages"><small>chnages </small></label><br>
            <textarea rows="4" cols="50" name="chnages">
            changes
            </textarea ><br><br>
         
            <input name="submit" type="submit" id="submit" value="Submit" />

</form>
</html>