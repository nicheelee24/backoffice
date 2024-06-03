<?php
include "api__url.php";

function callAPI($method, $url, $data){
  $curl = curl_init();
  switch ($method){
     case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);
        if ($data)
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
     case "PUT":
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        if ($data)
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
        break;
     default:
        if ($data)
           $url = sprintf("%s?%s", $url, http_build_query($data));
  }
  // OPTIONS:
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
     'APIKEY: 111111111111111111111',
     'Content-Type: application/json',
  ));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  // EXECUTE:
  $result = curl_exec($curl);
  if(!$result){die("Connection Failure");}
  curl_close($curl);
  return $result;
}

$params = array(
  "dtFrom" => '2024-01-01',
  "dtTo" => '2024-05-01'


);


$make_call = callAPI('POST', $api_url .'report/history/bets', json_encode($params));
$response = json_decode($make_call, true);
$errors = $response['response']['errors'];
$data = $response['response']['data'][0];

die("output");
//curl_setopt($curl, CURLOPT_URL, "".$api_url."report/history/bets.php");
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);




include 'layout/header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">

          <div class="col-sm-3"></div>
          <h1>History</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">History</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="col-md-12">
    <div class="card">
      <div class="card-header">


        <br />
        <div class="row">

          <div class="form-group">
            <label>Date Time</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-clock"></i></span>
              </div>
              <input type="text" class="form-control float-right" id="reservationtime">
            </div>
          </div>

          <div class="form-group">
            <label>Type</label>
            <select class="custom-select">
              <option value="-1">Select Game / Other Type</option>
              <option value="All">All</option>
              <option value="EGAME">EGAME</option>
              <option value="ESPORT">ESPORT</option>
              <option value="FISH">FISH</option>
              <option value="LIVE">LIVE</option>
              <option value="LOTTO">LOTTO</option>
              <option value="SLOT">SLOT</option>
              <option value="TABLE">TABLE</option>
              <option value="VIRTUAL">VIRTUAL</option>
              <option value="DEALER_TIPPING">Other - DEALER_TIPPING</option>
              <option value="PROMOTION">Other - PROMOTION</option>
              <option value="STREAMER_TIPPING">Other - STREAMER_TIPPING</option>
            </select>
          </div>


          <div class="form-group" placeholder="Select">
            <label>Currency</label>
            <select class="custom-select">
              <option value="-1">Select</option>
              <option value="CNY">CNY</option>
              <option value="THB">THB</option>

            </select>
          </div>
          <div class="form-group">

            <button type="button" style="margin-top:32px;margin-left:10px"
              class="btn btn-block btn-warning">Export</button>
          </div>

        </div>
        <h3 class="card-title">Bets History</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0" style="overflow-x:scroll">

        <table class="table" style="width:100%;overflow:scroll">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>User ID</th>
              <th>Game Type</th>
              <th>Game Name</th>
              <th>Game Code</th>
              <th>Platform</th>
              <th>Currency</th>
              <th>Bet Time</th>
              <th>Bet Amount</th>
              <th>Total Bet</th>





            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>






            </tr>



          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->




    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<?php
include 'layout/footer.php';
?>