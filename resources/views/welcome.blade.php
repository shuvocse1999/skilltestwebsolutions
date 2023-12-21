<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

<div style="max-width: 600px; margin: 0 auto;">
    

    <form method="post" id="submitformnow" class="btn-submit" enctype="multipart/form-data">
        @csrf
        <label>Name</label>
        <input type="text" name="name" id="name" required="" class="form-control"><br>

        <label>Email</label>
        <input type="text" name="email" id="email" required="" class="form-control"><br>

        <label>Image</label>
        <input type="file" name="image" id="image" required="" class="form-control">

        <br>

        <button type="submit" class="btn btn-success">Save Now</button>
    </form>
<br>


    <div id="showdata">

    </div>



</div>



    <script type="text/javascript">

        $(document).ready(function(){

            showdata();


            $('#submitformnow').on('submit', function(event){
                event.preventDefault();


                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url:"{{ url('insertform') }}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,


                    success:function(data)
                    {

                        alert("Done")
                        showdata();


                    },error: function(data) {

                        alert("Done");
                        showdata();

                    }
                })







            });


        });

    </script>



    <script type="text/javascript">




        function showdata(){


            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url:"{{ url('showdata') }}",
                method:"GET",
                data:{},
                success:function(data)
                {

                    $('#showdata').html(data);
                }

            });

        }


    </script>

</body>
</html>