@extends('admin.layouts.main')
@section('title', 'Analytics')
@section('content')
    <div class="container-fluid">
       <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4 d-none">
        <h1 class="h3 mb-0 text-gray-800 w-600">Analytics</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
       <div class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
			<form action="#!">
				<label for="currenttime" class="m-0">Select Current</label>
				<select id="currenttime" name="currenttime">
        <option value=""> 24 Hours  </option>
				<option value="current_week">Week</option>
        <option value="current_month">Month</option>
        <option value="current_year">Year</option>
				<!-- <option value="Month"></option>				 -->
			</select>  
			</form>
		</div>
      </div>

                <!-- Content Row -->
          <div class="row d-none">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Leads</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Whatsapp Enabled</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-whatsapp fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Subscribed</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Unsubscribed</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending Optin</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-whatsapp fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">EMI Opted</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-whatsapp fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Call back opted</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-whatsapp fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">After first place Call back opted</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-whatsapp fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Duration & Quantity Overview</h6>
      <div class="dropdown no-arrow d-none">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Dropdown Header:</div>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="chart-area">
      @if(isset($userInteractionOverview['total_time']) && count($userInteractionOverview['total_time'])>0)
      <canvas id="myAreaChart1"></canvas>
        @else
        <div id="no-data" class="text-center text-danger text-justify font-weight-bold">No Data to display</div>
        @endif
        
      </div>
    </div>
  </div>
</div>
</div>

          <div class="row">
          <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pie Chart Representation of Average Duration and Quantity</h6>
                  <div class="dropdown no-arrow d-none">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in d-none" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body mt-4">
                  <div class="chart-pie m-2">
                  @if(isset($averageInteractionOverview['message']) && count($averageInteractionOverview['message'])>0)
                    <canvas id="myPieChart5"></canvas>
                    @else
                    <div id="no-data" class="text-center text-danger text-justify font-weight-bold">No Data to display</div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
          <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Product Info Overview</h6>
                  <div class="dropdown no-arrow d-none">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in d-none" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body mt-4">
                  <div class="chart-pie m-2">
                  @if(isset($productOverview['message']) && count($productOverview['message'])>0)
                    <canvas id="myPieChart2"></canvas>
                    @else
                    <div id="no-data" class="text-center text-danger text-justify font-weight-bold">No Data to display</div>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pie Chart Representation of Product Info</h6>
                  <div class="dropdown no-arrow d-none">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in d-none" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body mt-4">
                  <div class="chart-pie m-2">
                  @if(isset($productOverview['message']) && count($productOverview['message'])>0)
                    <canvas id="myPieChart4"></canvas>
                    @else
                    <div id="no-data" class="text-center text-danger text-justify font-weight-bold">No Data to display</div>
                    @endif
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="row">

            
          </div>


          <div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Dealerwise Callback</h6>
      <div class="dropdown no-arrow d-none">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Dropdown Header:</div>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <p>Total Callback - {{$totalcallback}}</p>
      <div class="chart-area">
      @if(isset($dealerwisecallbackoverview['dealerName']) && count($dealerwisecallbackoverview['dealerName'])>0)
      <canvas id="myBarChart1"></canvas>
        @else
        <div id="no-data" class="text-center text-danger text-justify font-weight-bold">No Data to display</div>
        @endif
        
      </div>
    </div>
  </div>
</div>
</div>

<div class="row">

<!-- Area Chart -->

</div>

    </div>
@endsection
@section('custom_script_js')
<!-- Page level plugins -->
<script src="{{ asset('js/lib/Chart.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('js/lib/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/lib/chart-pie-demo.js') }}"></script>
<script src="{{ asset('js/lib/chart-bar-demo.js') }}"></script>
<script>

var ctx = document.getElementById("myAreaChart1");
if(ctx != null){
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($userInteractionOverview['total_time']); ?>,
        datasets: [{
            label: "Interactions",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: <?php echo json_encode($userInteractionOverview['total_interaction']); ?>,
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 7
                },
                scaleLabel: {
                  display: true,
                  fontSize: 16,
                  fontColor: "blue",
                  labelString: "Time in Hours"
                },
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    callback: function(value, index, values) {
                        return  number_format(value);
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                },
                scaleLabel: {
                  display: true,
                  fontSize: 16,
                  fontColor: "blue",
                  labelString: 'Interactions '
                },
            }],
        },
        legend: {
            display: false
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ':' + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});
}

var ctx = document.getElementById("myPieChart2");
if(ctx != null){
var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($productOverview['message']); ?>,
        datasets: [{

            data: <?php echo json_encode($productOverview['total']); ?>,
            backgroundColor: <?php echo json_encode($productOverview['bgColorArray']); ?>,
            hoverBackgroundColor: <?php echo json_encode($productOverview['hoverColorArray']); ?>,
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 80,
    },
});
}




    var data = [{
            data: <?php echo json_encode($averageInteractionOverview['total']); ?>,
            labels: <?php echo json_encode($averageInteractionOverview['message']); ?>,
            backgroundColor: <?php echo json_encode($averageInteractionOverview['bgColorArray']); ?>,
            borderColor: "#fff"
        }];
        
           var options = {
             
           tooltips: {
            callbacks: {
        title: function(tooltipItem, data) {
          return data['labels'][tooltipItem[0]['index']];
        },
        label: function(tooltipItem, data) {
          return data['datasets'][0]['data'][tooltipItem['index']];
        },
        afterLabel: function(tooltipItem, data) {
          var dataset = data['datasets'][0];
          var percent = Math.round((dataset['data'][tooltipItem['index']] / <?php echo json_encode($timeInteractionTotal); ?>) * 100)
          return dataset['labels'][tooltipItem['index']] +'(' + percent + '%)';
        }
      },
    },
    };
    
    
        var ctx = document.getElementById("myPieChart5").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: data
        },
              options: options
    });

var ctx = document.getElementById("myBarChart1");
if(ctx != null){
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($dealerwisecallbackoverview['dealerName']); ?>,
    datasets: [{
      label: "Callback",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: <?php echo json_encode($dealerwisecallbackoverview['callbackleads']); ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 5,
          padding: 10,
          
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ':' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});
}



$('select').on('change', function() {

  if(this.value == ''){
    window.location = '/admin/analytics';
  }else{
  var currentUrl = document.URL;
  const queryString = window.location.search;

  paramString = currentUrl.split("?");
  var flag =0;
  if(paramString[1] == undefined){
    var params = [];
  }else{
    var params = paramString[1].split("&");
    
    for(var i=0;i<params.length;i++){      
      var key = params[i].split("=");
     
    if(key[0] == 'time'){
      key[1] = this.value;
      params[i] = key.join("=");
      flag =1;
    }
  }
  }
 
 if(flag == 0){
  params[params.length] = ['time',this.value].join("=");
 }
  

  params = params.join("&");
  newurl = [paramString[0],params].join("?");

  window.location = newurl;
}
});
</script>
@endsection