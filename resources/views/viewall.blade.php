<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
	<style>
		th,tr,td{
			border: 1px solid #CCC;
		}
		table{
			width: 900px;
			border-collapse: collapse;
			border-spacing: 0;
		}

	</style>
</head>
<body><center>
<a href="insert"><strong>Create</strong></a><br>
<hr>
 <table>
 	<tr>
 	    <th>ID</th>
 		<th>Name</th>
 		<th>Photo Name</th>
 		<th>Phone Number</th>
 		<th>Booking Date</th>
 		<th>Function Date</th>
 		<th>Occation</th>
 		<th>Size</th>
 		<th>Total Rate</th>
 		<th>Advance</th>
 		<th>Due</th>
 	</tr>
 	<tbody>
 	@foreach($user as $users)
 		<tr>
 		    <td>{{$users->id}}</td>
 			<td>{{$users->name}}</td>
 			<td>{{$users->image}}</td>
 			<td>{{$users->phone_num}}</td>
 			<td>{{$users->booking_date}}</td>
 			<td>{{$users->function_date}}</td>
 			<td>{{$users->occation}}</td>
 			<td>{{$users->size}}</td>
 			<td>{{$users->total_rate}}</td>
 			<td>{{$users->advance}}</td>
 			<td>{{$users->due}}</td>
 			
 			<td><img src="{{URL::to('/'.$users->image)}}" width="60px" height="60px"></td>
 		</tr>
 		@endforeach
 	</tbody>
 </table>
 </center>
</body>
</html>