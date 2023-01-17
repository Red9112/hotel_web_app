
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
        <link rel="stylesheet" href="/css/invoice.css">
	</head>
	<body>
        <span><img class="logo"  src="{{asset('/img/logo/HotelLogo1.png')}}" href="#" ></span>
		<header>
			<h1>Invoice</h1>
			<address>
				<p>{{$payment->transaction->customer->name}}</p>
				<p>{{$payment->transaction->customer->adress}}<br></p>
                <p>{{$payment->transaction->customer->cne}}</p> 
			</address>
			
		</header>
		<article>
			
		
			<table class="meta">
				<tr>
					<th><span >Invoice Id</span></th>
					<td><span >{{$payment->id}}</span></td>
				</tr>
				<tr>
					<th><span >FROM</span></th>
					<td><span >{{$helper->dateDayFormat($payment->transaction->check_out)}}</span></td>
				</tr>
				<tr>
					<th><span >TO</span></th>
					<td><span>{{$helper->dateDayFormat($payment->transaction->check_out)}}</span></td>
				</tr>
			</table> 
			<table class="inventory">
				<thead>
					<tr>
						<th><span >Served By</span></th>
						<th><span >Room</span></th>
						<th><span >Days</span></th>
						<th><span >Date</span></th>
						<th><span >Price</span></th>
					</tr>
				</thead> 
				<tbody>
					<tr>
						<td><span >{{$payment->user->name}}</span></td>
						<td><span >{{$payment->transaction->room->number}}</span></td>
						<td><span>{{$payment->transaction->getDaysForm()}}</span></td>
						<td><span >{{$payment->created_at}}</span></td>
						<td><span>{{$payment->price}} DH</span></td>
					</tr>
				</tbody>
			</table>
			<table class="balance"> 
				<tr>
					<th><span >Total</span></th>
					<td><span>{{$payment->transaction->getTotalPrice($payment->transaction->room->price,$payment->transaction->check_in,$payment->transaction->check_out)}}</span></td>
				</tr>
				<tr>
					<th><span >Paid OFF</span></th>
					<td><span>{{$payment->transaction->getPaidOff()}}</span></td>
				</tr>
				<tr>
					<th><span>Rest</span></th>
					<td><span>{{$payment->transaction->getDept($payment->transaction->room->price,$payment->transaction->check_in,$payment->transaction->check_out)}}</span></td>
				</tr>
			</table>
		</article>
		<aside> 
			<h1><span ></span></h1>
			<div>
				<p></p>
			</div>
		</aside>
		<a title="Download " href="{{route('pdf',$payment->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="60%" height="80" viewBox="0 0 200 24"><path fill="#f4dab7" d="M26,8V28a2,2,0,0,1-2,2H8a2,2,0,0,1-2-2V4A2,2,0,0,1,8,2H20Z"/><path fill="#6d6daa" d="M24,31H8a3,3,0,0,1-3-3V4A3,3,0,0,1,8,1H20a1,1,0,0,1,.71.29l6,6A1,1,0,0,1,27,8V28A3,3,0,0,1,24,31ZM8,3A1,1,0,0,0,7,4V28a1,1,0,0,0,1,1H24a1,1,0,0,0,1-1V8.41L19.59,3Z"/><polygon fill="#d6b5b0" points="26 8 20 8 20 2 26 8"/><path fill="#6d6daa" d="M26 9H20a1 1 0 0 1-1-1V2a1 1 0 0 1 .62-.92 1 1 0 0 1 1.09.21l6 6a1 1 0 0 1 .21 1.09A1 1 0 0 1 26 9zM21 7h2.59L21 4.41zM16 27.06a1 1 0 0 1-.71-.29l-3-3a1 1 0 1 1 1.42-1.41L16 24.65l2.29-2.29a1 1 0 1 1 1.42 1.41l-3 3A1 1 0 0 1 16 27.06z"/><path fill="#6d6daa" d="M16,27.06a1,1,0,0,1-1-1v-14a1,1,0,0,1,2,0v14A1,1,0,0,1,16,27.06Z"/></svg></a>
		
        <script src="/js/invoice.js"></script>
        
	</body>
</html>