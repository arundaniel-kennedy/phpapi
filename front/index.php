<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>Hello!</title>
  </head>
  <body>

    <div class="container mt-5 pt-5">
      <div class="jumbotron shadow-lg">
        <h3>Registration Desk</h3>
        <hr>
        <div class="row" id="content">

        </div>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#apicrudModal">
          Register yourself here
        </button>
      </div>
    </div>

    <div class="modal fade" id="apicrudModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" id="api_crud_form">
              <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="" required>
              </div>
              <div class="form-group">
                <label>Year:</label>
                <input type="text" name="year" class="form-control" value="" required>
              </div>
              <div class="form-group">
                <label>Dept:</label>
                <input type="text" name="dept" class="form-control" value="" required>
              </div>
              <div class="form-group">
                <label>Mobile:</label>
                <input type="text" name="mobile" class="form-control" value="" required pattern="[5-9]{1}[0-9]{9}">
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
              </div>
              <div class="form-group">
                <label>AOI:</label>
                <input type="text" name="aoi" class="form-control" value="" required>
              </div>
              <input type="submit" name="submit_btn" value="Submit" class="btn btn-success">
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function(){

       fetch_data();

       function fetch_data()
       {
        $.ajax({
         url:"fetch.php",
         success:function(data)
         {
          $('#content').html(data);
         }
        })
       }
     });

     $('#api_crud_form').on('submit', function(event){
        event.preventDefault();
         var form_data = $(this).serialize();
         $.ajax({
          url:"add.php",
          method:"POST",
          data:form_data,
          success:function(data)
          {
           //fetch_data();
           $('#api_crud_form')[0].reset();
           $('#apicrudModal').modal('hide');
           alert("Data Inserted");
           location. reload();
          }
         });
       });

      </script>
  </body>
</html>
