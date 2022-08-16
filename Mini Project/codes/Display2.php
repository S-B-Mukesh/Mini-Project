<?php
  $con=mysqli_connect("localhost","root","","airport_authority_of_india");
  if($con==false){
    echo "<script>alert('Connection Failed')</script>";
  }
  else{
    if(isset($_POST['submit'])){
      if($_POST['t1'] != '' and $_POST['t2'] != '' and ($_POST['t3'] != '' or $_POST['t4'] != 'Year' or ($_POST['t4'] != 'Year' and $_POST['t5'] != 'Month'))){
      $air=$_POST['t1'];
      $ser=$_POST['t2'];
      $dat=$_POST['t3'];
      $year=$_POST['t4'];
      $month=$_POST['t5'];
      $title=$ser." service at ".$air;
      if(strlen($dat)==10){
        $q="SELECT count(substr(Entry,1,10)) FROM $air where $ser=1  AND substr(Entry,1,10)='$dat'";
        $res=mysqli_query($con,$q);
        $temp1=mysqli_fetch_array($res);
      }
      elseif(strlen($year)==4){
        if(strlen($month)==2){
          $t=$year."-".$month;
          $q="SELECT count(substr(Entry,1,10)) FROM $air where $ser=1  AND substr(Entry,1,7)='$t'GROUP BY substr(Entry,1,10) ORDER BY count(substr(Entry,1,10)) DESC";
          $res=mysqli_query($con,$q);
          $temp1=mysqli_fetch_array($res);
        }
        else{
          $max=0;
          $months=array("01","02","03","04","05","06","07","08","09","10","11","12");
          foreach( $months as $a){
            $t=$year."-".$a;
            $q="SELECT count(substr(Entry,1,10)) FROM Vizag where Trolly=1 AND substr(Entry,1,7)='$t' GROUP BY substr(Entry,1,10) ORDER BY count(substr(Entry,1,10)) DESC";
            $res=mysqli_query($con,$q);
            $temp1=mysqli_fetch_array($res);
            $r=$temp1[0] ?? NULL;
            if($r and $temp1[0]>$max){
              $max=$temp1[0];
            }
          }
          $temp1[0]=$max;
        }
      }
      $q="SELECT * FROM Stock_Details where Airport_Name='$air'";
      $res=mysqli_query($con,$q);
      $temp2=mysqli_fetch_array($res);
      $res=$temp1[0] ?? NULL;
      $a=(int)$temp2[$ser]-(int)$res;
      $arr=array(["Used","$res"],["Not Unsed",$a]);
      echo "<script>
        var my_2d=".json_encode($arr)."
      </script>";
    }
    else{
      echo "<script>alert('Invalid Request')</script>";
    }
    }
  }

?>


<html>
    <head>
        <title>Pie Chart</title>
        <style media="screen">
        .header{
          padding: 35px 35px 35px 35px;
          border-style: solid;
          border-radius: 40px;
          border-color: green;
          margin: 35px;
          background-clip: padding-box;
          bgcolor : skyblue;
        }
        td{
          border: 5px solid green;
          border-radius: 30px;
        }
        .s1, .s2{
          display: inline-block;
          text-align: center;
        }
        .s1{
          margin-left: 100px;
        }
        .s2{
          margin-left: 150px;
        }
        </style>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', { packages:['corechart']});
        </script>
    </head>
    <body>
        <center>
          <div class="header" style = "background-color : skyblue">
          <table align = "center" width="100%">
        	<tr>
        	   <th><img src = "airport  logo.jpg" alt = "Logo" width = "300" height = "150"></th>
        	   <th><center><h1><font size="14">INDIAN AIRPORT AUTHORISATION</h1></font></center></th>
        	<tr>
        	</table>
          </center>
        </div>
        <div class="s1"><h1 >SERVICE UTILIZATION ANALYTICS</h1></div>
        <div class="s2"><h1 id='temp'></h1></div>
        <table class="display" style="margin-left: 75px" cellspacing="40">
          <tr height="500px">
          <td align="center"  >
          <form style="font-size: 30px" Id="f1" action="Display2.php" method="post">
            <label >Choose the airport: </label>
            <select name="t1" style = "font-size : 27px">
              <option></option>
              <option value="Vizag">Vizag</option>
              <option value="Gannavaram">Gannavaram</option>
            </select>
            <br>
            <label>Select the Service: </label>
            <select name="t2" style = "font-size : 27px">
              <option></option>
              <option value="Trolly">Trolly</option>
              <option value="Laggage_Wrapping">Laggage_Wrapping</option>
              <option value="Wheelchairs">Wheelchairs</option>
            </select>
            <br>
            <label>Select the date: </label>
            <input type="date" name="t3">
            <br>
            <p style="font-size: 20px">OR</p>
            <label>Select Year (and/or) Month</label>
            <select name="t4" style = "font-size : 27px">
              <option>Year</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
            </select>
            <select name="t5" style = "font-size : 27px">
              <option>Month</option>
              <option value='01'>Janaury</option>
              <option value='02'>February</option>
              <option value='03'>March</option>
              <option value='04'>April</option>
              <option value='05'>May</option>
              <option value='06'>June</option>
              <option value='07'>July</option>
              <option value='08'>August</option>
              <option value='09'>September</option>
              <option value='10'>October</option>
              <option value='11'>November</option>
              <option value='12'>December</option>
            </select>
            <br>
            <br>
            <input type="submit" name="submit" style="font-size:25px">
          </form>
        </td>
        <td>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
        if(isset($_POST['submit']) and $_POST['t1'] != '' and $_POST['t2'] != '' and ($_POST['t3'] != '' or $_POST['t4'] != 'Year' or ($_POST['t4'] != 'Year' and $_POST['t5'] != 'Month'))){
        echo "
           <div id='display'></div>
            <script>
            document.getElementById('temp').innerHTML='$title';
                google.charts.setOnLoadCallback(draw_my_chart);
                function draw_my_chart(){
                  var data=new google.visualization.DataTable();
                  data.addColumn('string','State');
                  data.addColumn('number','Nos');
                  for(i=0;i<my_2d.length;i++){
                    data.addRow([my_2d[i][0],parseInt(my_2d[i][1])]);
                  }
                  var options={width:600,height:500,legend:'left',is3D:true};
                  var chart=new google.visualization.PieChart(document.getElementById('display'));

                  chart.draw(data,options);
              }
            </script>";
      }
        ?>
      </td>
    </tr>
  </table>

    </body>
</html>
