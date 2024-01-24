<!doctype html>
<head>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function (){
            $("#state").change(function() {
                // foo is the id of the other select box
                if ($(this).val() != "notinoz") {
                    $("#foo").show();
                }else{
                    $("#foo").hide();
                }
            });
        });
    </script>

</head>


<body>
<p>
    <select id="state" name="state" style="width: 212px;">
        <option value="nsw">New South Wales</option>
        <option value="qld">Queensland</option>
        <option value="vic">Victoria</option>
        <option value="nt">Northern Territory</option>
        <option value="tas">Tasmania</option>
        <option value="sa">South Australia</option>
        <option value="wa">Western Australia</option>
        <option value="act">Australian Capital Territory</option>
        <option value="notinoz">Not in Australia</option>
    </select>
</p>

<p id="foo" style="display:none;">
    <select style="width: 212px;>
            <option value="item1">Item</option>
    <option value="item2">Item</option>
    <option value="item3">Item</option>
    </select>
</p>

</body>
Share
Improve this answer
Follow
answered Jan 11, 2012 at 0:36
