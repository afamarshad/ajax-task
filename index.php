<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ACACIA JET BLACK CURTAINS</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <div>
       
        <img name="image-swap" src="default.jpg" alt="image" height="400" width="400" border="4" align="left" style="margin-left:20px;"/>
        
        <div style="margin-left: 20px;" align="center" id="viewDisplay">
            <h1>ACACIA JET BLACK CURTAINS</h1>
            <h1>From £106.84</h1>
            <form id="form" method="POST">
                <label for="width">WIDTH (CM)</label>
                <input id="width" name="width" type="text">
                <br>
                <br>
                <label for="length">LENGTH (CM)</label>
                <input id="length" name="length" type="text">
                <br>
                <br>
                <label for="lining">LINING</label>
                <select id="lining" name="lining">
                        <option value="CHOOSE AN OPTION">CHOOSE AN OPTION</option>
                        <option value="blackout">Blackout</option>
                        <option value="interlining">Interlining</option>
                        <option value="regular">Regular</option>
                        <option value="thermal">Thermal</option>
                </select>
                <br>
                <br>
                <label for="heading">Heading</label>
                <select id="heading" name="heading">
                        <option value="CHOOSE AN OPTION">CHOOSE AN OPTION</option>
                        <option value="pencilpleat">Pencil Pleat</option>
                        <option value="pinchpleat">Pinch Pleat</option>
                        <option value="gobletpleat">Goblet Pleat</option>
                        <option value="eyelet">Eyelet</option>
                </select>
                <br>
                <br>
                <label id="lbleye" for="eye">Eyelet</label>
                <select id="eye" name="eye">
                        <option value="CHOOSE AN OPTION">CHOOSE AN OPTION</option>
                        <option value="none">None</option>
                        <option value="antiquebrass">Antique Brass</option>
                        <option value="chrome">Chrome</option>
                        <option value="satinnickel">Satin Nickel</option>
                        <option value="gunmetal">Gun Metal</option>
                </select>
                <br>
                <br>
                <img id="eyeletsview" name="eyeletsview" src="eyelets.jpg" alt="image" height="100" width="300" style="margin-left:20px;"/>
                <br>
                <br>
                <label id="clear" name="clear">Clear</label>
                <br>
                <br>
                <span>
                    <button id="btncalculateprice">Calculate Price</button>
                Total Price:&nbsp;&nbsp;&nbsp;&nbsp;£&nbsp;<label id="calculateprice">0.0</label></span>

            </form>
            

        </div>
       
    </div>

    
    <script type="text/javascript">
    
        $(document).ready(function(){
                    // process the form
            $('#form').submit(function(event) {

                event.preventDefault();
                

                // get the form data
                // there are many ways to get this data using jQuery (you can use the class or id also)
            //    alert("This is alert");
                // process the form
                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : 'abc.php', // the url where we want to POST
                    data        : $("#form").serialize(), // our data object
                    // dataType    : 'json', // what type of data do we expect back from the server
                    // encode          : true
                })
                    // using the done promise callback
                    .done(function(response) {

                        // // log data to the console so we can see
                        // console.log(response); 
                        $("#calculateprice").text(response.toString());
                        // // here we will handle errors and validation messages

                    });

                // stop the form from submitting the normal way and refreshing the page
               
            });

            $("#eye").hide();
            $("#lbleye").hide();
            $("#eyeletsview").hide();

            $("#heading").change(function () {
                var selectedValue = $(this).val();
                $("#display").val($(this).find("option:selected").attr("value"));
                
                if(selectedValue=="pencilpleat"){
                    $("#eye").hide();
                    $("#lbleye").hide();
                    $("#eyeletsview").hide();
                    $("img[name=image-swap]").attr("src","pencilpleat.PNG");
                    
                }
                else if(selectedValue=="pinchpleat"){
                    $("#eye").hide();
                    $("#lbleye").hide();
                    $("#eyeletsview").hide();
                    $("img[name=image-swap]").attr("src","pinchpleat.PNG");
                    
                }
                else if(selectedValue=="gobletpleat")
                {
                    $("#eye").hide();
                    $("#lbleye").hide();
                    $("#eyeletsview").hide();
                    $("img[name=image-swap]").attr("src","gobletpleat.PNG");
                   
                }
                else if(selectedValue=="eyelet")
                {
                    $("#eye").show();
                    $("#lbleye").show();
                    $("#eyeletsview").show();
                    $("img[name=image-swap]").attr("src","eyelet.PNG");
                    
                }
                else{
                    $("#eye").hide();
                    $("#lbleye").hide();
                    $("#eyeletsview").hide();
                    $("img[name=image-swap]").attr("src","default.jpg");
                    
                }
                
            });
            
            $("#clear").click(function () {
                $("#width").val("");
                $("#length").val("");
                $("#calculateprice").text("0.0");
                $('#heading').val("CHOOSE AN OPTION");
                $('#lining').val("CHOOSE AN OPTION");
                $('#eye').val("CHOOSE AN OPTION");
            });
        });

    </script>


</body>
</html>