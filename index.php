<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CSV email parser</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    </head>
    <body>
      <div class="align-center" style="padding-top:50px">

        <center class="body center" >
          <h1>Generate Emails</h1>
          <br><br>
      <form enctype="multipart/form-data" action="file_upload.php" method="post">

        <label >Select a CSV file:</label>
        <input type="file"  class="btn" accept=".csv" name="sample_csv" required  />
        <br><br>
        <label >Select Sample format:</label>
        <input type="file" class="btn" name="sample_format" accept=".txt" required />
        <br><br>
        <input type="submit" class="btn" name="btn" value="upload">
      </form>

</center>
  </div>
    </body>

    <footer style="padding-top:100px">
      <center>
<a href="https://AshishAYadav.github.io">About</a>
</center>
    </footer>

  </html>
