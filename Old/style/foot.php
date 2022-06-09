</div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var shownIds = new Array();
            setInterval(function(){
                $.get("test2.php", function(data){
                    data = $.parseJSON(data);
                    for(i = 0; i < data.length; i++){
                            $("#temperature").html("Температура: " + data[i]["id"] + "<br />");
                            shownIds.push(data[i]["id"]);                        
                    }
                });
            }, 100);
        });
    </script>
	<script type="text/javascript">
        $(document).ready(function(){
            var shownIds = new Array();
            setInterval(function(){
                $.get("test3.php", function(data){
                    data = $.parseJSON(data);
                    for(i = 0; i < data.length; i++){
                            $("#humidity").html("Влажность: " + data[i]["id"] + "<br />");
                            shownIds.push(data[i]["id"]);                        
                    }
                });
            }, 100);
        });
    </script>
	<div class="header">
		<h2><div id="temperature"></div></h2>
		<h2><div id="humidity"></div></h2>
    </div>
</body>
</html>

