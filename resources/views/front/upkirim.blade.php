	       @extends('layouts.front')
   
@section('content')
	        <ul>
						 
						 @foreach($decode as $row)
						  @foreach($row['costs'] as $row1)
						 	 @foreach($row1['cost'] as $row2)
						 	  @if($row1['service']=='REG')
						 	    <li>Kurir <span>{{$row['name']}} Layanan {{$row1['service']}}</span></li>
						 	    <li>Estimasi Pengiriman<span>{{$row2['etd']}} Hari</span></li>
						 	    <li>Ongkir <span>Rp. {{number_format($row2['value'],2)}}</span></li>

							@endif
						 	@endforeach
						  @endforeach
						@endforeach
						
					</ul>
					<table>
                            	</th> 
                            	<tr>
							        <th style="padding: 15px">Kurir</th>
        							    <td>
        							        <ul style="list-style-type:none">
        						 	             <li> Kurir Layanan </li>
        						 	        </ul>
        							    </td> 
							 
							    </tr>
							    	<tr>
							        <th style="padding: 15px">Estimasi</th>
        							    <td>
        							        <ul style="list-style-type:none">
        						 	             <li> 1-2 </li>
        						 	        </ul>
        							    </td> 
							 
							    </tr>
							    	<tr>
							        <th style="padding: 15px">Ongkir</th>
        							    <td>
        							        <ul style="list-style-type:none">
        						 	             <li> 123123123213 </li>
        						 	        </ul>
        							    </td> 
							 
							    </tr>
							  
							    </table>
							    
  @endsection