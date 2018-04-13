<!DOCTYPE html>
<html>
 <head>
<script
 src="https://code.jquery.com/jquery-2.2.4.min.js"
 integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
 crossorigin="anonymous">    
 </script>
<script type="text/javascript">
$(function (){
   var $work = $('#work');
   $.ajax ({
       type: 'GET',
       url:"http://matrix.f45.info/v1/workouts",
           success: function (work){
               console.log(work);
               for (var key in work.data) {
                   $('tbody').append('<tr></tr>');
                    $('tbody').append('<td>' + work.data[key].id  + '</td>');
                    $('tbody').append('<td>' + work.data[key].workout_name  + '</td>');
                     $('tbody').append('<td>' + work.data[key].rest  + '</td>');
                     $('tbody').append('<td>' + work.data[key].rounds  + '</td>');
                     $('tbody').append('<td>' + work.data[key].sets  + '</td>');
                     $('tbody').append('<td>' + work.data[key].timeline  + '</td>');
                     $('tbody').append('<td>' + work.data[key].week  + '</td>');
                     $('tbody').append('<td>' + work.data[key].weekday  + '</td>');
                     $('tbody').append('<td>' + work.data[key].work  + '</td>');
                     $('tbody').append('<td>' + work.data[key].workoutrounds  + '</td>');
                     $('tbody').append('<td>' + '<image src= '+ work.data[key].workout_information_video_thumbnail + '" width="300 "' + '</td>');
                     $('tbody').append('<td>' + '<video width="200" controls>'+ '<source src=' + work.data[key].workout_information_video_mp4 +
                      'type = "video/mp4">' + '</video>' + '</td>');
                      
               }
            }
       });
 
});
</script>

 </head>
<br></br>
<br></br>
<body>
  <h1><center>Customers Information</center></h1>
     <table class='table table-striped' border="1" align="center" style="margin-top: 30px;">
      <thead>
        <tr bgcolor="pink">
          <th>ID</th>
           <th>Name</th>
          <th>Rest</th>
          <th>Rounds</th>
          <th>Sets</th>
          <th>Timeline</th>
          <th>Week</th>
          <th>Weekday</th>
          <th>Work</th>  
          <th>WorkRounds</th>
          <th>Pictures</th>
          <th>Videos</th>
        </tr>
      </thead>
     <tbody>
       <tr>

       </tr>
     </tbody object align="middle">
   </table>
 </body>
</html>