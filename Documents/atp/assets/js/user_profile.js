/**
 * Created by Singh on 12/3/17.
 */
       $(document).ready(function(){
  $('.profile-sidebar ul li a').click(function(){

      var currid =  $('.profile-usermenu .active').children().attr('class');
        $('.profile-usermenu .active').removeClass("active");
         $('#' + currid).css("display", "none");

      currid =  $(this).attr('class');
     $('#'+ currid).css("display", "block");
      $(this).parent().addClass("active");
});



 //  append values in input fields
      $(document).on('click','a[data-role=update]',function(){
            var id  = $(this).data('id');
            var first_name  = $('.'+id +' > '+ '#per-details').children('[data-target=first_name]').children().eq(1).text();
            var last_name  = $('.'+id +' > '+ '#per-details').children('[data-target=last_name]').children().eq(1).text();
            var email  = $('.'+id +' > '+ '#per-details').children('[data-target=email]').children().eq(1).text();
            var address  = $('.'+id +' > '+ '#per-details').children('[data-target=address]').children().eq(1).text();
            var state  = $('.'+id +' > '+ '#per-details').children('[data-target=state]').children().eq(1).text();
            var city  = $('.'+id +' > '+ '#per-details').children('[data-target=city]').children().eq(1).text();
            var zipcode  = $('.'+id +' > '+ '#per-details').children('[data-target=zipcode]').children().eq(1).text();
            var university  = $('.'+id +' > '+ '#ed-details').children('[data-target=university]').children().eq(1).text();
            var university_state  = $('.'+id +' > '+ '#ed-details').children('[data-target=university_state]').children().eq(1).text();
            var year_of_completion  = $('.'+id +' > '+ '#ed-details').children('[data-target=year_of_completion]').children().eq(1).text();

            $('#first_name').val(first_name);
            $('#last_name').val(last_name);
            $('#email').val(email);
            $('#address').val(address);
            $('#state').val(state);
            $('#city').val(city);
            $('#zipcode').val(zipcode);
            $('#university').val(university);
            $('#university_state').val(university_state);
            $('#year_of_completion').val(year_of_completion);

            $('#userId').val(id);

            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database

       $('#save').click(function(){
          var id  = $('#userId').val();
         var first_name =  $('#first_name').val();
          var last_name =  $('#last_name').val();
          var email =   $('#email').val();
          var address =   $('#address').val();
          var state =   $('#state').val();
          var city =   $('#city').val();
          var zipcode =   $('#zipcode').val();
          var university = $('#university').val();
          var university_state = $('#university_state').val();
          var year_of_completion = $('#year_of_completion').val();


          $.ajax({
              url      : 'save_profile.php',
              method   : 'post',
              data     : {first_name : first_name , last_name: last_name , email : email ,address : address, state : state,
              city : city,zipcode : zipcode,university : university,university_state : university_state,  year_of_completion :
              year_of_completion , id: id},
              success  : function(response){
                            // now update user record in table
                             $('.'+id +' > '+ '#per-details').children('[data-target=first_name]').children().eq(1).text(first_name);
                            $('.'+id +' > '+ '#per-details').children('[data-target=last_name]').children().eq(1).text(last_name);
                             $('.'+id +' > '+ '#per-details').children('[data-target=email]').children().eq(1).text(email);
                             $('.'+id +' > '+ '#per-details').children('[data-target=address]').children().eq(1).text(address);
                             $('.'+id +' > '+ '#per-details').children('[data-target=state]').children().eq(1).text(state);
                             $('.'+id +' > '+ '#per-details').children('[data-target=city]').children().eq(1).text(city);
                             $('.'+id +' > '+ '#per-details').children('[data-target=zipcode]').children().eq(1).text(zipcode);
                             $('.'+id +' > '+ '#ed-details').children('[data-target=university]').children().eq(1).text(university);
                             $('.'+id +' > '+ '#ed-details').children('[data-target=university_state]').children().eq(1).text(university_state);
                             $('.'+id +' > '+ '#ed-details').children('[data-target=year_of_completion]').children().eq(1).text(year_of_completion);
                             $('#myModal').modal('toggle');

                         }
          });
       });


       $(document).on('click','a[data-role=seechart]',function(){
            var id  = $(this).data('id');
            id = parseInt(id);
            $('#chartModal').modal('toggle');
            var score = 0;

         	var total = 5;

         	total_easy = 0;
	        total_easy_correct = 0;
	        total_medium = 0;
	        total_medium_correct = 0;
	        total_hard = 0;
	        total_hard_correct = 0;

	        correct = 0;
	        wrong = 0;
	        unanswered = 0;


            $.ajax({
              url      : 'get_test_result.php',
              method   : 'post',
              data     : {id : id},
              datatype : "JSON",
              success  : function(data){
                            // now update user record in table
                            var itemData = $.parseJSON(data);
                            score = parseInt(itemData.score);
                            correct = parseInt(itemData.correct_answers);
                            wrong = parseInt(itemData.wrong_answers);
                            unanswered = parseInt(itemData.unanswered);
                            total = parseInt(itemData.total_questions);

                            total_easy_correct = parseInt(itemData.easy_correct);
                            total_medium_correct = parseInt(itemData.medium_correct);
                            total_hard_correct = parseInt(itemData.hard_correct);

                            total_easy = parseInt(itemData.total_easy);
                            total_medium = parseInt(itemData.total_medium);
                            total_hard = parseInt(itemData.total_hard);

                         },
                         async: false // <- this turns it into synchronous
          });


             $('#chartContainer').css("display", "block");
              var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                  text: "Your Performance analysis"
                },
                data: [{
                  type: "pie",
                  startAngle: 240,
                  yValueFormatString: "##0.00\"%\"",
                  indexLabel: "{label} {y}",
                  dataPoints: [
                    {y: (correct/total)*100, label: "Correct"},
                    {y: (wrong/total)*100, label: "Wrong"},
                    {y: (unanswered/total)*100, label: "Unanswered"},
                    
                  ]
                }]
              });
              chart.render();


              //second chart
              $('#chartContainer2').css("display", "block");
              var chart = new CanvasJS.Chart("chartContainer2", {
                  animationEnabled: true,
                  title:{
                    text: "Performance Analysis"
                  },  
                  axisY: {
                    title: "Number of Questions",
                    titleFontColor: "#4F81BC",
                    lineColor: "#4F81BC",
                    labelFontColor: "#4F81BC",
                    tickColor: "#4F81BC"
                  },
                   
                  
                  data: [{
                    type: "column",
                    name: "Correct",
                    legendText: "Correct",
                    showInLegend: true, 
                    dataPoints:[
                      { label: "Easy", y: total_easy_correct },
                      { label: "Medium", y: total_medium_correct },
                      { label: "Hard", y: total_hard_correct }
                      
                    ]
                  },
                  {
                    type: "column", 
                    name: "Wrong",
                    legendText: "Wrong",
                    axisYType: "secondary",
                    showInLegend: true,
                    dataPoints:[
                      { label: "Easy", y: total_easy - total_easy_correct },
                      { label: "Medium", y: total_medium - total_medium_correct },
                      { label: "Hard", y: total_hard - total_hard_correct }
                     
                    ]
                  }]
                });
                chart.render();

                return;


             });



      




});
