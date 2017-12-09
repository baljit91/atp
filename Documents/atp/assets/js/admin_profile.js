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
            var company_name  = $('.'+id +' > '+ '#per-details').children('[data-target=company_name]').children().eq(1).text();
            
            var email  = $('.'+id +' > '+ '#per-details').children('[data-target=email]').children().eq(1).text();
            var company_details  = $('.'+id +' > '+ '#per-details').children('[data-target=company_details]').children().eq(1).text();
            

            $('#company_name').val(company_name);
            $('#email').val(email);
            $('#company_details').val(company_details);
            
            

            $('#userId').val(id);

            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database

       $('#save').click(function(){
          var id  = $('#userId').val();
         var company_name =  $('#company_name').val();
         var email =   $('#email').val();
          var company_details =  $('#company_details').val();
          
          


          $.ajax({
              url      : 'save_admin_profile.php',
              method   : 'post',
              data     : {company_name : company_name ,email : email , company_details: company_details , id: id},
              success  : function(response){
                            // now update user record in table
                             $('.'+id +' > '+ '#per-details').children('[data-target=company_name]').children().eq(1).text(company_name);
                             $('.'+id +' > '+ '#per-details').children('[data-target=email]').children().eq(1).text(email);
                            $('.'+id +' > '+ '#per-details').children('[data-target=company_details]').children().eq(1).text(company_details);
                             
                             
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
