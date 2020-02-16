<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
        </div>
    </nav>



    <div class="row">
        <div class="success_msg">

        </div>
        <div class="already_exists_msg">

        </div>

        <div class="errors">

        </div>

        <div class="container">
            <!-- <form action="{{ url('/save_user') }}" method="POST">
                {{ csrf_field() }} -->
            <form id="save">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="full name" name="name">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1"> Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="confirm Password" name="confirm_password">
                </div>

                <div>
                    <label for="exampleInputPassword1"> Gender</label><br>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label><br>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea name="address" class="form-control" placeholder="Address" name="address"> </textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Date of Birth</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="dob">
                </div>

                <div class="form-group">
                    <label for="City">City:</label>

                    <select name="city" class="form-control">
                        <option value="Thane">Thane</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Navi Mumbai">Navi Mumbai</option>
                        <option value="Kalyan">Kalyan</option>
                    </select>
                </div>

                <div class="form-group">

                    <label for="exampleInputPassword1">Hobbies</label>
                    <br>
                    <input type="checkbox" name="hobbies[]" value="Cricket">
                    <label for="vehicle1"> Cricket</label><br>
                    <input type="checkbox" name="hobbies[]" value="Football">
                    <label for="vehicle2"> Football</label><br>
                    <input type="checkbox" name="hobbies[]" value="Hockey">
                    <label for="vehicle3"> Hockey</label><br><br>


                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


    </div>



    <script type="text/javascript">
        $(function() {
            $("#save").on("submit", function(e) {
                // alert('pok')
                e.preventDefault()
                $.ajax({
                    url: '/save_user',
                    method: 'POST',
                    data: new FormData(this),
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    processData: false,
                    contentType: false,
                    success: function(obj) {
                        console.log(obj)
                        console.log(obj.status)
                        // alert(1222);
                        if (obj.status == "success") {
                            $("html, body").animate({
                                scrollTop: 0
                            }, 1000);

                            $(".already_exists_msg").hide()
                            $(".success_msg").show()
                            $(".success_msg").html("<li class='alert alert-success'>Submitted successfully!</li>")
                        }
                        if (obj.status == "Already exists") {
                            $("html, body").animate({
                                scrollTop: 0
                            }, 1000);

                            $(".success_msg").hide()
                            $(".already_exists_msg").show()
                            $(".already_exists_msg").html("<li class='alert alert-warning'>A user with this email already exists!</li>")
                        }

                        $(".alert-danger").remove()
                        // alert('Submitted Successfully.')
                    },
                    error: function(obj) {
                        $("html, body").animate({
                            scrollTop: 0
                        }, 1000);
                        console.log(obj)
                        $(".errors").empty()
                        $(".success_msg").hide()
                        $(".already_exists_msg").hide()
                        $.each(obj.responseJSON.errors, function(key, val) {
                            // alert(val)
                            $(".errors").append("<li class='alert alert-danger'>" + val + "</li>")
                            // console.log(val)
                        })
                        // alert("Server Error occured! PLease contact supprt team.")
                    }
                })
            })
        })
    </script>
    </script>

</html>