@extends('admin.layout.index')
@section('css')

@endsection
@section('content')

<div id="page-wrapper">
    <div>
    <style>
	.stat{
		background-image: linear-gradient(to right, purple, pink);
		color: white;

	}

	.stat-items {
		display: inline-block;
		margin: 0 80px;
		text-align: center;
	}
	.stat-items h2{
		font-weight: bold;
		font-size: 42px;
		color: yellow;

	}
	.stat p{
		font-weight: bold;
		letter-spacing: 1px;
	}
  i{
    font-size:50px;
  }
  
</style>
</head>
<body>
	<section class="stat" id="stat">
		<div class="content-box">
			<br><br>
			<div class="container">
				<div class="row text-center">
						<div class="stat-items">
            <i class="fa fa-camera-retro" style="font-size:60px" ></i>
							<h2><span class="counter text-center">{{$view_count}}</span><span></span></h2>
							<p>Views</p>
						</div>
						<div class="stat-items">
            <i class="fa fa-users" aria-hidden="true" style="font-size:60px"  ></i>
							<h2><span class="counter text-center">{{$user_count}}</span><span></span></h2>
							<p>Users</p>
						</div>
							<div class="stat-items">
							<i class="fa fa-file-picture-o" style="font-size:60px"></i>
							<h2><span class="counter text-center">{{$post_count}}</span><span></span></h2>
							<p>Posts</p>
						</div>
					
				</div>
			</div>
		</div>
	</section>
</body>
    </div>
    <h2>Province</h2>
    <div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Provice', 'count'],
          @foreach($prov as $row)
          [
          @if($row->province_id == 1)
              "Hà Nội"
          @elseif($row->province_id == 2)
              "Hồ Chí Minh"
          @elseif($row->province_id == 3)
              "Hải Dương"
          @elseif($row->province_id == 4)
              "Bắc Giang"
          @elseif($row->province_id == 5)
              "Hà Tĩnh"
          @endif 
            ,  {{$row->total}}],
          @endforeach
        ]);
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px"></div>
  </body>
    </div>

    <h2>Category</h2>
    <head>
    <script type="text/javascript">
     	google.charts.load('current', {packages: ['corechart', 'bar']});
		google.charts.setOnLoadCallback(drawBasic);

      function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['loaiphong', 'Số Phòng',{role:'style'}],
        ['Phòng Trọ', {{$phong_tro}},'#AEAB8D'],
        ['Chung cư mini', {{$cat_2}},'#b87333'],
        ['Nhà nguyên căn', {{$cat_3}},'gold'],
        ['Chung cư nguyên căn', {{$cat_4}},' #e5e4e2']
        
      ]);
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data);
    }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 700px; height: 500px;"></div>
  </body>

     

    <h2> Top post </h2>
    <head>
    <script type="text/javascript">
     	google.charts.load('current', {packages: ['corechart', 'bar']});
		google.charts.setOnLoadCallback(drawBasic_1);

      function drawBasic_1() {

      var data = google.visualization.arrayToDataTable([
        ['tenphong', 'Lượt xem',{role:'style'}],
        ['Cho thuê căn hộ', 154,'#EDDD3E'],
        ['Cho thuê nhà 4 tầng giá hạt dẻ', 68,'#ED8A30'],
        ['Cho thuê nhà nguyên căn',57 ,'blue'],
        ['Cho thuê chung cư', 54,' #e5e4e2'], 
        ['Cho thuê phòng trọ khép kín không chung chủ tại CCMN Tân Triều-Tân Khúc',23,'red']
        
      ]);

      
      var chart = new google.visualization.BarChart(document.getElementById('chart_div_1'));
      chart.draw(data);
    }
    </script>
  </head>
  <body>
    <div id="chart_div_1" style="width: 700px; height: 500px;"></div>
  </body>
</div>
@endsection