</div>
<!-- /#wrapper -->


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript" src="js/dropzone.js" ></script>
<script type="text/javascript" src="js/scripts.js" ></script>





<div style="border:0px solid red;" class="row">

<script type="text/javascript">

google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawStuff);

function drawStuff() {
var data = new google.visualization.arrayToDataTable([
['Data', 'Count'],
["All Posts",    <?php echo Post::count_all(); ?>],
["Registred Users",    <?php echo User::count_all(); ?>],

["All Comments", <?php echo Comment::count_all(); ?>],
["Not approved Comments", <?php echo count(Comment::unapproved_comments()); ?>],
["Reported Comments", <?php echo count(reportedComment::all_reported_comment()); ?>]
]);

var options = {
chart: {
title: '',
subtitle: '',
}
};

var chart = new google.charts.Bar(document.getElementById('piechart'));
// Convert the Classic options to Material options.
chart.draw(data, google.charts.Bar.convertOptions(options));

};
        
$(window).resize(function() {
    
drawStuff();
                     
});
    
    

    

        
</script>

</div>

















</body>

</html>
